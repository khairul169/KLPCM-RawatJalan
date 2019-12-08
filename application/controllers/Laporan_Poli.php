<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_Poli extends CI_Controller
{
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
}
