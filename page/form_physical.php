<?php
session_start();
$aa_menu = $_SESSION['aa_menu'];
$aa_prefix = $_SESSION['aa_prefix'];
$aa_name = $_SESSION['aa_name'];
$aa_lastname = $_SESSION['aa_lastname'];
$aa_class = $_SESSION['aa_class'];
$aa_major = $_SESSION['aa_major'];
$aa_gender = $_SESSION['aa_gender'];
$aa_user_id_encode = $_SESSION['aa_user_id_encode'];

?>
<section class="horizontal-wizard">
                    <div class="bs-stepper horizontal-wizard-example linear">
                        
                        <div class="bs-stepper-content">
                            <div id="account-details" class="content active dstepper-block">
                                <div class="content-header">
                                    <h4 class="mb-0">แบบฟอร์มบันทึกผลการทดสอบสมรรถนะทางกาย</h4>
                                    <!-- <small class="text-muted">กรุณาพิมพ์ข้อมูลให้ถูกต้อง</small> -->
                                </div>
                               
                                   
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="username">อายุ</label>
                                            <input type="number" name="username" id="age" class="form-control" placeholder="············">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="username">น้ำหนัก</label>
                                            <input type="number" name="username" id="weight" class="form-control" placeholder="············">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="username">ส่วนสูง</label>
                                            <input type="number" name="username" id="height" class="form-control" placeholder="············">
                                        </div>
                                        <!-- <div class="form-group col-md-6">
                                            <label class="form-label" for="username">ดัชนีมวลกาย (กิโลกรัม/ตารางเมตร)</label>
                                            <input type="number" name="username" id="bmi" class="form-control" placeholder="············">
                                        </div> -->
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="email">ยืนยกเข่าขึ้นลง 3 นาที (ครั้ง)</label>
                                            <input type="number" name="email" id="step_updown" class="form-control" placeholder="············" aria-label="john.doe">
                                        </div>
                                        <div class="form-group form-password-toggle col-md-6">
                                            <label class="form-label" for="password">นั่งงอตัวไปข้างหน้า (เซนติเมตร)</label>
                                            <input type="number" name="password" id="sit_reach" class="form-control" placeholder="············">
                                        </div>
                                        <div class="form-group form-password-toggle col-md-6">
                                            <label class="form-label" for="confirm-password">ลุก-นั่ง 1 นาที (ครั้ง)</label>
                                            <input type="number" name="confirm-password" id="sit_up" class="form-control" placeholder="············">
                                        </div>
                                        <div class="form-group form-password-toggle col-md-6">
                                            <label class="form-label" for="password">ดันพื้น 30 วินาที (ครั้ง)</label>
                                            <input type="number" name="password" id="push_up" class="form-control" placeholder="············">
                                        </div>
                                      
                                    </div>
                                   
                                  
                                    <center>
                                    <div class="col-sm-12 ">
                                                    <button type="reset" class="btn btn-primary mr-1 waves-effect waves-float waves-light save_activity">บันทึกข้อมูล</button>
                                                    <a href="?pt=form_physical&activityid=<?php echo $_GET['activityid'];?>"><button type="reset" class="btn btn-outline-secondary waves-effect">ยกเลิก</button></a>
                                    </div>
                                </center>
                             
                              
                            </div>
                           
                        </div>
                    </div>
                </section>



                <script>
            
            $(document).on('click','.save_activity',function(){
                    var age = document.getElementById("age").value;
                    var weight = document.getElementById("weight").value;
                    var height = document.getElementById("height").value;
                    // var bmi = document.getElementById("bmi").value;
                    var step_updown = document.getElementById("step_updown").value; //ยืนยกเข่าขึ้นลง 3 นาที (ครั้ง)
                    var sit_reach = document.getElementById("sit_reach").value; //นั่งงอตัวไปข้างหน้า (เซนติเมตร)
                    var sit_up = document.getElementById("sit_up").value; //ลุก-นั่ง 1 นาที (ครั้ง)
                    var push_up = document.getElementById("push_up").value; //ดันพื้น 30 วินาที (ครั้ง)

                    if(age==""){
                        document.getElementById("age").focus();
                    }
                    else if(weight==""){
                        document.getElementById("weight").focus();
                        }
                    else  if(height==""){
                        document.getElementById("height").focus();
                        }
                    // else  if(bmi==""){
                    //     document.getElementById("bmi").focus();
                    //     }
                    else  if(step_updown==""){
                        document.getElementById("step_updown").focus();
                    }
                    else  if(sit_reach==""){
                        document.getElementById("sit_reach").focus();
                    }
                    else  if(sit_up==""){
                        document.getElementById("sit_up").focus();
                    }
                    else  if(push_up==""){
                        document.getElementById("push_up").focus();
                    }
                    else{
                    $.ajax({
                        type: 'POST',
                        data: {program:"save_activity",age:age,weight:weight,height:height,
                       step_updown:step_updown,sit_reach:sit_reach,sit_up:sit_up,push_up:push_up,aa_gender:"<?php echo $aa_gender;?>",
                       aa_user_id_encode:"<?php echo $aa_user_id_encode;?>",activityid:"<?php echo $_GET['activityid'];?>"},
                        url: 'page/app.php',
                        success: function(msg) {
                        if(msg == "ok"){
                                Swal.fire(
                                        'เพิ่มข้อมูลสำเร็จ!',
                                        '',
                                        'success'
                                        ).then(function() {window.location="?pt=all_activity_user";})
                          }
                        else if(msg == "sam"){
                                Swal.fire(
                                        'ผิดพลาด!',
                                        'คุณเคยบันทึกผลการทดสอบสมรรถนะทางกายแล้ว',
                                        'warning'
                                        ).then(function() {window.location="?pt=all_activity_user";})
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

            
            
            </script>