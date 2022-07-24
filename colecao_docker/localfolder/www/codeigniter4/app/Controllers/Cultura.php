<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CulturaModel;
use App\Models\EspecieModel;
use App\Models\MeioModel;

use App\Models\CidadeModel;
use App\Models\EstadoModel;
use App\Models\PaisModel;

class Cultura extends BaseController
{
    public function index(){
        $cultura = new CulturaModel();
        return view('utils/head.php') 
            .view('crud_cultura/cultura',[
                'culturas' => $cultura->getDadosCultura()
            ]);

    }

    public function verCultura($id = null){
        $cultura = new CulturaModel();

        return view('utils/head.php') 
            .view('crud_cultura/ver_cultura', [
                'cultura' => $cultura->getDadosCulturaById($id)
            ]);
    }

    public function delete($id){
        $cultura = new CulturaModel();

        if($cultura->where('id_cultura', $id)->delete($id)){
            echo view('errors/messages', ['message' => 'Cultura excluída com sucesso!']);
        }else{
            echo "Erro";
        }
    }

    public function create(){
        $especie = new EspecieModel();
        $meio = new MeioModel();
        $paisModel = new PaisModel();
        return view('utils/head.php')
            .view('crud_cultura/inserir_cultura',[
                'especies' => $especie->getDadosEspecie(),
                'meios' => $meio->getDadosMeio(),
                'pais' => $paisModel->orderBy('nome_pt_pais','ASC')->findAll()
            ]);
    }

    function action(){
        if($this->request->getVar('action')){
            $action = $this->request->getVar('action');
            
            if($action == 'get_estado'){
                $estadoModel = new EstadoModel();
                $estado = $estadoModel->where('id_pais_estados',$this->request->getVar('id_pais'))->findAll();
                echo json_encode($estado);
            }
            if($action == 'get_cidade'){
                $cidadeModel = new CidadeModel();
                $cidade = $cidadeModel->where('id_estado_cidade',$this->request->getVar('id_estado'))->findAll();
                echo json_encode($cidade);
            }
        }
    }
    public function data($data){
        //dd($data);
        $dat = str_replace('/', '-', $data);
        $newdate = strtotime($dat);
        //dd($newdate);
        $newformat = date('Y-m-d',$newdate);
        return $newformat;
        //return date("Y-m-d", strtotime($data));
    }
    public function store() {
        $cultura = new CulturaModel();
        

        $data = [
            'id_especie_cultura'=> intval($this->request->getVar('id_especie')),
            'id_meio_cultura '=> intval($this->request->getVar('id_meio')),
            'n_dpua_cultura'=> $this->request->getVar('n_dpua'),
            'codigo_col_ext_cultura'=> $this->request->getVar('codigo_col_ext'),
            'autor_cultura'=> $this->request->getVar('autor'),
            'metodo_preservacao_cultura'=> $this->request->getVar('metodo_preser'),
            'cultura_descartada_cultura'=> $this->request->getVar('cult_descar'),
            'n_cul_preser_oleo_cultura'=> intval($this->request->getVar('n_cult_preser_oleo')),
            'n_cul_preser_agua_cultura'=> intval($this->request->getVar('n_cult_preser_agua')),
            'data_preser_oleo_cultura'=> $this->data($this->request->getVar('data_preser_oleo')),
            'data_preser_agua_cultura'=> $this->data($this->request->getVar('data_preser_agua')),
            'depositante_cultura'=> $this->request->getVar('depositante'),
            'historico_deposito_cultura'=> $this->request->getVar('historico'),
            'forma_envio_cultura'=> $this->request->getVar('forma_envio'),
            'restricao_cultura'=> intval($this->request->getVar('restricao')),
            'status_cultura'=> $this->request->getVar('status'),
            'observacao_cultura'=> $this->request->getVar('observacao'),
            'loc_cidade_cultura'=> intval($this->request->getVar('cidade'))
        ];
        //dd($data);
        $cultura->save($data);
        return $this->response->redirect(site_url('/cultura'));
    }

    public function singleCultura($id = null){
        $cultura = new CulturaModel();
        $especie = new EspecieModel();
        $meio = new MeioModel();
        $paisModel = new PaisModel();

        return view('utils/head.php') 
            .view('crud_cultura/editar_cultura', [
                'cultura' => $cultura->getDadosCulturaById($id),
                'especies' => $especie->getDadosEspecie(),
                'meios' => $meio->getDadosMeio(),
                'pais' => $paisModel->orderBy('nome_pt_pais','ASC')->findAll()
            ]);
    }

    public function update(){
        $cultura = new CulturaModel();

        $id = $this->request->getVar('id_cultura');
        $data = [
            'id_especie_cultura '=> $this->request->getVar('id_especie'),
            'id_meio_cultura '=> $this->request->getVar('id_meio'),
            'n_dpua_cultura'=> $this->request->getVar('n_dpua'),
            'codigo_col_ext_cultura'=> $this->request->getVar('codigo_col_ext'),
            'autor_cultura'=> $this->request->getVar('autor'),
            'metodo_preservacao_cultura'=> $this->request->getVar('metodo_preser'),
            'cultura_descartada_cultura'=> $this->request->getVar('cult_descar'),
            'n_cul_preser_oleo_cultura'=> $this->request->getVar('n_cult_preser_oleo'),
            'n_cul_preser_agua_cultura	'=> $this->request->getVar('n_cult_preser_agua'),
            'data_preser_oleo_cultura'=> $this->request->getVar('data_preser_oleo'),
            'data_preser_agua_cultura'=> $this->request->getVar('data_preser_agua'),
            'depositante_cultura'=> $this->request->getVar('depositante'),
            'historico_deposito_cultura'=> $this->request->getVar('historico'),
            'forma_envio_cultura'=> $this->request->getVar('forma_envio'),
            'restricao_cultura'=> $this->request->getVar('restricao'),
            'status_cultura'=> $this->request->getVar('status'),
            'observacao_cultura'=> $this->request->getVar('observacao'),
            'loc_cidade_cultura'=> $this->request->getVar('cidade')
        ];
        $cultura->update($id, $data);
        return $this->response->redirect(site_url('/cultura'));
    }
}
