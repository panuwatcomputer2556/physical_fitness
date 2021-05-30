<?php
require('connection/connectdb.php');
session_start();

$aa_menu = $_SESSION['aa_menu'];
$aa_prefix = $_SESSION['aa_prefix'];
$aa_name = $_SESSION['aa_name'];
$aa_lastname = $_SESSION['aa_lastname'];
$aa_class = $_SESSION['aa_class'];
$aa_major = $_SESSION['aa_major'];

    //echo $aa_menu;
    if($aa_menu=="admin"){
        $reqpage = $_GET['pt'];
        switch($reqpage){
            case "member":
                $fileinclude = "member.php";
                $namepage = "หน้าสมาชิก";
                break;
            case "setting_activity":
                $fileinclude = "setting_activity.php";
                $namepage = "หน้าสมาชิก";
                break;
            
            case "all_activity":
                $fileinclude = "all_activity.php";
                $namepage = "กิจกรรมทั้งหมด";
                break;
            case "setting_activity_edit":
                $fileinclude = "setting_activity_edit.php";
                $namepage = "แก้ไขกิจกรรม";
                break;
            case "setting_major":
                $fileinclude = "setting_major.php";
                $namepage = "ตั้งค่าห้อง/แผนการเรียน";
                break;
            case "report_total":
                $fileinclude = "report_total.php";
                $namepage = "กิจกรรม";
                break;
            case "home":
                $fileinclude = "home.php";
                $namepage = "หน้าแรก";
                break; 
            default :
                $fileinclude = "home.php";
        }
    }
    else if($aa_menu=="user"){
        $reqpage = $_GET['pt'];
        switch($reqpage){
        case "form_physical":
            $fileinclude = "form_physical.php";
            $namepage = "แบบฟอร์มบันทึกผลการทดสอบสมรรถนะทางกาย";
            break;
        case "setting_class":
            $fileinclude = "setting_class.php";
            $namepage = "ตั้งค่าห้อง/แผนการเรียน(ปัจจุบัน)";
            break;
        case "result_physical":
            $fileinclude = "result_physical.php";
            $namepage = "ผลการทดสอบสมรรถนะทางกาย";
            break;
        case "all_activity_user":
            $fileinclude = "all_activity_user.php";
            $namepage = "กิจกรรมทั้งหมด";
            break;
        case "contact":
            $fileinclude = "contact.php";
            $namepage = "ติดต่อผู้สอน";
            break;
        case "home":
            $fileinclude = "home.php";
            $namepage = "หน้าแรก";
            break;          
        default :
            $fileinclude = "home.php";
        }
    }else{
        $timeoutalert = true;
        header("location: logout.php");
    }
    
    

    if(!isset($_SESSION["adminuserid"]) || !isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] == FALSE){
        header("Location: login.php");
        exit(); 
    }

    if((time() - $_SESSION['last_time']) > 3600){
        $timeoutalert = true;
        header("location: logout.php");
    }else{
        $_SESSION['last_time'] = time();
    }



?>
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
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
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
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/pages/app-chat.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/pages/app-chat-list.css">

    <link rel="stylesheet" type="text/css" href="tempate/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/vendors/css/forms/select/select2.min.css">

        <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/plugins/forms/form-wizard.css">


    <link rel="stylesheet" type="text/css" href="tempate/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="tempate/app-assets/css/plugins/forms/pickers/form-pickadate.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- END: Page CSS-->
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="tempate/assets/css/style.css">
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

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">

<?php   include('page/module-inc/header.php');  ?>

   
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <center><div class="mt-3 ">
          
                    <img src="imagelogo/logo1.png" class="mb-2" alt="" width="200px">  
         
        </div>
        </center>
       <?php 
        include('page/module-inc/menubar.php');      
       ?>
    </div>
    <!-- END: Main Menu-->


<!-- BEGIN: Content-->
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left mb-0 mt-2"><?php echo $namepage; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
            <?php  include("page/$fileinclude");  ?>
            </div> 
        </div>
    </div>
    <!-- END: Content-->
    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <center><p class="clearfix mb-0"><span class=" d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="#" target="_blank">ระบบจัดเก็บและรายงานผลการทดสอบสมรรถภาพทางกาย</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p></center>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="tempate/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="tempate/app-assets/js/core/app-menu.js"></script>
    <script src="tempate/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="tempate/app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="tempate/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="tempate/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="tempate/app-assets/js/scripts/forms/form-wizard.js"></script>
    <script src="tempate/app-assets/js/scripts/pages/app-chat.js"></script>
    <script src="tempate/app-assets/js/scripts/charts/chart-apex.js"></script>
    <script src="tempate/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="tempate/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="tempate/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="tempate/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="tempate/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="tempate/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="tempate/app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
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