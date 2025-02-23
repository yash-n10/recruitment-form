                        <div class="main-body">

                            <div class="page-wrapper">

                                <!-- Page-header start -->

                                <div class="page-header">

                                    <div class="row align-items-end">

                                        <div class="col-lg-8">

                                            <div class="page-header-title">

                                                <div class="d-inline">

                                                    <h4>Total Registered User</h4>

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

                                                    <li class="breadcrumb-item"><a href="#!">Total Registered user</a>

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
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Contact</th>
                                                                <!-- <th>District</th>
                                                                   <th>City</th> -->
                                                                   <th>Date Created</th>  
                                                               </tr>
                                                           </thead>
                                                           <tbody>
                                                            <?php $x=1;
                                                            foreach ($register as $value) { 
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $x;?></td>
                                                                    <td><?php echo $value->name;?></td>
                                                                    <td><?php echo $value->email;?></td>
                                                                    <td><?php echo $value->contact;?></td>
																	 <!-- <td><?php echo $value->district;?></td>
                                                                     <td><?php echo $value->city;?></td> -->
                                                                     <td><?php echo $value->date_created;?></td>  
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

