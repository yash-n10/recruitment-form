<style type="text/css">

.panel-heading {

    padding: 4px 15px;

    border-top-left-radius: 3px;

    border-top-right-radius: 3px;

    background-color: #B40303;

    color: white;

    text-transform: uppercase;

    background-image: url(<?php echo base_url()?>assets/TopBar.jpg);

}

.panel-body

{

    padding: 10px;

}

label{

    text-transform: uppercase;

}

</style>



<div class="main-body" style="margin-top: -34px;">

    <div class="page-wrapper">

        <div class="page-header">            

        </div>



        <div class="page-body">

            <div class="row">

                <div class="col-xl-12 col-md-12">

                

                        <div id="bgmainwrapper">

                            <div id="insidewrapper">

                                <div class="container" style="text-align: left!important;">



                               <!--   <div class="row">

                                    <div class="col-md-5"></div>

                                    <div class="col-md-2">

                                        <input type="submit" id="subm"  value="PAY NOW" class="btn btn-success" style="">

                                    </div>

                                </div> -->

                                <div class="row">



                                   <!--  <p></p>

                                    <h1>Bootstrap Table Panel with Pagination</h1>

                                    <p>A simple example of how-to put a bordered table within a panel. Responsive, place holders in header/footer for buttons or pagination.</p>

                                    <p>Follow me </p>

 -->



                                    <div class="col-md-1"></div>

                                    <div class="col-md-10">



                                        <div class="panel panel-default panel-table">

                                          <div class="panel-heading">

                                            <div class="row">

                                              <div class="col col-xs-6">

                                                <h3 class="panel-title">Payments</h3>

                                            </div>

                                            <div class="col col-xs-6 text-right">



                                            </div>

                                        </div>

                                    </div>

                                    <div class="panel-body">

                                      <form class="form-horizontal" method="POST" name="admissionFrm" role="form" id="admissionFrm" action="<?php echo base_url("Payment/request"); ?>">

                                        <table class="table table-striped table-bordered table-list">

                                          <thead>

                                            <tr>

                                                <th class="hidden-xs">Form No.</th>

                                                <th>Name</th>

                                                <th>Amount</th>

                                            </tr> 

                                        </thead>

                                        <tbody>

                                          <tr>                                            

                                            <td class="hidden-xs"><?php echo $application_no;?></td>

                                            <td><?php echo $name;?></td>

                                            <td>&#8377 &nbsp;1</td>

                                            </tr>

                                          <tr>  

                                             <input type="hidden" name="fees" value="1">

                                             <input type="hidden" name="uid" value="<?php echo $this->session->userdata('uid');?>">

                                             <input type="hidden" name="form_no" value="<?php echo $application_no;?>">

                                              <td colspan="3">



                                                <center><a href="" data-toggle="modal" data-target="#myModal2" style="padding: 5px 19px;background-color:#353c4e;color:#ffffff;border-radius:5px;">Pay Now</a></center>

                                                <!-- <center><input type="submit" name="submit" value="Pay Now"></center> -->

                                            </td>

                                          </tr>

                                        </tbody>

                                      </table>

                                    </form>



                          </div>



                      </div>



                  </div></div>

                            </div>

                        </div>

                    </div>

               

            </div>



        </div>

    </div>

</div>

</div>

<div id="myModal2" class="modal fade" role="dialog">

    <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title" style="text-align:center;color:crimson">Important Instruction</h4>

            </div>

            <div class="modal-body">

              <div class="form-group row" >

                <div class="col-sm-12">

                  <div class="table-responsive">

                  <table> 

                    <tbody>

                      <tr style="border-top:0px !important">

                          <td style="color:midnightblue;font-family: sans-serif;border-top:0px !important">

                              <i class="fa fa-check-square-o" aria-hidden="true" style="color:blueviolet"> </i> 

                              Do not Press <b>Refresh,Back or Close</b> tabs or browser arrow while transaction is going on.

                          </td>

                      </tr>

                      <tr>

                          <td style="color:midnightblue;font-family: sans-serif">

                              <i class="fa fa-check-square-o" aria-hidden="true" style="color:blueviolet"> </i> 

                              Please wait till page redirects back to <b>us </b> after transaction..

                          </td>

                      </tr>

                      <tr>

                          <td style="color:midnightblue;font-family: sans-serif">

                              <i class="fa fa-check-square-o" aria-hidden="true" style="color:blueviolet"> </i> 

                              In case of network glitch, slow down or failure or session timeout during the payment or transaction,

                              please check whether your bank account has been debited or not before initiating the second payment 

                              and accordingly resort to one of the following options:



                              <ul>

                                  <li>In case the Bank Account appears to be debited , please do not try to do payment twice .

                                      and immediately thereafter contact us  to confirm payment.In Case Payment is not received by DAVrd , then the bank  will credit amount back to concerned account within 8 to 10 working days</li>

                                  <li>In case , the Bank Account is not debited, You can initiate a fresh transaction to make payment.</li>

                              </ul>

                          </td></tr>

                      <tr>

                          <td style="color:#aa2ea4;font-family: sans-serif;text-align:center">                              

                              In case Any Problem, Please contact us on 7209524047

                          </td>

                      </tr> 

                    </tbody>

                  </table>

                </div>

                </div>

              </div>         

            </div>

            <div class="modal-footer">

                <button class="btn btn-success" name="modalbtn" id="modalbtn" type="submit" form="admissionFrm">PAY</button>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>

