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
$sqlmember = "SELECT
`aa_user_id_encode`,
`aa_name`,
`aa_lastname`,
`aa_class`,
`aa_major`
FROM
`account_admin`
WHERE
`aa_user_id_encode` = '$aa_user_id_encode'";
 $query_sqlmember = $connectdb->query($sqlmember);
 $rowquery_sqlmember = mysqli_fetch_assoc($query_sqlmember);

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

<div class="page-wrapper">
<div class="container mt-2">
<center>
   <div class="row">
       <!-- Column -->
    


</center>  
       </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ตั้งค่าห้อง/แผนการเรียน(ปัจจุบัน)</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="username">ชื่อ</label>
                                            <input type="text" name="username" id="aa_namex" class="form-control" value="<?php echo $rowquery_sqlmember['aa_name'];?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="username">นามสกุล</label>
                                            <input type="text" name="username" id="aa_lastnamex" class="form-control" value="<?php echo $rowquery_sqlmember['aa_lastname'];?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="username">ระดับชั้น</label>
                                            <select class="form-control" id="aa_classx">
                                            <option value="<?php echo $rowquery_sqlmember['aa_class'];?>" selected><?php echo $rowquery_sqlmember['aa_class'];?></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                        </select>
                                        </div>
                                        <!-- <div class="form-group col-md-6">
                                            <label class="form-label" for="username">ดัชนีมวลกาย (กิโลกรัม/ตารางเมตร)</label>
                                            <input type="number" name="username" id="bmi" class="form-control" placeholder="············">
                                        </div> -->
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="email">ห้องเรียน/แผนการเรียน</label>
                                            <select class="form-control" id="aa_majorx">
                                            
                                            <?php  
                                     
                                         while($resquery_sqlmajor = mysqli_fetch_array($query_sqlmajor )){ ?>
                                            <option value="<?php echo $resquery_sqlmajor['major_id'];?>" <?php if($resquery_sqlmajor['major_id']==$rowquery_sqlmember['aa_major']){ echo "selected";}?>>
                                            <?php 
                                           echo $resquery_sqlmajor['major_name'];?></option>
                                        <?php } ?>
                                        </select>
                                        </div>
                                      
                                    </div>

                                    </div>
                                    <center>
                                    <div class="col-sm-12 mb-2">
                                                    <button type="reset" class="btn btn-primary mr-1 waves-effect waves-float waves-light edit_memberx">แก้ไขข้อมูล</button>
                                    </div>
                                </center>
                                </div>
                                
                            </div>


                            <script>
            
            $(document).on('click','.edit_memberx',function(){
                    var aa_namex = document.getElementById("aa_namex").value;
                    var aa_lastnamex = document.getElementById("aa_lastnamex").value;
                    var aa_majorx = document.getElementById("aa_majorx").value;
                    var aa_classx = document.getElementById("aa_classx").value;
                    if(aa_namex==""){
                        document.getElementById("aa_namex").focus();
                    }
                    else if(aa_lastnamex==""){
                        document.getElementById("aa_lastnamex").focus();
                        }
                    else if(aa_majorx==""){
                        document.getElementById("aa_majorx").focus();
                        }
                    else if(aa_classx==""){
                        document.getElementById("aa_classx").focus();
                        }
                    else{
                    $.ajax({
                        type: 'POST',
                        data: {program:"edit_member",aa_namex:aa_namex,aa_lastnamex:aa_lastnamex,aa_classx:aa_classx,
                            aa_majorx:aa_majorx,aa_user_id_encodex:"<?php echo $aa_user_id_encode;?>"},
                        url: 'page/app.php',
                        success: function(msg) {
                            // alert(msg);
                        if(msg == "ok"){
                                Swal.fire(
                                        'แก้ไขข้อมูลสำเร็จ!',
                                        '',
                                        'success'
                                        ).then(function() {window.location="?pt=setting_class";})
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

                