<?php
    $user                   = $this->d['user'];
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <?php require 'header.php'; ?>
    <div class="wrapper">
        <div class="container">
            <h2 class="center">Dashboard</h2>
        </div>
        <div class="user-settings-container">
            <class class="user-settings-content">
                <div class="user-settings-item">
                <strong>Username:</strong><br/>
                    <div class="user-settings-item-value">
                    <?php echo $user->getUsername() ?>
                    </div>
                </div>
                <div class="user-settings-item">
                    <strong>Email:</strong><br/>
                    <div class="user-settings-item-value">
                    <?php echo $user->getEmail() ?>
                    </div>
                </div>
                <div class="user-settings-item">
                    <strong>Role:</strong><br/>
                    <div class="user-settings-item-value">
                    <?php echo $user->getRole();?>
                    </div>
                </div>
            </class>
            <class class="user-settings-content">
                <div class="user-settings-item">
                    <strong> Users list: </strong><br/>
                    <div class="user-settings-item-value">
                    <?php
                        $users = $user->getAll();
                        foreach ($users as $key => $user_) {
                            echo $user_->getUsername()." ".$user_->getEmail()." ".$user_->getRole()."<br/>";
                        }
                    ?>
                    </div>
                </div>
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