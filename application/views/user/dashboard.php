  <style type="text/css">
	.panel-heading {
		padding: 4px 15px;
		border-top-left-radius: 3px;
		border-top-right-radius: 3px;
		background-color: #B40303;
		color: white;
		text-transform: uppercase;
		background-image: url(<?php echo base_url()?>assets/TopBar.jpg);
	}
	.panel-body
	{
		padding: 10px;
	}
	label{
		text-transform: uppercase;
	}
  .ccrow
  {
    margin-bottom:-22px;
    font-size: smaller!important;
  }
  .inputfont
  {
  	font-size:12px;
  }
  select
  {
  	font-size:11px!important;
  }
  .labelfont
  {
  	font-size: smaller!important;
  }
</style>
<div class="main-body" style="margin-top: -34px;">
	<div class="page-wrapper">
		<div class="page-header"> 
		</div>
		<div class="page-body">
			<div class="row">
				<div class="col-xl-12 col-md-12">
					<div class="card app-design">
						<div id="bgmainwrapper">
							<div id="insidewrapper">
								<div class="container-fluid" style="text-align: left!important;">
									<form action='<?php echo base_url();?>save' method='POST' enctype='multipart/form-data' id='admission_form' class='admission_form' style="border:1px solid #65a605" onsubmit="return checkForm(this);">
										<div class="panel panel-primary">
											<div class="panel-heading">Applicant Details</div>
											<div class="panel-body">
												<section>          
													<div class="row">
														<div class="col-md-4" style="display: none">
															<div class="form-group">
																<label class="labelfont">FORM NO. :</label>
																<input type="text" class="form-control" name='form_no'  readonly value="<?php echo $form_no; ?>" placeholder="FORM NUMBER">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label class="labelfont">DATE OF APPLICATION :</label>
																<input type="date" name="date_app" value="<?php echo date('Y-m-d');?>" readonly class="form-control" placeholder="DATE OF APPLICATION">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="exampleFormControlInput1" class="labelfont">
																	<span style="color:red">*</span>&nbsp;Are you Dav Employee  :</label>
																<br>&nbsp;&nbsp;
																<label style="margin-left: 10px;"><input class="form-check-input" type="radio" name='davemp' id="davemp" value="davemp" onchange="mydate(this)">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																<label><input class="form-check-input" type="radio" name='davemp'  value="notdavemp" onchange="mydate(this)">&nbsp;&nbsp;No</label>
															</div> 
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label class="labelfont"><span style="color:red">*</span>&nbsp;DATE OF BIRTH :</label>
															<!-- 	<input type="date" class="form-control birth_date" name='dob' placeholder="D/O/B" id="birth_date" value="" onchange="mydate(this)">
																<span>Use Calendar to select date</span><br>
																<small id="dobnoteliglble" style="color:red;display:none;">Age Should not be above 35</small> -->
                                <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                                    <input class="form-control" type="text" id="birth_date" name='dob' readonly onchange="mydate(this)"/>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

                                </div>
                                 <span>Use Calendar to select date</span><br>
                                <small id="dobnoteliglble" style="color:red;display:none;">Age Should not be above 35</small>
															</div>
															<span id="maxage" value=""></span>
															<div id="age_container"><b><span id="exact_age"></span></b></div>
														</div>
													</div>
                          <script>
                            $(function () {
                              $("#datepicker").datepicker({ 
                                    // autoclose: true, 
                                    // todayHighlight: true
                                    defaultDate:'',     
                              });
                              // }).datepicker('update', new Date());
                            });
                            </script>
													<script>
														function mydate()
														{      
															var mdate = $("#birth_date").val().toString(); 

															var yearThen = parseInt(mdate.substring(0,4), 10);
															var monthThen = parseInt(mdate.substring(5,7), 10);
															var dayThen = parseInt(mdate.substring(8,10), 10); 
															var today = new Date("2020-01-01");
															var birthday = new Date(yearThen, monthThen-1, dayThen);
															var differenceInMilisecond = today.valueOf() - birthday.valueOf();
															var year_age = Math.floor(differenceInMilisecond / 31536000000);      

															var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);

															if ((today.getMonth() == birthday.getMonth()) && (today.getDate() == birthday.getDate())) {
                                                    // alert("Happy B'day!!!");
                                  }                                                
                                  var month_age = Math.floor(day_age/30);  
                                  day_age = day_age % 30;   
                                                                          
                                  if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
                                      // $("#exact_age").text("Invalid - Please try again!");
                                  }
                                  else {
                                  	var dav=$("input[name='davemp']:checked").val();
                                  	if(dav=='davemp') {
                                  		$("#admission_form :input").attr("disabled", false);
                                       $('#dobnoteliglble').hide();
                                  	}  
                                  	else if(year_age>34) {
                                  		
                                  			$("#admission_form :input").attr("disabled", true);
                                  			$( '#admission_form input[type="radio"]' ).removeAttr( "disabled" );
                                  			$(':input[type="submit"]').prop('disabled', true);
                                        $('#dobnoteliglble').show();
                                  		}                                  	
                                    else {
                                      
                                        $("#admission_form :input").attr("disabled", false);
                                        $( '#admission_form input[type="radio"]' ).removeAttr( "disabled" );
                                        $(':input[type="submit"]').prop('disabled', false);
                                        $('#dobnoteliglble').hide();
                                      
                                    }
                                  }
                              }
                          </script>
                                        <div class="row">
                                        	<div class="col-md-4">
                                        		<div class="form-group">
                                        			<label for="exampleFormControlInput1" class="labelfont"><span style="color:red">*</span>&nbsp;Select Category:</label>
                                        			<label>
                                        				<select class="form-control" name="teaching_cat" id="teaching_cat" onChange="getpa(this.value)">
                                        					<option value="">--Select--</option>
                                        					<option value="TEACHING">TEACHING</option>
                                        					<option value="NON-TEACHING">NON-TEACHING</option>
                                        				</select>
                                        			</label>
                                        		</div> 
                                        	</div>
                                        	<script>
                                        		function getpa(data) {
                                        			var type=data;
                                        			if(type=='TEACHING')
                                        			{
                                        				jQuery('#post').show();
                                        				jQuery('#post_details').show();
                                        				jQuery("#non_teaching").prop('selectedIndex',0);
                                        				jQuery('#ctet').show();
                                        				jQuery('#teaching_post').attr('required', 'required');
                                        				jQuery('#non_teaching').removeAttr('required');
                                                jQuery('#b_ed').show();
                                                jQuery('#bedhr').show();                                               
                                                jQuery('#bed_year').attr('required', 'required');
                                                jQuery('#bed_board').attr('required', 'required');
                                                jQuery('#bed_division').attr('required', 'required');
                                                jQuery('#bed_percentage').attr('required', 'required');
                                                jQuery('#bed_subject').attr('required', 'required');
                                                jQuery('#bed_certificate').attr('required', 'required');
                                        				jQuery('#ctethr').show();
                                        				jQuery('#post_details_non_teach').hide();
                                        			}
                                        			else if(type=='NON-TEACHING')
                                        			{
                                        				jQuery('#post').show();
                                        				jQuery('#sub').hide();
                                        				jQuery("#pgt_teaching").prop('selectedIndex',0);
                                        				jQuery("#teaching_post").prop('selectedIndex',0);
                                        				jQuery('#non_teaching').attr('required', 'required');
                                        				jQuery('#teaching_post').removeAttr('required');
                                                              // jQuery("#teaching_post option").attr('selected', false);
                                                              jQuery('#post_details').hide();
                                                              jQuery('#ctet').hide();
                                                              jQuery('#b_ed').hide();
                                                              jQuery('#bedhr').hide();
                                                              jQuery('#ctethr').hide();
                                                              jQuery('#bed_year').removeAttr('required');
                                                              jQuery('#bed_board').removeAttr('required');
                                                              jQuery('#bed_division').removeAttr('required');
                                                              jQuery('#bed_percentage').removeAttr('required');
                                                              jQuery('#bed_subject').removeAttr('required');
                                                              jQuery('#bed_certificate').removeAttr('required');
                                                              jQuery('#post_details_non_teach').show();
                                                          }
                                                      }
                                                      function getsat(data) {
                                                      	var type=data;
                                                      	if(type=='PGT')
                                                      	{
                                                      		jQuery("#tgt_teaching").prop('selectedIndex',0);
                                                          jQuery("#prt_teaching").prop('selectedIndex',0);
                                                          jQuery("#nt_teaching").prop('selectedIndex',0);
                                                      		jQuery('#sub').show();
                                                      		jQuery('#sub_details').show();
                                                          jQuery('#sub_det_tg').hide();
                                                          jQuery('#sub_det_pr').hide();
                                                      		jQuery('#sub_det_nt').hide();
                                                      		jQuery('#pgt_teaching').attr('required', 'required'); 
                                                          jQuery('#tgt_teaching').removeAttr('required');
                                                          jQuery('#prt_teaching').removeAttr('required');
                                                      		jQuery('#nt_teaching').removeAttr('required');
                                                      	}
                                                      	else if(type=='TGT')
                                                      	{
                                                      		jQuery("#pgt_teaching").prop('selectedIndex',0);           
                                                          jQuery("#prt_teaching").prop('selectedIndex',0);
                                                          jQuery("#nt_teaching").prop('selectedIndex',0);
                                                      			
                                                      		jQuery('#sub').show();
                                                      		jQuery('#sub_details').hide();
                                                      		jQuery('#sub_det_tg').show();
                                                          jQuery('#sub_det_pr').hide();
                                                          jQuery('#sub_det_nt').hide();
                                                      		jQuery('#tgt_teaching').attr('required', 'required');
                                                          jQuery('#prt_teaching').removeAttr('required');	
                                                          jQuery('#pgt_teaching').removeAttr('required');
                                                      		jQuery('#nt_teaching').removeAttr('required');

                                                      	} 
                                                        else if(type=='PRT')
                                                        {
                                                          jQuery("#pgt_teaching").prop('selectedIndex',0);
                                                          jQuery("#tgt_teaching").prop('selectedIndex',0);
                                                          jQuery("#nt_teaching").prop('selectedIndex',0);
                                                            
                                                          jQuery('#sub').show();
                                                          jQuery('#sub_details').hide();
                                                          jQuery('#sub_det_pr').show();
                                                          jQuery('#sub_det_tg').hide();
                                                          jQuery('#sub_det_nt').hide();
                                                          jQuery('#tgt_teaching').removeAttr('required');
                                                          jQuery('#prt_teaching').attr('required', 'required'); 
                                                          jQuery('#pgt_teaching').removeAttr('required');
                                                          jQuery('#nt_teaching').removeAttr('required');

                                                        } 
                                                        else if(type=='NURSERY')
                                                        {
                                                          jQuery("#pgt_teaching").prop('selectedIndex',0);
                                                          jQuery("#tgt_teaching").prop('selectedIndex',0);              
                                                          jQuery("#prt_teaching").prop('selectedIndex',0);              
                                                          jQuery('#sub').show();
                                                          jQuery('#nt_teaching').show();
                                                          jQuery('#sub_details').hide();
                                                          jQuery('#sub_det_nt').show();
                                                          jQuery('#sub_det_tg').hide();
                                                          jQuery('#sub_det_pr').hide();
                                                          jQuery('#nt_teaching').attr('required', 'required'); 
                                                          jQuery('#pgt_teaching').removeAttr('required');
                                                           jQuery('#tgt_teaching').removeAttr('required');
                                                          jQuery('#prt_teaching').removeAttr('required');

                                                        }
                                                      	else
                                                      	{
                                                      		jQuery("#pgt_teaching").prop('selectedIndex',0);
                                                      		jQuery("#tgt_teaching").prop('selectedIndex',0);              
                                                          jQuery("#prt_teaching").prop('selectedIndex',0); 
                                                          jQuery("#nt_teaching").prop('selectedIndex',0);
                                                      		jQuery('#sub').hide();
                                                      		jQuery('#sub_details').hide();
                                                          jQuery('#sub_det_nt').hide();
                                                      		jQuery('#sub_det_tg').hide();
                                                          jQuery('#sub_det_pr').hide();
                                                      		jQuery('#pgt_teaching').removeAttr('required');
                                                          jQuery('#tgt_teaching').removeAttr('required');
                                                          jQuery('#prt_teaching').removeAttr('required');
                                                      		jQuery('#nt_teaching').removeAttr('required');

                                                      	}
                                                      }
                                                  </script>



                                                  <div class="col-md-4" style="display: none" id="post">
                                                  	<div class="form-group">
                                                  		<label class="labelfont"><span style="color:red">*</span>SELECT post</label>
                                                  		<label>
                                                  			<div id="post_details">
                                                  				<select class="form-control" name="teaching_post" id="teaching_post" onChange="getsat(this.value)">
                                                  					<option value="">--Select--</option>
                                                  					<option value="PGT">PGT</option>
                                                  					<option value="TGT">TGT</option>
                                                            <option value="PRT">PRT</option>
                                                  					<option value="NURSERY">NURSERY</option>
                                                  				</select>
                                                  			</div>
                                                  			<div id="post_details_non_teach">
                                                  				<select name="non_teaching" id="non_teaching" class="form-control">
                                                  					<option value="">Select</option> 
                                                            <option value="LIBRARIAN">LIBRARIAN</option>
                                                            <option value="ASSISTANT">ASSISTANT</option>  
                                                  					<option value="UDC">UDC</option>
                                                            <option value="LDC">LDC</option>                           
                                                            <option value="LAB-ASSISTANT">LAB ASSISTANT</option>
                                                  					
                                                            
                                                  				<!-- 	<option value="OFFICE-SUPERINTENDENT">OFFICE SUPERINTENDENT</option>
                                                  					<option value="NURSE">NURSE</option>
                                                  					<option value="RECEPTIONIST">RECEPTIONIST</option>
                                                  					<option value="LIBRARIAN">LIBRARIAN</option> -->
                                                  					
                                                  				</select>
                                                  			</div>
                                                  		</label>
                                                  	</div>
                                                  </div>
                                                  <div class="col-md-4"  style="display: none" id="sub">
                                                  	<div class="form-group">
                                                  		<label class="labelfont"><span style="color:red">*</span>Select Subject</label>
                                                  		<label>
                                                  			<div id="sub_details">
                                                  				<select class="form-control" name="pgt_teaching" id="pgt_teaching">
                                                  					<option value="">--Select--</option>
                                                  					<option value="ENGLISH">ENGLISH</option>
                                                            <option value="MATHS">MATHS</option>
                                                  					<option value="PHYSICS">PHYSICS</option>
                                                  					<option value="CHEMISTRY">CHEMISTRY</option>
                                                  					<option value="BIOLOGY">BIOLOGY</option>
                                                            <option value="HISTORY">HISTORY</option>
                                                            <option value="ECONOMICS">ECONOMICS</option>
                                                            <option value="COMMERCE">COMMERCE</option>
                                                  					<option value="COMPUTER-SCIENCE">COMPUTER SCIENCE</option>
                                                  					<option value="PHYSICAL_EDUCATION">PHYSICAL EDUCATION</option>
                                                  					<!-- <option value="BIO_TECHNOLOGY">BIO-TECHNOLOGY</option>
                                                  					<option value="ACCOUNTS">ACCOUNTS</option>
                                                  					<option value="BUSINESS_STUDIES">BUSINESS STUDIES</option> -->
                                                  					
                                                  				</select>
                                                  			</div>
                                                  			<div id="sub_det_tg">
                                                  				<select class="form-control" name="tgt_teaching" id="tgt_teaching">
                                                  					<option value="">--Select--</option>
                                                  					<option value="ENGLISH">ENGLISH</option>
                                                            <option value="MATHS">MATHS</option>
                                                  					<option value="HINDI">HINDI</option>
                                                            <option value="SCIENCE">SCIENCE</option>
                                                  					<option value="SOCIAL-SCIENCE">SOCIAL SCIENCE</option>
                                                  					<option value="SANSKRIT">SANSKRIT</option>
                                                  					<option value="COMPUTER-SCIENCE">COMPUTER SCIENCE</option>
                                                            <option value="FINE-ARTS">FINE ARTS</option>    					
                                                  					 <option value="PHYSICAL_EDUCATION">PHYSICAL EDUCATION</option> -->
                                                  				</select>
                                                  			</div>
                                                        <div id="sub_det_pr">
                                                          <select class="form-control" name="prt_teaching" id="prt_teaching">
                                                            <option value="">--Select--</option>
                                                            <option value="ENGLISH">ENGLISH</option>
                                                            <option value="MATHS">MATHS</option>
                                                            <option value="HINDI">HINDI</option>
                                                            <option value="SCIENCE">SCIENCE</option>
                                                            <option value="SOCIAL-SCIENCE">SOCIAL SCIENCE</option>
                                                            <option value="SANSKRIT">SANSKRIT</option>
                                                            <option value="COMPUTER-SCIENCE">COMPUTER SCIENCE</option>
                                                            <option value="FINE-ARTS">FINE ARTS</option>
                                                            <option value="MUSICS">MUSICS</option>                    
                                                             <option value="PHYSICAL_EDUCATION">PHYSICAL EDUCATION</option> -->
                                                          </select>
                                                        </div>

                                                        <div id="sub_det_nt">
                                                          <select class="form-control" name="nt_teaching" id="nt_teaching">
                                                            <option value="">--Select--</option>
                                                            <option value="EEDP">EEDP</option> -->
                                                          </select>
                                                        </div>
                                                  		</label>
                                                  	</div>
                                                  </div>
                                              </div> 
                                          </section>
                                      </div>
                                  </div> 
                                  <div class="panel panel-primary">
                                  	<div class="panel-heading">PERSONAL DETAILS</div>
                                  	<div class="panel-body">   
                                  		<section>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp; Name of the Candidate:</label>
                                  						<input type="text" class="form-control" name='fname' placeholder="FIRST NAME">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont">&nbsp;</label>
                                  						<input type="text" class="form-control" name='mname' id='mname' placeholder="MIDDLE NAME">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont">&nbsp;<span style="color:red">*</span>&nbsp;</label>
                                  						<input type="text" class="form-control" name='lname' placeholder="LAST NAME">
                                  					</div>
                                  				</div>
                                  			</div>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp; Father Name:</label>
                                  						<input type="text" class="form-control" name='fathername' placeholder="FIRST NAME">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont">&nbsp;</label>
                                  						<input type="text" class="form-control" name='father_mname' placeholder="MIDDLE NAME">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont">&nbsp;<span style="color:red">*</span>&nbsp;</label>
                                  						<input type="text" class="form-control" name='father_lname' placeholder="LAST NAME">
                                  					</div>
                                  				</div>
                                  			</div>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont">&nbsp;Husband/wife's Name</label>
                                  						<input type="text" class="form-control" name='hus_wife_name' placeholder="FIRST NAME">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont">&nbsp;</label>
                                  						<input type="text" class="form-control" name='hus_wife_mname' placeholder="MIDDLE NAME">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont">&nbsp;&nbsp;</label>
                                  						<input type="text" class="form-control" name='hus_wife_lname' placeholder="LAST NAME">
                                  					</div>
                                  				</div>
                                  			</div>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp; EMAIL :</label>
                                  						<input type="text" class="form-control" name="email" placeholder="EMAIL" value="<?php echo $_SESSION['email'];?>" readonly>
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span> ADHAAR NO. :</label>
                                  						<input type="text" class="form-control" name='aadhar' value="<?php echo $_SESSION['adhar'];?>" readonly placeholder="ADHAAR NUMBER">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label for="exampleFormControlInput1" class="labelfont"><span style="color:red">*</span>&nbsp;GENDER :</label>
                                  						<br>&nbsp;&nbsp;
                                  						<label style="margin-left: 10px;"><input class="form-check-input" type="radio" name='gender' value="male">MALE</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  						<label><input class="form-check-input" type="radio" name='gender' value="female">FEMALE</label>
                                  					</div> 
                                  				</div>
                                  			</div>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp; MOBILE NO :</label>
                                  						<input type="text" class="form-control" name="mobile" placeholder="MOBILE NO" value="<?php echo $_SESSION['contact'];?>" readonly>
                                  					</div> 
                                  				</div>
                                  				<div class="col-md-4">                                  
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;NATIONALITY :</label>
                                  						<input type="text" class="form-control" name='nation' placeholder="NATIONALITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;RELIGION :</label>
                                  						<input type="text" class="form-control" name='religion' placeholder="RELIGION">
                                  					</div>
                                  				</div>
                                  			</div>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;CATEGORY :</label>
                                  						<select class="form-control" name="cat">
                                  							<option value="GENERAL">GENERAL</option>
                                  							<option value="SC">SC</option>
                                  							<option value="ST">ST</option>
                                  							<option value="OBC">OBC</option>
                                  						</select>
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label for="exampleFormControlInput1" class="labelfont"><span style="color:red">*</span>&nbsp;MOTHER TONGUE :</label>
                                  						<input type="text" class="form-control" name='tongue' placeholder="MOTHER TONGUE">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label for="exampleFormControlInput1" class="labelfont"><span style="color:red">*</span>&nbsp;Marital Status :</label>
                                  						<br>&nbsp;&nbsp;
                                  						<label style="margin-left: 10px;"><input class="form-check-input" type="radio" name='marital' value="Married">Married </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  						<label><input class="form-check-input" type="radio" name='marital' value="UnMarried">Unmarried</label>
                                  					</div> 
                                  				</div>
                                  			</div>
                                  		</section>
                                  	</div>
                                  </div>
                                  <div class="panel panel-primary">
                                  	<div class="panel-heading">&nbsp;ADDRESS</div>
                                  	<div class="panel-body">
                                  		<section>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;PERMANENT ADDRESS :</label>  
                                  						<textarea class="form-control" id="permanent_address" name="permanent_address"></textarea>
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;post office:</label>
                                  						<input type="text" class="form-control" id="permanent_postoffice" name="permanent_postoffice" placeholder="POST OFFICE">  
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;STATE :</label>
                                  						<select class="form-control" id="permanent_state" name="permanent_state">
                                  							<option value="">------------Select State------------</option>
                                  							<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                  							<option value="Andhra Pradesh">Andhra Pradesh</option>
                                  							<option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                  							<option value="Assam">Assam</option>
                                  							<option value="Bihar">Bihar</option>
                                  							<option value="Chandigarh">Chandigarh</option>
                                  							<option value="Chhattisgarh">Chhattisgarh</option>
                                  							<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                  							<option value="Daman and Diu">Daman and Diu</option>
                                  							<option value="Delhi">Delhi</option>
                                  							<option value="Goa">Goa</option>
                                  							<option value="Gujarat">Gujarat</option>
                                  							<option value="Haryana">Haryana</option>
                                  							<option value="Himachal Pradesh">Himachal Pradesh</option>
                                  							<option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                  							<option value="Jharkhand" selected="">Jharkhand</option>
                                  							<option value="Karnataka">Karnataka</option>
                                  							<option value="Kerala">Kerala</option>
                                  							<option value="Lakshadweep">Lakshadweep</option>
                                  							<option value="Madhya Pradesh">Madhya Pradesh</option>
                                  							<option value="Maharashtra">Maharashtra</option>
                                  							<option value="Manipur">Manipur</option>
                                  							<option value="Meghalaya">Meghalaya</option>
                                  							<option value="Mizoram">Mizoram</option>
                                  							<option value="Nagaland">Nagaland</option>
                                  							<option value="Orissa">Orissa</option>
                                  							<option value="Pondicherry">Pondicherry</option>
                                  							<option value="Punjab">Punjab</option>
                                  							<option value="Rajasthan">Rajasthan</option>
                                  							<option value="Sikkim">Sikkim</option>
                                  							<option value="Tamil Nadu">Tamil Nadu</option>
                                  							<option value="Tripura">Tripura</option>
                                  							<option value="Uttaranchal">Uttaranchal</option>
                                  							<option value="Uttar Pradesh">Uttar Pradesh</option>
                                  							<option value="West Bengal">West Bengal</option>
                                  						</select>
                                  					</div>
                                  				</div>
                                  			</div>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label for="exampleFormControlInput1" class="labelfont"><span style="color:red">*</span>&nbsp;DISTRICT:</label>
                                  						<input type="text" class="form-control" name='permanent_district' id='permanent_district' placeholder="DISTRICT">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;CITY :</label>
                                  						<input type="text" class="form-control" id="permanent_city" name="permanent_city" placeholder="CITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;Pin code :</label>
                                  						<input type="text" class="form-control" name='permanent_pin' id='permanent_pin' placeholder="PIN CODE">
                                  					</div>
                                  				</div>
                                  			</div>
                                  			<p><input type="checkbox" value="" name="filltoo" id="filltoo" onclick="filladd()" style="font-size:smaller!important;" />Permanent Address Same As Present Address </p>
                                  			<hr>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont">PRESENT ADDRESS :</label>
                                  						<textarea class="form-control" id="present_address" name="present_address"></textarea>
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;post office:</label>
                                  						<input type="text" class="form-control" id="present_postoffice" name="present_postoffice" placeholder="POST OFFICE">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont">STATE :</label> 
                                  						<select class="form-control" id="present_state" name="present_state">
                                  							<option value="">------------Select State------------</option>
                                  							<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                  							<option value="Andhra Pradesh">Andhra Pradesh</option>
                                  							<option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                  							<option value="Assam">Assam</option>
                                  							<option value="Bihar">Bihar</option>
                                  							<option value="Chandigarh">Chandigarh</option>
                                  							<option value="Chhattisgarh">Chhattisgarh</option>
                                  							<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                  							<option value="Daman and Diu">Daman and Diu</option>
                                  							<option value="Delhi">Delhi</option>
                                  							<option value="Goa">Goa</option>
                                  							<option value="Gujarat">Gujarat</option>
                                  							<option value="Haryana">Haryana</option>
                                  							<option value="Himachal Pradesh">Himachal Pradesh</option>
                                  							<option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                  							<option value="Jharkhand" selected="">Jharkhand</option>
                                  							<option value="Karnataka">Karnataka</option>
                                  							<option value="Kerala">Kerala</option>
                                  							<option value="Lakshadweep">Lakshadweep</option>
                                  							<option value="Madhya Pradesh">Madhya Pradesh</option>
                                  							<option value="Maharashtra">Maharashtra</option>
                                  							<option value="Manipur">Manipur</option>
                                  							<option value="Meghalaya">Meghalaya</option>
                                  							<option value="Mizoram">Mizoram</option>
                                  							<option value="Nagaland">Nagaland</option>
                                  							<option value="Orissa">Orissa</option>
                                  							<option value="Pondicherry">Pondicherry</option>
                                  							<option value="Punjab">Punjab</option>
                                  							<option value="Rajasthan">Rajasthan</option>
                                  							<option value="Sikkim">Sikkim</option>
                                  							<option value="Tamil Nadu">Tamil Nadu</option>
                                  							<option value="Tripura">Tripura</option>
                                  							<option value="Uttaranchal">Uttaranchal</option>
                                  							<option value="Uttar Pradesh">Uttar Pradesh</option>
                                  							<option value="West Bengal">West Bengal</option>
                                  						</select>
                                  					</div>
                                  				</div>
                                  			</div>
                                  			<div class="row">
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label for="exampleFormControlInput1" class="labelfont"><span style="color:red">*</span>&nbsp;dISTRICT:</label>
                                  						<input type="text" class="form-control" name='present_district' id='present_district' placeholder="DISTRICT">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;CITY :</label>
                                  						<input type="text" class="form-control" id="present_city" name="present_city" placeholder="CITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;Pin code :</label>
                                  						<input type="text" class="form-control" name='present_pin' id='present_pin' placeholder="PIN CODE">
                                  					</div>
                                  				</div>
                                  			</div>
                                  		</section>
                                  	</div>
                                  </div>  
                                  <div class="panel panel-primary">
                                  	<div class="panel-heading">Qualifications</div>
                                  	<div class="panel-body">
                                  		<section>
                                  			<div class="row ccrow">
                                  				<div class="col-md-1">
                                  					<div class="form-group" style="margin-bottom:0px;">
                                  						<label><span style="color:red">*</span>Matriculation</label>
                                  						<input type="text" class="form-control inputfont" name='mat_year' id='mat_year' placeholder="YEARS" style="width:90%!important">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;BOARD/UNIVERSITY</label>
                                  						<input type="text" class="form-control inputfont" name='mat_board' id='mat_board' placeholder="BOARD/UNIVERSITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>DIVISION</label>
                                  						<!-- <input type="text" class="form-control" name="mat_division" placeholder="DIVISION"> -->
                                  						<select name="mat_division" id="mat_division" class="form-control inputfont">
                                  							<option value="">SELECT</option>
                                  							<option value="1st">1<sup>st</sup></option>
                                  							<option value="2nd">2<sup>nd</sup></option>
                                  							<option value="3rd">3<sup>rd</sup></option> 
                                  						</select>
                                  					</div>  
                                  				</div>
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>Percentage</label>
                                  						<input type="text" class="form-control inputfont" name="mat_percentage" id="mat_percentage" placeholder="%">
                                  					</div>  
                                  				</div>
                                  				<div class="col-md-3">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;SUBJECTS</label>
                                  						<input type="text" class="form-control inputfont" name="mat_subject" id="mat_subject" placeholder="SUBJECTS">
                                  					</div> 
                                  				</div>
                                  				 <div class="col-md-2">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;Uploads Marksheet</label>
                                  						<input type="file" class="form-control inputfont" name="matric_marsheet" id="matric_marsheet" onchange="ValidateSizecert(this)">
                                  						<span>accept only scanned in jpg</span>
                                  					</div> 
                                  				</div>
                                  		<!--		<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>&nbsp;Uploads final certificate</label>
                                  						<input type="file" class="form-control inputfont" name="matric_final_certificate" id="matric_final_certificate"  onchange="ValidateSizecert(this)">
                                  						<span>accept only scanned in jpg</span>
                                  					</div> 
                                  				</div> -->
                                  			</div>
                                  			<hr>
                                  			<div class="row ccrow">
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>INTER/HR./SEC.</label>
                                  						<input type="text" class="form-control inputfont" name='inter_year' id='inter_year' placeholder="YEARS">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;BOARD/UNIVERSITY</label>
                                  						<input type="text" class="form-control inputfont" name='inter_board' id='inter_board' placeholder="BOARD/UNIVERSITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;DIVISION</label>
                                  						<!-- <input type="text" class="form-control" name="inter_division" placeholder="DIVISION"> -->
                                  						<select name="inter_division" id="inter_division" class="form-control inputfont">
                                  							<option value="">SELECT</option>
                                  							<option value="1st">1<sup>st</sup></option>
                                  							<option value="2nd">2<sup>nd</sup></option>
                                  							<option value="3rd">3<sup>rd</sup></option> 
                                  						</select>
                                  					</div> 
                                  				</div>
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>PERCENTAGE</label>
                                  						<input type="text" class="form-control inputfont" name="inter_percentage" id="inter_percentage" placeholder="%">
                                  					</div> 
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;SUBJECTS</label>
                                  						<input type="text" class="form-control inputfont" name="inter_subject" id="inter_subject" placeholder="SUBJECTS">
                                  					</div> 
                                  				</div>                                  				
                                  			</div>
                                  			<hr>
                                  			<div class="row ccrow">
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>Graduation</label>
                                  						<input type="text" class="form-control inputfont" name='grad_year' id='grad_year' placeholder="YEARS">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;BOARD/UNIVERSITY</label>
                                  						<input type="text" class="form-control inputfont" name='grad_board' id='grad_board' placeholder="BOARD/UNIVERSITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;DIVISION</label>
                                  						<!-- <input type="texttext" class="form-control" name="grad_division" placeholder="DIVISION"> -->
                                  						<select name="grad_division" id="grad_division" class="form-control inputfont">
                                  							<option value="">SELECT</option>
                                  							<option value="1st">1<sup>st</sup></option>
                                  							<option value="2nd">2<sup>nd</sup></option>
                                  							<option value="3rd">3<sup>rd</sup></option> 
                                  						</select>
                                  					</div>                                  
                                  				</div>
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>PERCENTAGE</label>
                                  						<input type="text" class="form-control inputfont" name="grad_percentage" id="grad_percentage" placeholder="%">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;SUBJECTS</label>
                                  						<input type="text" class="form-control inputfont" name="grad_subject" id="grad_subject" placeholder="SUBJECTS">
                                  					</div>  
                                  				</div>
                                  			
                                  			</div>
                                  			<hr>
                                  			<div class="row ccrow">
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>Post Graduation</label>
                                  						<input type="text" class="form-control inputfont" name='post_grad_year' id='post_grad_year' placeholder="YEARS">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>&nbsp;BOARD/UNIVERSITY</label>
                                  						<input type="text" class="form-control inputfont" name='post_grad_board' id='post_grad_board' placeholder="BOARD/UNIVERSITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>&nbsp;DIVISION</label>
                                  						<!-- <input type="text" class="form-control" name="post_grad_division" placeholder="DIVISION"> -->
                                  						<select name="post_grad_division" id="post_grad_division" class="form-control inputfont">
                                  							<option value="">SELECT</option>
                                  							<option value="1st">1<sup>st</sup></option>
                                  							<option value="2nd">2<sup>nd</sup></option>
                                  							<option value="3rd">3<sup>rd</sup></option> 
                                  						</select>

                                  					</div>                                  
                                  				</div>
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label>PERCENTAGE</label>
                                  						<input type="text" class="form-control inputfont" name="post_grad_percentage" id="post_grad_percentage" placeholder="%">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label>&nbsp;SUBJECTS</label>
                                  						<input type="text" class="form-control inputfont" name="post_grad_subject" id="post_grad_subject" placeholder="SUBJECTS">
                                  					</div>  
                                  				</div>                                  				
                                  			</div>
                                  			<hr>
                                  			<div class="row ccrow" id="b_ed" style="display: none">
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>B.Ed/B.P.Ed/M.P.Ed</label>
                                  						<input type="text" class="form-control inputfont" name='bed_year' id='bed_year' placeholder="YEARS">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;BOARD/UNIVERSITY</label>
                                  						<input type="text" class="form-control inputfont" name='bed_board' id='bed_board' placeholder="BOARD/UNIVERSITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;DIVISION</label>
                                  						<!-- <input type="text" class="form-control inputfont" name="bed_division" placeholder="DIVISION"> -->
                                  						<select name="bed_division" id="bed_division" class="form-control inputfont">
			                                                <option value="">SELECT</option>
			                                                <option value="1st">1<sup>st</sup></option>
			                                                <option value="2nd">2<sup>nd</sup></option>
			                                                <option value="3rd">3<sup>rd</sup></option> 
			                                              </select>
                                  					</div>
                                  				</div>
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>percentage</label>
                                  						<input type="text" class="form-control" name="bed_percentage" id="bed_percentage" placeholder="%">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-3">
                                  					<div class="form-group">
                                  						<label><span style="color:red">*</span>&nbsp;SUBJECTS</label>
                                  						<input type="text" class="form-control inputfont" name="bed_subject" id="bed_subject" placeholder="SUBJECTS">
                                  					</div> 
                                  				</div>
		                                          <div class="col-md-3">
		                                            <div class="form-group">
		                                              <label><span style="color:red">*</span>&nbsp;Uploads Certificate</label>
		                                             <input type="file" class="form-control inputfont" name="bed_certificate" id="bed_certificate" onchange="ValidateSizecert(this)">
		                                  			<span>accept only scanned in jpg</span>
		                                            </div> 
		                                          </div>
                                          
                                  			</div>                    
                                  			<hr id="bedhr" style="display: none">
                                  			<div class="row ccrow" id="ctet"  style="display: none">
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>&nbsp; CTET/STET</label>
                                  						<input type="text" class="form-control inputfont" name='ctet_year' id='ctet_year' placeholder="YEARS">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>&nbsp;BOARD/UNIVERSITY</label>
                                  						<input type="text" class="form-control inputfont" name='ctet_board' id='ctet_board' placeholder="BOARD/UNIVERSITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>&nbsp;DIVISION</label>
                                  						<!-- <input type="text" class="form-control inputfont" name="ctet_division" placeholder="DIVISION">-->
                                  					<select name="ctet_division" id="ctet_division" class="form-control inputfont">
		                                                <option value="">SELECT</option>
		                                                <option value="1st">1<sup>st</sup></option>
		                                                <option value="2nd">2<sup>nd</sup></option>
		                                                <option value="3rd">3<sup>rd</sup></option> 
		                                              </select>
                                  					</div> 
                                  				</div>
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label>PERCENTAGE</label>
                                  						<input type="text" class="form-control" name="ctet_percentage" id="ctet_percentage" placeholder="%">
                                               
                                  					</div> 
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label>&nbsp;SUBJECTS</label>
                                  						<input type="text" class="form-control inputfont" name="ctet_subject" id="ctet_subject" placeholder="SUBJECTS">
                                  					</div> 
                                  				</div>
                                          
                                  			</div>
                                  			<hr id="ctethr" style="display: none;">
                                  			<div class="row ccrow">
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>Any Other</label>
                                  						<input type="text" class="form-control inputfont" name='other_year' id='other_year' placeholder="YEARS">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>&nbsp;BOARD/UNIVERSITY</label>
                                  						<input type="text" class="form-control inputfont" name='other_board' id='other_board' placeholder="BOARD/UNIVERSITY">
                                  					</div>
                                  				</div>
                                  				<div class="col-md-2">
                                  					<div class="form-group">
                                  						<label>&nbsp;DIVISION</label>
                                  						<!-- <input type="text" class="form-control" name="other_division" placeholder="DIVISION"> -->
                                                <select name="other_division" id="other_division" class="form-control inputfont">
                                                <option value="">SELECT</option>
                                                <option value="1st">1<sup>st</sup></option>
                                                <option value="2nd">2<sup>nd</sup></option>
                                                <option value="3rd">3<sup>rd</sup></option> 
                                              </select>

                                  					</div>
                                  				</div>
                                  				<div class="col-md-1">
                                  					<div class="form-group">
                                  						<label>PERCENTAGE</label>
                                  						<input type="text" class="form-control inputfont" name="other_percentage" id="other_percentage" placeholder="%">
                                  					</div>  
                                  				</div>
                                  				<div class="col-md-4">
                                  					<div class="form-group">
                                  						<label>&nbsp;SUBJECTS</label>
                                  						<input type="text" class="form-control inputfont" name="other_subject" id="other_subject" placeholder="SUBJECTS">
                                  					</div>  
                                  				</div>
                                         <!--  <div class="col-md-2">
                                            <div class="form-group">
                                              <label>&nbsp;Uploads Certificate</label>
                                              <input type="file" class="form-control inputfont" name="anyother_certificate" id="anyother_certificate" onchange="ValidateSizecert(this)">
                                  						<span>accept only scanned in jpg</span>
                                            </div> 
                                          </div> -->
                                         <!--  <div class="col-md-2">
                                            <div class="form-group">
                                              <label>&nbsp;certificate</label>
                                              <input type="file" class="form-control inputfont" name="other_certificate_second" id="other_certificate_second"  onchange="ValidateSizecert(this)">
                                              <span>accept only scanned in jpg</span>
                                            </div> 
                                          </div> -->
                                  			</div>
                                  			<hr>
                                  			<div class="row">
                                  				<div class="col-md-12">
                                  					<div class="form-group">
                                  						<label class="labelfont"><span style="color:red">*</span>&nbsp;Computer Knowledge</label>
                                  						<br>&nbsp;&nbsp;
                                  						<label style="margin-left: 10px;"><input class="form-check-input" type="radio" name='comp' value="YES">YES</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  						<label><input class="form-check-input" type="radio" name='comp' value="NO">NO</label>
                                  					</div>
                                  				</div>
                                  			</section>
                                  		</div>
                                  	</div>
                                  	<div class="panel panel-primary">
                                  		<div class="panel-heading">Employment Details</div>
                                  		<div class="panel-body">
                                  			<section>
                                  				<div class="row">
                                  					<div class="col-md-2">
                                  						<div class="form-group">
                                  							<label for="exampleFormControlInput1" class="labelfont"><span style="color:red">*</span>&nbsp;Presently Employed :</label>
                                  							<br>&nbsp;&nbsp;
                                  							<label style="margin-left: 10px;"><input class="form-check-input" type="radio" name='present_emp' value="YES">YES</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  							<label><input class="form-check-input" type="radio" name='present_emp' value="NO">NO</label> 
                                  						</div> 
                                  					</div>
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label class="labelfont">Experience</label>
                                                <select name="experience_school" class="form-control" id="experience_school" onChange="getexp(this.value)"> 
                                                  <option value="">--select--</option>
                                                  <option value="DAV">DAV</option>
                                                  <option value="OTHER">OTHER</option>
                                                </select>                                              
                                              </div>
                                            </div>
                                            <div class="col-md-2" id="school_place"  style="display:none;">
                                              <div class="form-group">
                                                <label class="labelfont">Institution Name</label>                                               
                                                <input type="text" name="experience_school_place" id="experience_school_place" class="form-control inputfont" placeholder="ENTER INSTITUTION NAME ">
                                              </div>
                                            </div>
                                           <div class="col-md-2">
                                              <div class="form-group">
                                                <label class="labelfont">work Experience</label>
                                                <div class="row">
                                                  <div class="col">
                                                    <input type="text" name="exp_name" class="form-control inputfont" placeholder="YEARS">
                                                  </div>
                                                  <div class="col">
                                                    <input type="text" name="exp_months" class="form-control inputfont" placeholder="MONTHS">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                  				<!-- 	<div class="col-md-2">
                                  					<div class="form-group">
                                              <label>&nbsp;Uploads Certificate</label>
                                              <input type="file" class="form-control inputfont" name="other_certificate_second" id="other_certificate_second" onchange="ValidateSizecert(this)">
                                              <span>accept only scanned in jpg</span>
                                            </div>
                                  					</div> -->

                                              <div class="col-md-3">
                                              <div class="form-group">
                                                <label class="labelfont">Place where now Working:</label>
                                                <input type="text" class="form-control inputfont" name="place_work" placeholder="PLACE WHERE NOW WORKING">
                                              </div>
                                            </div>

                                            <!--  <div class="col-md-2">
                                              <div class="form-group">
                                                <label class="labelfont">Examination Center:</label>
                                                 <select class="form-control" name="exam_center">
                                                    <option value="">Select Examination Center</option>
                                                    <option value="Agrasen DAV Public School, Bharechnagar">Agrasen DAV Public School, Bharechnagar</option>
                                                     <option value="KARANPURA-TANDWA">KARANPURA TANDWA</option>
                                                </select>
                                              </div>
                                            </div> -->
                                  					
                                  				</div>
                                  				<div class="row">
                                  					<div class="col-md-3">
                                  						<div class="form-group">
                                  							<label class="labelfont">Last Pay Drawn(consolidated)</label>
                                  							<input type="text" class="form-control" name="last_pay" id="last_pay" placeholder="LAST PAY DRAWN(CONSOLIDATED)">
                                  						</div>
                                  					</div>
                                  					<div class="col-md-3">
                                  						<div class="form-group">
                                  							<label class="labelfont">CTC :</label>
                                  							<input type="text" class="form-control" name="ctc" id="ctc" placeholder="CTC">
                                  						</div>
                                  					</div> 

                                              <div class="col-md-3">
                                              <div class="form-group">
                                                <label class="labelfont">Prefrence of posting ,if selected:(1)</label>
                                                <select class="form-control" name="job_center1" >
                                                    <option value="">Select Job Location</option>
                                                    <option value="DAV Public School, Barkakana">DAV Public School, Barkakana</option>
                                                     <option value="Agrasen(Bharechnagar)">Agrasen(Bharechnagar)</option>
                                                     <option value="Koderma">Koderma</option>
                                                     <option value="Rajrappa">Rajrappa</option>
                                                     <option value="Tapin North">Tapin North</option>
                                                     <option value="Bachra">Bachra</option>
                                                     <option value="Urimari">Urimari</option>
                                                     <option value="Patratu">Patratu</option>
                                                     <option value="Chainpur">Chainpur</option>
                                                </select>
                                              </div>
                                            </div> 
                                             <div class="col-md-3">
                                              <div class="form-group">
                                                <label class="labelfont">Prefrence of posting ,if selected:(2)</label>
                                                <select class="form-control" name="job_center2" >
                                                    <option value="">Select Job Location</option>
                                                    <option value="DAV Public School, Barkakana">DAV Public School, Barkakana</option>
                                                     <option value="Agrasen(Bharechnagar)">Agrasen(Bharechnagar)</option>
                                                     <option value="Koderma">Koderma</option>
                                                     <option value="Rajrappa">Rajrappa</option>
                                                     <option value="Tapin North">Tapin North</option>
                                                     <option value="Bachra">Bachra</option>
                                                     <option value="Urimari">Urimari</option>
                                                     <option value="Patratu">Patratu</option>
                                                     <option value="Chainpur">Chainpur</option>
                                                </select>
                                              </div>
                                            </div> 
                                  				</div>
                                  			</section>
                                  		</div>
                                  	</div>

                                  	<div class="panel panel-primary">
                                  		<div class="panel-heading">UPLOADS</div>
                                  		<div class="panel-body">
                                  			<section>
                                  				<div class="row">
                                  					<div class="col-md-3">
                                  						<div class="form-group">
                                  							<label class="labelfont"><span style="color:red">*</span>&nbsp;PHOTO :(RECENT PHOTO)</label>
                                  							<input type="file" required name='img'  id="choose_photo_btn" class="custom-file-input" onchange="ValidateSize(this)">
                                  							<figcaption style="color:#000;font-size:13px;">
                                  								The image file should be JPG or JPEG format<br>
                                  								Size of file should be between 30kb.
                                  							</figcaption>
                                  						</div>
                                  					</div>
                                  					<div class="col-md-4" style="display:none" id="phdiv">
                                  						<img id="blah" src="#"  style="width: 85px;height: 85px;border:1px solid #ccc;" />
                                  					</div>
                                            <div class="col-md-3">
                                            <div class="form-group">
                                              <label><span style="color:red">*</span>&nbsp;Applicant Signature</label>
                                              <input type="file" class="form-control inputfont" name="other_certificate_second" id="other_certificate_second" onchange="ValidateSizecert(this)">
                                              <span>accept only scanned in jpg<br>Size of file should be between 30kb.</span>
                                            </div>
                                            </div> 
                                  				</div>
                                  			</section>
                                  		</div>
                                  	</div>
                                  	<input name="agree" required="" id="planned_checked" type="checkbox" style="margin-left:10px;"><span> &nbsp; &nbsp;&nbsp;If selected, I shall abide by the service terms & conditions of the D.A.V Trust</span>
                                  	<div class="row">
                                  		<div class="col-md-5"></div>
                                  		<div class="col-md-2">
                                  			<input type="submit" id="subm"  value="SAVE & NEXT" class="btn btn-success" style="margin: 18px 20px 20px 20px!important;height: 33px; width: 75%;">
                                  			<button class="" id="ss" style="margin: 08px 20px 20px 20px;display:none;">SAVE & NEXT</button>
                                  		</div>

                                  	</div>

                                  </form>
                <!--<div class="space" style="height: 20px;">

                </div> -->

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">

   $('#admission_form').submit(function(e){
        var centre1=$('select[name="job_center1"]').val();
        var centre2=$('select[name="job_center2"]').val();      
        if(centre1==centre2) {
            alert("Please choose different job location!!!");
            e.preventDefault();
        }
        
    });

   function getexp(data) {
    var type=data;   
    if(type=='OTHER')
    {     
       jQuery("#school_place").show();
        jQuery("#experience_school_place"). attr('required', 'required');

  }
   else  if(type=='DAV'){
     jQuery("#school_place").hide();
     jQuery("#experience_school_place").removeAttr('required');
  }
  else {
     jQuery("#school_place").hide();
     jQuery("#experience_school_place").removeAttr('required');
  }
}
  function ValidateSize(file) {
        var FileSize = file.files[0].size; // in MB
       
        if (FileSize > 30720) {
            alert('File size exceeds 30 KB');
           $(file).val(''); //for clearing with Jquery
        } else {

        }
    }

    function ValidateSizecert(file) {
        var FileSize = file.files[0].size; // in MB
       
        if (FileSize > 307200) {
            alert('File size exceeds 300 KB');
           $(file).val(''); //for clearing with Jquery
        } else {

        }
    }

  function checkForm(form) // Submit button clicked
  {
    //
    // check form input values
    //

    form.myButton.disabled = true;
    form.myButton.value = "Please wait...";
    return true;
  }

