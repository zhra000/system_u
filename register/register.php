<?php 

    session_start();
    require_once 'config/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="font-mali vh-100 d-flex justify-content-center align-items-center">
	<div class="card mb-3">
		<div class="card-header bg-primary text-white">
			<h4>สมัครสมาชิก</h4>
		</div>
		<div class="card-body">
			<form action="signup_db.php" class="mb-3" method="POST">
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
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
				<div class="form-group">
					<label for="firstname">Firstname</label>
					<input type="text" name="firstname" id="firstname" class="form-control" aria-describedby="firstname">
				</div>
				<div class="form-group">
					<label for="lastname">Lastname</label>
					<input type="text" name="lastname" id="lastname" class="form-control" aria-describedby="lastname">
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" aria-describedby="username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" aria-describedby="password">
				</div>
				<div class="form-group">
					<label for="c_password">Password</label>
					<input type="password" name="c_password" id="c_password" class="form-control" aria-describedby="c_password">
				</div>
				<hr>
				<button type="submit" name="signup" class="btn btn-primary">Register</button>
			</form>
			<a href="/system_u/index.php">เข้าสู่ระบบ</a>
		</div>
	</div>
</body>
</html>