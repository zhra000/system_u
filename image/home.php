<?php 
session_start();

    require_once('config/db.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    
    <div class="container text-center">
        <h1>Profile</h1>
        <table class="table table-striped table-bordered table-hover">

            <tbody>
             
                    <tr>
                    <div class="p-16 bg-surface-secondary">
										<div class="row">
											<div class="col-lg-4 mx-auto">
											<div class="card shadow">
												<div class="card-body">
												<div class="d-flex justify-content-center">
													<a href="#" class="avatar avatar-xl rounded-circle">
													<img alt="" src="fileupload/<?php echo $_SESSION['image']; ?>"width="200px" height="250px" alt="">>                                    
													</a>
												</div>
                                                <hr>
                                                <?php echo $_SESSION['firstname'];?><?php echo " ";?><?php echo $_SESSION['lastname'];?>
                                                <hr>
                                                <a href="edit.php?update_id=<?php echo $_SESSION['id']; ?>" class="btn btn-warning">Edit</a>
                                                <a href="/system_u/edit/form_rwd.php?update_id=<?php echo $_SESSION['id']; ?>" class="btn btn-warning">แก้ไขรหัสผ่าน</a>
												<div class="text-center my-6">
                                                <hr>
                                                <a href="/system_u/auth/logout.php" class="btn btn-danger">Logout</a>
												</div>
												</div>
											</div>
											</div>
										</div>
										</div>                       
               
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>