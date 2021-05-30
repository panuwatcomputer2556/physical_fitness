<?php
$sqlmajor = "SELECT
`major_id`,
`major_name`,
`major_num`,
`major_status`
FROM
`system_major`
WHERE
`major_status` = 'on'
order by major_num ASC";
 $query_sqlmajor = $connectdb->query($sqlmajor);
// ?>


                           
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ตั้งค่าห้องเรียน/แผนการเรียน 
                                       </h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                   
                                    <!-- Custom Select -->
                                    <div class="form-group">
                                        <label for="customSelect">ห้องเรียน/แผนการเรียน</label>
                                        <input class="form-control checkusername" id="majorx" type="text" placeholder="············"  />
                                    </div>
                                        <center><a class="btn btn-primary mr-1 waves-effect waves-float waves-light add_majorx">บันทึกข้อมูล</a></h4></center>
                                </div>

                                <div class="table-responsive">
                                <table class="table table-hover-animation">
                                    <thead>
                                        <tr>
                                            <th>เรียงลำดับ</th>
                                            <th>ห้องเรียน/แผนการเรียน</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($resquery_sqlmajor = mysqli_fetch_array($query_sqlmajor )){ ?>
                                        <tr>
                                            <td width="10%"> <input class="form-control change_majorxnum " id="<?php echo $resquery_sqlmajor['major_id'];?>" type="text"   value="<?php echo $resquery_sqlmajor['major_num'];?>" /></td>
                                            <td width="40%"> <input class="form-control  change_majorxname" id="<?php echo $resquery_sqlmajor['major_id'];?>"  type="text" value="<?php echo $resquery_sqlmajor['major_name'];?>"  /></td>
                                            <td width="10%">
                                            <button type="submit" class="btn btn-sm btn-danger mr-1 waves-effect waves-float waves-light sys_delete_majorxnum" id="<?php echo $resquery_sqlmajor['major_id'];?>">ลบ</button>
                                            </td>
                                        </tr>
                                     <?php } ?>  
                                    </tbody>
                                </table>
                            </div>
                            </div>

                            <script>


                    $(document).on('click','.add_majorx',function(){
                    var majorx = document.getElementById("majorx").value;
                    // alert(majorx);
                    if(majorx==""){
                            document.getElementById("majorx").focus();
                        }
                    else{
                    $.ajax({
                        type: 'POST',
                        data: {program:"add_majorx",majorx:majorx},
                        url: 'page/app.php',
                        success: function(msg) {
                        if(msg == "ok"){
                                Swal.fire(
                                        'เพิ่มห้องเรียน/แผนการเรียนสำเร็จ!',
                                        '',
                                        'success'
                                        ).then(function() {window.location.reload();})
                          }
                          else if(msg == "notok"){
                                Swal.fire(
                                        'ไม่สามารถเพิ่มห้องเรียน/แผนการเรียนได้',
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

                
                     $(document).on('change','.change_majorxname',function(){
                    // var editmajorx = document.getElementById("editmajorx").value;
                     id = $(this).attr("id");
                     val = $(this).val();
                    //  alert(val);
                        $.ajax({
                        type: 'POST',
                        data: {program:"change_majorxname",id:id,val:val},
                        url: 'page/app.php',
                        success: function(msg) {
                    //  alert(msg);
                        if(msg == "ok"){
                                Swal.fire(
                                        'แก้ไขห้องเรียน/แผนการเรียนสำเร็จ!',
                                        '',
                                        'success'
                                        ).then(function() {window.location.reload();})
                          }
                        else{
                                Swal.fire(
                                        'ไม่สามารถแก้ไขห้องเรียน/แผนการเรียนได้',
                                        '',
                                        'error'
                                        ).then(function() {window.location.reload();})
                            }
                            
                        }
                        
                    });
                    return false;
                     });

                     $(document).on('change','.change_majorxnum',function(){
                    // var editmajorx = document.getElementById("editmajorx").value;
                     id = $(this).attr("id");
                     val = $(this).val();
                    //  alert(val);
                        $.ajax({
                        type: 'POST',
                        data: {program:"change_majorxnum",id:id,val:val},
                        url: 'page/app.php',
                        success: function(msg) {
                    //  alert(msg);
                        if(msg == "ok"){
                                Swal.fire(
                                        'แก้ไขเรียงลำดับสำเร็จ!',
                                        '',
                                        'success'
                                        ).then(function() {window.location.reload();})
                          }
                        else{
                                Swal.fire(
                                        'ไม่สามารถแก้ไขการเรียงลำดับได้',
                                        '',
                                        'error'
                                        ).then(function() {window.location.reload();})
                            }
                            
                        }
                        
                    });
                    return false;
                     });

                    $(document).on('click','.sys_delete_majorxnum',function(){
                    id = $(this).attr("id");
                    Swal.fire({
                    title: 'ยืนยันการลบห้องเรียน/แผนการเรียนนี้ใช่หรือไม่?',
                    text: "",
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
                                data: {id:id,program:"sys_delete_majorxnum"},
                                success:function(msg){
                                    if(msg == 'ok'){
                                        Swal.fire(
                                        'ลบห้องเรียน/แผนการเรียนสำเร็จ!',
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


