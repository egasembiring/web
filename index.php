<?php
session_start();
require_once 'mainconfig.php';

if (!isset($_SESSION['user'])) {    
    if (opt_get('Z3Vlc3Rfc3RhdHVz') == 'On') {
        header("Location: ".base_url('/id'));
    } else {
        header("Location: ".base_url('/id'));
    }
} else {
}
$_SESSION['user'] = $data_user;
$check_null = mysqli_query($db, "SELECT * FROM information");
$data_null = mysqli_fetch_assoc($check_null);
$query_slide = mysqli_query($db, "SELECT * FROM slider WHERE posisi = 'Login'");
; ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
	<head>
	    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7817370559366629"
     crossorigin="anonymous"></script>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	    <meta name="description" content="<?= config('web', 'description') ?>">
	    <meta name="keywords" content="<?= $data_reCapcha['keyworld']; ?>">
	    <meta name="author" content="<?= config('web', 'author') ?>">
	    <meta name="robots" content="index, follow">
	    <title><?= config('web', 'title_web') ?></title>
	    
        <link rel="shortcut icon" type="image/x-icon" href="<?= opt_get('aWNvbi13ZWI=') ?>">
	    <link rel="stylesheet" href="<?= asset('/fonts/Montserrat.css?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600') ?>">

<!-- Stats Horizontal Card -->
<style>
    .mku tbody tr th {
        width: 25% !important;
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><link rel="stylesheet" href="/styl.css">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7817370559366629"
     crossorigin="anonymous"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<!-- Redirection Counter -->
<script type="text/javascript">
  var count = 2; // Timer
  var redirect = "/admin"; // Target URL

  function countDown() {
    var timer = document.getElementById("timer"); // Timer ID
    if (count > 0) {
      count--;
      timer.innerHTML = "Harap tunggu " + count + " seconds."; // Timer Message
      setTimeout("countDown()", 1000);
    } else {
      window.location.href = redirect;
    }
  }
</script><br>

<div id="master-wrap">
  <div id="logo-box">

    <div class="footer animated slow fadeInUp">
      <p id="timer">
        <script type="text/javascript">
          countDown();
        </script>
      </p>
    </div>

  </div>
  <!-- /#logo-box -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../account/style.css">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7817370559366629"
     crossorigin="anonymous"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<br>
<center><svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
   <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
</svg></center>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>

