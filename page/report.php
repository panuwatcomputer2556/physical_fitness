

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	
    $nowtimespc = date("H:i:s");
    $nowdatespc = date("Y-m-d");
    $datetimemixspc = strtotime($nowdatespc.' '.$nowtimespc);
    $dtmixspcinsert = date('Y-m-d H:i:s', $datetimemixspc);       
require('../connection/connectdb.php');
session_start();

if(!isset($_SESSION["adminuserid"]) || !isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] == FALSE || $_SESSION['aa_menu'] != "admin"){
    header("Location: ../login.php");
    exit(); 
}


$num = $_GET['num'];
$activity_class = $_GET['activity_class'];
$major_id = $_GET['major_id'];
$encodeidx = $_GET['encodeidx'];
$aa_menu = $_SESSION['aa_menu'];
$aa_prefix = $_SESSION['aa_prefix'];
$aa_name = $_SESSION['aa_name'];
$aa_lastname = $_SESSION['aa_lastname'];
$aa_class = $_SESSION['aa_class'];
$aa_major = $_SESSION['aa_major'];
$aa_gender = $_SESSION['aa_gender'];
$export = "ครั้งที่ ".$num."-".$activity_class."-".$major_id."-".$dtmixspcinsert;
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$export.xls");
header("Pragma: no-cache");
header("Expires: 0");

$sqldata = "SELECT
`master_encodeid`,
activity_master.aa_user_id_encode,
`master_activity_encode`,
`master_age`,
`master_weight`,
`master_height`,
`master_ac1`,
`master_ac2`,
`master_ac3`,
`master_ac4`,
`master_ac5`,
setting_activity.activity_num,
setting_activity.activity_timestart,
setting_activity.activity_timeend,
account_admin.aa_user_id_encode,
account_admin.aa_prefix,
account_admin.aa_name,
account_admin.aa_lastname,
system_major.major_name,
account_admin.aa_class,
account_admin.aa_major,
setting_activity.activity_encode
FROM
`activity_master`
LEFT JOIN setting_activity ON setting_activity.activity_encode = activity_master.master_activity_encode
LEFT JOIN account_admin ON account_admin.aa_user_id_encode = activity_master.aa_user_id_encode
LEFT JOIN system_major ON system_major.major_id = account_admin.aa_major
where 
account_admin.aa_class = '$activity_class' 
AND account_admin.aa_major= '$major_id' 
AND setting_activity.activity_num = '$num'
AND setting_activity.activity_encode = '$encodeidx'
";
$query_sqldata = $connectdb->query($sqldata);


