<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'estados';
    protected $primaryKey       = 'id_estados';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_estados',
        'nome_estados',
        'id_pais_estados'
    ];

    function getIdEstado($estado) {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT id_estados FROM estados WHERE nome_estados = '$estado'");
   
       return  $query->getResultArray();
    }
}
