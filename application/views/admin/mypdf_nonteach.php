<?php  ini_set("memory_limit","-1"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Teaching</title>
</head>
<body>

<cenetr><h4><?php echo $page_title;?></h4></cenetr>
<table style="border:1px solid black;width:100%;font-size:13px;">
	<tr>

		<th style="text-align:left;">Form No</th>		
		<th style="text-align:left;">Application No.</th>
		<th style="text-align:left;">Post</th>
		<th style="text-align:left;">Name</th>
		<th style="text-align:left;">Email</th>
		<th style="text-align:left;">Mobile</th>
		<th style="text-align:left;">DOB</th>
	</tr>
	
			<?php foreach($records as $rec){ ?>
			<tr>
				<td style="text-align:left;"><?php echo $rec->form_no; ?></td>
				<td style="text-align:left;"><?php echo $rec->sub_form_no; ?></td>
				<td style="text-align:left;"><?php echo $rec->non_teaching; ?></td>
				<td style="text-align:left;"><?php echo $rec->fname; ?>&nbsp;<?php echo $rec->lname; ?>&nbsp;<?php echo $rec->mname; ?></td>
				<td style="text-align:left;"><?php echo $rec->email; ?></td>
				<td style="text-align:left;"><?php echo $rec->mobile; ?></td>
				<td style="text-align:left;"><?php echo $rec->dob; ?></td>
			</tr>
			<?php } ?>

</table>
</body>
</html>