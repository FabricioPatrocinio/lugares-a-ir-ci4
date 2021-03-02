<?php namespace App\Controllers;

class CriarConta extends BaseController
{
	public function index()
	{
        $data['title'] =  'Criar conta';
        $data['msg']= '';
        $data['class_error'] = '';
        $data['erros'] = '';

        date_default_timezone_set('America/Sao_Paulo');
        $data_create = date('Y-m-d H:i');

        if($this->request->getMethod() === 'post'){
            $userModel = new \App\Models\UserModel();

            $nome = $this->input->post('nome');
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');
            $img_perfil = $this->input->post('img_perfil');

            $user = [
                'nome'   => $nome,
                'email'   => $email,
                'senha' => $senha,
                'img_perfil' => $img_perfil,
                'time_created'   => $data_create,
                'time_updated' => $data_create
            ];
            
            if($userModel->update($user)){
                $data['msg'] = 'Usuario criado com sucesso';
                $data['class_error'] = 'success';
            }else{
                $data['msg'] = 'Erro ao adicionar publicação!';
                $data['class_error'] = 'danger';
            }
        }

        echo view('criar-conta', $data);
	}
}