<!DOCTYPE html>
<div class="navbar">
    <div class="navbar-left">
        <a class="navbar-item" href="<?php echo constant('URL'); ?>index">Home</a>
    </div>
    <div class="navbar-left">
        <span class="navbar-item"><?php echo $user->getEmail()?></span>
    </div>
</div>