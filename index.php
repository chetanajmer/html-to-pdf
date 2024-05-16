<?php 
  require_once('./helpers.php');


  $url = "https://test.com";
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);

  $data = array(
      //'phone' => '7851803855',
      'phone' => '8306639910',
      'method' => 'CIBILToJSON'
  );


  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  $contents = curl_exec($ch);
  curl_close($ch);

  $data=json_decode($contents);
  //echo "<pre>";
 // print_r($data->response);

   $translogo = file_get_contents("./logo.jpg");
    $translogo = base64_encode($translogo);

  ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="all.min.css"/>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
  <style>
    @page { margin: 180px 50px; }
    #header { position: fixed; left: 0px; top: -160px; right: 0px; height: 150px;  text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -240px; right: 0px; height: 150px; }
    #footer .page:after { content: counter(page, upper-roman); }
  </style>
<body  style="background-color:#fff;">
  <div id="header">
    	<div class="row align-items-center ">

	      <div class="col-sm-12 text-center text-sm-start"> <img id="logo" style="height:46px; padding-bottom:8px;" src="data:image/png;base64, <?php echo $translogo; ?>"  title="MartOnline" alt="MartOnline" /> 
	      </div>
	      
	    </div>
    
 
      	<div class="col-md-12 text-center text-sm-start fw-600" style="background:#FCD800;">CONSUMER CIR
      		</div>

       <div class="table-responsive" style="padding-top: 5px;">
        <table class="table table-sm table-borderless  table-striped" style="font-size: 10px;line-height: 8px;">
        <thead>
          <tr>
            <td colspan="4" class=""><span class="fw-600 colorblue">CONSUMER</span>: <?php 

              echo $data->response->NameSegment->ConsumerName1; 
              checkisset($data->response->NameSegment,'ConsumerName2');
              checkisset($data->response->NameSegment,'ConsumerName3');



              ?><span class="float-end"><span class="fw-600 colorblue">Date</span>: 
              <?php 

              $date = DateTime::createFromFormat('dmY', $data->response->Header->DateProcessed);
              echo $date->format('d-m-Y');
             
              ?></span></td>
          </tr>

          <tr>
            <td colspan="4" class=""><span class="fw-600 colorblue">MEMBER ID</span>: <?php echo $data->response->Header->MemberCode; ?> <span class="float-end"><span class="fw-600 colorblue">TIME</span>:
              <?php 

              $date = DateTime::createFromFormat('His', $data->response->Header->TimeProcessed);
              echo $date->format('h:i:s');


            ?></span></td>
          </tr>
          

          <tr >
            <td colspan="4" class=""><span class="fw-600 colorblue">MEMBER REFERENCE NUMBER:</span><?php echo $data->response->Header->ReferenceNumber; ?> <span class="float-end"><span class="fw-600 colorblue">CONTROL NUMBER</span>: <?php echo $data->response->Header->EnquiryControlNumber; ?></span></td>
          </tr>
          <tr class="mytrcolor">
            <td colspan="4"></td>
          </tr>
        </thead>
 
        </table>
      	</div>
   
	     
  </div>
  <div id="footer" style="text-align:center;border-top: 2px solid #00A6CA;">
     <p style="text-center;margin-top:10px;font-size: 8px;">© 2023 TransUnion CIBIL Limited. (Formerly: Credit Information Bureau (India) Limited). All rights reserved</p>
      <p style="text-center;font-weight: 600;font-size: 9px;">TransUnion CIBIL CIN : U72300MH2000PLC128359</p>
  </div>
  <div id="content">

  	 <h4 class="text-4" style="padding-top:10px;">CONSUMER INFORMATION:</h4>
     <div class="table-responsive">
      <table class="table  table-borderless text-1 table-sm">
        <tbody>
          <tr>
            <td class="col-4"><span class="fw-600">NAME: </span><?php 

            echo $data->response->NameSegment->ConsumerName1; 
            checkisset($data->response->NameSegment,'ConsumerName2');
            checkisset($data->response->NameSegment,'ConsumerName3');


          ?></td>
            <td class="col-4"><span class="fw-600">DATE OF BIRTH:</span>
              <?php 

              $date = DateTime::createFromFormat('dmY', $data->response->NameSegment->DateOfBirth);
              echo $date->format('d-m-Y');


            ?>
            </td>
            <td class="col-4"><span class="fw-600">GENDER:</span><?php
             if($data->response->NameSegment->Gender=='1')
             {
                echo "Female";
             }else if($data->response->NameSegment->Gender=='2'){
                echo "Male";
             }
             else{
                echo "Transgender";
             }

           ?></td>
          </tr>
         
        </tbody>
      </table>
     </div>
     <h4 class="text-4">CIBIL TRANSUNION SCORE(S):</h4>
     <div class="table-responsive">
      <table class="table text-1 table-borderless table-sm">
        <tbody>
          <tr>
            <td class="col-4"><span class="fw-600" style="color:#00A6CA">SCORE NAME</td>
            <td class="col-4"><span class="fw-600" style="color:#00A6CA">SCORE</td>
            <td class="col-4"><span class="fw-600" style="color:#00A6CA">SCORING FACTORS</td>
          </tr>
         
          <tr >
            <td class="col-4"><span class="" style="color:#00A6CA;"><?php echo $data->response->ScoreSegment->ScoreName; ?></td>
            <td class="col-4"><span class="fw-600" style="font-size: 36px;color:#006a81;"><?php echo substr($data->response->ScoreSegment->Score,2); ?></td>
            <td class="col-4"><span class="fw-600"></td>
          </tr>
         
        </tbody>
      </table>
     </div>
     <hr>

     <div class="table-responsive" >
      <table class="table text-1 table-sm table-borderless  table-striped" style="background: #EDEDED;">
        <thead>
          <tr>
            <td colspan="4" class=""><span class="" style="color:#00A6CA;">POSSIBLE RANGE FOR <?php echo $data->response->ScoreSegment->ScoreName; ?> SCORE</span>:</td>
          </tr>

          <tr>
            <td colspan="4" class=""><span class="fw-600">Consumer with at least one trade on the bureau in last 36 months </span><span class="float-end" style="color:red;">: 300 (High risk) to 900 (low risk)</span></td>
          </tr>

          <tr>
            <td colspan="4" class=""><span class="fw-600">Consumer not in CIBIL database or history older than 36 months</span><span class="float-end" style="color:red;">: -1 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</span></td>
          </tr>

         

          <tr>
            <td colspan="4" class=""><span class="fw-600" style="font-size:10px;">* At least one tradeline with information updated in last 36 months is required</span></td>
          </tr>

         
        </thead>
 
      </table>
     </div>

     <h4 class="text-4">IDENTIFICATION(S):</h4>
     <div class="table-responsive">
      <table class="table  table-striped table-borderless text-1 table-sm">
        <tbody>
          <tr style="font-size:10px;">
            <td class="col-3" ><span class="fw-600 colorblue">IDENTIFICATION TYPE</span></td>
            <td class="col-3"><span class="fw-600 colorblue">IDENTIFICATION NUMBER</span></td>
            <td class="col-3"><span class="fw-600 colorblue">ISSUE DATE</span></td>
            <td class="col-3"><span class="fw-600 colorblue">EXPIRATION DATE</span></td>
          </tr>
          <?php 
          if(is_array($data->response->IDSegment))
          {  
              foreach($data->response->IDSegment as $iddata)
              {
                ?>
                <tr style="font-size:11px;">
                  <td class="col-4"><span class="fw-600 "><?php

                 
                  switch ($iddata->IDType) {
                    case "1":
                      echo "Income Tax ID Number (PAN)";
                      break;
                    case "2":
                      "Passport Number";
                      break;
                    case "3":
                      echo "Voter ID Number";
                      break;
                    case "4":
                      echo "Driver’s License Number";
                      break;

                    case "5":
                      echo "Ration Card Number";
                      break;

                    case "6":
                      echo "Universal ID Number (UID) ";
                      break;

                    case "7":
                      echo "Additional ID #1 (For Future Use)";
                      break;

                    case "8":
                      echo " Additional ID #2 (For Future Use)";
                      break;

                    case "9":
                      echo "CKYC";
                      break;

                    case "10":
                      echo "NREGA Card Number";
                      break;

                    default:
                      echo "Invalid Data";
                  }


                  ?></span></td>
                  <td class="col-3"><span class="fw-600 "><?php echo $iddata->IDNumber; ?></span></td>
                  <td class="col-3"><span class="fw-600 "></span></td>
                  <td class="col-2"><span class="fw-600 "></span></td>
                </tr>
              <?php  
              }
          }
          else
          {

            ?>
              <tr style="font-size:11px;">
                  <td class="col-4"><span class="fw-600 "><?php

                 
                  switch ($data->response->IDSegment->IDType) {
                    case "1":
                      echo "Income Tax ID Number (PAN)";
                      break;
                    case "2":
                      "Passport Number";
                      break;
                    case "3":
                      echo "Voter ID Number";
                      break;
                    case "4":
                      echo "Driver’s License Number";
                      break;

                    case "5":
                      echo "Ration Card Number";
                      break;

                    case "6":
                      echo "Universal ID Number (UID) ";
                      break;

                    case "7":
                      echo "Additional ID #1 (For Future Use)";
                      break;

                    case "8":
                      echo " Additional ID #2 (For Future Use)";
                      break;

                    case "9":
                      echo "CKYC";
                      break;

                    case "10":
                      echo "NREGA Card Number";
                      break;

                    default:
                      echo "Invalid Data";
                  }


                  ?></span></td>
                  <td class="col-3"><span class="fw-600 "><?php echo $data->response->IDSegment->IDNumber; ?></span></td>
                  <td class="col-3"><span class="fw-600 "></span></td>
                  <td class="col-2"><span class="fw-600 "></span></td>
                </tr>
          <?php      
          }    

          ?>  
          

         
         
        </tbody>
      </table>
     </div>

     <h4 class="text-4">TELEPHONE(S): </h4>
     <div class="table-responsive">
      <table class="table  table-striped table-borderless text-1 table-sm">
        <tbody>
          <tr style="font-size:10px;">
            <td class="col-4"><span class="fw-600 colorblue">TELEPHONE TYPE</span></td>
            <td class="col-4"><span class="fw-600 colorblue">TELEPHONE NUMBER</span></td>
            <td class="col-4"><span class="fw-600 colorblue">TELEPHONE EXTENSION</span></td>
            
          </tr>

          <?php 
          
          if(is_array($data->response->TelephoneSegment))
          {

              foreach($data->response->TelephoneSegment as $teledata)
              {
                ?>
                <tr >
                    <td class="col-4"><span class="fw-600 "><?php 

                      
                      switch ($teledata->TelephoneType) {
                        case "00":
                          echo "Not Classified";
                          break;
                        case "01":
                          echo "Mobile Phone";
                          break;
                        case "02":
                          echo "Home Phone";
                          break;
                        case "03":
                          echo "Office Phone";
                          break;
                        default:
                          echo "Invalid Data";
                      }

                    ?></span></td>
                    <td class="col-4"><span class="fw-600 "><?php echo $teledata->TelephoneNumber; ?></span></td>
                
                  </tr>
             <?php     
              }
          }  
          else{

              ?>


              <tr >
                <td class="col-4"><span class="fw-600 "><?php 

                  switch ($data->response->TelephoneSegment->TelephoneType) {
                    case "00":
                      echo "Not Classified";
                      break;
                    case "01":
                      "Mobile Phone";
                      break;
                    case "02":
                      echo "Home Phone";
                      break;
                    case "03":
                      echo "Office Phone";
                      break;
                    default:
                      echo "Invalid Data";
                  }

                ?></span></td>
                <td class="col-4"><span class="fw-600 "><?php echo $data->response->TelephoneSegment->TelephoneNumber; ?></span></td>
            
              </tr>
          <?php
          }
          
          ?>    


        </tbody>
      </table>
     </div>

     <h4 class="text-4">EMAIL CONTACT(S): </h4>
     <div class="table-responsive">
      <table class="table   table-borderless text-1 table-sm">
        <tbody>
          <tr style="font-size:10px;">
            <td class="col-12"><span class="fw-600 colorblue">EMAIL ADDRESS</span></td>
          </tr>

          <?php
          if(is_array($data->response->EmailContactSegment))
            { 

              foreach($data->response->EmailContactSegment as $emaildata)
              {
              ?>

                <tr>
                  <td class="col-12"><span class="fw-600 "><?php echo $emaildata->EmailID; ?></span></td>
                </tr>
              <?php
                }
            }    
            else
             {
                ?>  
                <tr>
                  <td class="col-12"><span class="fw-600 "><?php echo $data->response->EmailContactSegment->EmailID; ?></span></td>
                </tr>
                <?php
             } 
        
          ?>

        </tbody>
      </table>
     </div>

     <h4 class="text-4">ADDRESS(ES): </h4>
     <div class="table-responsive">
      <table class="table  table-striped table-borderless text-1 table-sm">
        <tbody>


          <?php
          if(is_array($data->response->Address)){

            foreach($data->response->Address as $addressdata){  
          ?> 
          <tr style="font-size:10px;">
            <td colspan="4" class="col-12"><span class="colorblue">ADDRESS: </span> <span class="fw-600">
              <?php

              if(isset($addressdata->AddressLine1)){
                    echo $addressdata->AddressLine1;}

              if(isset($addressdata->AddressLine2)){
                echo $addressdata->AddressLine2; }

              if(isset($addressdata->AddressLine3)){
                echo $addressdata->AddressLine3;}
                echo "&nbsp;";
                echo statecode($addressdata->StateCode)." ".$addressdata->PinCode;

              ?>
            </span></td>
              
              <tr style="font-size:10px;">
                
                <td class="col-4"><span class="colorblue">CATEGORY: </span> <span class="fw-600">
                  <?php
                  switch ($addressdata->AddressCategory) {
                        case "01":
                          echo "Permanent Address";
                          break;
                        case "02":
                          "Residence Address";
                          break;
                        case "03":
                          echo "Office Address";
                          break;
                        case "04":
                          echo "Not Categorized";
                          break;
                        default:
                          echo "Mortgage Property Address";
                      }
                  ?>    

                </span></td>
                <td class="col-4"><span class="colorblue">RESIDENCE CODE: </span> <span class="fw-600">
                  
                </span></td>
                <td class="col-4"><span class="colorblue">DATE REPORTED: </span><span class="fw-600">
                  
                  <?php

                   $date = DateTime::createFromFormat('dmY',$addressdata->DateReported);
                    echo $date->format('d-m-Y');

                    ?>
                </span></td>  
              </tr>
                
          </tr>

          <?php 
              }  
          }
          else{

              ?>
                <tr style="font-size:10px;">
                    <td colspan="4" class="col-12"><span class="colorblue">ADDRESS: </span> <span class="fw-600"><?php

             

                  if(isset($data->response->Address->AddressLine1)){
                    echo $data->response->Address->AddressLine1;}

                  if(isset($data->response->Address->AddressLine2)){
                    echo $data->response->Address->AddressLine2; }

                  if(isset($data->response->Address->AddressLine3)){
                    echo $data->response->Address->AddressLine3;}

                    echo "&nbsp;".statecode($data->response->Address->StateCode)."&nbsp;".$data->response->Address->PinCode;

              ?></span></td>
                      
                      <tr style="font-size:10px;">
                        
                        <td class="col-4"><span class="colorblue">CATEGORY: </span> <span class="fw-600">
                          <?php
                          switch ($data->response->Address->AddressCategory) {
                                case "01":
                                  echo "Permanent Address";
                                  break;
                                case "02":
                                  "Residence Address";
                                  break;
                                case "03":
                                  echo "Office Address";
                                  break;
                                case "04":
                                  echo "Not Categorized";
                                  break;
                                case "05":
                                  echo "Mortgage Property Address";
                                  break;
                                default:
                                  echo "Invalid";
                              }
                          ?>  
                        </span></td>
                        <td class="col-4"><span class="colorblue">RESIDENCE CODE: </span> <span class="fw-600"></span></td>
                        <td class="col-4"><span class="colorblue">DATE REPORTED: </span><span class="fw-600">
                          
                          <?php

                           $date = DateTime::createFromFormat('dmY',$data->response->Address->DateReported);
                            echo $date->format('d-m-Y');

                            ?>
                        </span></td>  
                      </tr>
                        
                </tr>

              <?php
              }
          ?>

          
        </tbody>
      </table>
     </div>

     <h4 class="text-4">EMPLOYMENT INFORMATION:</h4>
     <div class="table-responsive">
      <table class="table  table-striped table-borderless text-1 table-sm">
        <tbody>
          <tr style="font-size:10px;">
            <td class="col-2"><span class="fw-600 colorblue">ACCOUNT TYPE</span></td>
            <td class="col-2"><span class="fw-600 colorblue">DATE REPORTED</span></td>
            <td class="col-2"><span class="fw-600 colorblue">OCCUPATION CODE </span></td>
            <td class="col-2"><span class="fw-600 colorblue">INCOME</span></td>
            <td class="col-2"><span class="fw-600 colorblue">NET / GROSS INCOME INDICATOR</span></td>
            <td class="col-2"><span class="fw-600 colorblue">MONTHLY / ANNUAL INCOME INDICATOR</span></td>
          </tr>
          <?php
          if(is_array($data->response->EmploymentSegment)){

            foreach($data->response->EmploymentSegment as $employeedata)
            {  ?>
              <tr style="font-size:10px;">
                <td class="col-2"><span class="fw-600 ">

                 <?php
                  accounttype($employeedata->AccountType);     
                  ?>    
                </span></td>
                <td class="col-2"><span class="fw-600 ">
                  <?php 
                  $date = DateTime::createFromFormat('dmY', $demployeedata->DateReportedCertified);
                  echo $date->format('d-m-Y');
                  ?>
                </span></td>
                <td class="col-2"><span class="fw-600 ">
                  <?php

                    switch ($employeedata->OccupationCode) {
                        case "01":
                          echo "Salaried";
                          break;
                        case "02":
                          "Self Employed Professional";
                          break;
                        case "03":
                          echo "Self Employed";
                          break;
                        case "04":
                          echo "Others";
                          break;
                        default:
                          echo "Invalid Data";
                      }

                  ?>
                </span></td>
                <td class="col-2"><span class="fw-600 ">Not Available</span></td>
                <td class="col-2"><span class="fw-600 ">Not Available</span></td>
                <td class="col-2"><span class="fw-600 ">Not Available</span></td>
              </tr>

            <?php 
            }
          }
          else{
            ?>
            <tr style="font-size:10px;">
              <td class="col-2"><span class="fw-600 ">
                <?php
                  accounttype($data->response->EmploymentSegment->AccountType);     
                  ?>
                    
                  </span></td>
              <td class="col-2"><span class="fw-600 ">
                <?php 
                  $date = DateTime::createFromFormat('dmY', $data->response->EmploymentSegment->DateReportedCertified);
                  echo $date->format('d-m-Y');
                  ?>
              </span></td>
              <td class="col-2"><span class="fw-600 ">
                <?php

                    switch ($data->response->EmploymentSegment->OccupationCode) {
                        case "01":
                          echo "Salaried";
                          break;
                        case "02":
                          "Self Employed Professional";
                          break;
                        case "03":
                          echo "Self Employed";
                          break;
                        case "04":
                          echo "Others";
                          break;
                        default:
                          echo "Invalid Data";
                      }

                  ?>
              </span></td>
              <td class="col-2"><span class="fw-600 ">Not Available</span></td>
              <td class="col-2"><span class="fw-600 ">Not Available</span></td>
              <td class="col-2"><span class="fw-600 ">Not Available</span></td>
            </tr>
            <?php
          }
          ?>  
          

          
         
        </tbody>
      </table>
     </div>

     <h4 class="text-4">SUMMARY:</h4>
     <h5 class="text-2 colorblue">ACCOUNT(S):</h5>
     <div class="table-responsive">
      <table class="table  table-striped table-borderless text-1 table-sm">
        <tbody>
          <tr style="font-size:10px;">
            <td class="col-2"><span class="fw-600 colorblue">ACCOUNT TYPE</span></td>
            <td class="col-2"><span class="fw-600 colorblue">ACCOUNTS</span></td>
            <td class="col-2"><span class="fw-600 colorblue">ADVANCES</span></td>
            <td class="col-2"><span class="fw-600 colorblue">BALANCES</span></td>
            <td class="col-2"><span class="fw-600 colorblue">DATE OPENED</span></td>
      
          </tr>

          <?php
          if(is_array($data->response->Account)){

            $accountscount=count($data->response->Account);

            //echo "<pre>";print_r($data->response->Account);
            $totalamount=array();
            $currentbalance=array();
            $zerobalance=array();
            $overduecount=array();
            $dateranges=array();

            foreach($data->response->Account as $key=>$creditdata )
            {
                
                

              if(isset($creditdata->Account_NonSummary_Segment_Fields[0]->HighCreditOrSanctionedAmount))
              {
                //echo "<pre>";print_r($creditdata->Account_NonSummary_Segment_Fields[0]->HighCreditOrSanctionedAmount);

                array_push($totalamount,$creditdata->Account_NonSummary_Segment_Fields[0]->HighCreditOrSanctionedAmount);
                

              }

              if(isset($creditdata->Account_NonSummary_Segment_Fields[0]->CurrentBalance)  )
              { 
                array_push($currentbalance,$creditdata->Account_NonSummary_Segment_Fields[0]->CurrentBalance);

                if($creditdata->Account_NonSummary_Segment_Fields[0]->CurrentBalance<=0)
                {
                  array_push($zerobalance,$creditdata->Account_NonSummary_Segment_Fields[0]->CurrentBalance);
                }  
                
              }

              if(isset($creditdata->Account_NonSummary_Segment_Fields[0]->AmountOverdue)  )
              { 
                
                  array_push($overduecount,$creditdata->Account_NonSummary_Segment_Fields[0]->AmountOverdue);
                  
              }

              if(isset($creditdata->Account_NonSummary_Segment_Fields[0]->DateOpenedOrDisbursed)  )
              { 
                
                  $formatdate=$date = DateTime::createFromFormat('dmY',$creditdata->Account_NonSummary_Segment_Fields[0]->DateOpenedOrDisbursed);
                  $formatdate=$date->format('Y-m-d');

                  array_push($dateranges,$formatdate);
                  
              }



                
            }  


            
          }
          
          ?>


          <?php
          sort($dateranges);
          ?>
          <tr style="font-size:10px;">
            <td class="col-2"><span class="fw-600 ">All Accounts</span></td>
            <td class="col-2"><span class="fw-600 ">TOTAL: <?php echo $accountscount; ?></span></td>
            <td class="col-4"><span class="fw-600 ">HIGH CR/SANC. AMT: <?php echo array_sum($totalamount);   ?></span></td>
            <td class="col-2"><span class="fw-600 ">CURRENT: <?php echo array_sum($currentbalance); ?></span></td>
            <td class="col-2"><span class="fw-600 ">RECENT: <?php

              
              

               $date = DateTime::createFromFormat('Y-m-d', end($dateranges));
              echo $date->format('d-m-Y');
            
             ?></span></td>
           
          </tr>

          <tr style="font-size:10px;">
            <td class="col-2"><span class="fw-600 "></span></td>
            <td class="col-2"><span class="fw-600 ">OVERDUE: <?php echo count($overduecount); ?></span></td>
            <td class="col-4"><span class="fw-600 "></span></td>
            <td class="col-2"><span class="fw-600 ">OVERDUE:  <?php echo array_sum($overduecount); ?> </span></td>
            <td class="col-2"><span class="fw-600 ">OLDEST: <?php 


            $date = DateTime::createFromFormat('Y-m-d', reset($dateranges));
              echo $date->format('d-m-Y');

             ?></span></td>
           
          </tr>

          <tr style="font-size:10px;">
            <td class="col-2"><span class="fw-600 "></span></td>
            <td class="col-2"><span class="fw-600 ">ZERO-BALANCE: <?php echo count($zerobalance); ?></span></td>
            <td class="col-4"><span class="fw-600 "></span></td>
            <td class="col-2"><span class="fw-600 "></span></td>
            <td class="col-2"><span class="fw-600 "></span></td>
           
          </tr>

          
         
        </tbody>
      </table>
     </div>


     <h5 class="text-2">ENQUIRIES</h5>
     <div class="table-responsive">
      <table class="table  table-striped table-borderless text-1 table-sm">
        <tbody>
          <tr style="font-size:10px;">
            <td class="col-2"><span class="fw-600 colorblue">ENQUIRY PURPOSE</span></td>
            <td class="col-2"><span class="fw-600 colorblue">TOTAL</span></td>
            <td class="col-2"><span class="fw-600 colorblue">PAST 30 DAYS</span></td>
            <td class="col-2"><span class="fw-600 colorblue">PAST 12 MONTHS</span></td>
            <td class="col-2"><span class="fw-600 colorblue">PAST 24 MONTHS</span></td>
            <td class="col-2"><span class="fw-600 colorblue">RECENT</span></td>
            
          </tr>
          <?php
          if(is_array($data->response->Enquiry)){

            $Enquirydata=array();
            foreach($data->response->Enquiry as $enqdata)
            {


              $date = DateTime::createFromFormat('dmY',$enqdata->DateOfEnquiryFields);
              array_push($Enquirydata,$date->format('Y-m-d'));
            } 


             

            ?>  
            <tr style="font-size:10px;">
            <td class="col-2"><span class="fw-600 ">All Enquiries</span></td>
            <td class="col-1"><span class="fw-600 "><?php 
              echo count($Enquirydata); 

              ?></span></td>
            <td class="col-2"><span class="fw-600 "><?php echo calculatedays($Enquirydata,'30 days'); ?></span></td>
            <td class="col-2"><span class="fw-600 "><?php echo calculatedays($Enquirydata,'365 days'); ?></span></td>
            <td class="col-2"><span class="fw-600 "><?php echo calculatedays($Enquirydata,'730 days'); ?></span></td>
            <td class="col-2"><span class="fw-600 "><?php 

              sort($Enquirydata); 
              $date = DateTime::createFromFormat('Y-m-d', end($Enquirydata));
              echo $date->format('d-m-Y');

            ?></span></td>
           
          </tr>
          <?php
          }else if($data->response->Enquiry->DateOfEnquiryFields)
          {
              $Enquirydata = DateTime::createFromFormat('dmy', $data->response->Enquiry->DateOfEnquiryFields);
              $Enquirydata= $date->format('Y-m-d');

            ?>
            <tr style="font-size:10px;">
            <td class="col-2"><span class="fw-600 ">All Enquiries</span></td>
            <td class="col-1"><span class="fw-600 ">1</span></td>
            <td class="col-2"><span class="fw-600 "><?php echo calculatesingleday($Enquirydata,'30 days'); ?></span></td>
            <td class="col-2"><span class="fw-600 "><?php echo calculatesingleday($Enquirydata,'365 days'); ?></span></td>
            <td class="col-2"><span class="fw-600 "><?php echo calculatesingleday($Enquirydata,'730 days'); ?></span></td>
            <td class="col-2"><span class="fw-600 "><?php 

             $Enquirydata = DateTime::createFromFormat('Y-m-d', $data->response->Enquiry->DateOfEnquiryFields);
              echo $date->format('d-m-Y');

            ?></span></td>

           <?php 
          }
          else{
            ?>
            <tr style="font-size:10px;">
            <td class="col-2"><span class="fw-600 ">All Enquiries</span></td>
            <td class="col-1"><span class="fw-600 ">0</span></td>
            <td class="col-2"><span class="fw-600 ">0</span></td>
            <td class="col-2"><span class="fw-600 ">0</span></td>
            <td class="col-2"><span class="fw-600 ">0</span></td>
            <td class="col-2"><span class="fw-600 ">0</span></td>
            <?php
          }
          
          ?>

          

        

          
         
        </tbody>
      </table>
     </div>


     <h5 class="text-2 ">ACCOUNT(S):</h5>
     <div class="table-responsive">
      <table class="table  table-striped table-borderless text-1 table-sm">
        <tbody>
          <tr style="font-size:10px;">
            <td class="col-4"><span class="fw-600 colorblue ">ACCOUNT</span></td>
            <td class="col-4"><span class="fw-600  colorblue">DATES</span></td>
            <td class="col-3"><span class="fw-600 colorblue">AMOUNTS</span></td>
            <td class="col-1"><span class="fw-600 colorblue ">STATUS</span></td>
           
           
          </tr>
          <?php
          if(is_array($data->response->Account))
          {

            $Enquirydata=array();
            foreach($data->response->Account as $key=>$creditdata)
            {
              if(isset($creditdata->Account_NonSummary_Segment_Fields[0]->HighCreditOrSanctionedAmount))
              {


              ?>  

                  <!-- Repeating parent row -->
                    <tr>
                        <tr style="font-size:10px;">
                          <td class="col-4"><span class="fw-600  ">MEMBER NAME: </span><?php echo $creditdata->Account_NonSummary_Segment_Fields[0]->ReportingMemberShortName; ?></td>

                          <td class="col-4"><span class="fw-600  ">OPENED:</span> <?php 
                              echo dateformater($creditdata->Account_NonSummary_Segment_Fields[0]->DateOpenedOrDisbursed);
                             ?></td>

                          <td class="col-3"><span class="fw-600 ">SANCTIONED:</span> <?php echo $creditdata->Account_NonSummary_Segment_Fields[0]->HighCreditOrSanctionedAmount; ?></td>
                          <td class="col-1"><span class="fw-600  "></span></td> 
                        </tr>

                        <tr style="font-size:10px;">
                          <td class="col-4"><span class="fw-600  ">ACCOUNT NUMBER: </span> NOT DISCLOSED</td>
                          <td class="col-4"><span class="fw-600  ">REPORTED AND CERTIFIED:</span> <?php 
                              echo dateformater($creditdata->Account_NonSummary_Segment_Fields[0]->DateReportedAndCertified);
                             ?></td>
                          <td class="col-3"><span class="fw-600 ">PMT FREQ: </span><?php 

                              if(isset($creditdata->Account_NonSummary_Segment_Fields[0]->PaymentFrequency)){
                                echo paymentfrequency($creditdata->Account_NonSummary_Segment_Fields[0]->PaymentFrequency);
                              }
                              
                             ?></td>
                          <td class="col-1"><span class="fw-600  "></span></td> 
                        </tr>

                        <tr style="font-size:10px;">
                          <td class="col-4"><span class="fw-600  ">TYPE: </span><?php 
                              echo accounttype($creditdata->Account_NonSummary_Segment_Fields[0]->AccountType);
                             ?></td>
                          <td class="col-4"><span class="fw-600  ">PMT HIST START:</span> <?php 
                              echo dateformater($creditdata->Account_NonSummary_Segment_Fields[0]->PaymentHistoryStartDate);
                             ?></td>
                          <td class="col-3"><span class="fw-600 "></td>
                          <td class="col-1"><span class="fw-600  "></span></td> 
                        </tr>

                        <tr style="font-size:10px;">
                          <td class="col-4"><span class="fw-600  ">OWNERSHIP: </span><?php 
                              echo ownership($creditdata->Account_NonSummary_Segment_Fields[0]->OwenershipIndicator);
                             ?></td>
                          <td class="col-4"><span class="fw-600  ">PMT HIST END:</span><?php 
                              echo dateformater($creditdata->Account_NonSummary_Segment_Fields[0]->PaymentHistoryEndDate);
                             ?></td>
                          <td class="col-3"><span class="fw-600 "></td>
                          <td class="col-1"><span class="fw-600  "></span></td> 
                        </tr>

                        <tr>
                          <td colspan="4" class="col-12 colorblue" style="font-size:10px;" ><span class=" fw-600 colorblue">DAYS PAST DUE/ASSET CLASSIFICATION (UP TO 36 MONTHS; LEFT TO RIGHT)</span></td>
                        </tr>
                        
                        <tr style="font-size:10px;">
                          <td class="col-3"><span class="fw-600  ">000 </span></td>
                          <td class="col-3"><span class="fw-600  ">000</span></td>
                          <td class="col-3"><span class="fw-600 ">000</span></td>
                          <td class="col-3"><span class="fw-600  ">000</span></td>
                        </tr>
                    </tr>    
                    
                  <!-- Repeating parent row -->


              <?php
              }    
            }

          }
          if(isset($data->response->Account->Account_NonSummary_Segment_Fields[0]->HighCreditOrSanctionedAmount))
          {
          ?>

          <!-- Repeating parent row -->
            <tr>
                <tr style="font-size:10px;">
                  <td class="col-4"><span class="fw-600  ">MEMBER NAME: </span> <?php echo $data->response->Account->Account_NonSummary_Segment_Fields[0]->ReportingMemberShortName; ?></td>

                  <td class="col-4"><span class="fw-600  ">OPENED:</span> <?php 
                              echo dateformater($data->response->Account->Account_NonSummary_Segment_Fields[0]->DateOpenedOrDisbursed);
                             ?></td>

                  <td class="col-3"><span class="fw-600 ">SANCTIONED:</span><?php echo $data->response->Account->Account_NonSummary_Segment_Fields[0]->HighCreditOrSanctionedAmount; ?></td>

                  <td class="col-1"><span class="fw-600  "></span></td> 
                </tr>

                <tr style="font-size:10px;">
                  <td class="col-4"><span class="fw-600  ">ACCOUNT NUMBER: </span> NOT DISCLOSED</td>

                  <td class="col-4"><span class="fw-600  ">REPORTED AND CERTIFIED:</span> <?php 
                              echo dateformater($data->response->Account->Account_NonSummary_Segment_Fields[0]->DateReportedAndCertified);
                             ?></td>

                  <td class="col-3"><span class="fw-600 ">PMT FREQ:</span><?php 
                              echo paymentfrequency($data->response->Account->Account_NonSummary_Segment_Fields[0]->PaymentFrequency);
                             ?></td>

                  <td class="col-1"><span class="fw-600  "></span></td> 
                </tr>

                <tr style="font-size:10px;">
                  <td class="col-4"><span class="fw-600  ">TYPE: </span><?php 
                              echo accounttype($data->response->Account->Account_NonSummary_Segment_Fields[0]->AccountType);
                             ?></td>

                  <td class="col-4"><span class="fw-600  ">PMT HIST START:</span><?php 
                              echo dateformater($data->response->Account->Account_NonSummary_Segment_Fields[0]->PaymentHistoryStartDate);
                             ?></td>

                  <td class="col-3"><span class="fw-600 "></td>
                  <td class="col-1"><span class="fw-600  "></span></td> 
                </tr>

                <tr style="font-size:10px;">
                  <td class="col-4"><span class="fw-600  ">OWNERSHIP: </span><?php 
                              echo ownership($data->response->Account->Account_NonSummary_Segment_Fields[0]->OwenershipIndicator);
                             ?></td>

                  <td class="col-4"><span class="fw-600  ">PMT HIST END:</span> <?php 
                              echo dateformater($data->response->Account->Account_NonSummary_Segment_Fields[0]->PaymentHistoryEndDate);
                             ?></td>
                  <td class="col-3"><span class="fw-600 "></td>
                  <td class="col-1"><span class="fw-600  "></span></td> 
                </tr>

                <tr>
                  <td colspan="4" class="col-12 colorblue" style="font-size:10px;" ><span class=" fw-600 colorblue">DAYS PAST DUE/ASSET CLASSIFICATION (UP TO 36 MONTHS; LEFT TO RIGHT)</span></td>
                </tr>
                
                <tr style="font-size:10px;">
                  <td class="col-3"><span class="fw-600  ">000 </span></td>
                  <td class="col-3"><span class="fw-600  ">000</span></td>
                  <td class="col-3"><span class="fw-600 ">000</span></td>
                  <td class="col-3"><span class="fw-600  ">000</span></td>
                </tr>
            </tr>    
          <!-- Repeating parent row -->
          <?php } ?>
        </tbody>
      </table>
     </div>

     <h5 class="text-2 ">ENQUIRIES:</h5>
     <div class="table-responsive">
      <table class="table  table-striped table-borderless text-1 table-sm">
        <tbody>
          <tr style="font-size:10px;">
            <td class="col-3"><span class="fw-600 colorblue ">MEMBER</span></td>
            <td class="col-3"><span class="fw-600  colorblue">ENQUIRY DATE </span></td>
            <td class="col-3"><span class="fw-600 colorblue">ENQUIRY PURPOSE</span></td>
            <td class="col-3"><span class="fw-600 colorblue ">ENQUIRY AMOUNT</span></td>
           
           
          </tr>

          <?php
          if(is_array($data->response->Enquiry))
          {


            foreach($data->response->Enquiry as $entabledata)
            {
            ?>


          <tr style="font-size:10px;">
            <td class="col-3"><?php echo $entabledata->EnquiringMemberShortName; ?></td>
            <td class="col-3"><?php echo dateformater($entabledata->DateOfEnquiryFields); ?></td>
            <td class="col-3"><?php echo $entabledata->EnquiryPurpose; ?></td>
            <td class="col-3"><?php echo $entabledata->EnquiryAmount; ?></td> 
          </tr>
            <?php 
            }
            
          }  
          else{

            ?>
            <tr style="font-size:10px;">
            <td class="col-3"><?php echo $data->response->Enquiry->EnquiringMemberShortName; ?></td>
            <td class="col-3"><?php echo dateformater($data->response->Enquiry->DateOfEnquiryFields); ?></td>
            <td class="col-3"><?php echo $data->response->Enquiry->EnquiryPurpose; ?></td>
            <td class="col-3"><?php echo $data->response->Enquiry->EnquiryAmount; ?></td> 
          </tr>
          <?php
          }

          ?>
        
        </tbody>
      </table>
     </div>

     <div><p class="colorblue fw-600">END OF REPORT ON <?php 

            echo $data->response->NameSegment->ConsumerName1; 
            checkisset($data->response->NameSegment,'ConsumerName2');
            checkisset($data->response->NameSegment,'ConsumerName3');


          ?> </p></div>
    
     <div><p class="" style="text-align: justify; line-height:10px;font-size: 9px;">All information contained in this credit report has been collated by TransUnion CIBIL Limited ( TU CIBIL) based on information provided/ submitted by its various members("Members"), as part of periodic data submission and Members are required to ensure accuracy, completeness and veracity of the information submitted. The credit report is generated using the proprietary search and match logic of TU CIBIL. TU CIBIL uses its best efforts to ensure accuracy, completeness and veracity of the information contained in the Report, and shall only be liable and / or responsible if any discrepancies are directly attributable to TU CIBIL. The use of this report is governed by the terms and conditions of the Operating Rules for TU CIBIL and its Members.</p></div>
  
  </div>
</body>
</html>