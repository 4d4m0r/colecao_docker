<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsuarioModel;

class Login extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function signIn()
    {
        $nome = $this->request->getPost('inputName');
        $password = $this->request->getPost('inputPassword');

        $usuarioModel = new UsuarioModel();

        $dadosUsuario = $usuarioModel->getByName($nome);
    
        if(count($dadosUsuario) > 0){
            $hashUsuario = $dadosUsuario['senha_admin'];
            $teste = password_verify($password,$hashUsuario);    
                    
            if(password_verify($password,$hashUsuario)){
                session()->set('isLoggedIn',true);
                session()->set('nome',$dadosUsuario['nome_admin']);
                return redirect()->to('dashboard');
            }else{
                session()->setFlashData('msg', 'Usuário ou senha incorretos!');
                return redirect()->to('/login');
            }
        }else{
            session()->setFlashData('msg', 'Usuário ou senha incorretos!');
            return redirect()->to('/login');
        }
    }

    public function signOut(){
        session()->destroy();
        return redirect()->to('/login');
    }

    public function dashboard(){
        $db = \Config\Database::connect();
        return view('/utils/head.php') 
            .view('dashboard');
    }
}
