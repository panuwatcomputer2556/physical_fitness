<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>ระบบจัดเก็บและรายงานผลการทดสอบสมรรถภาพทางกาย</title>
    <link rel="apple-touch-icon" href="imagelogo/logo2.png">
    <link rel="shortcut icon" type="image/x-icon" href="tempate/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="tempate/assets/css/style.css">
    <!-- END: Custom CSS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <!-- END: Custom CSS-->
    <style>
		body {
            font-family: 'Kanit', sans-serif;
		}
		h1 {
            font-family: 'Kanit', sans-serif;
		}
        
    </style>
</head>
<!-- END: Head-->


<?php
require('connection/connectdb.php');
$sqlmajor = "SELECT
`major_id`,
`major_name`,
`major_num`,
`major_status`
FROM
`system_major`
WHERE
`major_status` = 'on'";
 $query_sqlmajor = $connectdb->query($sqlmajor);


?>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                
                <div class="auth-wrapper auth-v2">
                    
                    <div class="auth-inner row m-0">
                    <!-- <image class="" src="imagelogo/logo1.png" width="300px"></image> -->
                        <!-- Brand logo-->
                        <!-- <a class="brand-logo" href="javascript:void(0);">
                            
                           
                        </a> -->
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="tempate/app-assets/images/pages/register-v2.svg" alt="Register V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Register-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <center>
                                <image class="brand-text text-primary" src="imagelogo/logo1.png" width="250px"></image>  
                                <h3 class="card-title font-weight-bold ">สมัครบัญชีผู้ใช้งาน</h3>
                                <p class="card-text">ระบบจัดเก็บและรายงานผล<br>การทดสอบสมรรถภาพทางกาย</p>
                                </center>
                              
                                    <div class="form-group">
                                        <label class="form-label" for="register-username">ชื่อผู้ใช้งาน</label>
                                        <input class="form-control checkusername" id="username" type="text"   />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-password">รหัสผ่าน</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="r_password" type="password"  placeholder="············"  />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-password">ยืนยันรหัสผ่าน</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge checkpassword" id="r_password2" type="password"  placeholder="············"  />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    <label class="form-label" >คำนำหน้า</label>
                                            <select class="form-control mb-1" id="prefix">
                                            <option>เด็กชาย</option>
                                            <option>เด็กหญิง</option>
                                            <option>นาย</option>
                                            <option>นางสาว</option>
                                    </select>
                                    <div class="form-group">
                                        <label class="form-label" for="register-password">ชื่อ(ภาษาไทย)</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="uname" type="text" placeholder="············"  tabindex="3" />
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-password">นามสกุล(ภาษาไทย)</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="lname" type="text"  placeholder="············"  tabindex="3" />
                                           
                                        </div>
                                    </div>
                                    <label class="form-label" for="username">ระดับชั้น</label>
                                            <select class="form-control mb-1" id="aa_classx">
                                            <option>-</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                    </select>
                                    <label class="form-label" for="email">ห้องเรียน/แผนการเรียน</label>
                                            <select class="form-control" id="major_name">
                                            <option>-</option>
                                            <?php  
                                     
                                         while($resquery_sqlmajor = mysqli_fetch_array($query_sqlmajor )){ ?>
                                            <option value="<?php echo $resquery_sqlmajor['major_id'];?>" <?php if($resquery_sqlmajor['major_id']==$rowquery_sqlmember['aa_major']){ echo "selected";}?>>
                                            <?php 
                                           echo $resquery_sqlmajor['major_name'];?></option>
                                        <?php } ?>
                                    </select>
                                    <center>
                                    <button class="btn mt-1 btn-primary  mb-2 save_member_register btn-block" tabindex="5">สมัคร</button>
                                    </center>
                
                               
                            </div>
                        </div>
                        <!-- /Register-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="tempate/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="tempate/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="tempate/app-assets/js/core/app-menu.js"></script>
    <script src="tempate/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="tempate/app-assets/js/scripts/pages/page-auth-register.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->


</html>

