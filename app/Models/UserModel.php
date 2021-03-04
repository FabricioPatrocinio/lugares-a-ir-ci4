<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nome', 'email', 'senha', 'img_perfil', 'time_created', 'time_updated'];

    protected $useTimestamps = false;
    protected $createdField = 'time_created';
    protected $updatedField = 'time_updated';
    protected $deletedField = 'deleted_at';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['senha'])) {
            $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);
        }

        return $data;
    }

    protected $validationRules = [
        'nome' => 'required|min_length[3]|max_length[50]|is_unique[user.nome,id,{id}]',
        'email' => 'required|valid_email|is_unique[user.email,id,{id}]',
        'senha' => 'required|min_length[8]|max_length[255]',
        'conf_senha' => 'required|matches[senha]',
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'Você precisa preencher o nome.',
            'min_length' => 'O nome deve ter no minimo 3 caracteres.',
            'max_length' => 'O nome pode ter no maximo 50 caracteres.',
            'is_unique' => 'Já existe um usuário cadastrado com esse nome.',
        ],
        'email' => [
            'required' => 'Você precisa preencher o email.',
            'valid_email' => 'Email inválido.',
            'is_unique' => 'Já existe um usuário cadastrado com esse E-mail.',
        ],
        'senha' => [
            'required' => 'Você precisa preencher a senha.',
            'min_length' => 'Sua senha deve ter no minimo 8 caracteres.',
            'max_length' => 'Sua senha pode ter no maximo 255 caracteres.',
        ],
        'conf_senha' => [
            'required' => 'Confirme a senha.',
            'matches' => 'As senhas não coincidem.',
        ],
    ];

    protected $skipValidation = false;
}
