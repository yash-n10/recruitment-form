<!DOCTYPE html>
<html lang="en">
<head>
  <title>Application Form</title>
  <style type="text/css">
  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  a {
    color: #5D6975;
    text-decoration: underline;
  }
  body {
    position: relative;
    width: 21cm;  
    height: 29.7cm; 
    margin: 0 auto; 
    color: #001028;
    background: #FFFFFF; 
    font-family: "open sans",Arial; 
    font-size: 12px; 
    /*font-family: Arial;*/
  }



  header {

    padding: 10px 0;

    margin-bottom: 30px;

  }
  #logo {
    text-align: center;
    margin-bottom: 10px;
  }
  #logo img {
    width: 100px;
    /*margin-left:40px;*/
  }
  h1 {
    border-top: 1px solid  #5D6975;
    border-bottom: 1px solid  #5D6975;
    color: #5D6975;
    font-size: 1.4em;
    line-height: 1.4em;
    font-weight: normal;
    text-align: center;
    margin: 40px 0 20px 0;
    background: url(dimension.png);
  }

/*#project {

  float: left;

  }*/
  #project span {
    color: #5D6975;
    text-align: right;
    width: 52px;
    margin-right: 10px;
    display: inline-block;
    font-size: 0.8em;
  }
  #company {
    float: right;
    text-align: right;
  }

  #project div,
  #company div {
    white-space: nowrap;  
  }
  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }
  table tr:nth-child(2n-1) td {
    background: #F5F5F5;
  }
  table td:nth-child(2n-1) td {
    background: #F5F5F5;
  }
  table th,
  table td {
    text-align: left;
  } 
  table th .mi {
    text-align: center;
    font-size: 18px;
  }
  table th {
    padding: 5px 0px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap;
    font-weight: bold;
  }
  table .service,
  table .desc {
    text-align: left;
  }
  table td {
    padding: 5px 0px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap; 
    font-weight: bold;
  }



  table td.service,

  table td.desc {

    vertical-align: top;

  }





  #notices .notice {

    color: #5D6975;

    font-size: 1.2em;

  }



  footer {

    color: #5D6975;

    width: 100%;

    height: 30px;

    position: absolute;

    bottom: 0;

    border-top: 1px solid #C1CED9;

    padding: 8px 0;

    text-align: center;

  }



</style>



</head>

<body style="width:100%;">

  <?php foreach($data as $value){

    //print_r($value);

  }?>



  <header class="clearfix">

    <div id="logo">

      <img src="assets/images/LOGO.png"><br>

      <br/>

      <div id="project">

        <div><c style="font-size:18px;font-weight:bold;"> DAV PUBLIC  SCHOOLS</c></div>

        <div><c style="font-size:16px;">JHARKHAND ZONE-D</c></div>



      </div>

    </div>

    <h1>ONLINE APPLICATION FORM for Recuritment of Teaching/Non-Teaching Staff</h1>





    <div id="company" class="clearfix pull-right">
      Date : <?php echo $value->date_app;?><br><br>
    </div> 
  </header>
  <table class="table table-bordered">
   
    <tr>
      <th>Application No.</th>
      <td> <?php echo $value->sub_form_no;?></td>
    </tr>
     <tr>
      <th>Enrollment No </th>
      <td></td>
    </tr>
    <tr>
      <th>Category</th>
      <td><?php echo $value->teaching_cat;?></td>
    </tr>
    <tr>
      <th>Post</th>
      <td><?php echo $value->teaching_post;?> <?php echo $value->non_teaching;?></td>
    </tr>
    <tr>
      <th>Name of the Candidate</th>
      <td><?php echo $value->fname;?>&nbsp;<?php echo $value->mname;?>&nbsp;<?php echo $value->lname;?></td>
    </tr>
    <tr>
      <th>Father Name</th>
      <td><?php echo $value->fathername;?>&nbsp;<?php echo $value->father_mname;?>&nbsp;<?php echo $value->father_lname;?></td>
    </tr>
    <tr>
      <th>Husband/wife Name</th>
      <td><?php echo $value->hus_wife_name;?>&nbsp;<?php echo $value->hus_wife_mname;?>&nbsp;<?php echo $value->hus_wife_lname;?></td>
    </tr>
    <tr>
      <th>Image</th>
      <td><img src="uploads/images/<?php echo $value->uploads;?>" class="img-responsive" style="height:120px;width:120px" alt="image"></td>
    </tr>
    <tr>
     <th>Date of Birth</th>
     <td><?php echo $value->dob;?></td>
   </tr>
   <tr>
     <th>Email</th>
     <td><?php echo $value->email;?></td>
   </tr>
   <tr>
     <th>Caste</th>
     <td><?php echo $value->cat;?></td>
   </tr>
   <tr>
     <th>Religion</th>
     <td><?php echo $value->religion;?></td>
   </tr>
   <tr>
     <th>Gender</th>
     <td><?php echo $value->gender;?></td>
   </tr>
   <tr>
     <th>Marital Status</th>
     <td><?php echo $value->marital;?></td>
   </tr>
   <tr>
     <th colspan="2" class="mi">Permanent Address</th>
   </tr>
   <tr>
     <th>Address</th>
     <td><?php echo $value->permanent_address;?></td>
   </tr>
   <tr>
     <th>Post Office</th>
     <td><?php echo $value->permanent_postoffice;?></td>
   </tr>
   <tr>
     <th>State</th>
     <td><?php echo $value->permanent_state;?></td>
   </tr>
   <tr>
     <th>District</th>
     <td><?php echo $value->permanent_district;?></td>
   </tr>
   <tr>
     <th>City</th>
     <td><?php echo $value->permanent_city;?></td>
   </tr>
   <tr>
     <th>Pin Code</th>
     <td><?php echo $value->permanent_pin;?></td>
   </tr>
   <tr>
     <th colspan="2"  class="mi">Present Address</th>
   </tr>
   <tr>
     <th>Address</th>
     <td><?php echo $value->present_address;?></td>
   </tr>
   <tr>
     <th>Post Office</th>
     <td><?php echo $value->present_postoffice;?></td>
   </tr>
   <tr>
     <th>State</th>
     <td><?php echo $value->present_state;?></td>
   </tr>
   <tr>
     <th>District</th>
     <td><?php echo $value->present_district;?></td>
   </tr>
   <tr>
     <th>City</th>
     <td><?php echo $value->present_city;?></td>
   </tr>
   <tr>
     <th>Pin Code</th>
     <td><?php echo $value->present_pin;?></td>
   </tr>
   <tr>
     <th>UID</th>
     <td><?php echo $value->aadhar;?></td>
   </tr>
 </table>

 <table class="table table-bordered">

  <tr>

   <th colspan="6"  class="mi">Qualification</th>

 </tr>



 <tr>

  <th></th>

  <th>Year</th>

  <th>Board</th>

  <th>Division</th>

  <th>Percentage</th>

  <th>Subject</th>

