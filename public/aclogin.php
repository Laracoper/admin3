<?
session_start();
require '../core/connect.php';
require '../core/func.php';
require_once '../vendor/autoload.php';

use Valitron\Validator;

if(get_admin()){
    header('location:acadmin.php',1,301);
}


$rules = [

    'required' => ['login', 'password'],

];

if (!empty($_POST)) {
    \Valitron\Validator::lang('ru');
    $v = new \Valitron\Validator($_POST);

    $v->rules($rules);
    if ($v->validate()) {



        $login = $_POST['login'];
        $password = $_POST['password'];

        $sql = "select * from admin";
        $res = $pdo->prepare($sql);
        $res->execute();
        $admin = $res->fetch();
        print_r($admin);
        if ($login != $admin['login'] || $password != $admin['password']) {
             $_SESSION['noadmin']='мы вас не знаем';
            header('location: /aclogin.php');
            exit;
        }

        if ($login == $admin['login'] || $password == $admin['password']) {
            $_SESSION['admin']='hello';
           header('location: /acadmin.php');
           
       }


        // header('location: /');
        // $_SESSION['success'] = 'данные отправлены';
    } else {
        $errors = '<ol>';
        foreach ($v->errors() as $error) {
            foreach ($error as $item) {
                $errors .= "<li>{$item}</li>";
            }
        }
        $errors .= '</ol>';
        $_SESSION['errors'] = $errors;
    }
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
    <div class="container-fluid">
        <h3>login</h3>
        <div class="col-md-12">
            <? if (!empty($_SESSION['errors'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['errors'];
                    unset($_SESSION['errors']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            <? } ?>
            <? if (!empty($_SESSION['noadmin'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['noadmin'];
                    unset($_SESSION['noadmin']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            <? } ?>

        </div>
        <form action="" method="post">
            <input type="text" name="login" placeholder="login" class="form-control mb-3">
            <input type="text" name="password" placeholder="password" class="form-control mb-3">
            <button class="btn btn-success" type="submit">enter</button>
        </form>
        <a href="/">site</a>
    </div>


    <script src="js/default.js"></script>
</body>

</html>