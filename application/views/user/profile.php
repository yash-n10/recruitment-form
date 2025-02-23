<?php 
$name=$_SESSION['name'];
$mobile=$_SESSION['mobile'];
$district=$_SESSION['district'];
$state=$_SESSION['state'];

?>
<div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header" style="margin-top: -60px;">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>User Profile</h4>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index.html"> <i class="feather icon-home"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">User Profile</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">User Profile</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!--profile cover start-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="cover-profile">
                                                    <div class="profile-bg-img">
                                                        <img class="profile-bg-img img-fluid" src="<?php echo base_url();?>assets/static/images/gradu1.jpg" alt="bg-img" style="height:210px;">
                                                        <div class="card-block user-info">
                                                            <div class="col-md-12">
                                                                <div class="media-left">
                                                                    <a href="#" class="profile-image">
                                                                        <img class="user-img img-radius" src="<?php echo base_url();?>assets/static/images/user.png" alt="user-img" style="width:90px;">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body row">
                                                                    <div class="col-lg-12">
                                                                        <div class="user-title">
                                                                            <h2>User</h2>
                                                                            <span class="text-white"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--profile cover end-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <!-- tab header start -->
                                                <div class="tab-header card">
                                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                       
                                                       
                                                    </ul>
                                                </div>
                                                <!-- tab header end -->
                                                <!-- tab content start -->
                                                <div class="tab-content">
                                                    <!-- tab panel personal start -->
                                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                                        <!-- personal card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">About Me</h5>
                                                                <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                            <i class="icofont icofont-edit"></i>
                                        </button>
                                                            </div>
                    <div class="card-block">
                        <div class="view-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Full Name</th>
                                                                <td><?php echo $name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">District</th>
                                                                <td><?php echo $district; ?></td>
                                                            </tr>
                                                            
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- end of table col-lg-6 -->
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">State</th>
                                                                <td><?php echo $state; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Mobile Number</th>
                                                                <td><?php echo $mobile; ?></td>
                                                            </tr>
                                                            
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- end of table col-lg-6 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                    <!-- end of general info -->
                                </div>
                                <!-- end of col-lg-12 -->
                            </div>
                            <!-- end of row -->
                        </div>
                        <!-- end of view-info -->
                        <div class="edit-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                       
                                        <!-- end of row -->
                                        <div class="text-center">
                                            <a href="#!" class="btn btn-primary waves-effect waves-light m-r-20">Update</a>
                                            <a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
                                        </div>
                                    </div>
                                    <!-- end of edit info -->
                                </div>
                                <!-- end of col-lg-12 -->
                            </div>
                            <!-- end of row -->
                        </div>
                        <!-- end of edit-info -->
                    </div>
                                                            <!-- end of card-block -->
                                                        </div>
                                                    
                                                        <!-- personal card end-->
                                                    </div>
                                                    <!-- tab pane personal end -->
                                                    <!-- tab pane info start -->
                                                    
                                                    <!-- tab pane info end -->
                                                    <!-- tab pane contact start -->
                                                
                                                    <!-- tab pane contact end -->
                                                
                                                </div>
                                                <!-- tab content end -->
                                            </div>
                                        </div>
                                    </div>