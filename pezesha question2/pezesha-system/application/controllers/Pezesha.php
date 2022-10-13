<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pezesha extends CI_Controller {

	public function index()
	{
        $data = array(
            'records'=>$this->Pezesha_model->get_few_records()

        );
		$this->load->view('welcome_message', $data);
	}

	public function csv_import(){
        //echo base_url("Pezesha/"); exit(0);
		$csv = $_FILES['file']['tmp_name'];

		$handle = fopen($csv,"r");
	
		while (($row = fgetcsv($handle, 10000, ",")) != FALSE) 
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
        
		redirect("Pezesha/uploaded",'refresh');

		exit(0);

	}
    public function uploaded()
	{
        $data = array(
            'status' => 'Successfully Saved',
            'records'=>$this->Pezesha_model->get_few_records()

        );
		$this->load->view('welcome_message', $data);
	}

    public function load_all_records()
	{
        $data = array(
            'records'=>$this->Pezesha_model->get_all_records()
        );
		$this->load->view('welcome_message', $data);
	}
    
}