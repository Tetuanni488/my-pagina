<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/normalize.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/style.css">
    <title>Document</title>
</head>
<div class="navbar">
    <div class="navbar-left">
        <a class="navbar-item" href="<?php echo constant('URL'); ?>index">Home</a>
    </div>
    <div class="navbar-left">
        <span class="navbar-item"><?php echo $user->getUsername()?></span>
    </div>
</div>