<?php
$sqlsystem_major ="SELECT
`major_id`,
`major_name`,
`major_num`,
`major_status`
FROM
`system_major`
WHERE
`major_status` = 'on'";
$query_sqlsystem_major = $connectdb->query($sqlsystem_major);


$major = $_GET['major'];
$class = $_GET['class'];
if($major=="all" || $class =="all"){
    $sqlactivity ="SELECT
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
    Order by `activity_timecreate` DESC limit 10";
}else{
    $sqlactivity ="SELECT
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
    where activity_major_id = '$major' AND activity_class='$class'
    Order by `activity_num` ASC";
}

$query_sqlactivity = $connectdb->query($sqlactivity);


$sqlchangemajorname ="SELECT
`major_id`,
`major_name`
FROM
`system_major`
WHERE
`major_id` = '$major'";
$query_sqlchangemajorname = $connectdb->query($sqlchangemajorname);
$query_assocmajorname = mysqli_fetch_assoc($query_sqlchangemajorname);

// ?>


                           
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ค้นหารายการ 
                                        <a  href="?pt=setting_activity" class="btn btn-primary mr-1 waves-effect waves-float waves-light">เพิ่มกิจกรรม</a></h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="form-group">
                                        <label for="basicSelect">ระดับชั้น</label>
                                        <select class="form-control" id="sys_class">
                                            <option value="<?php echo $_GET['class'];?>" selected><?php if($_GET['class']=="all"){echo "ล่าสุด";}else{echo $_GET['class'];};?></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                        </select>
                                    </div>

                                    <!-- Custom Select -->
                                    <div class="form-group">
                                        <label for="customSelect">ห้องเรียน/แผนการเรียน</label>
                                        <select class="custom-select" id="sys_major">
                                        <option value="<?php echo $_GET['major'];?>" selected><?php if($_GET['major']=="all"){echo "ล่าสุด";}else{echo $query_assocmajorname['major_name'];};?></option>
                                        
                                        <?php  
                                       $co = 0;
                                       while($resquery_sqlsystem_major = mysqli_fetch_array($query_sqlsystem_major )){ ?>
                                            <option value="<?php echo $resquery_sqlsystem_major['major_id'];?>"><?php echo $resquery_sqlsystem_major['major_name'];?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                        <center><a class="btn btn-primary mr-1 waves-effect waves-float waves-light sys_activity">ค้นหาข้อมูล</a></h4></center>
                                </div>

                                <div class="table-responsive">
                                <table class="table table-hover-animation">
                                    <thead>
                                        <tr>
                                            <th>ครั้งที่</th>
                                            <th>ระดับชั้น</th>
                                            <th>ห้อง/แผนการเรียน</th>
                                            <th>วันเริ่มต้น/สิ้นสุด</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                       while($resquery_query_sqlactivity = mysqli_fetch_array($query_sqlactivity )){ ?>
                                        <tr>
                                            <td width="10%"><?php echo $resquery_query_sqlactivity['activity_num'] ; ?></td>
                                            <td><?php echo $resquery_query_sqlactivity['activity_class'] ; ?></td>
                                            <td><?php echo $resquery_query_sqlactivity['major_name'] ; ?></td>
                                            <td ><?php echo $resquery_query_sqlactivity['activity_timestart']." - ".$resquery_query_sqlactivity['activity_timeend']; ; ?></td>
                                            <td >
                                            <a href="?pt=report_total&num=<?php echo $resquery_query_sqlactivity['activity_num']; ?>&activity_class=<?php echo $resquery_query_sqlactivity['activity_class'] ; ?>&major_id=<?php echo $resquery_query_sqlactivity['activity_major_id'] ; ?>&encodeidx=<?php echo $resquery_query_sqlactivity['activity_encode']; ?>"><button type="submit" class="btn btn-sm btn-success  waves-effect waves-float waves-light">ดู</button></a>
                                            <a href="page/report.php?num=<?php echo $resquery_query_sqlactivity['activity_num']; ?>&activity_class=<?php echo $resquery_query_sqlactivity['activity_class'] ; ?>&major_id=<?php echo $resquery_query_sqlactivity['activity_major_id'] ; ?>&encodeidx=<?php echo $resquery_query_sqlactivity['activity_encode']; ?>"><button type="submit" class="btn btn-sm btn-success mr-1 waves-effect waves-float waves-light">ส่งออก Excel</button></a>
                                            <button type="submit" class="btn btn-sm btn-primary mr-1 waves-effect waves-float waves-light sys_activity_edit" id="<?php echo $resquery_query_sqlactivity['activity_encode'] ; ?>">แก้ไข</button>
                                            <button type="submit" class="btn btn-sm btn-danger mr-1 waves-effect waves-float waves-light sys_delete_activity" id="<?php echo $resquery_query_sqlactivity['activity_encode'] ; ?>">ลบ</button>
                                            </td>
                                        </tr>
                                        <?php } ?> 
                                    </tbody>
                                </table>
                            </div>
                            </div>

                            <script>
                    $(document).on('click','.sys_activity',function(){
                        var sys_class = document.getElementById("sys_class").value;
                        var sys_major = document.getElementById("sys_major").value;
                        window.location="?pt=all_activity&class="+sys_class+"&major="+sys_major;
                    });

                    $(document).on('click','.sys_activity_edit',function(){
                        id = $(this).attr("id");
                        window.location="?pt=setting_activity_edit&id="+id;
                    });


                    $(document).on('click','.sys_delete_activity',function(){
                    id = $(this).attr("id");
                    Swal.fire({
                    title: 'ยืนยันการลบกิจกรรมนี้ใช่หรือไม่?',
                    text: "ลบกิจกรรมนี้จะไม่สามารถกู้คืนได้อีก",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ยืนยันการลบรายการ',
                    cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: 'page/app.php',
                                method:"POST",
                                data: {id:id,program:"sys_delete_activity"},
                                success:function(msg){
                                    if(msg == 'ok'){
                                        Swal.fire(
                                        'ลบกิจกรรมสำเร็จ!',
                                        '',
                                        'success'
                                        ).then(function() {window.location.reload();})
                                    }
                                    else{
                                        Swal.fire(
                                        'เกิดข้อผิดพลาด!',
                                        'โปรดลองใหม่อีกครั้ง',
                                        'error'
                                        )
                                    }
                                }
                            });
                        }else if (result.dismiss === Swal.DismissReason.cancel) {
                                Swal.fire(
                                'ยกเลิกรายการได้รับการยกเลิก',
                                '',
                                'error'
                                )
                        }
                    })
                    return false;
                });


                            </script>


