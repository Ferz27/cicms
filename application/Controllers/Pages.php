<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
	public function view($page = 'home')
	{   //проверка существует ли страница для вывода
		if (! file_exists(APPPATH.'/Views/pages/'.$page.'.php'))
		{
			//вывод ошибки что такой страницы нет
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page); // Первая буква с большой буквы

		echo view('templates/header', $data);
		echo view('pages/'.$page, $data);
		echo view('templates/footer', $data);

	}
}