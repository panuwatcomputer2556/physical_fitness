
<?php

require('connection/connectdb.php');
session_start();
$aa_menu = $_SESSION['aa_menu'];
$aa_prefix = $_SESSION['aa_prefix'];
$aa_name = $_SESSION['aa_name'];
$aa_lastname = $_SESSION['aa_lastname'];
$aa_class = $_SESSION['aa_class'];
$aa_major = $_SESSION['aa_major'];

?>
<div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        
                <li class="mb-1"><center><h4>ระบบจัดเก็บและรายงานผล</h4><h5>การทดสอบสมรรถภาพทางกาย</h5></center>
                </li>
                <?php    
                if($aa_menu=="user"){ ?>
                 <li class="<?php if($_GET['pt']=="home"){echo "active";}else{echo "";}?> nav-item"  ><a class="d-flex align-items-center" href="?pt=home"><i data-feather='home'></i><span class="menu-title text-truncate" data-i18n="Calendar">หน้าแรก</span></a>
                </li>
                <li class="<?php if($_GET['pt']=="all_activity_user"){echo "active";}else{echo "";}?> nav-item"  ><a class="d-flex align-items-center" href="?pt=all_activity_user"><i data-feather='grid'></i><span class="menu-title text-truncate" data-i18n="Calendar">กิจกรรมทั้งหมด</span></a>
                </li>
                <li class=" <?php if($_GET['pt']=="contact"){echo "active";}else{echo "";}?> nav-item"><a class="d-flex align-items-center" href="?pt=contact"><i data-feather='phone'></i><span class="menu-title text-truncate" data-i18n="Chat">ติดต่อผู้สอน</span></a>
                </li>
                <li class=" <?php if($_GET['pt']=="setting_class"){echo "active";}else{echo "";}?> nav-item"><a class="d-flex align-items-center" href="?pt=setting_class"><i data-feather='settings'></i><span class="menu-title text-truncate" data-i18n="Chat">แก้ไขข้อมูลส่วนตัว</span></a>
                </li>
                <li class=" <?php if($_GET['pt']=="logout"){echo "active";}else{echo "";}?>nav-item"  ><a class="d-flex align-items-center" href="logout.php"><i data-feather='log-out'></i><span class="menu-title text-truncate" data-i18n="Kanban">ออกจากระบบ</span></a>
                </li>

               <?php } else{ ?>
                <li class="<?php if($_GET['pt']=="home"){echo "active";}else{echo "";}?> nav-item"  ><a class="d-flex align-items-center" href="?pt=home"><i data-feather='home'></i><span class="menu-title text-truncate" data-i18n="Calendar">หน้าแรก</span></a>
                </li>
                <li class="<?php if($_GET['pt']=="all_activity"){echo "active";}else{echo "";}?> nav-item"  ><a class="d-flex align-items-center" href="?pt=all_activity&class=all&major=all"><i data-feather='grid'></i><span class="menu-title text-truncate" data-i18n="Todo">กิจกรรมทั้งหมด</span></a>
                </li>
                <li class="<?php if($_GET['pt']=="member"){echo "active";}else{echo "";}?> nav-item"  ><a class="d-flex align-items-center" href="?pt=member&class=all&major=all"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Todo">ข้อมูลนักเรียน</span></a>
                </li>
                <!-- <li class="<?php if($_GET['pt']=="setting_activity"){echo "active";}else{echo "";}?> nav-item"  ><a class="d-flex align-items-center" href="?pt=setting_activity"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Todo">เพิ่มกิจกรรม</span></a>
                </li> -->
                <li class=" <?php if($_GET['pt']=="setting_major"){echo "active";}else{echo "";}?> nav-item"><a class="d-flex align-items-center" href="?pt=setting_major"><i data-feather='settings'></i><span class="menu-title text-truncate" data-i18n="Chat">ตั้งค่าห้อง/แผนการเรียน</span></a>
                </li>
                <li class=" <?php if($_GET['pt']=="logout"){echo "active";}else{echo "";}?>nav-item"  ><a class="d-flex align-items-center" href="logout.php"><i data-feather='log-out'></i><span class="menu-title text-truncate" data-i18n="Kanban">ออกจากระบบ</span></a>
                </li>
                
                <?php } ?>
              
                
            </ul>
</div>