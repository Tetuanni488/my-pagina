<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/normalize.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <form method="POST" class="form-wrapper" action="<?php echo constant('URL'); ?>login/authenticate">
            <div class="form-err">
                <?php echo $this->d["emailError"] ?>
            </div>
            <label class="form-label" >Email</label>
            <input type="text" name="email" class="form-control" />  

            <div class="form-err">
                <?php echo $this->d["passwordError"] ?>
            </div>
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" />
            <input type="submit" name="login" class="form-btn-success" value="Log in" pointer></input>
            <div class="form-register">
                Dont have an account? <a href="<?php echo constant('URL'); ?>signup" class="form-register-link">Sign up now!</a>
            </div>
        </form>
    </div>
</body>
</html>