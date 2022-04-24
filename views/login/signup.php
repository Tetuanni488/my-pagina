<!DOCTYPE html>
<html lang="en">
<?php require "views/head.php"; ?>
<body>
    <div class="wrapper">
        <form method="POST" action="<?php echo constant('URL'); ?>signup/newUser" class="form-wrapper">
            <div class="form-err">
                <?php echo $this->d["usernameError"] ?>
            </div>
            <label class="form-label" >Username</label>  
            <input type="text" name="username" class="form-control" />

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

            <div class="form-err">
                <?php echo $this->d["confirmPasswordError"] ?>
            </div>
            <label class="form-label">Repeat your password</label>
            <input type="password" name="confirmPassword" class="form-control" />
            <input type="submit" name="sginup" class="form-btn-success" value="Complete"></input>
            <div class="form-register">
                You already have an account? <a href="<?php echo constant('URL'); ?>login" class="form-register-link">Log in here!</a>
            </div>
        </form>
    </div>
</body>
</html>