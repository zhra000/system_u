<?php 

    session_start();
    require_once 'config/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="font-mali vh-100 d-flex justify-content-center align-items-center">

<form action="form_rwd_db.php" method="POST" class="form-horizontal">
<?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <h4> Form Reset Password </h4>
<hr>
				<div class="form-group">
					<label for="n_password">New Password :</label>
					<input type="password" name="n_password" id="n_password" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="c_password">Confirm Password :</label>
					<input type="password" name="c_password" id="c_password" class="form-control" required>
				</div>
        <hr>
        <input type="hidden" name="rwd" value="<?php echo $row['id'];?>">
				<button type="submit" class="btn btn-primary">บันทึก</button>
			</form>
		</div>
	</div>
</body>
</html>