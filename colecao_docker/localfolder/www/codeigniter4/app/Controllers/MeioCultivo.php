<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MeioModel;

class MeioCultivo extends BaseController
{

    public function index()
    {
        $meioModel = new MeioModel();
        return view('utils/head.php') 
            .view('crud_meio/meio',[
                'meios' => $meioModel->findAll()
            ]);
    }

    public function delete($id){
        $meioModel = new MeioModel();

        if($meioModel->where('id_meio_cultivo', $id)->delete($id)){
            echo view('errors/messages', ['message' => 'Meio de Cultivo excluído com sucesso!']);
        }else{
            echo "Erro";
        }
    }

    public function create(){
        return view('utils/head.php') 
            .view('crud_meio/inserir_meio');
    }

    public function store() {
        $meioModel = new MeioModel();
        $data = [
            'meio_cultivo' => $this->request->getVar('nome_meio')
        ];
        $meioModel->save($data);
        return $this->response->redirect(site_url('/meio'));
    }

    public function singleMeio($id = null){
        $meioModel = new MeioModel();
        $data['meio_cultivo'] = $meioModel->where('id_meio_cultivo', $id)->first();
        return view('utils/head.php') 
                .view('crud_meio/editar_meio', $data);
    }

    public function update(){
        $meioModel = new MeioModel();
        $id = $this->request->getVar('id_meio_cultivo');
        $data = [
            'meio_cultivo' => $this->request->getVar('meio_cultivo'),
        ];
        $meioModel->update($id, $data);
        return $this->response->redirect(site_url('/meio'));
    }
}
