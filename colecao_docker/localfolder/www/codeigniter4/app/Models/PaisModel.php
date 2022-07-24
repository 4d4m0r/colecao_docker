<?php

namespace App\Models;

use CodeIgniter\Model;

class PaisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pais';
    protected $primaryKey       = 'id_pais';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome_pt_pais'
    ];
}
