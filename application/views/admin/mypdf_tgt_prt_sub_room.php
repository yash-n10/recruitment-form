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

<table  style="width:100%;font-size:13px;">
	<tr>

		<th style="text-align:left;">Form No</th>
		<th style="text-align:left;">Name</th>
	</tr>	
			<?php 
			$i=1;
			foreach($records as $rec){ ?>
			<tr style="height: 20px!important">
				
				<td style="text-align:left;"><?php echo $rec->form_no; ?></td>
				<td style="text-align:left;"><?php echo $rec->fname; ?> <?php echo $rec->mname; ?> <?php echo $rec->lname; ?></td>
				
			</tr>
			<?php $i++;} ?>
		
</table>



</body>
</html>
