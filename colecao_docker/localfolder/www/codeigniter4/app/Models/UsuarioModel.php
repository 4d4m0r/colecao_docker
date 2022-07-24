<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'id_admin';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome_admin',
        'senha_admin'
    ];

    public function getByName(string $name){
        $rq = $this->where('nome_admin',$name)->first();

        return !is_null($rq) ? $rq : [];
    }
}
