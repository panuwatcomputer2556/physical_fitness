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
    aa_user_id_encode,
     aa_user_id,
    `aa_username`,
    `aa_password`,
    `aa_prefix`,
    `aa_name`,
    `aa_lastname`,
    `aa_class`,
    `aa_major`,
    `aa_gender`,
    system_major.major_name
    FROM
        `account_admin`
    LEFT JOIN system_major ON system_major.major_id = account_admin.aa_major
    where  aa_menu='user'
    Order by `aa_user_id` DESC limit 10";
}else{
    $sqlactivity ="SELECT
    aa_user_id_encode,
     aa_user_id,
    `aa_username`,
    `aa_password`,
    `aa_prefix`,
    `aa_name`,
    `aa_lastname`,
    `aa_class`,
    `aa_major`,
    `aa_gender`,
    system_major.major_name
    FROM
        `account_admin`
    LEFT JOIN system_major ON system_major.major_id = account_admin.aa_major
    where aa_major = '$major' AND aa_class='$class' AND aa_menu='user' Order by `aa_user_id` ASC";
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
                                       </h4>
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
                                            <th>ที่</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>ระดับชั้น</th>
                                            <th>ห้อง/แผนการเรียน</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                        $b = 0;
                                       while($resquery_query_sqlactivity = mysqli_fetch_array($query_sqlactivity )){ ?>
                                        <tr>
                                            <td width="10%"><?php echo $b=$b+1;?></td>
                                            <td><?php echo $resquery_query_sqlactivity['aa_prefix'].$resquery_query_sqlactivity['aa_name']." ".$resquery_query_sqlactivity['aa_lastname'] ; ?></td>
                                            <td><?php echo $resquery_query_sqlactivity['aa_class'] ; ?></td>
                                            <td><?php echo $resquery_query_sqlactivity['major_name'] ; ?></td>
                                            <td >
                                            <button type="submit" class="btn btn-sm btn-danger mr-1 waves-effect waves-float waves-light sys_delete_member" 
                                            id="<?php echo $resquery_query_sqlactivity['aa_user_id_encode'] ; ?>" 
                                            namede="<?php echo $resquery_query_sqlactivity['aa_prefix'].$resquery_query_sqlactivity['aa_name']." ".$resquery_query_sqlactivity['aa_lastname'] ; ?>">ลบ</button>
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
                        window.location="?pt=member&class="+sys_class+"&major="+sys_major;
                    });

                    $(document).on('click','.sys_delete_member',function(){
                    id = $(this).attr("id");
                    // alert(id);
                    namede = $(this).attr("namede");
                    Swal.fire({
                    title: 'ยืนยันการลบกิจกรรมนี้ใช่หรือไม่?',
                    text: "ลบรายชื่อ "+namede+" นี้จะไม่สามารถกู้คืนได้อีก",
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
                                data: {id:id,program:"sys_delete_member"},
                                success:function(msg){
                                    if(msg == 'ok'){
                                        Swal.fire(
                                        'ลบรายชื่อสำเร็จ!',
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


