   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
   <style>
   	.btn
   	{
   		padding:0px!important;
   	}
   	.toggle-off {
    left: 50%;
    right: 0;
    background:bisque!important;
}
.toggle.btn {
    min-width: 59px;
    min-height: 23px!important;
}
   </style>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
					   <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Pending Form</h4>
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
                                                    <li class="breadcrumb-item"><a href="#!">Pending Form</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                               <div class="card">
                                                <div class="card-header">
                                                    <h5></h5>
                                                     <?php
														if ($this->session->flashdata('update') != ''): 
															echo $this->session->flashdata('update'); 
														endif;
														?> 
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="simpletable" class="table table-striped table-bordered nowrap" style="font-size: 12px!important;">
                                                            <thead>
                                                            <tr>
															 <th>Sl.No.</th>
															 <th>Form No.</th>
															 <th>Download</th>
															 <th>Document</th>
															 <th>Name</th> 
															 <th>Action</th>
															<th style="display:none"> date_app</th>
															<th style="display:none">dob</th> 
															<th>Category</th>
															<th>Teaching Post</th>
															<th>Non-Teaching Post</th>
															<th>Teaching Subject</th> 
															<th>Tgt/prt Subject</th>
															
															
															<th style="display:none">mat_year</th>
															<th style="display:none">mat_board</th>
															<th style="display:none">mat_division</th>
															<th style="display:none">mat_percentage</th>
															<th style="display:none">mat_subject</th>
															<th style="display:none">inter_year</th>

															<th style="display:none">inter_board</th>
															<th style="display:none">inter_division</th>
															<th style="display:none">inter_percentage</th>
															<th style="display:none">inter_subject</th>
															<th style="display:none">grad_year</th>
															<th style="display:none">grad_board</th>
															<th style="display:none">grad_division</th>
															<th style="display:none">grad_percentage</th>
															<th style="display:none">grad_subject</th>
															<th style="display:none">post_grad_year</th>
															<th style="display:none">post_grad_board</th>
															<th style="display:none">post_grad_division</th>
															<th style="display:none">post_grad_percentage</th>
															<th style="display:none">post_grad_subject</th>
															<th style="display:none">bed_year</th>
															<th style="display:none">bed_board</th>
															<th style="display:none">bed_division</th>
															<th style="display:none">bed_percentage</th>
															<th style="display:none">bed_subject</th>
															<th style="display:none">ctet_year</th>
															<th style="display:none">ctet_board</th>
															<th style="display:none"> ctet_division</th>
															<th style="display:none">ctet_percentage</th>
															<th style="display:none">ctet_subject</th>
															<th style="display:none">other_year</th>
															<th style="display:none">other_board</th>
															<th style="display:none">other_division</th>
															<th style="display:none">other_percentage</th>
															<th style="display:none">other_subject</th>
															
															<!-- <th style="display:none">uploads</th> -->
															<th style="display:none">date_created</th> 
															
															<!-- <th style="display:none">ip</th>
															<th style="display:none">status</th> -->

                                                               

															<!-- <th>Action</th> -->
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                              
																	 <?php $x=1;
                                                                    foreach ($form_add as $value) { 
                                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $x;?></td>
																	  <td><?php echo $value->form_no;?></td>
																	  <td><a href="<?php echo base_url().'adminform_pdf/'.$value->reg_id;?>"><i class="fa fa-download" title="Download Application Form"></i> &nbsp;&nbsp;
												<a href="<?php echo base_url().'adminadmit_pdf/'.$value->reg_id;?>"><i class="fa fa-download" title="Download Admit Card"></i> &nbsp;&nbsp;
													<a href="<?php echo base_url().'adminpaymentslip_pdf/'.$value->reg_id;?>"><i class="fa fa-download" title="Download Payment Slip"></i> &nbsp;&nbsp;
													</td>

													<td>
														<a href="<?php echo base_url()?>uploads/matricdoc/<?php echo $value->matric_marsheet_name;?>" target="_blank"><i class="fa fa-download" title="Download Matric">
														</i></a>
														<a href="<?php echo base_url()?>uploads/matricfinaldoc/<?php echo $value->matric_final;?>" target="_blank"><i class="fa fa-download" title="Download Matric final certificate">
														</i></a>
														<a href="<?php echo base_url()?>uploads/gradudoc/<?php echo $value->graduate_final;?>" target="_blank"><i class="fa fa-download" title="Download Graducation certificate">
														</i></a>
														<a href="<?php echo base_url()?>uploads/post_gradudoc/<?php echo $value->post_graduate_final;?>" target="_blank"><i class="fa fa-download" title="Download Post Graducation certificate">
														</i></a>
														<a href="<?php echo base_url()?>uploads/beddoc/<?php echo $value->bed_final;?>" target="_blank"><i class="fa fa-download" title="Download BED certificate">
														</i></a>
														<a href="<?php echo base_url()?>uploads/ctetdoc/<?php echo $value->ctet_final;?>" target="_blank"><i class="fa fa-download" title="Download CTET certificate">
														</i></a>
														<a href="<?php echo base_url()?>uploads/otherdoc/<?php echo $value->other_final;?>" target="_blank"><i class="fa fa-download" title="Download Other certificate">
														</i></a>
													</td>
													<td style=""><?php echo $value->fname;?>&nbsp<?php echo $value->mname;?>&nbsp<?php echo $value->lname;?></td>
													<td><input type="radio" name="app_status_<?php echo $value->reg_id;?>" class="radioBtnClass" value="A" onclick="getValue(this,<?php echo $value->reg_id;?>)">Approved 
														<input type="radio" name="app_status_<?php echo $value->reg_id;?>" class="radioBtnClass" value="R" onclick="getValue(this,<?php echo $value->reg_id;?>)">Rejected
													</td>
													<td style="display:none"><?php echo $value->date_app;?></td>
													<td style="display:none"><?php echo $value->dob;?></td>
													<td><?php echo $value->teaching_cat;?></td>
													<td><?php echo $value->teaching_post;?></td>
													<td><?php echo $value->non_teaching;?></td>
													<td><?php echo $value->pgt_teaching;?></td>
													<td><?php echo $value->tgt_prt_teaching;?></td>	
													
													
																			

																			
																		<td style="display:none"><?php echo $value->mat_year;?></td>
																		<td style="display:none"><?php echo $value->mat_board;?></td>
																		<td style="display:none"><?php echo $value->mat_division;?></td>
																		<td style="display:none"><?php echo $value->mat_percentage;?></td>
																		<td style="display:none"><?php echo $value->mat_subject;?></td>	
																		<td style="display:none"><?php echo $value->inter_year;?></td>	
																		<td style="display:none"><?php echo $value->inter_board;?></td>
																		<td style="display:none"><?php echo $value->inter_division;?></td>	
																		<td style="display:none"><?php echo $value->inter_percentage;?></td>
																		<td style="display:none"><?php echo $value->inter_subject;?></td>
																		<td style="display:none"><?php echo $value->grad_year;?></td>
																		<td style="display:none"><?php echo $value->grad_board;?></td>
																		<td style="display:none"><?php echo $value->grad_division;?></td>
																		<td style="display:none"><?php echo $value->grad_percentage;?></td>
																		<td style="display:none"><?php echo $value->grad_subject;?></td>
																		<td style="display:none"><?php echo $value->post_grad_year;?></td>
																		<td style="display:none"><?php echo $value->post_grad_board;?></td>
																		<td style="display:none"><?php echo $value->post_grad_division;?></td>
																		<td style="display:none"><?php echo $value->post_grad_percentage;?></td>
																		<td style="display:none"><?php echo $value->post_grad_subject;?></td>
																		<td style="display:none"><?php echo $value->bed_year;?></td>
																		<td style="display:none"><?php echo $value->bed_board;?></td>
																		<td style="display:none"><?php echo $value->bed_division;?></td>
																		<td style="display:none"><?php echo $value->bed_percentage;?></td>
																		<td style="display:none"><?php echo $value->bed_subject;?></td>
																		<td style="display:none"><?php echo $value->ctet_year;?></td>
																		<td style="display:none"><?php echo $value->ctet_board;?></td>
																		<td style="display:none"><?php echo $value->ctet_division;?></td>
																		<td style="display:none"><?php echo $value->ctet_percentage;?></td>
																		<td style="display:none"><?php echo $value->ctet_subject;?></td>
																		<td style="display:none"><?php echo $value->other_year;?></td>
																		<td style="display:none"><?php echo $value->other_board;?></td>
																		<td style="display:none"><?php echo $value->other_division;?></td>
																		<td style="display:none"><?php echo $value->other_percentage;?></td>

																		<td style="display:none"><?php echo $value->other_subject;?></td>
																		
																		<!-- <td style="display:none"><?php echo $value->uploads;?></td> -->

																		<td style="display:none"><?php echo $value->date_created;?></td>
																		

																		<!-- <td style="display:none"><?php echo $value->ip;?></td>

																		<td style="display:none"><?php echo $value->status;?></td> -->

																		<!-- <td><a href="<?php echo base_url();?>admin/retrive_form_data"><i class=" fa fa-edit"></i> </a>

																		<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-trash-o"></i> </a></td> -->

															

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
                                </div>
                            </div>
							<script>
								   function getValue(data,reg_id){
										  var getvalue=data.value;
										  var getreg=reg_id;										  
										  if(confirm("Are you sure?"))
										    {
										        $.ajax({
										        	url:'<?php echo base_url()?>admin/app_status_update',
										        	data:{getvalue:getvalue,getreg:getreg},
										        	type:'post',
										        	success:function(data)
										        	{
										        		// console.log(data);
										        		location.reload();
										        	}
										        });
										    }
										    else
										    {
										        e.preventDefault();
										    }
										  
										}

								$(document).ready(function() {
									$('#simpletable').DataTable( {
										dom: 'Bfrtip',
										buttons: [
										'excel'
										]
									} );
								} );
						</script>						

							

							

							

							

							

