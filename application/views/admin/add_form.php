               

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
															 <th>Form No.</th>	 
															 <th>Download</th>
															 <th>Document</th>
															 <th>Application No</th>
															<th style="display:none"> date_app</th>
															<th style="display:none">dob</th> 
															<th>Category</th>
															<th>Teaching Post</th>
															<th>Non-Teaching Post</th>
															<th>Teaching Subject</th> 
															<th>Tgt Subject</th>
															<th>Prt Subject</th>
															<th style="">fname</th>

															<!--<th  style="display:none"> mname</th>

															<th style="display:none">lname</th>!-->

															<th>fathername</th>

															<!---<th style="display:none">father_mname</th>

															<th style="display:none">father_lname</th>!-->

															<th style="display:none">hus_wife_name</th>
															<th style="display:none">hus_wife_mname</th>
															<th style="display:none">hus_wife_lname</th>
															<th style="display:none">email</th>
															<th style="display:none">aadhar</th>
															<th style="display:none">gender</th>
															<th>mobile</th>
															<th style="display:none">nation</th>
															<th style="display:none">religion</th>
															<th style="display:none">cat</th>

															<th style="display:none">tongue</th>
															<th style="display:none">marital</th>
															<th style="display:none">permanent_address</th>
															<th style="display:none">permanent_postoffice</th>
															<th style="display:none">permanent_state</th>
															<th style="display:none">permanent_district</th>
															<th style="display:none">permanent_city</th>
															<th style="display:none">permanent_pin</th>
															<th style="display:none">present_address</th>
															<th style="display:none">present_postoffice</th>
															<th style="display:none">present_state</th>
															<th style="display:none">present_district</th>
															<th style="display:none">present_city</th>
															<th style="display:none">present_pin</th>
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
															<th style="display:none">comp</th>
															<th style="display:none">present_emp</th>
															<th style="display:none">place_work</th>
															<th style="display:none">exp_name</th>
															<th style="display:none">exp_months</th>
															<th style="display:none">last_pay</th>
															<th style="display:none">ctc</th>
															<th style="display:none">experience_school</th>
															<th style="display:none">experience_school_place</th>
															<th style="display:none">job location1</th>
															<th style="display:none">job location2</th>
															<!-- <th>Images</th> -->
															<th style="display:none">date_created</th> 
															<!-- <th style="display:none">ip</th>
															<th style="display:none">status</th> -->

                                                               

															<!-- <th>Action</th> -->

                                                            </tr>

                                                            </thead>

                                                            <tbody>

                                                              

																	

																	 <?php $x=1;

                                                                    foreach ($form_add as $value) {

                                                                     $img= $value->uploads;
                                                                     $pic="http://feesclub.co.in/davbarkakana/uploads/images/$img";

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
																										
														
														<a href="<?php echo base_url()?>uploads/beddoc/<?php echo $value->bed_final;?>" target="_blank"><i class="fa fa-download" title="Download BED certificate">
														</i></a>
													
														<a href="<?php echo base_url()?>uploads/otherdoc_second/<?php echo $value->other_final_sec;?>" target="_blank"><i class="fa fa-download" title="Download Signature">
														</i></a>
													</td>

																	 

                                                <td><?php echo $value->sub_form_no;?></td>
                                                <td style="display:none"><?php echo $value->date_app;?></td>
                                                <td style="display:none"><?php echo $value->dob;?></td>
												<td><?php echo $value->teaching_cat;?></td>
												<td><?php echo $value->teaching_post;?></td>
												<td><?php echo $value->non_teaching;?></td>
												<td><?php echo $value->pgt_teaching;?></td>
												<td><?php echo $value->tgt_teaching;?></td>	
												<td><?php echo $value->prt_teaching;?></td>	
												<td style=""><?php echo $value->fname;?>&nbsp<?php echo $value->mname;?>&nbsp<?php echo $value->lname;?></td>
												<td><?php echo $value->fathername;?>&nbsp<?php echo $value->father_mname;?>&nbsp<?php echo $value->father_lname;?></td>	
												<td style="display:none"><?php echo $value->hus_wife_name;?></td>	

														<td style="display:none"><?php echo $value->hus_wife_mname;?></td>	

														<td style="display:none"><?php echo $value->hus_wife_lname;?></td>	

														<td style="display:none"><?php echo $value->email;?></td>	

														<td style="display:none"><?php echo $value->aadhar;?></td>	

														<td style="display:none"><?php echo $value->gender;?></td>	

														<td><?php echo $value->mobile;?></td>	

														<td style="display:none"><?php echo $value->nation;?></td>	

														<td style="display:none"><?php echo $value->religion;?></td>	

														<td style="display:none"><?php echo $value->cat;?></td>	

														<td style="display:none"><?php echo $value->tongue;?></td>	

														<td style="display:none"><?php echo $value->marital;?></td>	

													<td style="display:none"><?php echo $value->permanent_address;?></td>	

													<td style="display:none"><?php echo $value->permanent_postoffice;?></td>	

													<td style="display:none"><?php echo $value->permanent_state;?></td>	

													<td style="display:none"><?php echo $value->permanent_district;?></td>	

													<td style="display:none"><?php echo $value->permanent_city;?></td>	

													<td style="display:none"><?php echo $value->permanent_pin;?></td>	

													<td style="display:none"><?php echo $value->present_address;?></td>	

													<td style="display:none"><?php echo $value->present_postoffice;?></td>	

													<td style="display:none"><?php echo $value->present_state;?></td>	

													<td style="display:none"><?php echo $value->present_district;?></td>	

													<td style="display:none"><?php echo $value->present_city;?></td>	

													<td style="display:none"><?php echo $value->present_pin;?></td>	

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

													<td style="display:none"><?php echo $value->comp;?></td>

													<td style="display:none"><?php echo $value->present_emp;?></td>

													<td style="display:none"><?php echo $value->place_work;?></td>

													<td style="display:none"><?php echo $value->exp_name;?></td>

													<td style="display:none"><?php echo $value->exp_months;?></td>

													<td style="display:none"><?php echo $value->last_pay;?></td>

													<td style="display:none"><?php echo $value->ctc;?></td>

													<td style="display:none"><?php echo $value->experience_school;?></td>
													<td style="display:none"><?php echo $value->experience_school_place;?></td>
													<td style="display:none"><?php echo $value->job_center1;?></td>
													<td style="display:none"><?php echo $value->job_center2;?></td>

													<!-- <td><?php echo $pic;?></td> -->

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

                                    <!-- Page body end -->

                                </div>

                            </div>

                            <!-- Main-body end -->

							

							

							<script>

							$(document).ready(function() {

    $('#simpletable').DataTable( {

        dom: 'Bfrtip',

        buttons: [

            'excel'

        ]

    } );

} );

	</script>						

							

							

							

							

							

