<?php
require('top.inc.php');
$thread_title='';
$thread_desc='';
$msg='';
if(isset($_GET['thread_id']) && $_GET['thread_id']!=''){
	$thread_id=get_safe_value($con,$_GET['thread_id']);
	$res=mysqli_query($con,"SELECT * FROM `threads` where thread_id='$thread_id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$thread_title=$row['thread_title'];
		$thread_desc=$row['thread_desc'];
	}else{
		header('location:threads.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$thread_title=get_safe_value($con,$_POST['thread_title']);
	$thread_desc=get_safe_value($con,$_POST['thread_desc']);
	$res=mysqli_query($con,"SELECT * FROM `threads` WHERE thread_title='$thread_title'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['thread_id']) && $_GET['thread_id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($thread_id==$getData['thread_id']){
			
			}else{
				$msg="User already exist";
			}
		}else{
			$msg="User already exist";
		}
	}	
	if($msg==''){
		if(isset($_GET['thread_id']) && $_GET['thread_id']!=''){
			#mysqli_query($con,"UPDATE `threads` SET `thread_title` = '$thread_title', `thread_desc` = '$thread_desc' WHERE `thread`.`thread_id` = $thread_id;");
			mysqli_query($con,"UPDATE `threads` SET `thread_title` = '$thread_title', `thread_desc` = '$thread_desc' WHERE `threads`.`thread_id` = $thread_id;");
		}else{
			mysqli_query($con,"INSERT INTO `threads` (`thread_title`,`thread_desc`, `status`) VALUES ('$thread_title', '$thread_desc','1');");
		}
		header('location:threads.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Thread</strong><small>Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">Thread_title</label>
									<input type="text" name="thread_title" placeholder="Enter New Title" class="form-control" required value="<?php echo $thread_title?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<input type="text" name="thread_desc" placeholder="thread_desc" class="form-control" required value="<?php echo $thread_desc?>">
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