function bmi($age,$gender,$weight,$height){
    $height = $height/100;
    $bmi = $weight/($height*$height);	// คำควณ ค่า BMI
    if($gender=="male"){
         if($age <= 13){
             if($bmi<=12.02){
                 $txtstep = "ผอมมาก";
                 $txtstepcolor = "danger";
             }
             else if($bmi<=17.42){
                 $txtstep = "ผอม";
                 $txtstepcolor = "danger";
             }
             else if($bmi<=21.60){
                 $txtstep = "สมส่วน";
                 $txtstepcolor = "success";
             }
             else if($bmi<=25.76){
                 $txtstep = "ท้วม";
                 $txtstepcolor = "primary";
             }
             else{ //25.77
                 $txtstep = "อ้วน";
                 $txtstepcolor = "danger";
             }
         }
         else if($age <= 14){
            if($bmi<=12.53){
                $txtstep = "ผอมมาก";
                $txtstepcolor = "danger";
            }
            else if($bmi<=17.65){
                $txtstep = "ผอม";
                $txtstepcolor = "danger";
            }
            else if($bmi<=21.95){
                $txtstep = "สมส่วน";
                $txtstepcolor = "success";
            }
            else if($bmi<=26.26){
                $txtstep = "ท้วม";
                $txtstepcolor = "primary";
            }
            else{ //26.27
                $txtstep = "อ้วน";
                $txtstepcolor = "danger";
            }
         }
         else if($age <= 15){
            if($bmi<=12.72){
                $txtstep = "ผอมมาก";
                $txtstepcolor = "danger";
            }
            else if($bmi<=18.65){
                $txtstep = "ผอม";
                $txtstepcolor = "danger";
            }
            else if($bmi<=23.21){
                $txtstep = "สมส่วน";
                $txtstepcolor = "success";
            }
            else if($bmi<=27.41){
                $txtstep = "ท้วม";
                $txtstepcolor = "primary";
            }
            else{ //27.42
                $txtstep = "อ้วน";
                $txtstepcolor = "danger";
            }
         }
         else if($age <= 16){
            if($bmi<=13.30){
                $txtstep = "ผอมมาก";
                $txtstepcolor = "danger";
            }
            else if($bmi<=18.57){
                $txtstep = "ผอม";
                $txtstepcolor = "danger";
            }
            else if($bmi<=23.60){
                $txtstep = "สมส่วน";
                $txtstepcolor = "success";
            }
            else if($bmi<=28.20){
                $txtstep = "ท้วม";
                $txtstepcolor = "primary";
            }
            else{ //28.21
                $txtstep = "อ้วน";
                $txtstepcolor = "danger";
            }
         }
         else if($age <= 17){
            if($bmi<=13.88){
                $txtstep = "ผอมมาก";
                $txtstepcolor = "danger";
            }
            else if($bmi<=19.06){
                $txtstep = "ผอม";
                $txtstepcolor = "danger";
            }
            else if($bmi<=23.87){
                $txtstep = "สมส่วน";
                $txtstepcolor = "success";
            }
            else if($bmi<=28.69){
                $txtstep = "ท้วม";
                $txtstepcolor = "primary";
            }
            else{ //28.70
                $txtstep = "อ้วน";
                $txtstepcolor = "danger";
            }
         }
         else{
            if($bmi<=13.97){
                $txtstep = "ผอมมาก";
                $txtstepcolor = "danger";
            }
            else if($bmi<=18.97){
                $txtstep = "ผอม";
                $txtstepcolor = "danger";
            }
            else if($bmi<=23.86){
                $txtstep = "สมส่วน";
                $txtstepcolor = "success";
            }
            else if($bmi<=28.73){
                $txtstep = "ท้วม";
                $txtstepcolor = "primary";
            }
            else{ //28.74
                $txtstep = "อ้วน";
                $txtstepcolor = "danger";
            }
         }    
    }else{
     if($age <= 13){
        if($bmi<=12.74){
            $txtstep = "ผอมมาก";
            $txtstepcolor = "danger";
        }
        else if($bmi<=17.36){
            $txtstep = "ผอม";
            $txtstepcolor = "danger";
        }
        else if($bmi<=21.64){
            $txtstep = "สมส่วน";
            $txtstepcolor = "success";
        }
        else if($bmi<=25.85){
            $txtstep = "ท้วม";
            $txtstepcolor = "primary";
        }
        else{ //25.86
            $txtstep = "อ้วน";
            $txtstepcolor = "danger";
        }
     }
     else if($age <= 14){
        if($bmi<=13.19){
            $txtstep = "ผอมมาก";
            $txtstepcolor = "danger";
        }
        else if($bmi<=18.05){
            $txtstep = "ผอม";
            $txtstepcolor = "danger";
        }
        else if($bmi<=22.93){
            $txtstep = "สมส่วน";
            $txtstepcolor = "success";
        }
        else if($bmi<=26.91){
            $txtstep = "ท้วม";
            $txtstepcolor = "primary";
        }
        else{ //26.92
            $txtstep = "อ้วน";
            $txtstepcolor = "danger";
        }
     }
     else if($age <= 15){
        if($bmi<=13.65){
            $txtstep = "ผอมมาก";
            $txtstepcolor = "danger";
        }
        else if($bmi<=19.65){
            $txtstep = "ผอม";
            $txtstepcolor = "danger";
        }
        else if($bmi<=23.80){
            $txtstep = "สมส่วน";
            $txtstepcolor = "success";
        }
        else if($bmi<=27.89){
            $txtstep = "ท้วม";
            $txtstepcolor = "primary";
        }
        else{ //27.90
            $txtstep = "อ้วน";
            $txtstepcolor = "danger";
        }
     }
     else if($age <= 16){
        if($bmi<=13.88){
            $txtstep = "ผอมมาก";
            $txtstepcolor = "danger";
        }
        else if($bmi<=20.06){
            $txtstep = "ผอม";
            $txtstepcolor = "danger";
        }
        else if($bmi<=24.34){
            $txtstep = "สมส่วน";
            $txtstepcolor = "success";
        }
        else if($bmi<=28.47){
            $txtstep = "ท้วม";
            $txtstepcolor = "primary";
        }
        else{ //28.48
            $txtstep = "อ้วน";
            $txtstepcolor = "danger";
        }
     }
     else if($age <= 17){
        if($bmi<=13.92){
            $txtstep = "ผอมมาก";
            $txtstepcolor = "danger";
        }
        else if($bmi<=19.81){
            $txtstep = "ผอม";
            $txtstepcolor = "danger";
        }
        else if($bmi<=24.44){
            $txtstep = "สมส่วน";
            $txtstepcolor = "success";
        }
        else if($bmi<=28.91){
            $txtstep = "ท้วม";
            $txtstepcolor = "primary";
        }
        else{ //28.92
            $txtstep = "อ้วน";
            $txtstepcolor = "danger";
        }
     }
     else{
        if($bmi<=14.18){
            $txtstep = "ผอมมาก";
            $txtstepcolor = "danger";
        }
        else if($bmi<=19.85){
            $txtstep = "ผอม";
            $txtstepcolor = "danger";
        }
        else if($bmi<=24.62){
            $txtstep = "สมส่วน";
            $txtstepcolor = "success";
        }
        else if($bmi<=28.40){
            $txtstep = "ท้วม";
            $txtstepcolor = "primary";
        }
        else{ //28.41
            $txtstep = "อ้วน";
            $txtstepcolor = "danger";
        }
     }
    }
    $bmix[0] = $txtstep;
    $bmix[1] = $txtstepcolor;
    $bmix[2] = $bmi;
    return $bmix;
}

