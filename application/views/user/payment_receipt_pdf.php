<!DOCTYPE html>
<html lang="en">
<head>
<title>Payment Receipt</title>

  <style type="text/css">
    body {
      position: relative;
      width: 21cm;
      height: 29.7cm;
      margin: 0 auto;
      color: #001028;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 12px;
      font-family: Arial;
    }
   #borderr {
  border-top: 1px solid  #5D6975;
  border-left: 1px solid  #5D6975;
  border-right: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  height: 400px;
  margin: 2px 0px -2.5px 0px;
  
}
    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }

    h1 {
      border-top: 1px solid  #5D6975;
      border-bottom: 1px solid  #5D6975;
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 40px 0 20px 0;
      background: url(dimension.png);
    }0
    #details{
      margin: -40px -60px 0px -8px;
    }
    #detail{
      margin: -40px -51px 0px -8px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 498px;
      margin-top: 7px;
    }

    table tr:nth-child(2n-1) td {
    /*  background: #F5F5F5;*/
    }

    table th {
      padding: 5px 5px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      white-space: nowrap;
      font-weight: bold;
    }
     table td {
      padding: 7px;
      text-align: left;
    } 
   .tablecustomtd {
      border-bottom:1px solid #ffffff;
      background: #ffffff;
    }
    footer {
      color: #5D6975;
      width: 100%;
      height: 5px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }

  
      table, th, td {
          border: 1px solid #5D6975;
          height:7px;
      }
      td{
      height:7px;

  }
  </style>
</head>
<body style="width:100%;">
  <div>
    <div class="row">
      <div class="col-md-12">
        <table style="width: 100%;top:103px;padding-right: 50px;" id="details">
  		    <tr>
            <td valign="top" style="height:10px;padding-top:10px;" colspan="7">
  			      <div>          
                <span style="font-size: 22px;"><img style="width:120px;height:110px;" src="assets/images/LOGO.png">
      		      &nbsp;&nbsp;<b>DAV PUBLIC  SCHOOLS, JHARKHAND ZONE-D</b></span>
              </div>
  			    </td>
          </tr>
  			  <tr>
            <th valign="top" style="text-align:left;height:10px;padding-left:30px;padding-top:10px;" colspan="7">PAYMENT DETAIL</th>
  			  </tr>
  			  <tr>
            <th valign="top" style="text-align:left;height:10px;padding-left:30px;padding-top:10px;" colspan="7">
            Student Name : &nbsp;&nbsp; &nbsp;&nbsp;<?php echo $datauser[0]->fname;?><br>
            Application No : &nbsp;&nbsp; &nbsp;&nbsp;<?php echo $datauser[0]->sub_form_no;?><br>
            <!-- Application No  : &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<?php echo $datauser[0]->form_no;?><br> -->
            Date:     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data[0]->payment_date;?><br>
            Transaction Id : &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<?php echo $data[0]->transaction_id;?><br>
    			  Fee Paid : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data[0]->total_amount;?><br><br></th>
  			  </tr>
        
          <tr>
            <th valign="top" style="text-align:left;height:30px;padding-left:30px;padding-top:20px;" colspan="7">           
  			    Powered By: Mildtrix Business Solutions Pvt. Ltd.</th>
  			  </tr>
        </table>
        <br>
        <br>      
      </div>
    </div>
  </div>

</body>
</html>