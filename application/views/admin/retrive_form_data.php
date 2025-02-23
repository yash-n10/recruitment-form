 <?php 
?>
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
</style>
<script>
    window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>
<?php $x=1;
 foreach ($form_add as $value) {
	 // print_r ($value);
 }
                                                                       
             ?>
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
                                <div class="container" style="text-align: left!important;">
																	
                                    <form action='<?php echo base_url();?>save' method='POST' enctype='multipart/form-data' id='admission_form' style="border:1px solid #65a605">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">Applicant Details</div>
                                            <div class="panel-body">
                                                <section>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>FORM NO. :</label>
                                                                <input type="text" class="form-control" name='form_no' readonly  value="<?php echo $value->form_no;?>" placeholder="FORM NUMBER">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>DATE OF APPLICATION :</label>
                                                                <input type="date" name="date_app" value="<?php echo date('Y-m-d');?>" readonly class="form-control"  value="<?php echo $value->date_app;?>" placeholder="DATE OF APPLICATION">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label><span style="color:red">*</span>&nbsp;DATE OF BIRTH :</label>
                                                                <input type="date" class="form-control birth_date" name='dob' placeholder="D/O/B" id="birth_date"  value="<?php echo $value->dob;?>" <?php echo $dob; ?>>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                         <div class="form-group">
                                                            <label for="exampleFormControlInput1"><span style="color:red">*</span>&nbsp;Select Category:</label>

                                                            <label>
                                                                <select class="form-control" name="teaching_cat" id="teaching_cat"  value="<?php echo $value->teaching_cat;?>" onChange="getpa(this.value)">
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
                                                              jQuery('#ctet').show();
                                                              jQuery('#b_ed').show();
                                                              jQuery('#post_details_non_teach').hide();
                                                          }
                                                          else if(type=='NON-TEACHING')
                                                          {
                                                              jQuery('#post').show();
                                                              jQuery('#post_details').hide();
                                                              jQuery('#ctet').hide();
                                                              jQuery('#b_ed').hide();
                                                              jQuery('#post_details_non_teach').show();
                                                          }
                                                      }
                                                      function getsat(data) {
                                                         var type=data;
                                                         if(type=='PGT')
                                                         {
                                                            jQuery('#sub').show();
                                                            jQuery('#sub_details').show();
                                                            jQuery('#sub_det').hide();
                                                        }
                                                        else if(type=='TGT/PRT')
                                                        {
                                                            jQuery('#sub').show();
                                                            jQuery('#sub_details').hide();
                                                            jQuery('#sub_det').show();
                                                        }
                                                        else
                                                        {
                                                            jQuery('#sub').hide();
                                                            jQuery('#sub_details').hide();
                                                            jQuery('#sub_det').hide();
                                                        }

                                                    }
                                                </script>

                                                <div class="col-md-4" style="display: none" id="post">
                                                    <div class="form-group">
                                                        <label><span style="color:red">*</span>SELECT post</label>
                                                        <label>
                                                            <div id="post_details">
                                                                <select class="form-control" name="teaching_post"  value="<?php echo $value->teaching_post;?>" onChange="getsat(this.value)">
                                                                    <option value="">--Select--</option>
                                                                    <option value="PGT">PGT</option>
                                                                    <option value="TGT/PRT">TGT/PRT</option>
                                                                    <option value="NURSERY">NURSERY</option>
                                                                </select>
                                                            </div>
                                                            <div id="post_details_non_teach">
                                                             <select name="non_teaching" class="form-control">
                                                               <option value="">Select</option>
                                                               <option value="LDC">LDC</option>
                                                               <option value="UDC">UDC</option>
                                                               <option value="ASSISTANT">ASSISTANT</option>
                                                               <option value="OFFICE SUPERINTENDENT">OFFICE SUPERINTENDENT</option>
                                                               <option value="NURSE">NURSE</option>
                                                               <option value="RECEPTIONIST">RECEPTIONIST</option>
                                                               <option value="LIBRARIAN">LIBRARIAN</option>
                                                               <option value="LIBRARY ASSISTANT">LIBRARY ASSISTANT</option>
                                                               <option value="LAB ASSISTANT">LAB ASSISTANT</option>

                                                           </select>

                                                       </div>
                                                   </label>
                                               </div>
                                           </div>
                                           <div class="col-md-4"  style="display: none" id="sub">
                                            <div class="form-group">
                                                <label><span style="color:red">*</span>Select Subject</label>
                                                <label>
                                                    <div id="sub_details">
                                                        <select class="form-control" name="pgt_teaching"  value="<?php echo $value->pgt_teaching;?>">
                                                            <option value="">--Select--</option>
                                                            <option value="ENGLISH">ENGLISH</option>
                                                            <option value="PHYSICS">PHYSICS</option>
                                                            <option value="CHEMISTRY">CHEMISTRY</option>
                                                            <option value="MATHS">MATHS</option>
                                                            <option value="COMPUTER_SCIENCE">COMPUTER SCIENCE</option>
                                                            <option value="BIOLOGY">BIOLOGY</option>
                                                            <option value="BIO_TECHNOLOGY">BIO-TECHNOLOGY</option>
                                                            <option value="ACCOUNTS">ACCOUNTS</option>
                                                            <option value="BUSINESS_STUDIES">BUSINESS STUDIES</option>
                                                            <option value="ECONOMICS">ECONOMICS</option>
                                                        </select>
                                                    </div>
                                                    <div id="sub_det">
                                                       <select class="form-control" name="tgt_prt_teaching"  value="<?php echo $value->tgt_prt_teaching;?>">
                                                        <option value="">--Select--</option>
                                                        <option value="ENGLISH">ENGLISH</option>
                                                        <option value="HINDI">HINDI</option>                   
                                                        <option value="MATHS">MATHS</option>
                                                        <option value="SANSKRIT">SANSKRIT</option>
                                                        <option value="GENERAL_SCIENCE">GENERAL SCIENCE</option>
                                                        <option value="SOCIAL_SCIENCE">SOCIAL_SCIENCE</option>
                                                        <option value="COMPUTER_SCIENCE">COMPUTER SCIENCE</option>
                                                        <option value="MUSICS">MUSICS</option>
                                                        <option value="FINE_ARTS">FINE ARTS</option>
                                                        <option value="PHYSICAL_EDUCATION">PHYSICAL EDUCATION</option>
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
                                            <label><span style="color:red">*</span>&nbsp; Name of the Candidate:</label>
                                            <input type="text" class="form-control" name='fname' value="<?php echo $value->fname;?>" placeholder="FIRST NAME">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input type="text" class="form-control" name='mname'  value="<?php echo $value->mname;?>" placeholder="MIDDLE NAME">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp;<span style="color:red">*</span>&nbsp;</label>
                                            <input type="text" class="form-control" name='lname'  value="<?php echo $value->lname;?>" placeholder="LAST NAME">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><span style="color:red">*</span>&nbsp; Father Name:</label>
                                            <input type="text" class="form-control" name='fathername'  value="<?php echo $value->fathername;?>" placeholder="FIRST NAME">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input type="text" class="form-control" name='father_mname'  value="<?php echo $value->father_mname;?>"  placeholder="MIDDLE NAME">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp;<span style="color:red">*</span>&nbsp;</label>
                                            <input type="text" class="form-control" name='father_lname'  value="<?php echo $value->father_lname;?>"  placeholder="LAST NAME">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp;Husband/wife's Name</label>
                                            <input type="text" class="form-control" name='hus_wife_name'   value="<?php echo $value->hus_wife_name;?>"  placeholder="FIRST NAME">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input type="text" class="form-control" name='hus_wife_mname'  value="<?php echo $value->hus_wife_mname;?>"  placeholder="MIDDLE NAME">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <input type="text" class="form-control" name='hus_wife_lname'  value="<?php echo $value->hus_wife_lname;?>"  placeholder="LAST NAME">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                        <label><span style="color:red">*</span>&nbsp; EMAIL :</label>
                                        <input type="text" class="form-control" name="email"  value="<?php echo $value->email;?>"  placeholder="EMAIL">
                                    </div>


                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ADHAAR NO. :</label>
                                        <input type="text" class="form-control" name='aadhar'   value="<?php echo $value->aadhar;?>" placeholder="ADHAAR NUMBER">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"><span style="color:red">*</span>&nbsp;GENDER :</label>
                                        <br>&nbsp;&nbsp;
                                        <label style="margin-left: 10px;"><input class="form-check-input" type="radio" name='gender' value="male">MALE</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input class="form-check-input" type="radio" name='gender' value="female">FEMALE</label>
                                    </div> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red">*</span>&nbsp; MOBILE NO :</label>
                                        <input type="text" class="form-control" name="mobile"   value="<?php echo $value->mobile;?>"  placeholder="MOBILE NO">
                                    </div> 

                                </div>

                                <div class="col-md-4">                                  
                                    <div class="form-group">
                                        <label><span style="color:red">*</span>&nbsp;NATIONALITY :</label>
                                        <input type="text" class="form-control" name='nation'  value="<?php echo $value->nation;?>"  placeholder="NATIONALITY">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red">*</span>&nbsp;RELIGION :</label>
                                        <input type="text" class="form-control" name='religion' value="<?php echo $value->religion;?>"  placeholder="RELIGION">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red">*</span>&nbsp;CATEGORY :</label>
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
                                        <label for="exampleFormControlInput1"><span style="color:red">*</span>&nbsp;MOTHER TONGUE :</label>
                                        <input type="text" class="form-control" name='tongue'    value="<?php echo $value->tongue;?>" placeholder="MOTHER TONGUE">
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"><span style="color:red">*</span>&nbsp;Marital Status :</label>
                                        <br>&nbsp;&nbsp;
                                        <label style="margin-left: 10px;"><input class="form-check-input" type="radio" name='marital' value="Married">Married </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input class="form-check-input" type="radio" name='marital'  value="UnMarried">Unmarried</label>                                   
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
                                        <label><span style="color:red">*</span>&nbsp;PERMANENT ADDRESS :</label>                                          
                                        <textarea class="form-control" id="permanent_address" name="permanent_address"  value="<?php echo $value->permanent_address;?>"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red">*</span>&nbsp;post office:</label>
                                        <input type="text" class="form-control" id="permanent_postoffice" name="permanent_postoffice"  value="<?php echo $value->permanent_postoffice;?>" placeholder="POST OFFICE">          
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span style="color:red">*</span>&nbsp;STATE :</label>
                                        <select class="form-control" id="permanent_state"  name="permanent_state"  value="<?php echo $value->permanent_state;?>">
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
                                    <label for="exampleFormControlInput1"><span style="color:red">*</span>&nbsp;dISTRICT:</label>
                                    <input type="text" class="form-control" name='permanent_district' id='permanent_district'  value="<?php echo $value->permanent_district;?>" placeholder="DISTRICT">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><span style="color:red">*</span>&nbsp;CITY :</label>
                                    <input type="text" class="form-control" id="permanent_city" name="permanent_city"  value="<?php echo $value->permanent_city;?>" placeholder="CITY">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><span style="color:red">*</span>&nbsp;Pin code :</label>
                                    <input type="text" class="form-control" name='permanent_pin' id='permanent_pin'  value="<?php echo $value->permanent_pin;?>" placeholder="PIN CODE">
                                </div>
                            </div>
                        </div>
                        <input type="checkbox" value="" name="filltoo" id="filltoo" onclick="filladd()" />Permanent Address Same As Present Address  
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRESENT ADDRESS :</label>
                                    <textarea class="form-control" id="present_address" name="present_address"  value="<?php echo $value->present_address;?>"></textarea>
                                </div>

                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;post office:</label>
                                <input type="text" class="form-control" id="present_postoffice" name="present_postoffice"  value="<?php echo $value->present_postoffice;?>" placeholder="POST OFFICE">          
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>STATE :</label>                                 
                                <select class="form-control" id="present_state" name="present_state"  value="<?php echo $value->present_state;?>">
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
                                <label for="exampleFormControlInput1"><span style="color:red">*</span>&nbsp;dISTRICT:</label>
                                <input type="text" class="form-control" name='present_district' id='present_district'  value="<?php echo $value->present_district;?>" placeholder="DISTRICT">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;CITY :</label>
                                <input type="text" class="form-control" id="present_city" name="present_city"  value="<?php echo $value->present_city;?>" placeholder="CITY">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;Pin code :</label>
                                <input type="text" class="form-control" name='present_pin' id='present_pin' value="<?php echo $value->present_pin;?>" placeholder="PIN CODE">
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
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp; Matriculation</label>
                                <input type="text" class="form-control" name='mat_year'  value="<?php echo $value->mat_year;?>" placeholder="YEARS">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name='mat_board'   value="<?php echo $value->mat_board;?>" placeholder="BOARD/UNIVERSITY">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="mat_division"  value="<?php echo $value->mat_division;?>" placeholder="DIVISION">
                            </div>                                  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="mat_percentage"  value="<?php echo $value->mat_percentage;?>" placeholder="PERCENTAGE">
                            </div>                                  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="mat_subject"  value="<?php echo $value->mat_subject;?>" placeholder="SUBJECTS">
                            </div>                                  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp; INTER/HR./SEC.</label>
                                <input type="text" class="form-control" name='inter_year'  value="<?php echo $value->inter_year;?>" placeholder="YEARS">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name='inter_board'  value="<?php echo $value->inter_board;?>" placeholder="BOARD/UNIVERSITY">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="inter_division"  value="<?php echo $value->inter_division;?>" placeholder="DIVISION">
                            </div>                                  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="inter_percentage"  value="<?php echo $value->inter_percentage;?>" placeholder="PERCENTAGE">
                            </div>                                  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="inter_subject"  value="<?php echo $value->inter_subject;?>" placeholder="SUBJECTS">
                            </div>                                  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp; Graduation</label>
                                <input type="text" class="form-control" name='grad_year'  value="<?php echo $value->grad_year;?>" placeholder="YEARS">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name='grad_board'  value="<?php echo $value->grad_board;?>" placeholder="BOARD/UNIVERSITY">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="texttext" class="form-control" name="grad_division"  value="<?php echo $value->grad_division;?>" placeholder="DIVISION">
                            </div>                                  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="texttext" class="form-control" name="grad_percentage"  value="<?php echo $value->grad_percentage;?>" placeholder="PERCENTAGE">
                            </div>                                  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="texttext" class="form-control" name="grad_subject"  value="<?php echo $value->grad_subject;?>" placeholder="SUBJECTS">
                            </div>                                  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp; Post Graduation</label>
                                <input type="text" class="form-control" name='post_grad_year'  value="<?php echo $value->post_grad_year;?>" placeholder="YEARS">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name='post_grad_board'  value="<?php echo $value->post_grad_board;?>" placeholder="BOARD/UNIVERSITY">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="post_grad_division"  value="<?php echo $value->post_grad_division;?>" placeholder="DIVISION">
                            </div>                                  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="post_grad_percentage"  value="<?php echo $value->post_grad_percentage;?>" placeholder="PERCENTAGE">
                            </div>                                  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="post_grad_subject"  value="<?php echo $value->post_grad_subject;?>" placeholder="SUBJECTS">
                            </div>                                  
                        </div>
                    </div>

                    <div class="row" id="b_ed" style="display: none">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp; B.Ed/B.P.Ed/M.P.Ed</label>
                                <input type="text" class="form-control" name='bed_year'  value="<?php echo $value->bed_year;?>" placeholder="YEARS">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name='bed_board'  value="<?php echo $value->bed_board;?>" placeholder="BOARD/UNIVERSITY">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="bed_division"  value="<?php echo $value->bed_division;?>" placeholder="DIVISION">
                            </div>                                  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="bed_percentage"  value="<?php echo $value->bed_percentage;?>" placeholder="PERCENTAGE">
                            </div>                                  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="bed_subject"  value="<?php echo $value->bed_subject;?>" placeholder="SUBJECTS">
                            </div>                                  
                        </div>
                    </div>
                    
                    <div class="row" id="ctet"  style="display: none">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp; CTET/STET</label>
                                <input type="text" class="form-control" name='ctet_year'   value="<?php echo $value->ctet_year;?>" placeholder="YEARS">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name='ctet_board'  value="<?php echo $value->ctet_board;?>" placeholder="BOARD/UNIVERSITY">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="ctet_division"   value="<?php echo $value->ctet_division;?>" placeholder="DIVISION">
                            </div>                                  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="ctet_percentage"   value="<?php echo $value->ctet_percentage;?>" placeholder="PERCENTAGE">
                            </div>                                  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="ctet_subject"  value="<?php echo $value->ctet_subject;?>" placeholder="SUBJECTS">
                            </div>                                  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp; Any Other</label>
                                <input type="text" class="form-control" name='other_year'  value="<?php echo $value->other_year;?>" placeholder="YEARS">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name='other_board'  value="<?php echo $value->other_board;?>" placeholder="BOARD/UNIVERSITY">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="other_division"  value="<?php echo $value->other_division;?>" placeholder="DIVISION">
                            </div>                                  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="other_percentage"  value="<?php echo $value->other_percentage;?>" placeholder="PERCENTAGE">
                            </div>                                  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;</label>
                                <input type="text" class="form-control" name="other_subject"   value="<?php echo $value->other_subject;?>" placeholder="SUBJECTS">
                            </div>                                  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><span style="color:red">*</span>&nbsp;Computer Knowledge</label>
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
                            <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleFormControlInput1"><span style="color:red">*</span>&nbsp;Presently Employed :</label>
                                <br>&nbsp;&nbsp;
                                <label style="margin-left: 10px;"><input class="form-check-input" type="radio" name='present_emp' value="YES">YES</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label><input class="form-check-input" type="radio" name='present_emp'  value="<?php echo $value->present_emp;?>" value="NO">NO</label>                                   
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>Place where now Working:</label>
                                <input type="text" class="form-control" name="place_work"   value="<?php echo $value->place_work;?>" placeholder="PLACE WHERE NOW WORKING">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><span style="color:red">*</span>Experience</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="exp_name" class="form-control"  value="<?php echo $value->exp_name;?>" placeholder="YEARS">
                                    </div>
                                    <div class="col">
                                      <input type="text" name="exp_months" class="form-control"  value="<?php echo $value->exp_months;?>" placeholder="MONTHS">
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Pay Drawn(consolidated)</label>
                            <input type="text" class="form-control" name="last_pay" id="last_pay"  value="<?php echo $value->last_pay;?>" placeholder="LAST PAY DRAWN(CONSOLIDATED)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>CTC :</label>
                            <input type="text" class="form-control" name="ctc" id="ctc"  value="<?php echo $value->ctc;?>" placeholder="CTC">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><span style="color:red">*</span>&nbsp;PHOTO :(RECENT PHOTO)</label>
                            <input type="file" required name='img'  id="choose_photo_btn" class="custom-file-input"  value="<?php echo $value->img;?>">
                            <figcaption style="color:#000;font-size:13px;">
                                The image file should be JPG or JPEG format<br>
                                Size of file should be between 100kb – 150kb.
                            </figcaption>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img id="blah" src="#"  style="width: 85px;height: 85px;border:1px solid #ccc" />
                    </div>
                </div>
            </section>
        </div>
    </div>
    <input name="agree" required="" id="planned_checked" type="checkbox"><span> &nbsp; &nbsp;&nbsp;I declare that the information given above is true to be best of my knowledge and belief and nothing concealed thereof.</span>
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <input type="submit" id="subm"  value="SAVE & NEXT" class="btn btn-success" style="margin: 18px 20px 20px 20px!important;height: 33px; width: 75%;">
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
        fname: {
            required: true,
        },
        lname: {
            required: true,
        },
         dob: {
            required: true,
            date: true,
        }, 
        fathername: {
            required: true,           
        },
        father_lname: {
            required: true,           
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
        },
        religion: {
            required: true,            
        },
        cat: {
            required: true,            
        },
         tongue: {          
            required: true,
           
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
        img:{
            required: true, 
        },

    }
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#choose_photo_btn").change(function() {
  readURL(this);
});
</script>