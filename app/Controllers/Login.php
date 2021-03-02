<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
        $data['title'] =  'Login';

        date_default_timezone_set('America/Sao_Paulo');
        $data_create = date('Y-m-d H:i');

        echo view('login', $data);
	}
}