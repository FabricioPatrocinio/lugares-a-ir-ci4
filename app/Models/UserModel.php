<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nome', 'email', 'senha', 'img_perfil', 'time_created', 'time_updated'];

    protected $useTimestamps = false;
    protected $createdField  = 'time_created';
    protected $updatedField  = 'time_updated';
    protected $deletedField  = 'deleted_at';
    
    protected $validationRules =[
        'nome'       => 'required|min_length[8]|max_length[50]',
        'email'   => 'required|valid_email|is_unique',
        'senha' => 'required|min_length[8]|max_length[15]'
    ];
    
    protected $validationMessages = [
        'nome' => [
            'required'      => 'Você precisa preencher o nome.',
            'min_length'    => 'O titulo precisa ter no minimo 10 caracteres.',            
            'max_length'    => 'O titulo precisa ter no maximo 50 caracteres.'
        ],
        'email' => [
            'required'      => 'Você precisa preencher o email.',
            'valid_email' => 'Email inválido.',
            'is_unique' => 'Esse email já existe, por favor tente outro.'
        ]
        ,
        'senha' => [
            'required'      => 'Você precisa preencher a senha.',
            'min_legngth' => 'Sua senha precisa ter no minimo 8 digitos.',
            'max_legngth' => 'Sua senha precisa ter no maximo 20 digitos.'
        ]
    ];

    protected $skipValidation     = false;
}