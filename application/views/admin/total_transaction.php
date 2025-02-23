               
					   <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Form</h4>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="<?php echo base_url();?>admin/dashboard"> <i class="feather icon-home"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Form</a>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                   
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Inputs Validation start -->
                                               <div class="card">
                                                <div class="card-header">
                                                    <h5></h5>
                                                    

                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="simpletable"
                                                               class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
															 <th>Sl.No.</th>
															 <th>Form_No</th>
															<th>Registered_Id</th>
                                                            <th>Transaction_Id</th>
                                                            <th>order_no</th>
															<th>Payment Method</th>
															<th>Payment_Status</th>
															<th>Payment_Date</th>
															
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                              
																	
																	 <?php $x=1;
                                                                    foreach ($total_transaction as $value) {
                                                                        // print_r ($value);
                                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $x;?></td>
                                                                 
																	  <td><?php echo $value->form_no;?></td>
																	 
                                                                    <td><?php echo $value->registered_id;?></td>

                                                                    <td><?php echo $value->transaction_id;?></td>
                                                                    <td><?php echo $value->order_no;?></td>
																	<td><?php echo $value->payment_method;?></td>
																	 
																  <td style=""><?php echo $value->paid_status;?></td>
																	  
																<td style=""><?php echo $value->payment_date;?></td>
																			</tr>  
                                                          
                                                              
															   <?php  $x++; } ?>
                                                            </tbody>
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
							
							
							<script>
							$(document).ready(function() {
    $('#simpletable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
	</script>						
							
							
							
							
							
