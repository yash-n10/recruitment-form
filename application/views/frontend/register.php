          <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register new account</h3> 
                        <?php if($this->session->flashdata('register')){ ?>
                          <div class="col-md-12">
                              <div class="alert alert-success alert-dismissible"  id="success-alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('register'); ?>
                              </div>
                          </div>
                          <?php } ?>                      
                        <form action="<?php echo base_url();?>user_register" method="post">
                             
                            <input class="form-control" type="text" name="name" placeholder="Full Name">
                            <input class="form-control" type="email" name="email" id="email" placeholder="E-mail Address" required onchange="chkemail()">
                              <span id="notfound" style="color:red;display:none">Email ID Already Registerd</span>
                            <input class="form-control" type="text" name="adhar" id="adhar" placeholder="Aadhar Number" required onchange="chkadhar()">
                               <span id="notfoundadhar" style="color:red;display:none">Adhar Number Already Registerd</span>
                            <input class="form-control" type="text" name="contact" id="contact" placeholder="Enter Contact Number" required>
                            
                         
                          <!--   <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                            <input class="form-control" type="password" name="cnfpassword" placeholder="Confirm Password" required> -->
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                     
                        <div class="page-links" style="margin-top:5px;">
                            <a href="<?php echo base_url();?>login">Login to account</a>
                        </div>
                    </div>
                </div>
            </div>
      <script>

        $('#Myregister').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                email: {
                    required: true,
                    email:true,
                },
                contact: {
                    required: true,                   
                    number: true,
                    minlength:10,
                    maxlength:10,
                },
                  adhar: {
                    required: true,                   
                    number: true,
                    minlength:12,
                    maxlength:12,
                }
            }

        })
         function chkemail()
        {
            var email=$('#email').val();  
            //alert(email);
            $.ajax({
                type:'POST',
                data:{email:email},
                url:'<?php echo base_url();?>chkemail',
                success:function(data)
                {
                    console.log(data);
                    if(data==1)
                    { 
                          $('#submit').prop('disabled', true);
                          $('#notfound').show();
                        
                    }else {                       
                        $('#submit').prop('disabled', false);
                        $('#submit').css('pointer-events','');
                        $('#notfound').hide();
                    }
                }
            });
        }

        function chkadhar()
        {
            var adhar=$('#adhar').val();  
            $.ajax({
                type:'POST',
                data:{adhar:adhar},
                url:'<?php echo base_url();?>chkadhar',
                success:function(data)
                {
                    console.log(data);
                    if(data==1)
                    { 
                          $('#submit').prop('disabled', true);
                          $('#notfoundadhar').show();
                        
                    }else {                       
                        $('#submit').prop('disabled', false);
                        $('#submit').css('pointer-events','');
                        $('#notfoundadhar').hide();
                    }
                }
            });
        }
    </script> 