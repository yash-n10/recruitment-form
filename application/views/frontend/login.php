
<script>
    $(function() {
       $(".hide").hide(5000);

    });
</script>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login to account</h3>
                        <?php if($this->session->flashdata('register')){ ?>
                          <div class="col-md-12">
                              <div class="alert alert-success alert-dismissible hide"  id="success-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('register'); ?>
                              </div>
                          </div>
                          <?php } ?> 
                            <?php if($this->session->flashdata('updatepass')){ ?>
                          <div class="col-md-12">
                              <div class="alert alert-success alert-dismissible hide"  id="success-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('updatepass'); ?>
                              </div>
                          </div>
                          <?php } ?>   
                        <?php if($this->session->flashdata('unnotmatch')){ ?>
                          <div class="col-md-12">
                              <div class="alert alert-danger alert-dismissible hide"  id="danger-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Failed!</strong> <?php echo $this->session->flashdata('unnotmatch'); ?>
                              </div>
                          </div>
                          <?php } ?> 
                          
                        <form action="<?php echo base_url();?>login_user" method="post" id="Mylogin">
                            <input class="form-control" type="text" name="adhar" placeholder="Enter Aadhar Number" required>
                            <input class="form-control" type="password" name="password" placeholder="Registered Contact Number" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button>
                                 <a href="<?php echo base_url();?>forget">Forgot password?</a> 
                            </div>
                        </form>
                     
                         <div class="page-links" style="margin-top: 18px;margin-bottom: 20px;">
                         <a href="<?php echo base_url();?>register" style="font-weight: 900;font-size:24px;color: #931c14;"> <img src="assets/click-here.gif" width="80px;">Register new account</a>
                        </div>
                        <div>School Helpline No:7050703522 (10 AM - 06 PM)</div>
                        <div>FessClub Helpline No:8580205490 (09 AM - 06 PM)</div>
                        <div>FessClub <c style='color:green'>Whatsapp No</c>:7209524047</div>
                         <div class="text-center" style="margin-bottom:-30px"><a href="http://mildtrix.com/" target="_blank" style="font-size:12px;text-decoration:none;">Design & Developed By <c style="color:#eca806">Mildtrix Business Solutions Pvt. Ltd.</c></a></div> 
                    </div>
                </div>
            </div>
        <script>

        $('#Mylogin').validate({
            rules: {
                adhar: {
                    required: true,                    
                },
                password: {
                    required: true,
                    
                }
            }

        })
    </script> 