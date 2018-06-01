<?php require_once 'init.php'; ?>

<?php
if (!empty($_POST['box_newfeed'])) {  
  require_once 'functions.php';
  $userId = $_SESSION['userId'];
  echo $userId;
  addNewFeed($_POST['box_newfeed'], $userId);
}
?>

<?php include 'header.php'; ?>
  <form method="POST">
  <div class="form-group">
  </br>
  <h4>Đăng Trạng Thái Mới</h4>
  <textarea class="form-control" id="exampleFormControlTextarea1" name = "box_newfeed" rows="3" placeholder="Bạn sao rồi?"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Đăng</button>
  </form>
<?php include 'footer.php' ?>