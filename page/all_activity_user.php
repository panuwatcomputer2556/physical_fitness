<?php
session_start();
$aa_menu = $_SESSION['aa_menu'];
$aa_prefix = $_SESSION['aa_prefix'];
$aa_name = $_SESSION['aa_name'];
$aa_lastname = $_SESSION['aa_lastname'];
$aa_class = $_SESSION['aa_class'];
$aa_major = $_SESSION['aa_major'];
$aa_user_id_encode =  $_SESSION['aa_user_id_encode'];
$uniqid = sha1(uniqid(rand(),true),false);
$uniqid2 = $rand = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ23456789'),0,5);
$nowtimespc = date("H:i:s");
$nowdatespc = date("Y-m-d");
$datetimemixspc = strtotime($nowdatespc.' '.$nowtimespc);
$dtmixspcinsert = date('Y-m-d H:i:s', $datetimemixspc);

$sqlsetting_activity ="SELECT
*
FROM
setting_activity
LEFT JOIN(
SELECT activity_master.master_staus,activity_master.master_activity_encode,activity_master.master_encodeid
FROM
    activity_master
WHERE
    activity_master.aa_user_id_encode = '$aa_user_id_encode'
) tt
ON
setting_activity.activity_encode = tt.master_activity_encode
where setting_activity.activity_class = '$aa_class' AND setting_activity.activity_major_id= '$aa_major' 
OR setting_activity.activity_encode is null order by setting_activity.activity_num ASC
";
$query_sqlsetting_activity = $connectdb->query($sqlsetting_activity);




?>


                    <section id="card-demo-example">
                    <div class="row match-height">
                    <?php  
                     $co = 0;
                     while($res = mysqli_fetch_array($query_sqlsetting_activity )){ 
                        if(date_create($dtmixspcinsert) >= date_create($res['activity_timestart']) && date_create($dtmixspcinsert) < date_create($res['activity_timeend'])){
                                if(date_create($dtmixspcinsert) >= date_create($res['activity_timeend'])){
                                $timestatus = 'intimelate';
                                $texts="บันทึกผลการทดสอบสมรรถนะทางกาย";
                                $colorstatus ="primary";
                                }
                                else{
                                $timestatus = 'intime';
                                $texts="บันทึกผลการทดสอบสมรรถนะทางกาย";
                                $colorstatus ="primary";
                                }  
                        }
                        else{
                            if(date_create($dtmixspcinsert) < date_create($res['activity_timestart'])){
                                $timestatus = 'nottimestart';
                                $texts="ยังไม่ถึงเวลาบันทึกผลทดสอบสมรรถนะทางกาย";
                                $colorstatus ="danger";
                              }
                              else{
                             $timestatus = 'end';
                             $texts="หมดเวลาบันทึกผลทดสอบสมรรถนะทางกาย";
                             $colorstatus ="danger";
                              }
                        }
                        

                         ?>
                    <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">ครั้งที่ <?php echo $res['activity_num'];?></h4>
                                    <h6 class="card-subtitle text-muted">แบบทดสอบสมรรถนะทางกาย</h6>
                                </div>
                                <img class="img-fluid" src="imagelogo/image1.png" alt="Card image cap">
                                <div class="card-body">
                                    <center>
                                    <p class="card-text"><?php echo "วันที่ ".$res['activity_timestart'].
                                    " ถึง ".$res['activity_timeend'];?></p>
                                     <?php 
                                    if($res['master_staus']!="0"){ ?>
                                     <a href="?pt=form_physical&activityid=<?php echo $res['activity_encode'];?>">
                                     <button type="button btn-sm" class="btn btn-<?php echo $colorstatus;?> savesendhomework"  
                                     <?php 
                                     if($timestatus == 'end' || $timestatus == 'nottimestart'){
                                         echo 'disabled';}else{} ?>><?php echo $texts;?></button></a>
                                     
                                    <?php }else{ ?>
                                         <a href="?pt=result_physical&resultid=<?php echo $res['master_encodeid'];?>&num=<?php echo $res['activity_num'];?>"><button type="reset" class="btn btn-success mr-1 waves-effect waves-float waves-light">รายงานผลการทดสอบ</button></a>
                                   <?php  }   ?>  
                                    </center>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </section>


                