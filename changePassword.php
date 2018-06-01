<?php require_once 'init.php'; ?>

<?php
$success = true;
if (!empty($_POST['oldpassword']) 
  && !empty($_POST['newpassword']) 
  && !empty($_POST['veritynewpassword'])
  && ($_POST['newpassword'] == $_POST['veritynewpassword'])
) 
{  
  require_once 'functions.php';

  $success = changePassword($_SESSION['userId'],$_POST['oldpassword'],$_POST['newpassword']);
}
?>

<?php include 'header.php'; ?>
<!--checking-->
</br>
<?php if (!$success) : ?>
  <div class="alert alert-danger" role="alert">
    Mật khẩu không hợp lệ vui lòng nhập lại!
  </div>
<?php endif; ?>

</br>
<h4>Change Your Password</h4>
<form method = "POST">
  <div class="form-group">
    <label for="InputOldPassword">Old Password</label>
    <input type="password" class="form-control" name = "oldpassword" id="InputOldPassword" placeholder="Enter your old password in here">
  </div>
  <div class="form-group">
    <label for="InputNewPassword">New Password</label>
    <input type="password" class="form-control" id="InputNewPassword" name = "newpassword" placeholder="Enter your new password in here">
  </div>
  <div class="form-group">
    <label for="VerityNewPassword">Verity Password</label>
    <input type="password" class="form-control" id="VerityNewPassword" name = "veritynewpassword" placeholder="Enter your new password in here">
  </div>
  
</div>
<button type="submit" class="btn btn-primary">Finish</button>
</form>
<?php include 'footer.php' ?>