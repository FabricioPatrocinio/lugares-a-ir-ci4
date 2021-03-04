<?php

namespace App\Controllers;

class Inicio extends BaseController
{
	public function index()
	{
		$data['title'] = 'Lugares a ir - Inicio';

		return view('template_home', $data);
	}
}
