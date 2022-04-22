<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <form method="post" class="form-wrapper">
            <div class="form-err">
                Wrong password
            </div>
            <label class="form-label" >Username</label>  
            <input type="text" name="username" class="form-control" />  
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" />
            <input type="submit" name="login" class="form-btn-success" value="Log in"></input>
            <div class="form-register">
                Dont have an account? <a href="signup" class="form-register-link">Sign up now!</a>
            </div>
        </form>
    </div>
</body>
</html>