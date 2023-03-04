<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieModel;

class Role extends SpatieModel
{
    /**
     * Role da equipe técnica de administração da plataforma Só Notas
     */
    const SYSADMIN = 'sys-admin';
    /**
     * Role de usuário proprietário de uma empresa
     */
    const OWNER = 'owner';
    /**
     * Role de usuário com permissão de gerenciamento de uma empresa
     */
    const MANAGER = 'manager';
    /**
     * Role de usuário afiliado
     */
    const AFFILIATE = 'affiliate';
}
