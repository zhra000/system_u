<?php 
    session_start();
    require_once('config/db.php');  
    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $conn->prepare('SELECT * FROM users WHERE id = :id');
            $select_stmt->bindParam(":id", $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    } 

    if (isset($_REQUEST['rwd'])) {

            $n_password = $_POST['n_password'];
            $c_password = $_POST['c_password'];

            if (empty($n_password)){
                $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
                header("location: form_rwd.php");
            } else if (strlen($_POST['n_password']) < 6){
                $_SESSION['error'] = 'กรุณากรอกรหัสผ่านให้มากกว่า 6 ตัว';
                header("location: form_rwd.php");
            } else if (preg_match("|[^A-Z0-9a-z_]|i" ,$_POST['n_password'])){
                $_SESSION['error'] = 'กรุณากรอกรหัสผ่านด้วย A-Z,0-9,a-z_';
                header("location: form_rwd.php");
            }else if (empty($c_password)){
                $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
                header("location: form_rwd.php");
            } else if ($n_password != $c_password){
                $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
                header("location: form_rwd.php");  
            } else {
                
                    $sql = 'UPDATE users SET password = :password WHERE id = :id';
            
                    if($stmt = $conn->prepare($sql)){
            
                      $passwordHash = password_hash($n_password, PASSWORD_DEFAULT);
                      $idHash = $id;
            
                        $stmt->bindParam(":password", $passwordHash, PDO::PARAM_STR);
                        $stmt->bindParam(":id", $idHash, PDO::PARAM_STR);
            
                        if($stmt->execute()){
                            header("location: /system_u/index.php");
                            exit();
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    unset($stmt);
                    }
                }
              unset($conn);
            }   
    ?>