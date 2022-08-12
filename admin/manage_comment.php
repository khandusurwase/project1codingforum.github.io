<?php
require('top.inc.php');
$comment_content='';
$ct='';
$cb='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from comment where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$comment_content=$row['comment_content'];
		$ct=$row['comment_time'];
		$cb=$row['comment_by'];
	}else{
		header('location:users.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$comment_content=get_safe_value($con,$_POST['comment_content']);
	$ct=get_safe_value($con,$_POST['comment_time']);
	$res=mysqli_query($con,"select * from comment where comment_content='$comment_content'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="comment already exist";
			}
		}else{
			$msg="comment already exist";
		}
	}	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"UPDATE `comment` SET `comment_content` = '$comment_content', `comment_time` = '$ct' WHERE `comment`.`id` = $id;");
		}else{
			mysqli_query($con,"INSERT INTO `comment` (`comment_content`,`comment_time`, `status`) VALUES ('$comment_content', '$ct','$id');");
		}
		header('location:comment.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Comment</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">content</label>
									<input type="text" name="comment_content" placeholder="Enter user name" class="form-control" required value="<?php echo $comment_content?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">comment_time</label>
									<input type="text" name="comment_time" placeholder="Enter time" class="form-control" required value="<?php echo $ct?>">
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