<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บริการ LINE Messageing API</title>
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>

            h1 {
            font-family: 'Kanit', sans-serif;
            }

            body {
                font-family: 'Kanit', sans-serif;
            }
    </style>
</head>
<body>

<div class="container">
<div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 text-center blueBG"><h1>ลงทะเบียนสมาชิก</h1>
                <h4><div class="text-center " id="showscore">บริการ LINE Messageing API</div></h4>
            </div>
            </div>
           
</div>


<img src="<?php echo $_GET['image'];?>" class="rounded mx-auto d-block mb-2" alt="..." width="150px">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >ชื่อ-นามสกุล</label>
    <input type="text"  class="form-control" id="linename">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">เบอร์ติดต่อ</label>
    <input type="text"  class="form-control" id="linetel" minlength="10" maxlength="10" >
  </div>
  <center><button type="submit" class="btn btn-success save_register">ลงทะเบียน</button></center>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script>

$(document).on('click','.save_register',function(){
                    var linename = document.getElementById('linename').value;
                    var linetel = document.getElementById('linetel').value;
                    if(linename==""){
                      Swal.fire(
                                        'ชื่อไม่ถูกต้อง',
                                        '',
                                        'warning'
                               ).then(function() {})
                    }
                    else if(linetel.length != 10){
                      Swal.fire(
                                        'เบอร์โทรไม่ถูกต้อง',
                                        '',
                                        'warning'
                               ).then(function() {})
                    }

                    else{
                    $.ajax({
                        type: 'POST',
                        data: {program:"save_register",linename:linename,linetel:linetel,linetoken:"<?php echo $_GET['id'];?>",lineimage:"<?php echo $_GET['image'];?>"},
                        url: '../page/app.php',
                        success: function(msg) {
                            if(msg == "ok"){
                                Swal.fire(
                                        'สมัครสมาชิกเรียบร้อย',
                                        '',
                                        'success'
                                        ).then(function() {window.location.reload();})
                          }
                          else if(msg == "notok"){
                                Swal.fire(
                                        'ไม่สามารถสมัครสมาชิกได้',
                                        '',
                                        'error'
                                        ).then(function() {window.location.reload();})
                          }
                          else if(msg == "sam"){
                                Swal.fire(
                                        'เคยสมัครสมาชิกแล้ว',
                                        '',
                                        'warning'
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
</body>
</html>