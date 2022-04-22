<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <title>Document</title>
</head>
<body>
    <?php require 'views/utils/navbar.php'; ?>
    <div class="wrapper">
        <h1 class="error center">
        <?php echo $this->message ?>
        </h1>
        <form method="post" class="form-wrapper">
            <label>Username</label>  
            <input type="text" name="username" class="form-control" />  
            <br />  
            <label>Password</label>
            <input type="password" name="password" class="form-control" />  
            <br />  
            <input type="submit" name="login" class="btn btn-info" value="Login" />  
        </form>
    </div>
</body>
</html>