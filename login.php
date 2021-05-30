
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
    <link rel="shortcut icon" type="image/x-icon" href="imagelogo/logo2.png">
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
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="tempate/assets/css/style.css">
    <!-- END: Custom CSS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
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

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->

    <?php
require('connection/connectdb.php');
session_start();
if(isset($_POST['username-u']) && isset($_POST['password-u'])){
    $username = stripslashes($_REQUEST['username-u']);
    $username = mysqli_real_escape_string($connectdb,$username);
    $password = stripslashes($_REQUEST['password-u']);
    $password = mysqli_real_escape_string($connectdb,$password);
    //echo "<script>alert('post');</script>";
    if($username != '' && $password != ''){
        $querycheckadmin = "SELECT * FROM account_admin WHERE aa_username='$username' AND aa_password='".md5($password)."'";
        $rescheckadmin = $connectdb->query($querycheckadmin);
        $rowcheckadmin = mysqli_num_rows($rescheckadmin);
        if($rowcheckadmin == 1){
           // echo "<script>alert('post3');</script>";
            $auth = $rescheckadmin->fetch_assoc();
            $_SESSION['adminuserid'] = $auth['aa_user_id'];
            $_SESSION['aa_user_id_encode'] = $auth['aa_user_id_encode'];
            $_SESSION['aa_menu'] = $auth['aa_menu'];
            $_SESSION['aa_prefix'] = $auth['aa_prefix'];
            $_SESSION['aa_name'] = $auth['aa_name'];
            $_SESSION['aa_lastname'] = $auth['aa_lastname'];
            $_SESSION['aa_class'] = $auth['aa_class'];
            $_SESSION['aa_major'] = $auth['aa_major'];
            $_SESSION['aa_gender'] = $auth['aa_gender'];
            //$_SESSION['aa_user_name'] = $auth['aa_name'];
            $_SESSION['adminlogin'] = TRUE;
            $_SESSION['last_time'] = time();
            if($_SESSION['aa_menu']=="admin"){
                header("Location: index.php?pt=home"); // Redirect user to index.php
            }else{
                header("Location: index.php?pt=home"); // Redirect user to index.php
            }
            
        }else{
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'ผิดพลาด',
                text: 'ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง'
              })</script>";
        }
    }else{
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'ผิดพลาด',
            text: 'ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง'
          })</script>";
    }
}
?>


    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="javascript:void(0);">
                            
                            <!-- <h2 class="brand-text text-primary ml-1">ระบบจัดเก็บและรายงานผลการทดสอบสมรรถภาพทางกาย</h2> -->
                            <!-- <image class="brand-text text-primary ml-1" src="imagelogo/logo1.png" width="300px"></image> -->
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="tempate/app-assets/images/pages/login-v2.svg" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                
                                <center>
                                <image class="brand-text text-primary mb-2" src="imagelogo/logo1.png" width="250px"></image>    
                                <h2>ระบบจัดเก็บและรายงานผล</h2><h3>การทดสอบสมรรถภาพทางกาย</h3>
                            
                            </center>
                                <form class="auth-login-form mt-2" method="POST">
                                    <div class="form-group">
                                        <label class="form-label" for="login-email">ชื่อผู้ใช้งาน</label>
                                        <input class="form-control" id="login-email" type="text" name="username-u" placeholder="........" aria-describedby="login-email" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="login-email">รหัสผ่าน</label>
                                        <input class="form-control" id="login-email" type="password" name="password-u" placeholder="........" aria-describedby="login-email" autofocus="" tabindex="1" />
                                    </div>
                                   
                                    
                                    <button class="btn btn-primary btn-block" tabindex="4">เข้าสู่ระบบ</button>
                                </form>
                                <p class="text-center mt-2"><span>ยังไม่มีบัญชีผู้ใช้งานใช่หรือไม่?</span><a href="register.php"><span>&nbsp;สมัครบัญชีผู้ใช้งาน</span></a></p>
                               
                            </div>
                        </div>
                        <!-- /Login-->
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
    <script src="tempate/app-assets/js/scripts/pages/page-auth-login.js"></script>
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