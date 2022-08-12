<?php
require('top.inc.php');
$name='';
$user_email='';
$msg='';
if(isset($_GET['sno']) && $_GET['sno']!=''){
	$sno=get_safe_value($con,$_GET['sno']);
	$res=mysqli_query($con,"select * from users where sno='$sno'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
		$user_email=$row['user_email'];
	}else{
		header('location:users.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$user_email=get_safe_value($con,$_POST['user_email']);
	$res=mysqli_query($con,"select * from users where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['sno']) && $_GET['sno']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($sno==$getData['sno']){
			
			}else{
				$msg="User already exist";
			}
		}else{
			$msg="User already exist";
		}
	}	
	if($msg==''){
		if(isset($_GET['sno']) && $_GET['sno']!=''){
			// mysqli_query($con,"UPDATE `users` SET `name` = '$name', `user_email` = '$user_email' WHERE `users`.`sno` = $sno;");
			mysqli_query($con,"UPDATE `users` SET `name` = '$name', `user_email` = '$user_email' WHERE `users`.`sno` = $sno;" );
		}else{
			mysqli_query($con,"INSERT INTO `users` (`name`,`user_email`, `status`) VALUES ('$name', '$user_email','$sno');");
		}
		header('location:users.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Users</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">User Name</label>
									<input type="text" name="name" placeholder="Enter user name" class="form-control" required value="<?php echo $name?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">User email</label>
									<input type="text" name="user_email" placeholder="Enter user email" class="form-control" required value="<?php echo $user_email?>">
								</div>					
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>