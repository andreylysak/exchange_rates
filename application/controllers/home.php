<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('exchange_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		session_start();
		$this->load->helper('url');

		$data['title'] = ucfirst('Exchange rate');
		$data['request_url'] = self::request_url();
		$data['controller'] = $this;

		$exchange_array = self::getExchangeJson();

		if ($exchange_array != false) {
			$data['exchange'] = $exchange_array;
			foreach($data['exchange'] as $exchange_item) {
				if ($exchange_item->cc == 'USD') {
					$rate_usd = $exchange_item->rate;
					$excange_date = $exchange_item->exchangedate;
				} else if ($exchange_item->cc == 'EUR') {
					$rate_eur = $exchange_item->rate;
				}
			}
			$data['excange_usd'] = round(floatval($rate_usd), 2);
			$data['excange_eur'] = round(floatval($rate_eur), 2);
			$data['excange_uah'] = round(floatval(1 / $rate_usd), 2);
			$data['excange_last_update_date'] = $excange_date;

			$timestamp = strtotime($excange_date);
			$last_update_date = date("Y-m-d H:i:s", $timestamp);
			
			$last_update_exchange = $this->exchange_model->get_exchange($last_update_date);
			if (count($last_update_exchange) == 0) {
				$data['result'] = $this->exchange_model->set_exchange($data['excange_usd'], $data['excange_eur'], $data['excange_uah'], $last_update_date);
			} else {
				$data['result'] = 0;
			}
		} else {
			$data['exchange'] = false;
			$data['excange_usd'] = 0;
			$data['excange_eur'] = 0;
			$data['excange_uah'] = 0;
			$data['excange_last_update_date'] = 0;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('pages/home');
		$this->load->view('templates/footer');
	}

	public function exchange_history()
	{
		$this->load->helper('url');

		$data['title'] = ucfirst('Exchange history');
		$data['request_url'] = self::request_url();
		$data['controller'] = $this;
		$data['exchange'] = $this->exchange_model->get_exchange();
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/exchange_history');
		$this->load->view('templates/footer');
	}

	public function convert() {
		$this->load->helper('url');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			session_start();
            $_SESSION["flash_error"] = "Error! Please fill the form.";
			redirect(prep_url(site_url()));

		}
		else
		{
			$amount = round(floatval($this->input->post('amount')), 2);
			$currency = $this->input->post('currency');
			$exchange = $this->exchange_model->get_last_exchange();

			switch($currency) {
				case 'usd':
					$result = round($amount * floatval($exchange['usd']), 2);
					$result_message = '$'.$amount.' = '.$result.' uah';
					break;
				case 'eur':
					$result = round(floatval($amount) * floatval($exchange['eur']), 2);
					$result_message = '€'.$amount.' = '.$result.' uah';
					break;
				case 'uah':
					$result = round(floatval($amount) * floatval($exchange['uah']), 2);
					$result_message = '₴'.$amount.' = '.$result.' usd';
					break;
			}

			session_start();
            $_SESSION["flash_result"] = $result_message;
			redirect(prep_url(site_url()));
		}
	}

	public static function request_url() {
		return $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}

	public static function page_current($current_page) {
		$request_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if (strlen($current_page) != 0) {
			$current_url = site_url().'/'.$current_page;
		} else {
			$current_url = site_url();
		}
		if (strcasecmp($current_url, $request_url) == 0) {
			return true;
		} else {
			return false;
		}
	}

	public static function getExchangeJson() {
		$json = file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json');
		$obj = json_decode($json);
		if (count($obj) != 0) {
			return $obj;
		} else {
			return false;
		}
	}
}
