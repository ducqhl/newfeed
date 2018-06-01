<?php require_once 'init.php' ?>
<?php include 'header.php' ?>
<h1>Trang chủ</h1>
<?php if ($currentUser) : ?>
Chào mừng <?php echo $currentUser['fullname'] ?> đã trở lại.
<?php else: ?>
Bạn chưa đăng nhập
<?php endif ?>

</br>
</br>
<div class = "col-md-8">
	<?php include 'newfeed.php'?>
</div>

<?php include 'footer.php' ?>