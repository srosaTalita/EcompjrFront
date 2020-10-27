<?php
    require_once "../../../DB/Connection.php";
    require_once "../../../models/User.php";
    require_once "../../../controllers/UserController.php";
    UserController::verifyLogin();
    $user = UserController::get($_GET['id']);
?>

<form action='/Treinamento2020/user/upload/ <?php echo $user->getId()?>' method='POST' enctype='multipart/form-data'>
    <input type='file' required name='archive'>
    <input Type='submit' value='Salvar'>
</form>