<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use App\Services\ApiService;

/**
 * @group Ajuda geral
 */
class Controller extends BaseController
{
    /**
     * @var ApiService
     */
    protected $api;

    public function __construct()
    {
        $this->api = new ApiService();
    }

    /**
     * Ajuda geral
     *
     * <h2>Filtros e ordenação em pesquisas</h2>
     *
     * Para compreender a utilização dos endpoints de pesquisa, leia a documentação do pacote spatie/laravel-query-builder,
     * o qual é utilizado para realizar os filtros nesta API. Esta documentação explica como utilizar o pacote na construção de uma
     * api, o que auxiliará você desenvolvedor consumidor desta API a entender como montar as queries de pesquisa para os endpoints
     * que o permitem. Note que não necessita seu aprofundamento no pacote, e sim compreender os exemplo que a documentação dele
     * apresenta no uso do cliente que consome uma api construída com o mesmo.
     *
     * Em especial, a seção <strong>Features</strong>:
     *  * <strong>[filter]</strong> - que descreve como utilizar parâmetros de filtragem: https://docs.spatie.be/laravel-query-builder/v2/features/filtering/
     *  * <strong>[sort]</strong> - que descreve como utilizar parâmetros de ordenação: https://docs.spatie.be/laravel-query-builder/v2/features/sorting/
     *  * <strong>[include]</strong> - que descreve como incluir dados de relacionamentos (tabelas relacionadas) a um determinado endpoint: https://docs.spatie.be/laravel-query-builder/v2/features/including-relationships/
     *
     * <h2>Exemplos de filtros e ordenação</h2>
     * A seguir uma visão geral de um exemplo utilizando as possibilidades de filtragem, ordenação e inclusão de relacionamentos, no endpoint
     * <em>produtos</em>. A utilização pode ser feita diretamente na <em>query-string</em> como na passagem de parâmetros exemplificada
     * em cada trecho da documentação utilizando Guzzle.
     *
     *
     * <h3>Diretamente na query-string (URL)</h3>
     *
     * <aside><strong>Note</strong> que na documentação de cada endpoint desta api, está descrito quais filtros e como eles
     * podem ser utilizados para o retorno / pesquisa dos dados desejados. Quais filtros são aceitos, quais campos podem ser
     * utilizados para ordenação e quais includes podem sem escolhidos que não virão com a resposta padrão</aside>
     *
     * <pre>
     * <code class="language-bash">
     *      https://caminho.da.api/produtos/search?filter[nome]=cadeira&sort=-nome&include=comentarios
     * </code>
     * </pre>
     *
     * Exemplo, pesquisar pelo campo <em>nome</em>,
     * em ordem decrescente (-), incluindo o relacionamento chamado <em>comentarios</em> neste endpoint
     *
     *
     * <h2>Meta dados</h2>
     *
     * > <p>Exempo meta com count:</p>
     *
     * <pre>
     *  <code class="language-json">
     *      {
     *          "data": [
     *              {
     *                  "campo": "valor",
     *                  "outro-campo": "outro valor"
     *              }
     *              ...
     *          ],
     *          "meta": {
     *              "count": 32
     *          }
     *      }
     *  </code>
     * </pre>
     *
     * Alguns endpoints retornam dados extras em um índice de nome <em>meta</em>, sendo o dado mais comum adicionado a este
     * índice a contagem da quantidade de registros retornandos em uma chamada:
     *
     * <h2>Paginação de resultados</h2>
     *
     * > <p>Exempo meta com dados de paginação:</p>
     *
     * <pre>
     *  <code class="language-json">
     *      {
     *          "data": [
     *              {
     *                  "campo": "valor",
     *                  "outro-campo": "outro valor"
     *              }
     *              ...
     *          ],
     *          "meta": {
     *              "pagination": {
     *                  "total": 2337,
     *                  "per_page": 50,
     *                  "from": 2301,
     *                  "to": 2337,
     *                  "current_page": 47,
     *                  "last_page": 47
     *              }
     *              "count": 37
     *          }
     *      }
     *  </code>
     * </pre>
     *
     * Conjuntos de resultados que retornarão um número maior que uma determinada quantidade padrão serão paginados.
     *
     * Esta paginação irá adicionar um grupo de dados a respeito da paginação para que o cliente possa navegar entre as páginas
     * ou tomar decisões de aumentar o conjunto de resultados, por exemplo.
     *
     * Campos:
     * * <strong>total</strong>: total de registros que resultantes da consulta, porém não incluídos no retorno
     * * <strong>per_page</strong>: quantidade de registros incluídos em cada página de retorno
     * * <strong>from</strong>: a partir de qual registro esta página está retornando
     * * <strong>to</strong>: até qual registro esta página está retornando
     * * <strong>current_page</strong>: qual a página está sendo retornada
     * * <strong>last_page</strong>: qual a última página possível de ser retornada
     *
     * No exemplo um total de 2337 registros resultam da pesquisa, cada página retorna até 50. Este retorno contém os registros
     * a partir do 2301 até o 2337. A página atual é a 47 e a última é a 47. O total de registros incluídos nesta página é
     * 37 (<em>count</em>).
     *
     * <h1>Navegando nas páginas</h1>
     *
     * Para navegar entre as páginas de resultados, adiciona à query-string o parâmetro <em>page</em>.
     *
     * No exemplo resultado ao lado, foi solicitada a página 47, em uma chamada de URL parecida com a seguir:
     *
     * <pre><code>https://caminho.da.api/endpoint/search?filter[campo]=texto?page=47</code></pre>
     *
     * <pre>
     *  <code class="language-json">
     *      {
     *          "data": [
     *              {
     *                  "campo": "valor",
     *                  "outro-campo": "outro valor"
     *              }
     *              ...
     *          ],
     *          "meta": {
     *              "pagination": {
     *                  "total": 2337,
     *                  "per_page": 50,
     *                  "from": 2301,
     *                  "to": 2337,
     *                  "current_page": 47,
     *                  "last_page": 47
     *              }
     *              "count": 37
     *          }
     *      }
     *  </code>
     * </pre>
     *
     * Caso você passe um número de pagina acima da quantidade de páginas existente, por exemplo, se tivéssemos passado o
     * valor <code>page=50</code> a api retornará um array vazio, repetindo os metadados com as informações da paginação correta.
     *
     * Ainda a respeito do exemplo de resposta ao lado, note que o valor de <code>count</code> é 37, pois a última página não irá,
     * necessariamente, retornar a quantidade de registros total que uma página comporta. Outras páginas anteriores a última
     * terão o valor de <code>per_page</code> igual ao de <code>count</code>.
     *
     * <h2>Registros por página</h2>
     *
     * É possível alterar a quantidade padrão de registros retornados por página, que irão, consequentemente, alterar a contagem
     * de total de páginas.
     *
     * > Exemplo, para obter páginas com retorno de 100 registros, definir <em>per_page</em>:
     *
     * <pre><code>https://caminho.da.api/endpoint/search?filter[campo]=texto?per_page=100</code></pre>
     *
     * > Exemplo, para obter a página 5 com retorno de 20 registros por página:
     *
     * <pre><code>https://caminho.da.api/endpoint/search?filter[campo]=texto?per_page=20&page=5</code></pre>
     *
     * Para solicitar uma página com tamanho de retorno diferente, adicione o parâmetro <em>per_page</em> na query-string.
     *
     * Também é possível mesclar ambos os parâmetros para definir tamanhos de página e paginação, usando na query-string
     * os parâmetros <em>per_page</em> e <em>page</em>.
     *
     * <aside>Atenção quanto ao número de páginas pois ele é calculado em relação ao total de registros dividido pela quandiade
     * de registros escolhidos para retorno por página. Desta forma, se você alterar a quantidade padrão de retornos uma
     * pesquisa solicitando a página 2 trará um conjunto diferente de registros se a mesma página 2 for solicitada com a quantidade
     * padrão de retornos.</aside>
     *
     * <h1>Informação básica da API</h1>
     *
     * @response {
     *    "msg": "Seção de introdução desta API"
     *    }
     */
    public function index()
    {
        return 'API Só Notas';
    }
}