function step_updown($age,$gender,$stepnum)
{
   if($gender=="male"){
        if($age <= 13){
            if($stepnum<=98){
                $txtstep = "ต่ำมาก";
                $txtstepcolor = "danger";

            }
            else if($stepnum<=123){
                $txtstep = "ต่ำ";
                $txtstepcolor = "danger";
            }
            else if($stepnum<=149){
                $txtstep = "ปานกลาง";
                $txtstepcolor = "warning";
            }
            else if($stepnum<=168){
                $txtstep = "ดี";
                $txtstepcolor = "success";
            }
            else{ //169
                $txtstep = "ดีมาก";
                $txtstepcolor = "success";
            }

        }
        else if($age <= 14){
            if($stepnum<=104){
                $txtstep = "ต่ำมาก";
                $txtstepcolor = "danger";

            }
            else if($stepnum<=129){
                $txtstep = "ต่ำ";
                $txtstepcolor = "danger";
            }
            else if($stepnum<=154){
                $txtstep = "ปานกลาง";
                $txtstepcolor = "warning";
            }
            else if($stepnum<=170){
                $txtstep = "ดี";
                $txtstepcolor = "success";
            }
            else{ //171
                $txtstep = "ดีมาก";
                $txtstepcolor = "success";
            }
        }
        else if($age <= 15){
            if($stepnum<=104){
                $txtstep = "ต่ำมาก";
                $txtstepcolor = "danger";

            }
            else if($stepnum<=130){
                $txtstep = "ต่ำ";
                $txtstepcolor = "danger";
            }
            else if($stepnum<=155){
                $txtstep = "ปานกลาง";
                $txtstepcolor = "warning";
            }
            else if($stepnum<=172){
                $txtstep = "ดี";
                $txtstepcolor = "success";
            }
            else{ //173
                $txtstep = "ดีมาก";
                $txtstepcolor = "success";
            }
        }
        else if($age <= 16){
            if($stepnum<=106){
                $txtstep = "ต่ำมาก";
                $txtstepcolor = "danger";

            }
            else if($stepnum<=131){
                $txtstep = "ต่ำ";
                $txtstepcolor = "danger";
            }
            else if($stepnum<=156){
                $txtstep = "ปานกลาง";
                $txtstepcolor = "warning";
            }
            else if($stepnum<=175){
                $txtstep = "ดี";
                $txtstepcolor = "success";
            }
            else{ //176
                $txtstep = "ดีมาก";
                $txtstepcolor = "success";
            }
        }
        else if($age <= 17){
            if($stepnum<=108){
                $txtstep = "ต่ำมาก";
                $txtstepcolor = "danger";

            }
            else if($stepnum<=135){
                $txtstep = "ต่ำ";
                $txtstepcolor = "danger";
            }
            else if($stepnum<=161){
                $txtstep = "ปานกลาง";
                $txtstepcolor = "warning";
            }
            else if($stepnum<=180){
                $txtstep = "ดี";
                $txtstepcolor = "success";
            }
            else{ //181
                $txtstep = "ดีมาก";
                $txtstepcolor = "success";
            }
        }
        else{
            if($stepnum<=108){
                $txtstep = "ต่ำมาก";
                $txtstepcolor = "danger";

            }
            else if($stepnum<=135){
                $txtstep = "ต่ำ";
                $txtstepcolor = "danger";
            }
            else if($stepnum<=162){
                $txtstep = "ปานกลาง";
                $txtstepcolor = "warning";
            }
            else if($stepnum<=187){
                $txtstep = "ดี";
                $txtstepcolor = "success";
            }
            else{ //188
                $txtstep = "ดีมาก";
                $txtstepcolor = "success";
            }
        }

        
   }else{
    if($age <= 13){
        if($stepnum<=96){
            $txtstep = "ต่ำมาก";
            $txtstepcolor = "danger";

        }
        else if($stepnum<=117){
            $txtstep = "ต่ำ";
            $txtstepcolor = "danger";
        }
        else if($stepnum<=139){
            $txtstep = "ปานกลาง";
            $txtstepcolor = "warning";
        }
        else if($stepnum<=151){
            $txtstep = "ดี";
            $txtstepcolor = "success";
        }
        else{ //152
            $txtstep = "ดีมาก";
            $txtstepcolor = "success";
        }

    }
    else if($age <= 14){
        if($stepnum<=100){
            $txtstep = "ต่ำมาก";
            $txtstepcolor = "danger";

        }
        else if($stepnum<=123){
            $txtstep = "ต่ำ";
            $txtstepcolor = "danger";
        }
        else if($stepnum<=146){
            $txtstep = "ปานกลาง";
            $txtstepcolor = "warning";
        }
        else if($stepnum<=159){
            $txtstep = "ดี";
            $txtstepcolor = "success";
        }
        else{ //160
            $txtstep = "ดีมาก";
            $txtstepcolor = "success";
        }
    }
    else if($age <= 15){
        if($stepnum<=101){
            $txtstep = "ต่ำมาก";
            $txtstepcolor = "danger";

        }
        else if($stepnum<=124){
            $txtstep = "ต่ำ";
            $txtstepcolor = "danger";
        }
        else if($stepnum<=147){
            $txtstep = "ปานกลาง";
            $txtstepcolor = "warning";
        }
        else if($stepnum<=164){
            $txtstep = "ดี";
            $txtstepcolor = "success";
        }
        else{ //165
            $txtstep = "ดีมาก";
            $txtstepcolor = "success";
        }
    }
    else if($age <= 16){
        if($stepnum<=102){
            $txtstep = "ต่ำมาก";
            $txtstepcolor = "danger";

        }
        else if($stepnum<=125){
            $txtstep = "ต่ำ";
            $txtstepcolor = "danger";
        }
        else if($stepnum<=149){
            $txtstep = "ปานกลาง";
            $txtstepcolor = "warning";
        }
        else if($stepnum<=171){
            $txtstep = "ดี";
            $txtstepcolor = "success";
        }
        else{ //173
            $txtstep = "ดีมาก";
            $txtstepcolor = "success";
        }
    }
    else if($age <= 17){
        if($stepnum<=104){
            $txtstep = "ต่ำมาก";
            $txtstepcolor = "danger";

        }
        else if($stepnum<=129){
            $txtstep = "ต่ำ";
            $txtstepcolor = "danger";
        }
        else if($stepnum<=153){
            $txtstep = "ปานกลาง";
            $txtstepcolor = "warning";
        }
        else if($stepnum<=174){
            $txtstep = "ดี";
            $txtstepcolor = "success";
        }
        else{ //175
            $txtstep = "ดีมาก";
            $txtstepcolor = "success";
        }
    }
    else{
        if($stepnum<=107){
            $txtstep = "ต่ำมาก";
            $txtstepcolor = "danger";

        }
        else if($stepnum<=131){
            $txtstep = "ต่ำ";
            $txtstepcolor = "danger";
        }
        else if($stepnum<=156){
            $txtstep = "ปานกลาง";
            $txtstepcolor = "warning";
        }
        else if($stepnum<=180){
            $txtstep = "ดี";
            $txtstepcolor = "success";
        }
        else{ //181
            $txtstep = "ดีมาก";
            $txtstepcolor = "success";
        }
    }
   }
   $txtstepx[0] = $txtstep;
   $txtstepx[1] = $txtstepcolor;
   return $txtstepx;
}

