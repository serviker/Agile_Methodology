<?php

class User {
    private $user_id;
    private $username;
    private $password;
    private $role;

    // Конструктор
    function __construct($user_id, $username, $password, $role){
        $this->user_id = $user_id;
        $this->username = $username;
        $this->password = $password;
        $this->password = $role;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }


    function getUserName() {
        return $this->username;
    }

    function setUserName($username) {
        $this->username = $username;
    }

    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function getRole() {
        return $this->role;
    }

    function setRole($role) {
        $this->role = $role;
    }
    
    // $user = new User(1, 'example_user', 'password123', 'admin');

    // // Установка нового значения для username
    // $user->setUserName($_POST['new_username']);

    // // Установка нового значения для password
    // $user->setPassword($_POST['new_password']);

    // // Установка нового значения для role
    // $user->setRole($_POST['new_role']);


    

    

    // геттеры, сеттеры и другие методы по необходимости
}