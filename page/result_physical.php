<?php
session_start();

$aa_menu = $_SESSION['aa_menu'];
$aa_prefix = $_SESSION['aa_prefix'];
$aa_name = $_SESSION['aa_name'];
$aa_lastname = $_SESSION['aa_lastname'];
$aa_class = $_SESSION['aa_class'];
$aa_major = $_SESSION['aa_major'];
$aa_gender = $_SESSION['aa_gender'];

 $resultid = $_GET['resultid'];
 $resultid= stripslashes($resultid);
 $num = $_GET['num'];
 $num= stripslashes($num);
$sqlactivity_master ="SELECT
`master_encodeid`,
`aa_user_id_encode`,
`master_activity_encode`,
`master_age`,
`master_weight`,
`master_height`,
`master_ac1`,
`master_ac2`,
`master_ac3`,
`master_ac4`,
`master_ac5`,
`master_staus`,
`master_creater`
FROM
`activity_master`
WHERE
`master_encodeid` = '$resultid'";
$query_sqlactivity_master = $connectdb->query($sqlactivity_master);
$row = mysqli_fetch_assoc($query_sqlactivity_master);


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
<div class="row" id="table-hover-animation">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ผลการทดสอบสมรรถนะทางกาย ครั้งที่ <?php echo $num;?></h4>
                            </div>
                          
                            <div class="table-responsive">
                                <table class="table table-hover-animation table-warp">
                                    <thead>
                                        <tr>
                                            <th width="5%">ลำดับ</th>
                                            <th width="30%">รายการทดสอบ</th>
                                            <th width="30%">ผลการทดสอบ</th>
                                            <th width="35%">ผลการเปรียบเทียบกับตารางเกณฑ์มาตรฐาน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>ดัชนีมวลกาย</td>
                                            <td>
                                            <?php 
                                            echo "BMI : ". number_format(bmi($row['master_age'],$aa_gender,$row['master_weight'],$row['master_height'])[2], 2, '.', '');
                                           ?>
                                            </td>
                                            <td> 
                                            <button type="submit" class="btn btn-<?php echo bmi($row['master_age'],$aa_gender,$row['master_weight'],$row['master_height'])[1];?> mr-1 waves-effect waves-float waves-light">
                                            <?php echo bmi($row['master_age'],$aa_gender,$row['master_weight'],$row['master_height'])[0];?>
                                            </button>
                                               
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ยืนยกเข่าขึ้นลง 3 นาที</td>
                                            <td><?php echo $row['master_ac2'] ." ครั้ง";?></td>
                                            <td> <button type="submit" class="btn btn-<?php echo step_updown($row['master_age'],$aa_gender,$row['master_ac2'])[1];?> mr-1 waves-effect waves-float waves-light"><?php echo step_updown($row['master_age'],$aa_gender,$row['master_ac2'])[0];?></button></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>นั่งงอตัวไปข้างหน้า</td>
                                            <td><?php echo $row['master_ac3']." เซนติเมตร";?></td>
                                            <td> <button type="submit" class="btn btn-<?php echo sit_reach($row['master_age'],$aa_gender,$row['master_ac3'])[1];?> mr-1 waves-effect waves-float waves-light"><?php echo sit_reach($row['master_age'],$aa_gender,$row['master_ac3'])[0];?></button></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>ลุก-นั่ง 1 นาที</td>
                                            <td><?php echo $row['master_ac4']." ครั้ง";?></td>
                                            <td> <button type="submit" class="btn btn-<?php echo sit_up($row['master_age'],$aa_gender,$row['master_ac4'])[1];?> mr-1 waves-effect waves-float waves-light"><?php echo sit_up($row['master_age'],$aa_gender,$row['master_ac4'])[0];?></button></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>ดันพื้น 30 วินาที</td>
                                            <td><?php echo $row['master_ac5']." ครั้ง";?></td>
                                            <td> <button type="submit" class="btn btn-<?php echo push_up($row['master_age'],$aa_gender,$row['master_ac5'])[1];?> mr-1 waves-effect waves-float waves-light"><?php echo push_up($row['master_age'],$aa_gender,$row['master_ac5'])[0];?></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

               