<?php 
session_start();
require_once('ivanconn.php'); 
$item=$_REQUEST[item];
$id=$_REQUEST[id];
$userid=1;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AudioCamp</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/added.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=cyrillic,latin' rel='stylesheet' type='text/css'>
    <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js?ver=3.9.3'></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<meta name="description" content="AudioCamp"/>
<link rel="canonical" href="http://ideqtami.com" />
<meta property="og:locale" content="bg_BG" />


  </head>
  <body style="font-family: 'Roboto Condensed', sans-serif; height:100%;" id="top">
  
  	<div class="container-fluid" style="height: 10px; background-color: #ccc;"></div>

		<div class="container-fluid">
        	<div class="container">
            <div class="col-xs-12 col-md-12" style="padding-top: 37px; padding-left: 0px; padding-right: 0px;">
            	 <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="color:#333;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar" style="color: #000"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style=" padding-left: 0px; padding-right: 0px;">
      <ul class="nav navbar-nav">
        <li><a href="?item=songs" style="border-radius: 5px !important;">Songs</a></li>
        <li><a href="?item=playlists" style="border-radius: 5px !important;">Playlists</a></li>
        <li><a href="?item=myplaylists" style="border-radius: 5px !important;">MyPlaylists</a></li>     
      </ul>
    </div><!-- /.navbar-collapse -->
            </div>
            </div>
        </div>
        
        <div class="container-fluid" style="padding: 0px; height:1px; background-color:#ccc; margin-top: 20px; margin-bottom: 20px;"></div>
        
 
            
<div class="container-fluid">
	<div class="container">
    	        
        <div class="col-md-12 col-xs-12" style="text-align: justify; font-size: 18px;">
        <h1 style="padding-top: 0px; margin-top: 0px; font-size: 30px; font-weight: 700;">Обичате ли музика?</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">LOGIN</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:20px;">
      	<form class="form-inline">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail3">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-default">Sign in</button>
</form>
    </div>
  </div>
</div><br/><br/>
       Всеки обича музиката...<br/>
       Ние, от AudioCamp,  предлагаме да се насладите на Вашата любима музика, като запазите, организирате и споделяте песните които харесвате. <br/>
       <?php if ($item=='songs') {listsongs($link);} ?>
       <?php if ($item=='playlists') {playlist($link);} ?>
       <?php if ($item=='myplaylists') {myplaylist($userid, $link);} ?>
       <?php if ($item=='playlist') {plist($id, $link);} ?>
        </div>
    </div>
</div>



 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
        
  </body>
</html>