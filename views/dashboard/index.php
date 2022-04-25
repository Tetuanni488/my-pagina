<?php
    $user                   = $this->d['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/normalize.css">
    <title>Hola</title>
</head>
<body>
    <?php require 'header.php'; ?>
    <div class="wrapper">
        <div class="container">
            <h2 class="center">Dashboard</h2>
        </div>
        <div class="user-settings-container">
            <class class="user-settings-content">
                <div class="user-settings-item">
                <strong> Username: </strong> <br/>
                    <div class="user-settings-item-value">
                    <?php echo $user->getUsername() ?>
                    </div>
                </div>
                <div class="user-settings-item">
                    <strong> Email: </strong> <br/>
                    <div class="user-settings-item-value">
                    <?php echo $user->getEmail() ?>
                    </div>
                </div>
                <div class="user-settings-item">
                    <strong> Role: </strong> <br/>
                    <div class="user-settings-item-value">
                    <?php echo $user->getRole();?>
                    </div>
                </div>
            </class>
            <class class="user-settings-content">
                hola
            </class>
        </div>
    </div>
</body>
<style>
    .wrapper{
        padding-top:60px;
    }
</style>
</html>