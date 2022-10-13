<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Pezesha Assignment 2</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h4>Import CSV File Records into the system</h4>
    <?php if(!empty($status)){
        echo '<div class="alert alert-danger">'.$status.'</div>';
    } ?>
    <div class="panel panel-default">
    	<div class="panel-heading">
            Question 2 : Data list
            <a href="<?php echo base_url();?>pezesha/load_all_records" >View All Records</a> 
        </div>
        <div class="panel-body">
			
            <form action="<?php echo base_url(); ?>pezesha/csv_import" method="POST" id="records_form"  enctype="multipart/form-data">
                <div class="row" style="background: white;">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label style="font-size: medium;font-weight: bold">
                              Upload Records
                            </label>
                            <input type="file" name="file" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <br>
                        <div class="form-group">
                            <button class="btn btn pull-right" style="margin-top: 8px; color: white;background-color: #00529B;">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Invoice Number</th>
                      <th>Stock Code</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Invoice Date</th>
					            <th>Unit Price</th>
                      <th>Customer Id</th>
                      <th>Country</th>
                      <th>Date Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($records)>0){
                    foreach($records as $row){ ?>
                    <tr>
					          <td><?php echo $row->invoice_no; ?></td>
                      <td><?php echo $row->stock_code; ?></td>
                      <td><?php echo $row->description; ?></td>
                      <td><?php echo $row->quantity; ?></td>
					            <td><?php echo $row->invoice_date; ?></td>
                      <td><?php echo $row->unit_price; ?></td>
                      <td><?php echo $row->customer_id; ?></td>
                      <td><?php echo $row->country; ?></td>
                      <td><?php echo $row->date_created; ?></td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No data found.....</td></tr>
                    <?php } ?>
                </tbody>
				        <thead>
                    <tr>
                      <th>Invoice Number</th>
                      <th>Stock Code</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Invoice Date</th>
					  <th>Unit Price</th>
                      <th>Customer Id</th>
                      <th>Country</th>
                      <th>Date Created</th>
                    </tr>
                </thead>
            </table>            
        </div>
    </div>
</div>
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>
