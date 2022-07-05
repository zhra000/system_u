<?php

    session_start();
    require_once 'config/db.php';
    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $role = 'member';

        if (empty($firstname)){
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: register.php");   
        } else if (empty($lastname)){
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: register.php");
        } else if (empty($username)){
            $_SESSION['error'] = 'กรุณากรอก Username';
            header("location: register.php");
        } else if (preg_match("|[^A-Z0-9a-z_]|i" ,$_POST['username'])){
            $_SESSION['error'] = 'กรุณากรอก Username ด้วย A-Z,0-9,a-z_';
            header("location: register.php");
        } else if (strlen($_POST['username']) > 12){
            $_SESSION['error'] = 'กรุณากรอก Username ไม่เกิน 12 ตัว';
            header("location: register.php");
        } else if (empty($password)){
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: register.php");
        } else if (strlen($_POST['password']) < 6){
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่านให้มากกว่า 6 ตัว';
            header("location: register.php");
        } else if (preg_match("|[^A-Z0-9a-z_]|i" ,$_POST['password'])){
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่านด้วย A-Z,0-9,a-z_';
            header("location: register.php");
        }else if (empty($c_password)){
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: register.php");
        } else if ($password != $c_password){
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: register.php");  
        } else {
            try {

                $check_username = $conn->prepare("SELECT username FROM users WHERE username = :username");
                $check_username->bindParam(":username", $username);
                $check_username->execute();
                $row = $check_username->fetch(PDO::FETCH_ASSOC);
            
                if ($row['username'] == $username){
                    $_SESSION['warning'] = "มี Username อยู่แล้ว <a href='/system_u/auth/login.php'> กดที่ฉันเพื่อเข้าสู่ระบบ </a>";
                    header("location: register.php");
                } else if (!isset($_SESSION['error'])){
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, username, password, role)
                                            VALUES(:firstname, :lastname, :username, :password, :role)");

                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":role", $role);
                    $stmt->execute();
                    $_SESSION['successs'] = "สมัครสมาชิกสำเร็จแล้ว <a href='/system_u/auth/login.php' class='alert-link'>กดที่ฉัน</a> เพื่อเข้าสู่ระบบ";
                    header("location: /system_u/image/home.php");
                } else {
                    $_SESSION['error'] = "กรอกข้อมูลไม่ถูกต้อง";
                    header("location: register.php");
                }


            } catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        

    }


?>