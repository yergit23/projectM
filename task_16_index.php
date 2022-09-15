<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Document
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php if ($_SESSION['user']): ?>
                <h2>Здравствуйте, <?php echo $_SESSION['user']['email']; ?></h2>
            <?php else: ?>
                <h2>Вы не авторизованы</h2>
            <?php endif; ?>
            <div>
            <?php if ($_SESSION['user']): ?>
                <a href="task_16_logout.php" class="btn btn-danger">Выйти<a/>
            <?php else: ?>
                <a href="task_16.php" class="btn btn-info">Войти<a/>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
