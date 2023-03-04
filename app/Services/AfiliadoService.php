<?php

namespace App\Services;

use App\Events\AfiliadoAlteradoEvent;
use App\Events\AfiliadoCriadoEvent;
use App\Exceptions\DocumentoDuplicadoCriarAfiliadoException;
use App\Models\Afiliado;
use App\Models\Empresa;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AfiliadoService
{
    /**
     * Cria um novo registro de afiliado no banco de dados
     *
     * @param $afiliado
     * @return Afiliado
     */
    public function create($afiliado) : Afiliado
    {
        $this->validaCnpjUnicoCriarAfiliado($afiliado['documento']);

        DB::beginTransaction();
            $user = User::create([
                'name' => $afiliado['nome'],
                'email' => $afiliado['email'],
                'phone_number' => $afiliado['telefone_num'],
                'phone_area_code' => $afiliado['telefone_ddd'],
                'password' => Hash::make($afiliado['documento']),
            ]);

            $role = Role::findByName(Role::AFFILIATE);
            $user->assignRole($role);
            
            $afiliado['user_id'] = $user->id;

            $afiliado = Afiliado::create($afiliado);

        DB::commit();

        AfiliadoCriadoEvent::dispatch($afiliado);

        return $afiliado;
    }

    /**
     * Altera o registro de afiliado no banco de dados
     * @param $afiliado
     * @return Afiliado
     */
    public function update(Afiliado $afiliado) : Afiliado
    {
        $afiliado->save();

        AfiliadoAlteradoEvent::dispatch($afiliado);

        return $afiliado;
    }

    public function validaCnpjUnicoCriarAfiliado(string $cnpj)
    {
        $afiliado = Afiliado::where('documento', $cnpj)->first();

        if ($afiliado) {
            throw new DocumentoDuplicadoCriarAfiliadoException(
                'Afiliado com o documento ' . $cnpj . ' já cadastrado.'
            );
        }

        return true;
    }

    /**
     * Retorna a lista de empresas que o afiliado possui na plataforma
     *
     * @param Afiliado $afiliado
     * @return Collection
     */
    public function getEmpresasAfiliado(Afiliado $afiliado) : Collection
    {
        return Empresa::where('afiliado_id', $afiliado->id)->get();
    }
}