</script>

<script>


			function filladd()
			{
				if(filltoo.checked == true) 
				{
					var tal11 =document.getElementById("permanent_address").value;
					var perma_post =document.getElementById("permanent_postoffice").value;
					var pstate =document.getElementById("permanent_state").value;
					var pdist =document.getElementById("permanent_district").value;
					var pcity =document.getElementById("permanent_city").value;
					var perma_pin =document.getElementById("permanent_pin").value; 
					var copytal =tal11 ;
					var copypost =perma_post ;
					var copystate =pstate ;
					var copydist =pdist ;
					var copycity =pcity ;
					var copypin =perma_pin ;            

					document.getElementById("present_address").value = copytal;
					document.getElementById("present_postoffice").value = copypost;
					document.getElementById("present_state").value = copystate;
					document.getElementById("present_district").value = copydist;
					document.getElementById("present_city").value = copycity;
					document.getElementById("present_pin").value = copypin;
					$('#present_address').attr('readonly',true);
					$('#present_postoffice').attr('readonly',true);
					$('#present_state').attr('readonly',true);
					$('#present_district').attr('readonly',true);
					$('#present_city').attr('readonly',true);
					$('#present_pin').attr('readonly',true);
				}

				else if(filltoo.checked == false)
				{
					document.getElementById("present_address").value='';
					document.getElementById("present_postoffice").value='';
					document.getElementById("present_state").value='';
					document.getElementById("present_district").value='';
					document.getElementById("present_city").value='';
					document.getElementById("present_pin").value='';
					$('#present_address').attr('readonly',false);
					$('#present_postoffice').attr('readonly',false);
					$('#present_state').attr('readonly',false);
					$('#present_district').attr('readonly',false);
					$('#present_city').attr('readonly',false);
					$('#present_pin').attr('readonly',false);
				}

			}


			
				$('#admission_form').validate({
					rules: {
						davemp: {
							required: true,
						},
						fname: {
							required: true,
              lettersonly: true,
						},
            mname: {              
              lettersonly: true,
            },
						lname: {
							required: true,
						},
						dob: {
							required: true,
							date: true,           
						},
						teaching_cat: {
							required: true,           
						}, 
						fathername: {
							required: true,
              lettersonly: true,
						},
            father_mname: {             
              lettersonly: true,
            },
						father_lname: { 
							required: true,
              lettersonly: true,    
						},
            hus_wife_name: {               
              lettersonly: true,    
            },
            hus_wife_mname: {               
              lettersonly: true,    
            },
             hus_wife_lname: {               
              lettersonly: true,    
            },
						email: {  
							required: true,
							email: true, 
						},
						aadhar: {
							number:true,
							maxlength:12, 
							minlength:12,
						},
						gender: {
							required: true,
						},
						mobile: {
							required: true,
							number:true,  
							minlength:10,
							maxlength:10,  
						},
						nation: {
							required: true,
              lettersonly: true, 
						},
						religion: {
							required: true, 
              lettersonly: true,
						},
						cat: {
							required: true,
              lettersonly: true,  
						},
						tongue: { 
							required: true,
              lettersonly: true,
						},
						marital: {   
							required: true,
						}, 
						permanent_address: {  
							required: true,
						}, 
						permanent_postoffice: {
							required: true,
              
						}, 
						permanent_state: { 
							required: true,
						},
						permanent_district: { 
							required: true,
             
						},
						permanent_city: { 
							required: true,
						}, 
						permanent_pin:{
							required: true, 
							number:true,  
							minlength:6,
							maxlength:6,
						},
						present_address:{
							required: true,
						},
						present_postoffice:{
							required: true,
             
						},
						present_state:{
							required: true,
						},
						present_district:{
							required: true,
              
						}, 
						present_city:{
							required: true,
              
						},
						present_pin:{
							required: true, 
							number:true,  
							minlength:6,
							maxlength:6,
						}, 
						mat_year:{
							required: true, 
							number:true,
						},

						mat_board:{
							required: true,
						},
						mat_division:{
							required: true,
						}, 
						mat_percentage:{
							required: true, 
						},
						mat_subject:{
							required: true, 
						},
						inter_year:{
              number:true,
							required: true,
						},
						inter_board:{
							required: true, 
						},
						inter_division:{
							required: true, 
						},
						inter_percentage:{
							required: true, 
						},
						inter_subject:{
							required: true, 
						},
						grad_year:{
              number:true,
							required: true, 
						}, 
            
						grad_board:{
							required: true, 
						},
						grad_division:{
							required: true, 
						}, 
						grad_percentage:{
							required: true,
						}, 
						grad_subject:{
							required: true,
						},
						comp:{
							required: true, 
						},
						present_emp:{
							required: true, 
						},
             post_grad_year:{
              number:true,             
            },
            bed_year:{
              number:true,             
            },
             ctet_year:{
              number:true,             
            }, 
             other_year:{
              number:true,             
            }, 
             job_center1:{
             required: true,              
            },
             job_center2:{
             required: true,              
            },
             exam_center:{
             required: true,              
            },
						img:{
				              required: true,
				              extension: "jpg,jpeg,JPG",
				            },
				            matric_marsheet:{				             
				              extension: "jpg,jpeg",
                      required: true,
				            },
				      //       matric_final_certificate:{				            
				      //         extension: "jpg,jpeg",
				      //       },				           
				            bed_certificate:{
				              extension: "jpg,jpeg",
				            },
				          
				      //        anyother_certificate:{							
				      //         extension: "jpg,jpeg",
										// }, 
                    other_certificate_second:{             
                      extension: "jpg,jpeg",
                      required: true,
                    },
                   
									}

								});
			 


			function readURL(input) {

				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#blah').attr('src', e.target.result);
						$('#phdiv').show();
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#choose_photo_btn").change(function() {
				readURL(this);
			});
		</script>