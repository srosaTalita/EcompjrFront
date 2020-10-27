<?php 

session_start();

class UserController{

    public function index(){
        header("location: /Treinamento2020/views/admin/user/index.php");
    }

    public function create(){
        header("location: /Treinamento2020/views/admin/user/create.php");
    }

    public function store(){ 
        if($_POST["password"] == $_POST["password_confirmation"]){
        User::create($_POST["name"], $_POST["email"], $_POST["type"], $_POST["password"]);
        header("location: /Treinamento2020/user/index");
        }
        else{
            header("location: /Treinamento2020/views/admin/user/create.php");
        }
    }

    public function edit($id){ 
        header("location: /Treinamento2020/views/admin/user/edit.php?id={$id[0]}");
    }

    public function profile(){
        header("location: /Treinamento2020/views/admin/user/profile.php");
    }

    public function update($id){ 
        $name = $_POST['name'];
        $email = $_POST["email"]; 
        $type = $_POST["type"];
        $password = $_POST["password"];
        User::update($id, $name, $email, $type, $password);
        header("location: /Treinamento2020/user/index");
    }

    public function image($id){
        header("location: /Treinamento2020/views/admin/user/image.php?id={$id[0]}");
    }

    public function upload($id){
        $archive = $_FILES['archive'];
        $extension = pathinfo($archive['name'], PATHINFO_EXTENSION);
        $archiveName = md5(uniqid($archive['name'])).".".$extension;
        $directory = "images/";
        move_uploaded_file($_FILES['archive']['tmp_name'], $directory.$archiveName);
        User::upload($id, $archiveName);
        header("location: /Treinamento2020/user/index");
    }

    public function delete($id){
        User::delete($id);
        header("location: /Treinamento2020/views/admin/pageAdmin/examples/tables.php?id={$id[0]}");
    }

    public static function all(){
        return User::all();
    }
    
    public function check(){
        $user = User::find($_POST['email'], $_POST['password']);
        if($user){
            $_SESSION["user"] = $user;
            header("location: /Treinamento2020/views/admin/pageAdmin/examples/dashboard.php");
        }
        else{
            header("location: /Treinamento2020/home/login");
        }
    }

    public static function verifyLogin(){
        if($_SESSION["user"] == null){
            header("location: /Treinamento2020/home/login");
        }
    }
    
    public static function verifyAdmin(){
    }

    public static function logout(){
        $_SESSION ["user"] = null;
        header("location: /Treinamento2020/home/login");
    }

    public static function get($id){
        return User::get($id);
    }
}