</tr>

<tr>

 <td>Matriculation</td>

 <th><?php echo $value->mat_year;?></th>

 <th><?php echo $value->mat_board;?></th>

 <th><?php echo $value->mat_division;?></th>

 <th><?php echo $value->mat_percentage;?></th>

 <th><?php echo $value->mat_subject;?></th>

</tr>

<tr>

 <td>Inter</td>

 <th><?php echo $value->inter_year;?></th>

 <th><?php echo $value->inter_board;?></th>

 <th><?php echo $value->inter_division;?></th>

 <th><?php echo $value->inter_percentage;?></th>

 <th><?php echo $value->inter_subject;?></th>

</tr>

<tr>

 <td>Graduation</td>

 <th><?php echo $value->grad_year;?></th>

 <th><?php echo $value->grad_board;?></th>

 <th><?php echo $value->grad_division;?></th>

 <th><?php echo $value->grad_percentage;?></th>

 <th><?php echo $value->grad_subject;?></th>

</tr>

<tr>

 <td>Post Graduation</td>

 <th><?php echo $value->post_grad_year;?></th>

 <th><?php echo $value->post_grad_board;?></th>

 <th><?php echo $value->post_grad_division;?></th>

 <th><?php echo $value->post_grad_percentage;?></th>

 <th><?php echo $value->post_grad_subject;?></th>

</tr>

<tr>

 <td>B.Ed/B.P.Ed/M.P.Ed</td>

 <th><?php echo $value->bed_year;?></th>

 <th><?php echo $value->bed_board;?></th>

 <th><?php echo $value->bed_division;?></th>

 <th><?php echo $value->bed_percentage;?></th>

 <th><?php echo $value->bed_subject;?></th>

</tr>

<tr>

 <td>CTET/STET</td>

 <th><?php echo $value->ctet_year;?></th>

 <th><?php echo $value->ctet_board;?></th>

 <th><?php echo $value->ctet_division;?></th>

 <th><?php echo $value->ctet_percentage;?></th>

 <th><?php echo $value->ctet_subject;?></th>

</tr>

<tr>

 <td>Any Other</td>

 <th><?php echo $value->other_year;?></th>

 <th><?php echo $value->other_board;?></th>

 <th><?php echo $value->other_division;?></th>

 <th><?php echo $value->other_percentage;?></th>

 <th><?php echo $value->other_subject;?></th>

</tr>



</table>



<table class="table table-bordered">

  <tr>

   <th colspan="2"  class="mi">Other Details</th>

 </tr>

 <tr>

   <th>Computer Knowledge</th>

   <td><?php echo $value->comp;?></td>

 </tr>







 <tr>

  <th>Presently Employed</th>

  <td><?php echo $value->present_emp;?></td>

</tr>

<tr>

 <th>School & Place where now Working</th>

 <td><?php echo $value->place_work;?></td>

</tr>



<tr>

 <th>Experience</th>

 <td><?php echo $value->exp_name;?>Years <?php echo $value->exp_months;?>Months</td>

</tr>



<tr>

 <th>Last Pay Drawn(consolidated) </th>

 <td><?php echo $value->last_pay;?></td>

</tr>



<tr>

 <th>Current CTC</th>

 <td><?php echo $value->ctc;?></td>

</tr>
<tr>
 <th>Job location (1)</th>
 <td><?php echo $value->job_center1;?></td>
</tr>
<tr>
 <th>Job location (2)</th>
 <td><?php echo $value->job_center2;?></td>
</tr>





</table>

<table style="background-color: white!important;border:0px solid!important" >
<tr style="background-color: white!important;border:0px solid!important" >
  <td colspan="4" style="background-color: white!important;border:0px solid!important" ><p style="text-align: justify;font-size:11px;"> I <?php echo $value->fname;?>&nbsp;<?php echo $value->mname;?>&nbsp;<?php echo $value->lname;?> hereby declare that the information given in this application is true and correct to the best of my knowledge and belief.</p></tr>
<!-- <c>  
  I <?php echo $value->fname;?>&nbsp;<?php echo $value->mname;?>&nbsp;<?php echo $value->lname;?> hereby declare that the information given in this application is true and correct to the best of my knowledge and belief. </c> -->


</td>
<tr style="background-color: white!important;border:0px solid!important" >
  <td colspan="4" align="right" style="background-color: white!important" >
  <c align="right">
  <img src="uploads/otherdoc_second/<?php echo $value->other_final_sec;?>" class="img-responsive" style="height:30px;width:90px;border:0px solid"></c>
</td>
</tr>

</table>


</body>

</html>