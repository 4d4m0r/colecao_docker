<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Models\EstadoModel;

class CidadeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cidades';
    protected $primaryKey       = 'id_cidades';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_cidades',
        'nome_cidades',
        'id_estado_cidade'
    ];

    function getIdCidade($municipio,$estado) {
        $db = \Config\Database::connect();
        $estadoModel = new EstadoModel();

        $idEstado = $estadoModel->getIdEstado($estado);
        $id = $idEstado[0]['id_estados'];
        $query = $db->query("SELECT * FROM cidades WHERE nome_cidades = '$municipio' AND id_estado_cidade = $id");
   
       return  $query->getResultArray();
    }
}