function sit_reach($age,$gender,$stepnum)
{
    if($gender=="male"){
         if($age <= 13){
             if($stepnum<=5){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=10){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=15){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=20){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //21
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
 
         }
         else if($age <= 14){
             if($stepnum<=5){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=11){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=16){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=22){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //23
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else if($age <= 15){
             if($stepnum<=7){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=13){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=19){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=24){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //25
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else if($age <= 16){
             if($stepnum<=7){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=13){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=19){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=25){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //26
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else if($age <= 17){
             if($stepnum<=7){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=13){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=20){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=27){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //28
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else{
             if($stepnum<=8){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=15){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=21){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=28){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //29
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }  
    }else{
     if($age <= 13){
         if($stepnum<=5){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=11){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=16){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=22){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //23
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
 
     }
     else if($age <= 14){
         if($stepnum<=7){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=13){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=18){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=23){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //24
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
     else if($age <= 15){
         if($stepnum<=7){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=14){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=20){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=26){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //27
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
     else if($age <= 16){
         if($stepnum<=8){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=14){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=21){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=27){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //28
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
     else if($age <= 17){
         if($stepnum<=8){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=15){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=21){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=28){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //29
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
     else{
         if($stepnum<=9){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=15){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=22){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=29){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //30
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
    }
    $sit_reach[0] = $txtstep;
    $sit_reach[1] = $txtstepcolor;
    return $sit_reach;
}

function push_up($age,$gender,$stepnum){
        if($gender=="male"){
             if($age <= 13){
                 if($stepnum<=11){
                     $txtstep = "ต่ำมาก";
                     $txtstepcolor = "danger";
     
                 }
                 else if($stepnum<=19){
                     $txtstep = "ต่ำ";
                     $txtstepcolor = "danger";
                 }
                 else if($stepnum<=26){
                     $txtstep = "ปานกลาง";
                     $txtstepcolor = "warning";
                 }
                 else if($stepnum<=33){
                     $txtstep = "ดี";
                     $txtstepcolor = "success";
                 }
                 else{ //34
                     $txtstep = "ดีมาก";
                     $txtstepcolor = "success";
                 }
     
             }
             else if($age <= 14){
                 if($stepnum<=13){
                     $txtstep = "ต่ำมาก";
                     $txtstepcolor = "danger";
     
                 }
                 else if($stepnum<=20){
                     $txtstep = "ต่ำ";
                     $txtstepcolor = "danger";
                 }
                 else if($stepnum<=27){
                     $txtstep = "ปานกลาง";
                     $txtstepcolor = "warning";
                 }
                 else if($stepnum<=35){
                     $txtstep = "ดี";
                     $txtstepcolor = "success";
                 }
                 else{ //36
                     $txtstep = "ดีมาก";
                     $txtstepcolor = "success";
                 }
             }
             else if($age <= 15){
                 if($stepnum<=14){
                     $txtstep = "ต่ำมาก";
                     $txtstepcolor = "danger";
     
                 }
                 else if($stepnum<=22){
                     $txtstep = "ต่ำ";
                     $txtstepcolor = "danger";
                 }
                 else if($stepnum<=29){
                     $txtstep = "ปานกลาง";
                     $txtstepcolor = "warning";
                 }
                 else if($stepnum<=37){
                     $txtstep = "ดี";
                     $txtstepcolor = "success";
                 }
                 else{ //38
                     $txtstep = "ดีมาก";
                     $txtstepcolor = "success";
                 }
             }
             else if($age <= 16){
                 if($stepnum<=15){
                     $txtstep = "ต่ำมาก";
                     $txtstepcolor = "danger";
     
                 }
                 else if($stepnum<=22){
                     $txtstep = "ต่ำ";
                     $txtstepcolor = "danger";
                 }
                 else if($stepnum<=29){
                     $txtstep = "ปานกลาง";
                     $txtstepcolor = "warning";
                 }
                 else if($stepnum<=36){
                     $txtstep = "ดี";
                     $txtstepcolor = "success";
                 }
                 else{ //37
                     $txtstep = "ดีมาก";
                     $txtstepcolor = "success";
                 }
             }
             else if($age <= 17){
                 if($stepnum<=16){
                     $txtstep = "ต่ำมาก";
                     $txtstepcolor = "danger";
     
                 }
                 else if($stepnum<=24){
                     $txtstep = "ต่ำ";
                     $txtstepcolor = "danger";
                 }
                 else if($stepnum<=32){
                     $txtstep = "ปานกลาง";
                     $txtstepcolor = "warning";
                 }
                 else if($stepnum<=40){
                     $txtstep = "ดี";
                     $txtstepcolor = "success";
                 }
                 else{ //41
                     $txtstep = "ดีมาก";
                     $txtstepcolor = "success";
                 }
             }
             else{
                 if($stepnum<=18){
                     $txtstep = "ต่ำมาก";
                     $txtstepcolor = "danger";
     
                 }
                 else if($stepnum<=25){
                     $txtstep = "ต่ำ";
                     $txtstepcolor = "danger";
                 }
                 else if($stepnum<=32){
                     $txtstep = "ปานกลาง";
                     $txtstepcolor = "warning";
                 }
                 else if($stepnum<=40){
                     $txtstep = "ดี";
                     $txtstepcolor = "success";
                 }
                 else{ //41
                     $txtstep = "ดีมาก";
                     $txtstepcolor = "success";
                 }
             }    
        }else{
         if($age <= 13){
             if($stepnum<=10){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
     
             }
             else if($stepnum<=17){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=23){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=29){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //30
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
     
         }
         else if($age <= 14){
             if($stepnum<=11){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
     
             }
             else if($stepnum<=17){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=24){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=30){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //31
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else if($age <= 15){
             if($stepnum<=12){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
     
             }
             else if($stepnum<=19){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=26){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=33){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //34
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else if($age <= 16){
             if($stepnum<=14){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
     
             }
             else if($stepnum<=21){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=28){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=36){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //37
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else if($age <= 17){
             if($stepnum<=15){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=22){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=29){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=36){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //37
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else{
             if($stepnum<=18){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
     
             }
             else if($stepnum<=24){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=31){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=37){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //38
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
        }
        $push_up[0] = $txtstep;
        $push_up[1] = $txtstepcolor;
        return $push_up;
}

function sit_up($age,$gender,$stepnum){
    if($gender=="male"){
         if($age <= 13){
             if($stepnum<=18){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=27){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=37){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=46){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //47
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
 
         }
         else if($age <= 14){
             if($stepnum<=19){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=29){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=38){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=48){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //49
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else if($age <= 15){
             if($stepnum<=20){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=30){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=39){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=49){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //50
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else if($age <= 16){
             if($stepnum<=21){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=31){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=40){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=49){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //50
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else if($age <= 17){
             if($stepnum<=22){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=31){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=32){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=41){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //50
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }
         else{
             if($stepnum<=22){
                 $txtstep = "ต่ำมาก";
                 $txtstepcolor = "danger";
 
             }
             else if($stepnum<=31){
                 $txtstep = "ต่ำ";
                 $txtstepcolor = "danger";
             }
             else if($stepnum<=41){
                 $txtstep = "ปานกลาง";
                 $txtstepcolor = "warning";
             }
             else if($stepnum<=51){
                 $txtstep = "ดี";
                 $txtstepcolor = "success";
             }
             else{ //52
                 $txtstep = "ดีมาก";
                 $txtstepcolor = "success";
             }
         }    
    }else{
     if($age <= 13){
         if($stepnum<=15){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=23){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=32){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=40){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //41
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
 
     }
     else if($age <= 14){
         if($stepnum<=15){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=24){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=33){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=42){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //43
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
     else if($age <= 15){
         if($stepnum<=18){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=26){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=35){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=44){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //45
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
     else if($age <= 16){
         if($stepnum<=19){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=28){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=37){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=46){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //47
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
     else if($age <= 17){
         if($stepnum<=21){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=30){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=39){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=47){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //48
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
     else{
         if($stepnum<=22){
             $txtstep = "ต่ำมาก";
             $txtstepcolor = "danger";
 
         }
         else if($stepnum<=31){
             $txtstep = "ต่ำ";
             $txtstepcolor = "danger";
         }
         else if($stepnum<=40){
             $txtstep = "ปานกลาง";
             $txtstepcolor = "warning";
         }
         else if($stepnum<=48){
             $txtstep = "ดี";
             $txtstepcolor = "success";
         }
         else{ //49
             $txtstep = "ดีมาก";
             $txtstepcolor = "success";
         }
     }
    }
    $sit_up[0] = $txtstep;
    $sit_up[1] = $txtstepcolor;
    return $sit_up;
}
?>
                            <table class="table table-responsive table-hover-animation" >
                                    <thead>
                                        <tr>
                                        <th>ลำดับ</th>
                                        <th>ที่</th>
                                        <th width="200px">ชื่อ/นามสกุล </th>
                                        <th>ระดับชั้น</th>
                                        <th>ห้อง/แผนการเรียน</th>
                                        <th>ผลดัชนีมวลกาย </th>

                                        <th>ยืนยกเข่าขึ้นลง 3 นาที</th>

                                        <th>นั่งงอตัวไปข้างหน้า</th>
                                        <th>ลุก-นั่ง 1 นาที</th>
                                        <th>ดันพื้น 30 วินาที</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                        $b = 0;
                                        while($ressqldata = mysqli_fetch_array($query_sqldata)){ ?>
                                    <tr>
                                        <td ><?php echo $b=$b+1;?></td>
                                        <td><?php echo $ressqldata['activity_num'];?></td>
                                        <td><?php echo $ressqldata['aa_prefix'].$ressqldata['aa_name']." ".$ressqldata['aa_lastname'];?></td>
                                        <td><?php echo $ressqldata['aa_class'];?></td>
                                        <td><?php echo $ressqldata['major_name'];?></td>
                                        <td> <?php echo "BMI : ". number_format(bmi($ressqldata['master_age'],$aa_gender,$ressqldata['master_weight'],$ressqldata['master_height'])[2], 2, '.', '');?>
                                         <?php echo "(".bmi($ressqldata['master_age'],$aa_gender,$ressqldata['master_weight'],$ressqldata['master_height'])[0].")";?></td>
                                        <td><?php echo $ressqldata['master_ac2'] ." ครั้ง";?>
                                          <?php echo "(".step_updown($ressqldata['master_age'],$aa_gender,$ressqldata['master_ac2'])[0].")";?></td>
                                        <td><?php echo $ressqldata['master_ac3']." เซนติเมตร";?>
                                       <?php echo "(".sit_reach($ressqldata['master_age'],$aa_gender,$ressqldata['master_ac3'])[0].")";?></td>
                                        <td><?php echo $ressqldata['master_ac4']." ครั้ง";?>
                                        <?php echo "(".sit_up($ressqldata['master_age'],$aa_gender,$ressqldata['master_ac4'])[0].")";?></td>
                                        <td><?php echo $ressqldata['master_ac5']." ครั้ง";?>
                                        <?php echo "(".push_up($ressqldata['master_age'],$aa_gender,$ressqldata['master_ac5'])[0].")";?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
</body>
</html>



<!-- SELECT
    `master_encodeid`,
    activity_master.aa_user_id_encode,
    `master_activity_encode`,
    `master_age`,
    `master_weight`,
    `master_height`,
    `master_ac1`,
    `master_ac2`,
    `master_ac3`,
    `master_ac4`,
    `master_ac5`,
    setting_activity.activity_num,
    setting_activity.activity_timestart,
    setting_activity.activity_timeend,
    account_admin.aa_user_id_encode,
    account_admin.aa_prefix,
    account_admin.aa_name,
    account_admin.aa_lastname,
    system_major.major_name
FROM
    `activity_master`
LEFT JOIN setting_activity ON setting_activity.activity_encode = activity_master.master_activity_encode
LEFT JOIN account_admin ON account_admin.aa_user_id_encode = activity_master.aa_user_id_encode
LEFT JOIN system_major ON system_major.major_id = account_admin.aa_major -->