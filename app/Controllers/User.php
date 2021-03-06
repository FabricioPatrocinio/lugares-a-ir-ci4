<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function login()
    {
        $data['title'] = 'Login';

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'nome' => 'required|min_length[3]|max_length[50]',
                'senha' => 'required|min_length[8]|max_length[255]|validateUser[nome,senha]',
            ];

            $errors = [
                'nome' => [
                    'required' => 'Você precisa preencher o nome.',
                    'min_length' => 'O nome pode deve ter no minimo 3 caracteres.',
                    'max_length' => 'O nome pode ter no maximo 50 caracteres.',
                    'is_unique' => 'Já existe um usuário cadastrado com esse nome.',

                ],
                'senha' => [
                    'required' => 'Você precisa preencher a senha.',
                    'min_length' => 'Sua senha deve ter no minimo 8 caracteres.',
                    'max_length' => 'Sua senha pode ter no maximo 255 caracteres.',
                    'validateUser' => 'Seu nome de usuário ou senha estão incorretos, por favor tente novamente.',
                ],
            ];

            if ($this->validate($rules, $errors)) {
                $data['validation'] = $this->validator->getErrors();
                $data['class_error'] = 'danger';
            } else {
                $userModel = new UserModel();

                
                $user = $userModel->where('nome', $this->request->getPost('nome'))
                ->where('senha', $this->request->getPost('senha'))
                ->first();
                
                $this->setUserSession($user);

                return redirect()->to('/');
            }
        }

        echo view('login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'nome' => $user['nome'],
            'email' => $user['email'],
            'img_perfil' => $user['img_perfil'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function criar_conta()
    {
        helper(['form', 'url']);

        $data['title'] = 'Criar conta';
        $data['msg'] = '';
        $data['class_error'] = '';
        $data['erros'] = '';

        if ($this->request->getMethod() == 'post') {
            $userModel = new \App\Models\UserModel();

            $userModel->set('nome', $this->request->getPost('nome'));
            $userModel->set('email', $this->request->getPost('email'));
            $userModel->set('senha', $this->request->getPost('senha'));
            $userModel->set('conf_senha', $this->request->getPost('conf_senha'));

            $file = $this->request->getFile('img_perfil');
            $newName = $file->getRandomName();
            // Take name img for save DB
            $userModel->set('img_perfil', $newName);

            if ($userModel->insert()) {
                // Upload images
                if ($file) {
                    $file->move('uploads/img/perfil', $newName);
                }

                $data['msg'] = 'Conta criada com sucesso.';
                $data['class_error'] = 'success';

                // Clear values the input
                $_POST['nome'] = '';
                $_POST['email'] = '';
                $_POST['senha'] = '';
            } else {
                $data['erros'] = $userModel->errors();
                $data['class_error'] = 'danger';
            }
        }

        echo view('criar-conta', $data);
    }
}
