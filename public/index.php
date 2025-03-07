<?
session_start();
require '../core/connect.php';
require_once '../vendor/autoload.php';
require 'valid.php';

if ($_POST) {
    print_r($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin3</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <main class="container">
        <h2>contact form</h2>
        <div class="col-md-12">
            <? if (!empty($_SESSION['errors'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['errors'];
                    unset($_SESSION['errors']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            <? } ?>
            <? if (!empty($_SESSION['success'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['success'];
                    unset($_SESSION['success']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            <? } ?>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="ваше имя" class="form-control mb-3">
            <input type="text" name="phone" placeholder="8 999 999 99 99" class="form-control mb-3">
            <button class="btn btn-success" type="submit">enter</button>
        </form>
        <a href="aclogin.php">acadmin</a>
    </main>


    <script src="js/default.js"></script>
</body>

</html>