<?php
 function dateformat($date){
    $date = date_create($date);
    $dateformat1 = date_format($date,"Y-m-d");
    $dateformat2 = date_format($date,"H:i:s");
    $dateformat = $dateformat1."T".$dateformat2;
    return $dateformat;
}

$sqlmember ="SELECT
`line_id`,
`line_name`,
`line_tel`,
`line_image`
FROM
`line_member`";
$query_sqlmember = $connectdb->query($sqlmember);



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

 $id = $_GET['id'];
 $sqlsetting_activity_edit = "SELECT
 activity_encode,
 `activity_num`,
 `activity_class`,
 `activity_major_id`,
 `activity_timestart`,
 `activity_timeend`,
 `activity_timecreate`,
 system_major.major_name
 FROM
 `setting_activity`
 LEFT JOIN system_major ON system_major.major_id = setting_activity.activity_major_id
 where activity_encode = '$id'";
 $query_sqlsetting_activity_edit = $connectdb->query($sqlsetting_activity_edit);
 $rowedit = mysqli_fetch_array($query_sqlsetting_activity_edit);

?>


                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">เพิ่มกิจกรรม</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="form-group">
                                        <label for="basicSelect">ครั้งที่ </label>
                                        <input type="number" name="username" id="activity_num" class="form-control" placeholder="············" value="<?php echo $rowedit['activity_num'];?>">
                                    </div>

                                    <!-- Custom Select -->
                                    <div class="form-group">
                                        <label for="customSelect">ระดับชั้น</label>
                                        <select class="custom-select" id="ativity_class">
                                            <option value="<?php echo $rowedit['activity_class'];?>" selected><?php echo $rowedit['activity_class'];?></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="email">ห้องเรียน/แผนการเรียน</label>
                                            <select class="form-control" id="ativity_major">
                                            <option value="<?php echo $rowedit['activity_major_id'];?>" selected><?php echo $rowedit['major_name'];?></option>
                                            <?php  
                                     
                                         while($resquery_sqlmajor = mysqli_fetch_array($query_sqlmajor )){ ?>
                                            <option value="<?php echo $resquery_sqlmajor['major_id'];?>" <?php if($resquery_sqlmajor['major_id']==$rowquery_sqlmember['aa_major']){ echo "selected";}?>>
                                            <?php 
                                           echo $resquery_sqlmajor['major_name'];?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicSelect">วันที่เริ่มต้น</label>
                                        <input type="datetime-local" name="username" id="ativity_timestart" class="form-control" placeholder="············" value="<?php echo dateformat($rowedit['activity_timestart']);?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="basicSelect">วันที่สิ้นสุด</label>
                                        <input type="datetime-local" name="username" id="ativity_timeend" class="form-control" placeholder="············" value="<?php echo dateformat($rowedit['activity_timeend']);?>">
                                    </div>

                                </div>
                                <center>
                                    <div class="col-sm-12 mb-2">
                                                    <button type="reset" class="btn btn-primary mr-1 waves-effect waves-float waves-light edit_activity_admin">แก้ไขกิจกรรม</button>
                                    </div>
                                </center>
                            </div>
         
                            
                            </div>

<script>
    $(document).on('click','.edit_activity_admin',function(){
                    var activity_num = document.getElementById("activity_num").value;
                    var ativity_class = document.getElementById("ativity_class").value;
                    var ativity_major = document.getElementById("ativity_major").value;
                    var ativity_timestart = document.getElementById("ativity_timestart").value;
                    var ativity_timeend = document.getElementById("ativity_timeend").value;
                    // alert(username);
                   if(activity_num==""){
                        document.getElementById("activity_num").focus();
                        }
                    else if(ativity_class==""){
                        document.getElementById("ativity_class").focus();
                        }
                    else if(ativity_major==""){
                        document.getElementById("ativity_major").focus();
                    }
                    else if(ativity_timestart==""){
                        document.getElementById("ativity_timestart").focus();
                    }
                    else if(ativity_timeend==""){
                        document.getElementById("ativity_timeend").focus();
                    }
                    else{
                    $.ajax({
                        type: 'POST',
                        data: {program:"edit_activity_admin",activity_num:activity_num,ativity_class:ativity_class,ativity_major:ativity_major,
                            ativity_timestart:ativity_timestart,ativity_timeend:ativity_timeend,id:"<?php echo $_GET['id'];?>"},
                        url: 'page/app.php',
                        success: function(msg) {
                        if(msg == "ok"){
                                Swal.fire(
                                        'แก้ไขกิจกรรมสำเร็จ!',
                                        '',
                                        'success'
                                        ).then(function() {window.location="?pt=all_activity&class="+ativity_class+"&major="+ativity_major;})
                          }
                        // else if(msg == "sam"){
                        //         Swal.fire(
                        //                 'ผิดพลาด!',
                        //                 'คุณเคยสมัครบัญชีผู้ใช้งานแล้ว',
                        //                 'warning'
                        //                 ).then(function() {window.location="login.php";})
                        //   }
                          else if(msg == "notok"){
                                Swal.fire(
                                        'ไม่สามารถสร้างกิจกรรมได้',
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
