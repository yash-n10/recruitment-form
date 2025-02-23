            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items forgetpass" id="forgetpass">
                        <h3>Password Reset</h3>
                        <p>To reset your password, enter the email address you use to sign in to Dav</p>
                        <form >
                            <input class="form-control" type="text" name="email" id="email" placeholder="E-mail Address" required onchange="chkemail()">
                            <span id="notfound" style="color:red;display:none">Email ID Not Registerd</span>
                            <div class="form-button full-width">
                                <a id="submit" class="ibtn btn-forget" onclick="sendmail()" style="pointer-events:none;">Send Reset Link</a>
                            </div>
                        </form>
                        <div class="page-links" style="margin-top:10px;">
                            <a href="<?php echo base_url();?>login">Login</a>
                        </div>
                    </div>
                     <div class="entotp" id="entotp" style="display:none;padding: 35px 30px;border-radius: 10px; background-color: #fff;box-shadow: 0 6px 15px rgba(0, 0, 0, 0.16);max-width: 440px;text-align: left;width: 100%;transition: all 0.4s ease;">
                        <h3>Enter OTP </h3>
                        <form id="passwchk">
                         <input class="form-control" type="hidden" name="email" id="eemail" placeholder="E-mail Address">
                            <input class="form-control" type="text" id="cotp"  placeholder="Enter Your Otp" required onchange="otpchk()">
                            <span id="tru" style="display:none">Otp is correct !now you can update your password</span>
                            <input type="password" name="password" id="password" placeholder="Enter New Password" readonly min="6" >
                            <input type="password" name="cnfpassword" id="cnfpassword" placeholder="Enter confirm Password" readonly>
                            <span id="otperror" style="color:red;display:none">otp not match</span>
                             <span id="passcnf" style="color:red;display:none">Your password does not math to confirm password</span>
                            <div class="form-button full-width">
                                <a class="ibtn btn-forget" onclick="chko();" id="updatebtn" style="pointer-events:none;">Update</a>
                            </div>
                        </form>
                        <div class="page-links" style="margin-top:10px;">
                            <a href="<?php echo base_url();?>login">Login</a>
                        </div>
                    </div>
                </div>
            </div>
      <script>
        function chkemail()
        {
            var email=$('#email').val();
            $.ajax({
                type:'POST',
                data:{email:email},
                url:'<?php echo base_url();?>chkemail',
                success:function(data)
                {
                   //console.log(data);
                    if(data==1)
                    {
                         $('#eemail').val(email);
                         $('#submit').prop('disabled', false);
                         $('#submit').css('pointer-events','');
                         $('#notfound').hide();
                    }else {
                         $('#submit').prop('disabled', true);
                         $('#submit').css('pointer-events','none');
                         $('#notfound').show();
                    }
                }
            });
        }
        function sendmail()
        {
            var email=$('#email').val();
            $.ajax({
                type:'POST',
                data:{email:email},
                url:'<?php echo base_url();?>sendmail',
                success:function(data)
                {
                    //console.log(data);
                    if(data==1)
                    {
                        // alert('hi');
                        $('#forgetpass').hide();
                        $('#entotp').show();
                    }
                    else {         
                        $('#forgetpass').show();
                        $('#entotp').hide();
                    }
                }
            });
        }
         function otpchk()
         {
              var eemail=$('#eemail').val();
             var cotp=$('#cotp').val();
            $.ajax({
                type:'POST',
                data:{cotp:cotp,eemail:eemail},
                url:'<?php echo base_url();?>cotp',
                success:function(data)
                {
                   // console.log(data);
                    if(data==1)
                    {
                       
                        $('#forgetpass').hide();
                        $('#entotp').show();
                        $("#password").prop('readonly', false);
                        $("#cnfpassword").prop('readonly', false);
                        $("#updatebtn").prop('disabled', false);
                        $('#updatebtn').css('pointer-events','');
                        $('#tru').show();
                        $('#otperror').hide();
                        
                    }
                    else {
                        $('#forgetpass').hide();
                        $('#entotp').show();
                         $("#password").prop('readonly', true);
                         $("#cnfpassword").prop('readonly', true);
                         $('#updatebtn').prop('disabled', true);
                         $('#updatebtn').css('pointer-events','none');
                          
                        $('#tru').hide();
                        $('#otperror').show();
                         
                    }
                }
            });
         }
         function chko()
         {
             var eemail=$('#eemail').val();
              var password=$('#password').val();
              var cnfpassword=$('#cnfpassword').val();
              if(password==cnfpassword) {
                   $('#passcnf').hide();
                  $.ajax({
                type:'POST',
                data:{password:password,eemail:eemail},
                url:'<?php echo base_url();?>updatepass',
                success:function(data)
                {
                    //console.log(data);
                    if(data==1)
                    {
                       window.location.href="<?php echo base_url();?>login";
                    }
                    else {
                        $('#forgetpass').show();
                        $('#entotp').hide();
                        $('#tru').hide();
                         
                    }
                }
            });
              } else {
                  $('#passcnf').show();
              }
            
         }


          $('#passwchk').validate({
            rules: {               
                password: {
                    required: true,
                    number: true,
                    minlminlength:10,
                    maxlength:10,
                    
                }
            }

        })
      </script>