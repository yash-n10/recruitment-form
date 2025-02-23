<style>
	table td, .table th {
		padding: .15rem!important;   
	}
	.tables_borders{
		border:2px solid #ccc;
	}
</style>
<div class="main-body">
	<div class="page-wrapper">
		<div class="page-body">
				<div class="row">				
				<div class="col-xl-2 col-md-6">
					<div class="card bg-c-yellow update-card">
						<div class="card-block" style="padding: 0.45rem;">
							<div class="row align-items-end">
								<div class="col-8">
									<?php foreach ($registercount as $registercountval){
										?>
										<h5><?php echo $registercountval->cnt; ?></h5>
									<?php } ?>
									<h6 class="text-white">Users</h6>
								</div>
								<div class="col-4 text-right">
									<canvas id="update-chart-1" height="50"></canvas>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="col-xl-2 col-md-6">

					<?php
					$period = new DatePeriod(
						new DateTime('2019-02-10'),
						new DateInterval('P1D'),
						new DateTime('2019-02-25')
					);
					$amtdate= $this->db->query("SELECT DATE_FORMAT(payment_date, '%Y-%m-%d') AS payment_date FROM adm_transaction_zoned")->result();
					foreach ($amtdate as $key => $val) {                  
					}
					?>					
					<div class="card bg-c-green update-card">
						<div class="card-block" style="padding: 0.45rem;">
							<div class="row align-items-end">
								<div class="col-12">
									<?php foreach ($queryy as $value){
										?>
										<h3><?php echo $value->cnt; ?></h3>
									<?php } ?>
									<h6 class="text-white m-b-0">Total Applications</h6>
								</div>								
							</div>
						</div>

					</div>
				</div>
				<div class="col-xl-2 col-md-6">
					<div class="card bg-c-pink update-card">
						<div class="card-block" style="padding: 0.45rem;">
							<div class="row align-items-end">
								<div class="col-12">
									<!-- <h4 class="text-white">145</h4> -->
									<?php foreach ($paymentquery as $paymentqueryval){
										?>
										<h3><?php echo $paymentqueryval->cnt; ?></h3>
									<?php } ?>
									<h6 class="text-white m-b-0">Total Payment</h6>
								</div>								
							</div>
						</div>

					</div>
				</div>
				<div class="col-xl-2 col-md-6">
					<div class="card bg-c-lite-green update-card">
						<div class="card-block" style="padding: 0.45rem;">
							<div class="row align-items-end">
								<div class="col-12">
									<!-- <h4 class="text-white">500</h4>-->
									<?php
									foreach ($paymentapplication as $values){
										?>
										<h3><?php echo $values->cnt; ?></h3>
									<?php } ?>
									<h6 class="text-white m-b-0">Paid Applications</h6>
								</div>

							</div>
						</div>

					</div>
				</div>
			

			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h4>Teaching</h4>          
						<table class="table table-condensed tables_borders">
							<thead>
								<tr>
									<th colspan="3">Post</th>
									<th>Count</th>
									<th>Export</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="3">Teaching</td>
									<?php foreach ($teachingcount as $teachcnt){ ?>
										<td><?php echo $teachcnt->cnt; ?> 
										</td> <?php } ?>
										
										<td>
											<a href="<?php echo base_url();?>Admin/mypdfteach/TEACHING" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a>
										</td>
									</tr>
									<tr>
										<td colspan="3">TGT</td>
										<?php foreach ($teachingTGTcount as $tgtcnt){
											?>
											<td><?php echo $tgtcnt->cnt; ?></td> <?php } ?>											
											<td>
												<a href="<?php echo base_url();?>Admin/mypdfteach_tgt_prt/TGT_PRT" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr>
										<tr>
										<td colspan="3">PRT</td>
										<?php foreach ($teachingPRTcount as $prtcnt){
											?>
											<td><?php echo $prtcnt->cnt; ?></td> <?php } ?>											
											<td>
												<a href="<?php echo base_url();?>Admin/mypdfteach_tgt_prt/TGT_PRT" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr>
										<tr>
											<td colspan="3">PGT</td>
											<?php foreach ($teachingPGTcount as $pgtcnt){
												?>      
												<td><?php echo $pgtcnt->cnt; ?></td>
											<?php } ?>
											<td>
												<a href="<?php echo base_url();?>Admin/mypdfteach_post/PGT" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a>
												</a>
											</td>
										</tr>
										<tr>
											<td colspan="3">NURSERY</td>
											<?php foreach ($teachingNurserycount as $nurcnt){
												?>

												<td><?php echo $nurcnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_post_sheet/NURSERY" title="Sheet" target='_blank'><i class="fa fa fa-print" aria-hidden="true" style="color:#404e67" ></i></a>

											</td>
										</tr>
									</tbody>
								</table>
								<table class="table table-condensed tables_borders">
									<thead>
										<tr>
											<th>Post</th>
											<th>Subject</th>
											<th>Count</th>
											<th>Export</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>PGT</td>
											<td>ENGLISH</td>
											<?php foreach ($pgt_eng_count as $pgt_engcnt){?>
												<td><?php echo $pgt_engcnt->cnt; ?></td>
											<?php } ?>
											<td>
												<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/ENGLISH" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67" target='_blank'></i></a>
											</td>
										</tr>
										<tr>
											<td>PGT</td>
											<td>MATHS</td>
											<?php foreach ($pgt_mth_count as $pgt_mthcnt){?>
												<td><?php echo $pgt_mthcnt->cnt; ?></td>
											<?php } ?>
											<td>
												<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/MATHS" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67" target='_blank'></i></a>
											</td>
										</tr>
										<tr>
											<td>PGT</td>
											<td>PHYSICS</td>
											<?php foreach ($pgt_phy_count as $pgt_phycnt){?>
												<td><?php echo $pgt_phycnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/PHYSICS" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>

										<tr>
											<td>PGT</td>
											<td>CHEMISTRY</td>
											<?php foreach ($pgt_chm_count as $pgt_chmcnt){?>
												<td><?php echo $pgt_chmcnt->cnt; ?></td>
											<?php } ?>
											<td>										
											<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/CHEMISTRY" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
										<tr>
											<td>PGT</td>
											<td>BIOLOGY</td>
											<?php foreach ($pgt_bio_count as $pgt_biocnt){?>
												<td><?php echo $pgt_biocnt->cnt; ?></td>
											<?php } ?>
											<td>											
											<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/BIOLOGY" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
											</td>
										</tr>
										<tr>
											<td>PGT</td>
											<td>HISTORY</td>
											<?php foreach ($pgt_his_count as $pgt_hiscnt){?>
												<td><?php echo $pgt_hiscnt->cnt; ?></td>
											<?php } ?>
											<td>											
											<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/HISTORY" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr> 
										<tr>
											<td>PGT</td>
											<td>ECONOMICS</td>
											<?php foreach ($pgt_eco_count as $pgt_ecocnt){?>
												<td><?php echo $pgt_ecocnt->cnt; ?></td>
											<?php } ?>
											<td>											
											<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/ECONOMICS" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
											</td>
										</tr> 
										
										<tr>
											<td>PGT</td>
											<td>COMMERCE</td>
											<?php foreach ($pgt_comm_count as $pgt_commcnt){?>
												<td><?php echo $pgt_commcnt->cnt; ?></td>
											<?php } ?>
											<td>											
											<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/COMMERCE" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
											</td>
										</tr>
										<tr>
											<td>PGT</td>
											<td>COMPUTER SCIENCE</td>
											<?php foreach ($pgt_cse_count as $pgt_csecnt){?>
												<td><?php echo $pgt_csecnt->cnt; ?></td>
											<?php } ?>
											<td>
											
											<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/COMPUTER-SCIENCE" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>

										<tr>
											<td>PGT</td>
											<td>PHYSICAL EDUCATION</td>
											<?php foreach ($pgt_phy_edu_count as $pgt_phy_educnt){?>
												<td><?php echo $pgt_phy_educnt->cnt; ?></td>
											<?php } ?>
											<td>											
												<a href="<?php echo base_url();?>Attendance/mypdfteach_pgt_sub_sheet/PHYSICAL_EDUCATION" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
											</td>
										</tr>
									
										
									</tbody>
								</table>
								<table class="table table-condensed tables_borders">
									<thead>
										<tr>
											<th>Post</th>
											<th>Subject</th>
											<th>Count</th>
											<th>Export</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>TGT</td>
											<td>ENGLISH</td>
											<?php foreach ($tgt_eng_count as $tgt_engcnt){?>
												<td><?php echo $tgt_engcnt->cnt; ?></td>
											<?php } ?>
											<td>
												<!-- <a href="<?php echo base_url();?>exportcsv_tgt_eng" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp;
											<a href="<?php echo base_url();?>Admin/mypdfteach_tgt_pgt_sub/ENGLISH" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_room/ENGLISH" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a> -->
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_sheet/ENGLISH" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
										
										<tr>
											<td>TGT</td>
											<td>MATHS</td>
											<?php foreach ($tgt_mat_count as $tgt_matcnt){?>
												<td><?php echo $tgt_matcnt->cnt; ?></td>
											<?php } ?>
											<td>
										<!-- 	<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_room/MATHS" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a> -->
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_sheet/MATHS" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
										<tr>
											<td>TGT</td>
											<td>HINDI</td>
											<?php foreach ($tgt_hin_count as $tgt_hincnt){?>
												<td><?php echo $tgt_hincnt->cnt; ?></td>
											<?php } ?>
											<td>
											<!-- <a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_room/HINDI" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a> -->
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_sheet/HINDI" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr> 
										
										<tr>
											<td>TGT</td>
											<td>SCIENCE</td>
											<?php foreach ($tgt_sci_count as $tgt_scicnt){?>
												<td><?php echo $tgt_scicnt->cnt; ?></td>
											<?php } ?>
											<td>
										<!-- 	<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_room/SCIENCE" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a> -->
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_sheet/SCIENCE" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>										
										<tr>
											<td>TGT</td>
											<td>SOCIAL SCIENCE</td>
											<?php foreach ($tgt_socsci_count as $tgt_socscicnt){?>
												<td><?php echo $tgt_socscicnt->cnt; ?></td>
											<?php } ?>
											<td>
											<!-- <a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_room/SOCIAL-SCIENCE" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a> -->
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_sheet/SOCIAL-SCIENCE" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
										<tr>
											<td>TGT</td>
											<td>SANSKRIT</td>
											<?php foreach ($tgt_sans_count as $tgt_sanscnt){?>
												<td><?php echo $tgt_sanscnt->cnt; ?></td>
											<?php } ?>
											<td>
										<!-- 	<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_room/SANSKRIT" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a> -->
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_sheet/SANSKRIT" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
										<tr>
											<td>TGT</td>
											<td>COMPUTER SCIENCE</td>
											<?php foreach ($tgt_comp_sci_count as $tgt_compscicnt){?>
												<td><?php echo $tgt_compscicnt->cnt; ?></td>
											<?php } ?>

											<td>
											<!-- <a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_room/COMPUTER-SCIENCE" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a> -->
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_sheet/COMPUTER-SCIENCE" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr> 
									
										<tr>
											<td>TGT</td>
											<td>FINE ARTS</td>
											<?php foreach ($tgt_finearts_count as $tgt_fineartscnt){?>
												<td><?php echo $tgt_fineartscnt->cnt; ?></td>
											<?php } ?>
											<td>
											<!-- <a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_room/FINE-ARTS" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a> -->
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_sheet/FINE-ARTS" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr> 
										<tr>
											<td>TGT</td>
											<td>PHYSICAL EDUCATION</td>
											<?php foreach ($tgt_phyedu_count as $tgt_phyeducnt){?>
												<td><?php echo $tgt_phyeducnt->cnt; ?></td>
											<?php } ?>
											<td>
											<!-- <a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_room/PHYSICAL-EDUCATION" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a> -->
											<a href="<?php echo base_url();?>Attendance/mypdfteach_tgt_sub_sheet/PHYSICAL_EDUCATION" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="col-sm-6">
								<h4>Non-Teaching</h4>       
								<table class="table table-condensed tables_borders">
									<thead>
										<tr>
											<th>Post</th>
											<th>Count</th>
											<th>Export</th>
										</tr>
									</thead>
									<tbody>
										<tr>
	                                        <td>Non Teaching</td>
	                                        <?php foreach ($nonteachingcount as $nonteachcnt){ ?>
	                                        <td><?php echo $nonteachcnt->cnt; ?> 
	                                                                 
	                                        </td> <?php } ?>
	                                        <td>
	                                        	<!-- <a href="<?php echo base_url();?>exportcsv_non_teaching" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a> -->
	                                        	&nbsp;&nbsp;
												<a href="<?php echo base_url();?>Admin/mypdfteach/NON-TEACHING" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
	                                      </tr>
										<tr>
											<td>LDC</td>
											 <?php foreach ($nonteaching_ldc_count as $nonteach_ldc_cnt){ ?>
	                                        <td><?php echo $nonteach_ldc_cnt->cnt; ?> 
	                                                                 
	                                        </td> <?php } ?>
	                                        <td>
	                                        	<!-- <a href="<?php echo base_url();?>exportcsv_non_teaching_ldc" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp; -->

												<a href="<?php echo base_url();?>Attendance/mypdfteach_nonteach_post_sheet/LDC" title="Pdf" target="blank"><i class="fa fa fa-book" aria-hidden="true" style="color:#404e67" target='_blank'></i></a></td>
										</tr>
										<tr>
											<td>UDC</td>
											 <?php foreach ($nonteaching_udc_count as $nonteach_udc_cnt){ ?>
	                                        <td><?php echo $nonteach_udc_cnt->cnt; ?> 
	                                                                 
	                                        </td> <?php } ?>
	                                        <td>
	                                        <!-- 	<a href="<?php echo base_url();?>exportcsv_non_teaching_udc" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp; -->
												<a href="<?php echo base_url();?>Admin/mypdfteach_nonteach_post/UDC" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr>
										<tr>
											<td>ASSISTANT</td>
											 <?php foreach ($nonteaching_assis_count as $nonteach_assis_cnt){ ?>
	                                        <td><?php echo $nonteach_assis_cnt->cnt; ?> 
	                                                                 
	                                        </td> <?php } ?>
	                                        <td>
	                                        <!-- 	<a href="<?php echo base_url();?>exportcsv_non_teaching_assist" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp; -->
												<a href="<?php echo base_url();?>Admin/mypdfteach_nonteach_post/ASSISTANT" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr>
										<!-- <tr>
											<td>OFFICE SUPERINTENDENT</td>
											 <?php foreach ($nonteaching_off_super_count as $nonteach_off_super_cnt){ ?>
	                                        <td><?php echo $nonteach_off_super_cnt->cnt; ?> 
	                                                                 
	                                        </td> <?php } ?>
	                                        <td><a href="<?php echo base_url();?>exportcsv_non_teaching_off_sup" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp;
												<a href="<?php echo base_url();?>Admin/mypdfteach_nonteach_ofc" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr>
										<tr>
											<td>NURSE</td>
											 <?php foreach ($nonteaching_nur_count as $nonteach_nur_cnt){ ?>
	                                        <td><?php echo $nonteach_nur_cnt->cnt; ?> 
	                                        </td> <?php } ?>
	                                        <td><a href="<?php echo base_url();?>exportcsv_non_teaching_nurse" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp;
												<a href="<?php echo base_url();?>Admin/mypdfteach_nonteach_post/NURSE" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr>
										<tr>
											<td>RECEPTIONIST</td>
											 <?php foreach ($nonteaching_recp_count as $nonteach_recp_cnt){ ?>
	                                        <td><?php echo $nonteach_recp_cnt->cnt; ?> 
	                                        </td> <?php } ?>
	                                        <td><a href="<?php echo base_url();?>exportcsv_non_teaching_recept" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp;
												<a href="<?php echo base_url();?>Admin/mypdfteach_nonteach_post/RECEPTIONIST" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr> -->
										<tr>
											<td>LIBRARIAN</td>
											 <?php foreach ($nonteaching_lib_count as $nonteach_lib_cnt){ ?>
	                                        <td><?php echo $nonteach_lib_cnt->cnt; ?> 
	                                        </td> <?php } ?>
	                                        <td><a href="<?php echo base_url();?>exportcsv_non_teaching_librarian" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp;
												<a href="<?php echo base_url();?>Admin/mypdfteach_nonteach_post/LIBRARIAN" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr>
										<!-- <tr>
											<td>LIBRARY ASSISTANT</td>
											 <?php foreach ($nonteaching_lib_assis_count as $nonteach_lib_assis_cnt){ ?>
	                                        <td><?php echo $nonteach_lib_assis_cnt->cnt; ?> 
	                                        </td> <?php } ?>
	                                        <td><a href="<?php echo base_url();?>exportcsv_non_teaching_lib_assist" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp;
												<a href="<?php echo base_url();?>Admin/mypdfteach_nonteach_libass" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr> -->
										<tr>
											<td>LAB ASSISTANT</td>
											 <?php foreach ($nonteaching_lab_assist_count as $nonteach_lab_assist_cnt){ ?>
	                                        <td><?php echo $nonteach_lab_assist_cnt->cnt; ?> 
	                                        </td> <?php } ?>
	                                        <td><a href="<?php echo base_url();?>exportcsv_non_teaching_lab_assistant" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp;
												<a href="<?php echo base_url();?>Admin/mypdfteach_nonteach_labass" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr>
										
									</tbody>
								</table>

								<table class="table table-condensed tables_borders">
									<thead>
										<tr>
											<th>Post</th>
											<th>Subject</th>
											<th>Count</th>
											<th>Export</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>PRT</td>
											<td>ENGLISH</td>
											<?php foreach ($prt_eng_count as $prt_engcnt){?>
												<td><?php echo $prt_engcnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/ENGLISH" target="_blank" title="Attendance"><i class="fa fa-print" aria-hidden="true" style="color:blue" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/ENGLISH" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>

										</td>
										</tr>
										
										<tr>
											<td>PRT</td>
											<td>MATHS</td>
											<?php foreach ($prt_mat_count as $prt_matcnt){?>
												<td><?php echo $prt_matcnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/MATHS" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/MATHS" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>

										</td>
										</tr>
										<tr>
											<td>PRT</td>
											<td>HINDI</td>
											<?php foreach ($prt_hin_count as $prt_hincnt){?>
												<td><?php echo $prt_hincnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/HINDI" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/HINDI" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr> 
										
										<tr>
											<td>PRT</td>
											<td>GENERAL SCIENCE</td>
											<?php foreach ($prt_gensci_count as $prt_genscicnt){?>
												<td><?php echo $prt_genscicnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/SCIENCE" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/SCIENCE" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
										<!-- <tr>
											<td>TGT/PRT</td>
											<td>GENERAL SCIENCE</td>
											<?php foreach ($tgt_prt_gensci_count as $tgt_prt_genscicnt){?>
												<td><?php echo $tgt_prt_genscicnt->cnt; ?></td>
											<?php } ?>
											<td><a href="<?php echo base_url();?>exportcsv_tgt_prt_gen_sci" title="Export"><i class="fa fa-file-excel-o" aria-hidden="true" style="color:green" target='_blank'></i></a>&nbsp;&nbsp;
											<a href="<?php echo base_url();?>Admin/mypdfteach_tgt_pgt_sub/GENERAL-SCIENCE" title="Pdf"><i class="fa fa fa-print" aria-hidden="true" style="color:red" target='_blank'></i></a></td>
										</tr> -->
										<tr>
											<td>PRT</td>
											<td>SOCIAL SCIENCE</td>
											<?php foreach ($prt_socsci_count as $prt_socscicnt){?>
												<td><?php echo $prt_socscicnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/SOCIAL-SCIENCE" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/SOCIAL-SCIENCE" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
										<tr>
											<td>PRT</td>
											<td>SANSKRIT</td>
											<?php foreach ($prt_sans_count as $prt_sanscnt){?>
												<td><?php echo $prt_sanscnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/SANSKRIT" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/SANSKRIT" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>

										</td>
										</tr>
										<tr>
											<td>PRT</td>
											<td>COMPUTER SCIENCE</td>
											<?php foreach ($prt_comp_sci_count as $prt_compscicnt){?>
												<td><?php echo $prt_compscicnt->cnt; ?></td>
											<?php } ?>

											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/COMPUTER-SCIENCE" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/COMPUTER-SCIENCE" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr> 
										<tr>
											<td>PRT</td>
											<td>MUSICS</td>
											<?php foreach ($prt_mus_count as $prt_muscnt){?>
												<td><?php echo $prt_muscnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/MUSICS" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/MUSICS" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
										<tr>
											<td>PRT</td>
											<td>FINE ARTS</td>
											<?php foreach ($prt_finearts_count as $prt_fineartscnt){?>
												<td><?php echo $prt_fineartscnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/FINE-ARTS" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/FINE-ARTS" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr> 
										<tr>
											<td>PRT</td>
											<td>PHYSICAL EDUCATION</td>
											<?php foreach ($prt_phyedu_count as $prt_phyeducnt){?>
												<td><?php echo $prt_phyeducnt->cnt; ?></td>
											<?php } ?>
											<td>
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_room/PHYSICAL_EDUCATION" target="_blank" title="Attendance"><i class="fa fa fa-home" aria-hidden="true" style="color:blue" target='_blank'></i></a>	
											<a href="<?php echo base_url();?>Attendance/mypdfteach_prt_sub_sheet/PHYSICAL_EDUCATION" title="Sheet" target="_blank"><i class="fa fa-book" aria-hidden="true" style="color:#404e67"></i></a>
										</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>



				</div>
			</div>

