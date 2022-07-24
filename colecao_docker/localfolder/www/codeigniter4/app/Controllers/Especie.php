<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\EspecieModel;

class Especie extends BaseController
{
    public function index()
    {
        $especie = new EspecieModel();
        return view('utils/head.php') 
            .view('crud_especie/especie',[
                'especies' => $especie->findAll()
            ]);
    }

    public function delete($id){
        $especie = new EspecieModel();

        if($especie->where('id_especie', $id)->delete($id)){
            echo view('errors/messages', ['message' => 'Espécie excluída com sucesso!']);
        }else{
            echo "Erro";
        }
    }

    public function create(){
        return view('utils/head.php')
            .view('crud_especie/inserir_especie');
    }

    public function store() {
        $especie = new EspecieModel();

        $data = [
            'nome_especie' => $this->request->getVar('nome_especie'),
            'status_tax_especie' => $this->request->getVar('status_tax'),
            'tipos_org_especie' => $this->request->getVar('tipos_org'),
            'procedencia_especie' => $this->request->getVar('procedencia'),
            'substrato_especie' => $this->request->getVar('substrato'),
            'riscos_especie' => $this->request->getVar('riscos'),
            'aplicacoes_especie' => $this->request->getVar('aplicacoes')
        ];
        $especie->save($data);
        return $this->response->redirect(site_url('/especie'));
    }

    public function verEspecie($id = null){
        $especie = new EspecieModel();

        $data['especie'] = $especie->where('id_especie', $id)->first();
        return view('utils/head.php') 
            .view('crud_especie/ver_especie', $data);
    }

    public function singleEspecie($id = null){
        $especie = new EspecieModel();

        $data['especie'] = $especie->where('id_especie', $id)->first();
        return view('utils/head.php') 
            .view('crud_especie/editar_especie', $data);
    }

    public function update(){
        $especie = new EspecieModel();

        $id = $this->request->getVar('id_especie');
        $data = [
            'nome_especie' => $this->request->getVar('nome_especie'),
            'status_tax_especie' => $this->request->getVar('status_tax_especie'),
            'tipos_org_especie' => $this->request->getVar('tipos_org_especie'),
            'procedencia_especie' => $this->request->getVar('procedencia_especie'),
            'substrato_especie' => $this->request->getVar('substrato_especie'),
            'riscos_especie' => $this->request->getVar('riscos_especie'),
            'aplicacoes_especie' => $this->request->getVar('aplicacoes_especie')
        ];
        $especie->update($id, $data);
        return $this->response->redirect(site_url('/especie'));
    }
}
