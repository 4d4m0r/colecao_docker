<?php

namespace App\Models;

use CodeIgniter\Model;

class CulturaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cultura';
    protected $primaryKey       = 'id_cultura';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_cultura',
        'id_especie_cultura',
        'id_meio_cultura',
        'n_dpua_cultura',
        'codigo_col_ext_cultura',
        'autor_cultura',
        'metodo_preservacao_cultura',
        'cultura_descartada_cultura',
        'n_cul_preser_oleo_cultura',
        'n_cul_preser_agua_cultura',
        'data_preser_oleo_cultura',
        'data_preser_agua_cultura',
        'depositante_cultura',
        'historico_deposito_cultura',
        'forma_envio_cultura',
        'restricao_cultura',
        'status_cultura',
        'observacao_cultura',
        'loc_cidade_cultura'
    ];

    function getDadosCultura() {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT * FROM cultura c
        JOIN especie e ON c.id_especie_cultura = e.id_especie 
        JOIN meio_cultivo m ON c.id_meio_cultura = m.id_meio_cultivo
        JOIN cidades ci ON ci.id_cidades = c.loc_cidade_cultura
        JOIN estados es on es.id_estados = ci.id_estado_cidade
        JOIN pais p on p.id_pais = es.id_pais_estados");
   
       return  $query->getResultArray();
    }

    function getDadosCulturaById($id) {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT * FROM cultura c
                            JOIN especie e ON c.id_especie_cultura = e.id_especie 
                            JOIN meio_cultivo m ON c.id_meio_cultura = m.id_meio_cultivo
                            JOIN cidades ci ON ci.id_cidades = c.loc_cidade_cultura
                            JOIN estados es on es.id_estados = ci.id_estado_cidade
						    JOIN pais p on p.id_pais = es.id_pais_estados
                            WHERE id_cultura = $id");
   
       return  $query->getResultArray();
    }

    function verificaExisteCultura($cultura){
        $db = \Config\Database::connect();

        $n_dpua_cultura= $cultura['n_dpua_cultura'];

        $query = $db->query("SELECT * FROM cultura WHERE n_dpua_cultura = '$n_dpua_cultura'");

        $row = $query->getResultArray();
        if(empty($row)){
            return true;
        }else{
            return false;
        }
    }
}