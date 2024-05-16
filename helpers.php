<?php 

function accounttype($case)
{
      switch ($case) {
                        case "01":
                          echo "Auto Loan (Personal)";
                          break;
                        case "02":
                          "Housing Loan";
                          break;
                        case "03":
                          echo "Property Loan";
                          break;
                        case "04":
                          echo "Loan Against Shares / Securities";
                          break;
                        case "05":
                          echo "Personal Loan";
                          break;
                        case "06":
                          echo "Consumer Loan";
                          break;
                        case "07":
                          echo "Gold Loan";
                          break;
                        case "08":
                          echo "Education Loan";
                          break;
                        case "09":
                          echo "Loan to Professional";
                          break;
                        case "10":
                          echo "Credit Card";
                          break;
                        case "11":
                          echo "Leasing";
                          break;
                        case "12":
                          echo "Overdraft";
                          break;
                        case "13":
                          echo "Two-Wheeler Loan";
                          break;  
                        case "14":
                          echo "Non-Funded Credit Facility";
                          break; 
                        case "15":
                          echo "Loan Against Bank Deposits";
                          break; 
                        case "16":
                          echo "Fleet Card";
                          break; 
                        case "17":
                          echo "Commercial Vehicle Loan";
                          break; 
                        case "18":
                          echo "Telco – Wireless";
                          break; 
                        case "19":
                          echo "Telco – Broadband";
                          break; 
                        case "20":
                          echo "Telco – Landline";
                          break;
                        case "21":
                          echo "Seller Financing";
                          break;
                        case "23":
                          echo "GECL Loan Secured";
                          break;
                        case "24":
                          echo "GECL Loan Unsecured";
                          break;
                        case "31":
                          echo "Secured Credit Card";
                          break;
                        case "32":
                          echo "Used Car Loan";
                          break;
                        case "33":
                          echo "Construction Equipment Loan";
                          break;
                        case "34":
                          echo "Tractor Loan";
                          break;
                        case "35":
                          echo "Corporate Credit Card";
                          break;
                        case "36":
                          echo "Kisan Credit Card";
                          break;
                        case "37":
                          echo "Loan on Credit Card";
                          break;
                        case "38":
                          echo "Prime Minister Jaan Dhan Yojana – Overdraft";
                          break;
                        case "39":
                          echo "Mudra Loans – Shishu / Kishor / Tarun";
                          break;
                        case "40":
                          echo "Microfinance – Business Loan";
                          break;
                        case "41":
                          echo "Microfinance – Personal Loan";
                          break;
                        case "42":
                          echo "Microfinance – Housing Loan";
                          break;
                        case "43":
                          echo "Microfinance – Others";
                          break;
                        case "44":
                          echo "Pradhan Mantri Awas Yojana - Credit Link Subsidy Scheme MAY CLSS";
                          break;
                        case "45":
                          echo "P2P Personal Loan";
                          break;
                        case "46":
                          echo "P2P Auto Loan";
                          break;
                        case "47":
                          echo "P2P Education Loan";
                          break;
                        case "50":
                          echo "Business Loan – Secured";
                          break;
                        case "51":
                          echo "Business Loan – General";
                          break;
                        case "52":
                          echo "Business Loan – Priority Sector – Small Business";
                          break;
                        case "53":
                          echo "Business Loan – Priority Sector – Agriculture";
                          break;
                        case "54":
                          echo "Business Loan – Priority Sector – Others";
                          break;
                        case "55":
                          echo "Business Non-Funded Credit Facility – General";
                          break;
                        case "56":
                          echo "Business Non-Funded Credit Facility-Priority Sector- Small Business";
                          break;
                        case "57":
                          echo "Business Non-Funded Credit Facility-Priority Sector-Agriculture";
                          break;
                        case "58":
                          echo "Business Non-Funded Credit Facility-Priority Sector-Others";
                          break;
                        case "59":
                          echo "Business Loan Against Bank Deposits";
                          break;
                        case "61":
                          echo "Business Loan – Unsecured";
                          break;
                        case "69":
                          echo "Short Term Personal Loan";
                          break;
                        case "70":
                          echo "Priority Sector- Gold Loan";
                          break;
                        case "71":
                          echo "Temporary Overdraft";
                          break;
                        case "00":
                          echo "Other";
                          break;
                        default:
                          echo "Invalid Data";
                      }
}


