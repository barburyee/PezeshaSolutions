<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	//import CSV
	public function csv_import(){
		$csv = $_FILES['csv_file']['tmp_name'];

		$handle = fopen($csv,"r");
	
		while (($row = fgetcsv($handle, 100000, ",")) != FALSE) 
		{

			$data = array(
				'invoice_no'=>$row[0],
				'stock_code' => $row[1],
				'description' => $row[2],
				'quantity ' => $row[3],
				'invoice_date' => $row[4],
				'unit_price' => $row[5],
				'customer_id' => $row[6],
				'country' => $row[7],
			);
			$this->db->insert("pezesha_data",$data);

		}
	// 	echo "
	// <script>
	// alert('Trainees imported successfully');
	// window.location.href='http://localhost/ssnp/Student/graduationlist';
	// </script>
	// ";

		exit(0);
	}
}
