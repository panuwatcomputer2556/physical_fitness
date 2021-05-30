<?php
 require('../connection/connectdb.php');
 function dateformat($date){
    $date = date_create($date);
    $dateformat1 = date_format($date,"Y-m-d");
    $dateformat2 = date_format($date,"H:i:s");
    $dateformat = $dateformat1."T".$dateformat2;
    return $dateformat;
}

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

$uniqid = sha1(uniqid(rand(),true),false);
$uniqid2 = $rand = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789'),0,5);
$nowtimespc = date("H:i:s");
$nowdatespc = date("Y-m-d");
$datetimemixspc = strtotime($nowdatespc.' '.$nowtimespc);
$dtmixspcinsert = date('Y-m-d H:i:s', $datetimemixspc);

if(isset($_POST['program'])){
    $program = $_POST['program'];
    $program= stripslashes($program);

        if($program == "save_activity"){
            $age = $_POST['age'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $step_updown = $_POST['step_updown']; //ยืนยกเข่าขึ้นลง
            $sit_reach = $_POST['sit_reach']; //นั่งงอตัวไปข้างหน้า
            $sit_up = $_POST['sit_up']; //ลุก-นั่ง 1 นาที
            $push_up = $_POST['push_up']; //ดันพื้น 30 วินาที (ครั้ง)
            $aa_user_id_encode = $_POST['aa_user_id_encode'];
            $gender = $_POST['aa_gender'];
            $activityid = $_POST['activityid'];
            $bmii = bmi($age,$gender,$weight,$height)[2];
            $sqlnumactivity ="SELECT
            `aa_user_id_encode`,
            `master_activity_encode`
        FROM
            `activity_master`
        WHERE
            `aa_user_id_encode` = '$aa_user_id_encode' AND `master_activity_encode` = '$activityid'";
             $query_sqlnumactivity = $connectdb->query($sqlnumactivity);
             $num=mysqli_num_rows($query_sqlnumactivity);
             if($num > 0){
                 echo "sam";
             }else{
            $sqlsave_activity = "INSERT INTO `activity_master`(
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
            )
            VALUES(
                '$uniqid','$aa_user_id_encode','$activityid','$age','$weight','$height','$bmii',
                '$step_updown','$sit_reach','$sit_up','$push_up','0','$dtmixspcinsert'
            )";

             $query_sqlsave_activity = $connectdb->query($sqlsave_activity);
             if($query_sqlsave_activity){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
            }
        }

        else if($program == "edit_member"){
            $aa_namex = $_POST['aa_namex'];
            $aa_lastnamex = $_POST['aa_lastnamex'];
            $aa_majorx = $_POST['aa_majorx'];
            $aa_classx = $_POST['aa_classx'];
            $aa_user_id_encodex = $_POST['aa_user_id_encodex'];
            $sqledit_member = "UPDATE
            `account_admin`
        SET
            `aa_name` = '$aa_namex',
            `aa_lastname` = '$aa_lastnamex',
            `aa_class` = '$aa_classx',
            `aa_major` ='$aa_majorx'
        WHERE
            `aa_user_id_encode` = '$aa_user_id_encodex'";
             $query_sqledit_member = $connectdb->query($sqledit_member);
             if($query_sqledit_member){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
        }

        else if($program == "check_username"){
            $username = $_POST['username'];
            $sqlcheckusername = "SELECT
            `aa_username`
        FROM
            `account_admin`
        WHERE
            `aa_username` = '$username'";
             $query_sqlcheckusername = $connectdb->query($sqlcheckusername);
             $numcheckusername=mysqli_num_rows($query_sqlcheckusername);
             if($numcheckusername > 0){
                 echo "sam";
             }else{
                 echo "ok";
             }
        }

        else if($program == "checkpassword"){
            $r_password2 = $_POST['r_password2'];
            $r_password = $_POST['r_password'];
             if($r_password2==$r_password){
                 echo "match";
             }else{
                 echo "nomatch";
             }
        }

        else if($program == "save_member_register"){
            $username = $_POST['username'];
            $r_password = md5($_POST['r_password']);
            $prefix = $_POST['prefix'];
            $uname = $_POST['uname'];
            $lname = $_POST['lname'];
            $aa_classx = $_POST['aa_classx'];
            $major_name = $_POST['major_name'];
            if($prefix=="เด็กชาย" || $prefix=="นาย"){
                $genderx = "male";
            }else{
                $genderx = "female";
            }
            $sqlsave_member_register ="SELECT
            `aa_username`
        FROM
            `account_admin`
        WHERE
            `aa_username` = '$username'";
             $query_sqlsave_member_register = $connectdb->query($sqlsave_member_register);
             $num= mysqli_num_rows($query_sqlsave_member_register);
             if($num > 0){
                 echo "sam";
             }else{
            $sqlmember_registerx = "INSERT INTO `account_admin`(
                `aa_user_id_encode`,
                `aa_username`,
                `aa_password`,
                `aa_prefix`,
                `aa_name`,
                `aa_lastname`,
                `aa_class`,
                `aa_major`,
                `aa_gender`
            )
            VALUES(
              '$uniqid','$username','$r_password','$prefix','$uname','$lname','$aa_classx','$major_name','$genderx')";

             $query_sqlmember_registerx = $connectdb->query($sqlmember_registerx);
             if($query_sqlmember_registerx){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
            }
        }

        else if($program == "save_activity_admin"){
            $activity_num = $_POST['activity_num'];
            $ativity_class = $_POST['ativity_class'];
            $ativity_major = $_POST['ativity_major'];
            $ativity_timestart = $_POST['ativity_timestart'];
            $ativity_timeend = $_POST['ativity_timeend'];
            $sqlsave_activity_admin = "INSERT INTO `setting_activity`(
                `activity_encode`,
                `activity_num`,
                `activity_class`,
                `activity_major_id`,
                `activity_timestart`,
                `activity_timeend`,
                `activity_timecreate`
            )
            VALUES(
               '$uniqid','$activity_num','$ativity_class','$ativity_major','$ativity_timestart','$ativity_timeend','$dtmixspcinsert'
            )";

             $query_sqlsave_activity_admin = $connectdb->query($sqlsave_activity_admin);
             if($query_sqlsave_activity_admin){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
        }

        else if($program == "sys_delete_activity"){
            $id = $_POST['id'];
            $sqlsys_delete_activity = "DELETE FROM `setting_activity` WHERE `activity_encode` = '$id'";
             $query_sqlsys_delete_activity = $connectdb->query($sqlsys_delete_activity);
             if($query_sqlsys_delete_activity){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
        }

        else if($program == "edit_activity_admin"){
            $id = $_POST['id'];
            $activity_num = $_POST['activity_num'];
            $ativity_class = $_POST['ativity_class'];
            $ativity_major = $_POST['ativity_major'];
            $ativity_timestart = $_POST['ativity_timestart'];
            $ativity_timeend = $_POST['ativity_timeend'];
            $sqledit_activity_admin = "UPDATE
            `setting_activity`
        SET
            `activity_num` = '$activity_num',
            `activity_class` = '$ativity_class',
            `activity_major_id` = '$ativity_major',
            `activity_timestart` = '$ativity_timestart',
            `activity_timeend` = '$ativity_timeend',
            `activity_timecreate` = '$dtmixspcinsert'
        WHERE
            `activity_encode` = '$id'";

             $query_sqledit_activity_admin = $connectdb->query($sqledit_activity_admin);
             if($query_sqledit_activity_admin){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
        }

        else if($program == "sys_delete_member"){
            $id = $_POST['id'];
            $sqlsys_delete_master = "DELETE FROM `activity_master` WHERE `aa_user_id_encode` = '$id'";
             $query_sqlsys_delete_master = $connectdb->query($sqlsys_delete_master);
            $sqlsys_sys_delete_member = "DELETE FROM `account_admin` WHERE `aa_user_id_encode` = '$id'";
             $query_sqlsys_sys_delete_member = $connectdb->query($sqlsys_sys_delete_member);
             if($query_sqlsys_sys_delete_member){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
        }

        else if($program == "add_majorx"){
            $majorx = $_POST['majorx'];
            $sqladd_majorx = "INSERT INTO `system_major`(`major_name` ) VALUES('$majorx')";
             $query_sqladd_majorx = $connectdb->query($sqladd_majorx);
             if($query_sqladd_majorx){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
        }

        else if($program == "change_majorxname"){
            $val = $_POST['val'];
            $id = $_POST['id'];
            echo $editmajorx;
            $sqlchange_majorxname = "UPDATE
            `system_major`
        SET
            `major_name` ='$val'
        WHERE
            `major_id` = '$id'";
             $query_sqlchange_majorxname = $connectdb->query($sqlchange_majorxname);
             if($query_sqlchange_majorxname){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
        }


        else if($program == "change_majorxnum"){
            $val = $_POST['val'];
            $id = $_POST['id'];
            echo $editmajorx;
            $sqlchange_majorxnum = "UPDATE
            `system_major`
        SET
            `major_num` ='$val'
        WHERE
            `major_id` = '$id'";
             $query_sqlchange_majorxnum = $connectdb->query($sqlchange_majorxnum);
             if($query_sqlchange_majorxnum){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
        }

        else if($program == "sys_delete_majorxnum"){
            $id = $_POST['id'];
            $sqlsys_delete_majorxnum = "DELETE FROM `system_major` WHERE `major_id` = '$id'";
             $query_sqlsys_delete_majorxnum = $connectdb->query($sqlsys_delete_majorxnum);
             if($query_sqlsys_delete_majorxnum){
                 echo "ok";
             }
             else{
                 echo "not_ok";
             }
        }

    }



?>