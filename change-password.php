<?php
session_start();
include('includes/config.php');
error_reporting(0);

if(strlen($_SESSION['alogin'])==0){   
    header('location:index.php');
} else { 

if(isset($_POST['change'])){
    $password = md5($_POST['password']);
    $newpassword = md5($_POST['newpassword']);
    $username = $_SESSION['alogin'];

    $sql ="SELECT Password FROM admin WHERE UserName=:username AND Password=:password";
    $query= $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    if($query->rowCount() > 0){
        $con="UPDATE admin SET Password=:newpassword WHERE UserName=:username";
        $chngpwd1 = $dbh->prepare($con);
        $chngpwd1->bindParam(':username', $username, PDO::PARAM_STR);
        $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
        $chngpwd1->execute();
        $msg="Password successfully changed";
    } else {
        $error="Current password is incorrect";  
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #667eea, #764ba2);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

.card-box {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(12px);
    padding: 40px;
    border-radius: 15px;
    width: 100%;
    max-width: 420px;
    color: #fff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    position: relative;
}

.form-control {
    border-radius: 10px;
}

.btn-custom {
    width: 100%;
    border-radius: 10px;
    background: #28a745;
    border: none;
}

.btn-custom:hover {
    background: #218838;
}
</style>

<script>
function valid() {
    if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
        alert("Passwords do not match!");
        return false;
    }
    return true;
}

function togglePassword(id) {
    var field = document.getElementById(id);
    field.type = field.type === "password" ? "text" : "password";
}

function goBack() {
    if (document.referrer !== "") {
        window.history.back();
    } else {
        window.location.href = "dashboard.php";
    }
}
</script>

</head>

<body>

<div class="card-box">

    <!-- BACK BUTTON -->
    <div style="position:absolute; top:15px; left:15px;">
        <button onclick="goBack()" class="btn btn-light">←</button>
    </div>

    <h3 class="text-center mb-4">Change Password</h3>

    <!-- ALERTS -->
    <?php if($error){ ?>
        <div class="alert alert-danger"><?php echo htmlentities($error); ?></div>
    <?php } else if($msg){ ?>
        <div class="alert alert-success"><?php echo htmlentities($msg); ?></div>
    <?php } ?>

    <form method="post" name="chngpwd" onsubmit="return valid();">

        <div class="mb-3">
            <label>Current Password</label>
            <div class="input-group">
                <input type="password" name="password" id="current" class="form-control" required>
                <button type="button" class="btn btn-light" onclick="togglePassword('current')">👁</button>
            </div>
        </div>

        <div class="mb-3">
            <label>New Password</label>
            <div class="input-group">
                <input type="password" name="newpassword" id="newpass" class="form-control" required>
                <button type="button" class="btn btn-light" onclick="togglePassword('newpass')">👁</button>
            </div>
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <div class="input-group">
                <input type="password" name="confirmpassword" id="confpass" class="form-control" required>
                <button type="button" class="btn btn-light" onclick="togglePassword('confpass')">👁</button>
            </div>
        </div>

        <button type="submit" name="change" class="btn btn-custom">Update Password</button>
    </form>

</div>

</body>
</html>

<?php } ?>