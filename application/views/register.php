<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/plugins/images/favicon.png">
<title>Register</title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url();?>assets/css/colors/default.css" id="theme"  rel="stylesheet">

</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
      <div class="lg-info-panel">
              <div class="inner-panel">
                  <a href="javascript:void(0)" class="p-20 di"><img src="<?php echo base_url();?>assets/plugins/images/admin-logo.png"></a>
                  <div class="lg-content">
                      <h2>Hey</h2>
                      <p class="text-muted">Develop By</p>
                      
                  </div>
              </div>
      </div>
      <div class="new-login-box">
        <div class="white-box">
            <h3 class="box-title m-b-0">Sign Up</h3> <small>Enter your details below</small>
            <form class="form-horizontal new-lg-form" id="loginform" action="#">
                <div class="form-group ">
                    <div class="col-xs-12">
                      <input class="form-control" type="text" required="" placeholder="Name"> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-1" id="pref" style="display:none;">
                      <span style="margin: 17px 4px 9px 0px;position: absolute;">@_</span>
                    </div>
                    <div class="col-xs-12" id="users">
                      <input class="form-control" type="text" required="" placeholder="Email/Username"> 
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                      <input class="form-control" type="password" required="" placeholder="Password"> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                      <input class="form-control" type="password" required="" placeholder="Confirm Password"> 
                    </div>
                </div>
                <small>Select User Type:</small>
                <br>
                <div class="form-group">
                  <div class="col-md-6">
                      <div class="checkbox checkbox-primary p-t-0">
                          <input id="user" type="checkbox" name="check" onclick="get('u');">
                          <label for="checkbox-signup">User</label>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="checkbox checkbox-primary p-t-0">
                          <input id="publisher" type="checkbox" name="check" onclick="get('p');">
                          <label for="checkbox-signup">Publisher</label>
                      </div>
                  </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="<?php echo base_url();?>login" class="text-danger m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>         
  
  
</section>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url();?>assets/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>assets/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url();?>assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script>
$("input:checkbox").on('click', function() {
  var $box = $(this);
  if ($box.is(":checked")) {
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});


function get(i)
{
  if(i=='p')
  {
    $('#pref').show();
    $('#users').removeClass('col-xs-12').addClass('col-xs-11');
  }
  else
  {
    $('#pref').hide();
    $('#users').removeClass('col-xs-11').addClass('col-xs-12');
  }
}

</script>
</body>

</html>
