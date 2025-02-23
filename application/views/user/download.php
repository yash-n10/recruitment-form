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

                            <div class="container">

                                <div class="row">



                                    <div class="col-md-1"></div>

                                    <div class="col-md-10">

                                        <div class="panel panel-default panel-table">

                                          <div class="panel-heading">

                                            <div class="row">

                                              <div class="col col-xs-6">

                                                <h3 class="panel-title">Downloads</h3>

                                            </div>

                                            <div class="col col-xs-6 text-right">



                                            </div>

                                        </div>

                                    </div>
                                    <div class="panel-body table-responsive">

                                        <table class="table">

                                          <thead>

                                            <tr>

                                                

                                                <th class="hidden-xs">Form No.</th>

                                                <th>Name</th>

                                                <th>Download Application Form</th>

                                                <th>Download Admit Card</th>

                                                <th>Download Receipt</th>

                                            </tr> 

                                        </thead>

                                        <tbody>

                                          <tr>                                            

                                          <td class="hidden-xs"><?php echo $application_no;?></td>
                                          <td><?php echo $name;?></td>

                                          <td><center><button class="btn" style="padding: 5px 19px;background-color:#353c4e;color:#ffffff;border-radius:5px;"><a href="<?php echo base_url();?>form_pdf/<?php echo $uid;?>" style="color:#ffffff;">Download</a></button></center></td>

                                          <td><center>                                           
                                              <button class="btn"  style="padding: 5px 19px;background-color:#353c4e;color:#ffffff;border-radius:5px;"><a href="<?php echo base_url();?>admit_card/<?php echo $uid;?>" style="color:#ffffff;">Download</a></button></center></td>

                                          <td><center><button class="btn"  style="padding: 5px 19px;background-color:#353c4e;color:#ffffff;border-radius:5px;"><a href="<?php echo base_url();?>payment_receipt/<?php echo $uid;?>" style="color:#ffffff;">Download</a></button></center></td>

                                      </tr>

                                  </tbody>

                              </table>



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

</div>