<script>
            
        $(document).on('change','.checkusername',function(){
                    var username = document.getElementById("username").value.length;
                    if(username<=8){
                        document.getElementById("username").focus();
                        Swal.fire(
                                  'ผิดพลาด!',
                                  'กรุณากรอกชื่อผู้ใช้งานอย่างน้อย 8 ตัวอักษร',
                                  'warning'
                        ).then(function() {
                            document.getElementById("username").value="";
                            document.getElementById("username").style.backgroundColor = "#FF6666"; 
                        })
                    }else{
                    // alert(username);
                    $.ajax({
                        type: 'POST',
                        data: {program:"check_username",username:username},
                        url: 'page/app.php',
                        success: function(msg) {
                        if(msg == "ok"){
                            document.getElementById("username").style.backgroundColor = "#66FF99";
                          }
                        else if(msg == "sam"){
                                Swal.fire(
                                        'ผิดพลาด!',
                                        'ไม่สามารถตั้ง Username นี้ได้กรุณาลองใหม่อีกครั้ง',
                                        'warning'
                                        ).then(function() {
                                            document.getElementById("username").value=""; 
                                            document.getElementById("username").style.backgroundColor = "#FF6666";
                                        })
                          }
                          else if(msg == "notok"){
                                Swal.fire(
                                        'ไม่สามารถลงทะเบียนได้',
                                        '',
                                        'error'
                                        ).then(function() {window.location.reload();})
                          }
                            else{
                                alert("notok");
                            }
                            
                        }
                        
                    });
                    return false;
                    }
            });

            $(document).on('change','.checkpassword',function(){
                    var r_password2 = document.getElementById("r_password2").value;
                    var r_password = document.getElementById("r_password").value;
                    if(r_password.length<=8){
                        document.getElementById("r_password").focus();
                        Swal.fire(
                                  'ผิดพลาด!',
                                  'กรุณารหัสผ่านอย่างน้อย 8 ตัวอักษร',
                                  'warning'
                        ).then(function() {
                             document.getElementById("r_password").value = ""; 
                             document.getElementById("r_password").style.backgroundColor = "#FF6666";
                            
                        })
                        }
                    else if(r_password2.length<=8){
                        document.getElementById("r_password2").focus();
                        Swal.fire(
                                  'ผิดพลาด!',
                                  'กรุณารหัสผ่านอย่างน้อย 8 ตัวอักษร',
                                  'warning'
                        ).then(function() {
                            document.getElementById("r_password2").style.backgroundColor = "#FF6666";
                            document.getElementById("r_password2").value = "";
                        })
                        }
                    else{ 
                    $.ajax({
                        type: 'POST',
                        data: {program:"checkpassword",r_password2:r_password2,r_password:r_password},
                        url: 'page/app.php',
                        success: function(msg) {
                        if(msg == "match"){
                            document.getElementById("r_password2").style.backgroundColor = "#66FF99";
                          }
                        else{
                            Swal.fire(
                                        'ผิดพลาด!',
                                        'Password ไม่ตรงกัน',
                                        'warning'
                                        ).then(function() {
                                            document.getElementById("r_password2").value = "";
                                            document.getElementById("r_password").value = ""; 
                                            document.getElementById("r_password").style.backgroundColor = "#FF6666";
                                            document.getElementById("r_password2").style.backgroundColor = "#FF6666";
                                        })
                            }
                            
                        }
                        
                    });
                    return false;
                    }
            });
            
            $(document).on('click','.save_member_register',function(){
                    var username = document.getElementById("username").value;
                    var r_password = document.getElementById("r_password").value;
                    var prefix = document.getElementById("prefix").value;
                    var uname = document.getElementById("uname").value;
                    var lname = document.getElementById("lname").value;
                    var aa_classx = document.getElementById("aa_classx").value;
                    var major_name = document.getElementById("major_name").value;
                    var r_password2 = document.getElementById("r_password2").value;
                    // alert(username);
                   if(prefix==""){
                        document.getElementById("prefix").focus();
                        }
                    else if(uname==""){
                        document.getElementById("uname").focus();
                        }
                    else if(lname==""){
                        document.getElementById("lname").focus();
                    }
                    else if(aa_classx==""){
                        document.getElementById("aa_classx").focus();
                    }
                    else if(major_name==""){
                        document.getElementById("major_name").focus();
                    }
                    else{
                    $.ajax({
                        type: 'POST',
                        data: {program:"save_member_register",username:username,r_password:r_password,prefix:prefix,
                            uname:uname,lname:lname,aa_classx:aa_classx,major_name:major_name},
                        url: 'page/app.php',
                        success: function(msg) {
                        if(msg == "ok"){
                                Swal.fire(
                                        'สมัครบัญชีผู้ใช้งานสำเร็จ!',
                                        '',
                                        'success'
                                        ).then(function() {window.location="login.php";})
                          }
                        else if(msg == "sam"){
                                Swal.fire(
                                        'ผิดพลาด!',
                                        'คุณเคยสมัครบัญชีผู้ใช้งานแล้ว',
                                        'warning'
                                        ).then(function() {window.location="login.php";})
                          }
                          else if(msg == "notok"){
                                Swal.fire(
                                        'ไม่สามารถสมัครบัญชีผู้ใช้งานได้',
                                        '',
                                        'error'
                                        ).then(function() {window.location.reload();})
                          }
                            else{
                                alert("notok");
                            }
                            
                        }
                        
                    });
                    return false;
                    }
            });

            
            </script>