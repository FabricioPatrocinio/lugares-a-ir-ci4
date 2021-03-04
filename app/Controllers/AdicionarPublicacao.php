<?php namespace App\Controllers;

class AdicionarPublicacao extends BaseController
{
	public function index()
	{
        $data['title'] =  'Adicionar publicação';

        date_default_timezone_set('America/Sao_Paulo');
        $data_create = date('Y-m-d H:i');

        echo view('add_publicacao', $data);
	}
}