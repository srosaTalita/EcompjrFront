<?php

class User{
    private $id;
    private $name;
    private $email;
    private $type;
    private $password;
    private $image;

    public function __construct($id, $name, $email, $type){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->type = $type;
    }

    public static function find($email, $password){
        $connection = Connection::getConnection();
        $query = "select * from users where email = '{$email}' and password = '{$password}'";
        $result = mysqli_query($connection, $query); 
        if(mysqli_num_rows($result) == 1){
            $user = mysqli_fetch_assoc($result);
            $var = new User($user['id'], $user['name'], $user['email'], $user['type']);
            return $var;
        }
        else{
            return false;
        }
        mysqli_close($connection);
    }

    public static function get($id){
        $connection = Connection::getConnection();
        $query = "select * from users where id = '{$id}'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0 ){
            $userData = mysqli_fetch_array($result);
            $user = new User($userData['id'], $userData['name'], $userData['email'], $userData['type']);
            return $user;
        }
        else{
            return false;
        }
    }

    public static function create($name, $email, $type, $password){
        $connection = Connection::getConnection();
        $query = "insert into users (name, email, type, password) values ('{$name}', '{$email}', '{$type}', '{$password}')";
        $result = mysqli_query($connection, $query);
    }

    public static function all(){
        $connection = Connection::getConnection();
        $query = "select * from users";
        $result = mysqli_query($connection, $query);
        $users = [];
        for ($i=0; $i < mysqli_num_rows($result); $i++) { 
            $user = mysqli_fetch_assoc($result);
            $users[$i] = new User($user['id'], $user['name'], $user['email'], $user['type']);
        }
        return $users;
    }

    public static function delete($id){
        $connection = Connection::getConnection();
        $str = implode(':', $id);
        $query = "delete from users where id = {$str}";
        $result = mysqli_query($connection, $query);
    }

    public static function update($id, $name, $email, $type, $password){
        $connection = Connection::getConnection();
        $str = implode(':', $id);
        $query = "update users set name = '{$name}', email = '{$email}', type = '{$type}', password = '{$password}' where id=$str";
        $result = mysqli_query($connection, $query);
    }

    public static function upload($id, $archiveName){//ta funcionando +/-
        $connection = Connection::getConnection();
        $str = implode(':', $id);
        $query = "update users set image = {$archiveName} where id = $str";
        $result = mysqli_query($connection, $query);
    }

    public function getId(){
        return $this->id;
    }
    
    public function getType(){
        return $this->type;
    }

    public function getName(){
        return $this->name;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getPassword(){
        return $this->password;
    }

    public function getImage(){
        return $this->image;
    }

    public function setType($name){
        $this->name = $name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setImage($image){
        $this->image = $image;
    }
}