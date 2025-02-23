<!DOCTYPE html>
<html lang="en">
<head>
  <title>Application Form</title>
<style>
table, th, td {
  border: 1px solid black;
   border-collapse: collapse;
}
.im{
width:150px;	
}
</style>
</head>
<body >
  <?php foreach($data as $value){
    // print_r($value);
  }?>
  <header class="clearfix">
    <div id="logo">
     <center>  <img src="assets/images/LOGO.png"><br> </center>
      <br/>
      <div id="project">
        <center><h4>  DAV PUBLIC  SCHOOLS, JHARKHAND ZONE-D</h4></center> 
      </div>
    </div>
   <center> <h4>Admit Card</h4></center>
    <div id="company" class="clearfix pull-right"> 
      Date : <?php echo $value->date_app;?><br><br>
    </div>
  </header> 
<table width="100%">
<h4 style="color:red"> NOTE:-Candidate should bring the hard copies of the admit card, filled-up application form & Payment Slip
Candidate should also bring his/her Adhar card and  all testimonial  in original for verification.  </h4>
<br>
<br>
<br><br>
<br>
<br>
<div style="margin-top:60px;"><c><b>Document Verified By</b></c> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<c><b>Invigilator Signature</b></c> </div>

 <tr>

<td style="">Enrollment No.</td>
<td> </td>
<td>Application No</td>
<td> <?php echo $value->sub_form_no;?></td>

<td rowspan="6" class="im" valign="top">
  <img src="uploads/images/<?php echo $value->uploads;?>" class="img-responsive" style="height:150px;width:150px;border:0px solid">
</td>
</tr>
  <tr>
<td style="padding:5px;">Name of Candidate</td>
<td colspan="3"><?php echo $value->fname;?>&nbsp;<?php echo $value->mname;?>&nbsp;<?php echo $value->lname;?></td>
</tr>
<tr>
  <td style="padding:5px;">Father Name</td>
  <td colspan="3"><?php echo $value->fathername;?>&nbsp;<?php echo $value->father_mname;?>&nbsp;<?php echo $value->father_lname;?></td>
</tr>
<!-- <tr>
<td>Mother Name</td>
<td colspan="3"><?php echo $value->mothername;?></td>
</tr> -->
<tr>
<td style="padding:5px;">Date of Birth</td>
<td><?php echo $value->dob;?></td>
<td style="padding:5px;">Gender</td>
<td style="padding:5px;"><?php echo $value->gender;?></td>
</tr>
<tr>
<td style="padding:5px;">Category</td>
<td style="padding:5px;"><?php echo $value->cat;?></td>
<td style="padding:5px;">Applied For</td>
<td ><?php echo $value->teaching_cat;?></td>
</tr>
<tr>
<td style="padding:5px;">Post</td>
<td><?php echo $value->teaching_post;?> <?php echo $value->non_teaching;?></td>
<?php 
if(($value->teaching_cat)=='NON-TEACHING'){?> 
  <td></td>
<td></td>
<?php }else { ?>
<td>Subject</td>
<td><?php echo $value->pgt_teaching;?> <?php echo $value->tgt_teaching;?> <?php echo $value->prt_teaching;?> <?php echo $value->nursury_sub;?></td>
<?php } ?>

</tr>

<tr>
<td style="padding:5px;">Aadhaar No</td>
<td colspan="3"><?php echo $value->aadhar;?></td>
<td rowspan="2" class="im" valign="top">
  <img src="uploads/otherdoc_second/<?php echo $value->other_final_sec;?>" class="img-responsive" style="height:40px;width:150px;border:0px solid">
</td>
</tr>
<tr rowspan="1" style="width:90px">

<td> Test  Center:</td>

 <td colspan="3"> 
     <?php 
     if($value->job_center1=='KARANPURA TANDWA'){ ?>
        23/02/2020 at 10:00  DAV Public School, Hazaribag
    <?php }
     else {?>
      01/03/2020 (Sunday) at 09:00 Agrasen DAV Public School, Bharechnagar
     <?php } ?>
      
 
  
</td>



</tr>

   

</table>



</body>





</html>