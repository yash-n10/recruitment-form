<?php  ini_set("memory_limit","-1"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Teaching</title>
	<style>
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		  height:8px;
		}
		#company {
    float: right;
    text-align: right;
  }
	</style>
</head>
<body>	

<table  style="width:100%;font-size:10px;">
	<tr>

		<th style="text-align:left;width:5%;text-transform:uppercase;">Sl. No</th>
		<th style="text-align:left;width:10%;text-transform:uppercase;">Enrollment. No</th>
		<th style="text-align:left;text-transform:uppercase;">Application No</th>
		<th style="text-align:left;text-transform:uppercase;">Name of Candidate</th>
		<th style="text-align:left;text-transform:uppercase;">Mobile</th>
		<th style="text-align:left;text-transform:uppercase;">Email</th>
		<th style="text-align:left;width:8%;text-transform:uppercase;">Images</th>
		<th style="text-align:left;width:13%;text-transform:uppercase;">Signature</th>
		<th style="text-align:left;width:13%;text-transform:uppercase;">Signature</th>
	</tr>	
			<?php 
			$i=1;
			foreach($records as $rec){ ?>
			<tr style="height: 20px!important">
				
				<td style="text-align:left;width:5%"><?php echo $i; ?></td>	
				<td style="text-align:left;width:10%"></td>	
				<td style="text-align:left;"><?php echo $rec->sub_form_no; ?></td>
				<td style="text-align:left;"><?php echo $rec->fname; ?> <?php echo $rec->mname; ?> <?php echo $rec->lname; ?></td>
			
				<td style="text-align:left;"><?php echo $rec->mobile; ?></td>
				<td style="text-align:left;"><?php echo $rec->email; ?></td>
				<td style="text-align:center;width:8%"><img src="<?php echo base_url();?>uploads/images/<?php echo $rec->uploads; ?>" style="width:40px;height:40px;"></td>
				
				 <td style="text-align:left;width:13%"><img src="<?php echo base_url();?>uploads/otherdoc_second/<?php echo $rec->other_final_sec; ?>" style="width:80px;height:40px;"></td> 
				 <td style="text-align:left;width:13%"></td> 
				
			</tr>
			<?php $i++;} ?>
		
</table>



</body>
</html>
