<!DOCTYPE html>

<html lang="en">
<head>
    <title>Login screen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>

<div class ="home">
    <div class="item">
        <div class="content">
        <form name="loginForm" onsubmit="return validate();" method="POST" class="form-horizontal" action="<?php echo URL; ?>validation/validateUser">
            <div class="logo">
                <img class="logoLogin" style="height: 115px;" src="https://www.pxl.be/Assets/website/pxl_algemeen/afbeeldingen/grotere_versie/1314_logo_pxl_it.png"></img>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="user" class="form-control" placeholder="User name">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-block" value="log in" name="loginButton" >
            </div>
        </form>
    </div>
</div>
</div>
</div>




</body>
<script type="text/javascript" src="<?php echo URL; ?>js/validation.js"></script>