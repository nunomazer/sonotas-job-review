<?php


namespace App\Domain;

use App\Transformers\StatusCodeTransformer;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use League\Fractal\TransformerAbstract;
use Spatie\Fractal\Fractal;

class Api
{

    /**
     * Padroniza a resposta, útil para erros 404 ou outros códigos customizados
     *
     * @param int $code
     * @param string|null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function statusResponse(int $code, string $message = null) {
        return \fractal([[
            'code' => $code,
            'message' => $message,
        ]])
            ->transformWith(StatusCodeTransformer::class)
            ->respond($code);
    }
    public function itemResponse($item, $transformer, $nullNotFound = true)
    {
        if ($item == null && $nullNotFound) {
            return \fractal(404)
                    ->transformWith(new StatusCodeTransformer())
                    ->respond(404);
        }

        return Fractal::create()
            ->item($item)
            ->transformWith($transformer);
    }

    public function collectionResponse($collection, $transformer)
    {
        if ($collection == null) {
            return [];
        }

        return Fractal::create()
            ->collection($collection)
            ->addMeta($this->buildMeta($collection))
            ->transformWith($transformer);
    }


    /**
     * Calcula e retorna o total de registro na entrada "meta" dos endpoints de pesquisa
     *
     * @param $response
     * @param $meta
     * @return mixed
     */
    private function getMetaCount($response, $meta)
    {
        try {
            $meta['count'] = $response->count();

            return $meta;
        } catch (\Exception $ex) {
            // se deu erro provavelmente não é contável, então não retorna count apenas o próprio meta
            return $meta;
        }
    }

    /**
     * Constrói os dados do campo meta para retornar junto com a resposta.
     *
     * @param LengthAwarePaginator $response Objeto ou coleção de objetos de resposta
     */
    public function buildMeta($response)
    {
        $meta = [];
        if ($response instanceof LengthAwarePaginator) {
            $meta['pagination']['total'] = $response->total();
            $meta['pagination']['per_page'] = self::getPerPage();
            $meta['pagination']['from'] = $response->firstItem();
            $meta['pagination']['to'] = $response->lastItem();
            $meta['pagination']['current_page'] = $response->currentPage();
            $meta['pagination']['last_page'] = $response->lastPage();
//            "first_page_url": "https://api.apps73.dev.uepg.br/graduacao/oferta?filter%5Bcalendario.id%5D=36&page=1",
//            "last_page_url": "https://api.apps73.dev.uepg.br/graduacao/oferta?filter%5Bcalendario.id%5D=36&page=156",
//            "next_page_url": "https://api.apps73.dev.uepg.br/graduacao/oferta?filter%5Bcalendario.id%5D=36&page=2",
//            "path": "https://api.apps73.dev.uepg.br/graduacao/oferta",
//            "prev_page_url": null,
//            $meta['aux'] = $response->toArray();
        }

        return self::getMetaCount($response, $meta);
    }

    /**
     * Determina a quantidade de registros por página na paginação de resultados, analisa se a query string
     * possui um parâmetro <strong>per_page</strong> e o usa, caso contrário trablha com o determinado no arquivo de
     * configuração da aplicação
     *
     * @return bool
     */
    public function getPerPage()
    {
        return \request()->get('per_page', config('api.pagination.per_page', 30));
    }

    /**
     * Abre um arquivo local ou remoto e retorna seu conteúdo
     *
     * @param string $path
     * @return bool|string
     * @throws \Exception
     */
    public function openFile($path)
    {
        $path = trim(Str::lower($path));

        if (Str::startsWith($path,'http://') ||
            Str::startsWith($path,'https://'))
        {
            $ch = curl_init($path);
//            curl_setopt($ch, CURLOPT_NOBODY, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); # handles 301/2 redirects
            $content = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode == 200) {
                return $content;
            }

            throw new \Exception('Erro ao abrir o arquivo "'.$path.'" - código de erro retornado '. $httpCode);
        }

        return File::get($path);
    }

    /**
     * Avalia e tenta recuperar corretamente o IP do cliente mesmo por trás de proxy reverso
     *
     * @return string IP do cliente que fez o request
     */
    public function getClientIP() : string
    {
        $vars = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'];

        foreach ($vars as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe

                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
