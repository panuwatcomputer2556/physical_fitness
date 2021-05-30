<?php
require('../connection/connectdb.php');
//090h@oKiO#
//u876631174_linebeacon_pro

$sqlliff_register= "SELECT
`system_name`,
`system_link`,
`system_status`,
system_encodeid
FROM
`system_setting`
WHERE
`system_program` = '5' AND system_encodeid = 'sadasd3fsdfsdfdsfsdfsdfdf'";
    $ressqlliff_register = $connectdb->query($sqlliff_register);
    $row_ressqlliff_register = mysqli_fetch_assoc($ressqlliff_register);
    

?>
<html>
<head>
<!-- CSS only -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>บริการ LINE Messageing API</title>
 

</head>



<body onload="initWithMapStart()">
<div class="container">
  <script src="https://static.line-scdn.net/liff/edge/versions/2.3.0/sdk.js"></script>

<form action="">
<input type="hidden" id="liff_registerx" value="<?php echo $row_ressqlliff_register['system_link']; ?>">
</form>
<script>
  liff_registerx = document.getElementById("liff_registerx").value;
    function runApp() {
      liff.getProfile().then(profile => {
        window.location.replace("register.php?id="+profile.userId+"&displayName="+profile.displayName+"&image="+profile.pictureUrl);                  
      }  
      ).catch(err => console.error(err));
    }

    liff.init({ liffId: liff_registerx }, () => {
      if (liff.isLoggedIn()) {
        runApp()
      } else {
        liff.login();
      }
    }, err => console.error(err.code, error.message));
  </script>
</body>
</html>