function statecode($case)
{
      //echo "testme";
             switch ($case) {
                        case "01":
                          echo "Jammu & Kashmir";
                          break;
                        case "02":
                          "Himachal Pradesh";
                          break;
                        case "03":
                          echo "Punjab";
                          break;
                        case "04":
                          echo "Chandigarh";
                          break;
                        case "05":
                          echo "Uttaranchal";
                          break;
                        case "06":
                          echo "Haryana";
                          break;
                        case "07":
                          echo "Delhi";
                          break;
                        case "08":
                          echo "Rajasthan";
                          break;
                        case "09":
                          echo "Uttar Pradesh";
                          break;
                        case "10":
                          echo "Bihar";
                          break;
                        case "11":
                          echo "Sikkim";
                          break;
                        case "12":
                          echo "Arunachal Pradesh";
                          break;
                        case "13":
                          echo "Nagaland";
                          break;  
                        case "14":
                          echo "Manipur";
                          break; 
                        case "15":
                          echo "Mizoram";
                          break; 
                        case "16":
                          echo "Tripura";
                          break; 
                        case "17":
                          echo "Meghalaya";
                          break; 
                        case "18":
                          echo "Assam";
                          break; 
                        case "19":
                          echo "West Bengal";
                          break; 
                        case "20":
                          echo "Jharkhand";
                          break;
                        case "21":
                          echo "Orissa";
                          break;
                        case "22":
                          echo "Chhattisgarh";
                          break;
                        case "23":
                          echo "Madhya Pradesh";
                          break;
                        case "24":
                          echo "Gujarat";
                          break;
                        case "25":
                          echo "Daman & Diu ";
                          break;
                        case "26":
                          echo "Dadra & Nagar Haveli ";
                          break;
                        case "27":
                          echo "Maharashtra";
                          break;
                        case "28":
                          echo "Andhra Pradesh";
                          break;
                        case "29":
                          echo "Karnataka";
                          break;
                        case "30":
                          echo "Goa";
                          break;
                        case "31":
                          echo "Lakshadweep";
                          break;
                        case "32":
                          echo "Kerala";
                          break;
                        case "33":
                          echo "Tamil Nadu";
                          break;
                        case "34":
                          echo "Pondicherry";
                          break;
                        case "35":
                          echo "Andaman & Nicobar Islands";
                          break;
                        case "36":
                          echo "Telangana";
                          break;
                        case "99":
                          echo "APO Address";
                          break;
                        default:
                          echo "Invalid Data";
                      }
}

function checkisset($value,$index)
{
    if(isset($value->$index))
    {
       
        echo $value->$index;
    }

}


function calculatedays($Enquirydata,$days)
{

  $arr=array();
             
  $date = Date('Y-m-d', strtotime('-'.$days));
  foreach($Enquirydata as $datedata){
    if($date <= $datedata)
    {
      //echo $datedata."<br>";
      array_push($arr,$datedata);
    }
  }
  return count($arr);
}

function calculatesingleday($Enquirydata,$days)
{

  $arr=array();
             
  $date = Date('Y-m-d', strtotime('-'.$days));
 
    if($date <= $Enquirydata)
    {
      
      return 1;
    }
    else
    {
      return 0;
    }  
  

}


function dateformater($date){
  
  $Enquirydata = DateTime::createFromFormat('dmY',$date);
              return $Enquirydata->format('d-m-Y');
}


function paymentfrequency($case)
{
      switch ($case) {
                        case "01":
                          echo "Weekly";
                          break;
                        case "02":
                          "Fortnightly";
                          break;
                        case "03":
                          echo "Monthly";
                          break;
                        case "04":
                          echo "Quarterly";
                          break;
                        case "05":
                          echo "Bullet payment";
                          break;
                        case "06":
                          echo "Daily";
                          break;
                        case "07":
                          echo "= Half yearly";
                          break;
                        case "08":
                          echo "Yearly";
                          break;
                        case "09":
                          echo "On-demand";
                          break;
                        
                        default:
                          echo "Invalid Data";
                      }
}

function ownership($case)
{
      switch ($case) {
                        case "01":
                          echo "Individual";
                          break;
                        case "02":
                          "Authorised User (refers to supplementary credit card holder)";
                          break;
                        case "03":
                          echo "Guarantor";
                          break;
                        case "04":
                          echo "Joint";
                          break;
                        case "05":
                          echo "Deceased";
                          break;
                       
                        
                        default:
                          echo "Invalid Data";
                      }
}

?>