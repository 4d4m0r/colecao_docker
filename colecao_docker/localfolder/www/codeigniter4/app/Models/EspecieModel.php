<?php

namespace App\Models;

use CodeIgniter\Model;

class EspecieModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'especie';
    protected $primaryKey       = 'id_especie';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_especie',
        'nome_especie',
        'status_tax_especie',
        'tipos_org_especie',
        'aplicacoes_especie',
        'procedencia_especie',
        'substrato_especie',
        'riscos_especie'
    ];

    function getIdEspecie($nome) {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT * FROM especie WHERE nome_especie = '$nome'");
   
       return  $query->getResultArray();
    }

    function getDadosEspecie() {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT * FROM especie");
   
       return  $query->getResultArray();
    }

    function verificaExisteEspecie($especie){
        $db = \Config\Database::connect();

        $nome_especie = $especie['nome_especie'];
        $status_tax_especie= $especie['status_tax_especie'];
        $tipos_org_especie= $especie['tipos_org_especie'];
        $aplicacoes_especie= $especie['aplicacoes_especie'];
        $procedencia_especie= $especie['procedencia_especie'];
        $substrato_especie= $especie['substrato_especie'];
        $riscos_especie= $especie['riscos_especie'];
        $query = $db->query("SELECT * FROM especie 
                                WHERE nome_especie = '$nome_especie' 
                                AND status_tax_especie ='$status_tax_especie'
                                AND tipos_org_especie ='$tipos_org_especie'
                                AND aplicacoes_especie ='$aplicacoes_especie'
                                AND procedencia_especie ='$procedencia_especie'
                                AND substrato_especie ='$substrato_especie'
                                AND riscos_especie ='$riscos_especie'");

        $row = $query->getResultArray();
        if(empty($row)){
            return true;
        }else{
            return false;
        }
    }
}
