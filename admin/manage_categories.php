<?php
require('top.inc.php');
$categories='';
$category_description='';

$msg='';
if(isset($_GET['category_id']) && $_GET['category_id']!=''){
	$id=get_safe_value($con,$_GET['category_id']);
	$res=mysqli_query($con,"select * from categories where category_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['category_name'];
		$category_description=$row['category_description'];

	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['category_name']);
	$category_description=get_safe_value($con,$_POST['category_description']);

	$res=mysqli_query($con,"select * from categories where category_name='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['category_id']) && $_GET['category_id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['category_id']){
			
			}else{
				$msg="Categories already exist";
			}
		}else{
			$msg="Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['category_id']) && $_GET['category_id']!=''){
			mysqli_query($con,"update categories set category_name='$categories', category_description='$category_description' where category_id='$id'");
		}else{
			#mysqli_query($con,"insert into categories(category_name,category_description,status) values('$categories',,'1')");
			mysqli_query($con,"INSERT INTO `categories` ( `category_name`, `category_description`, `status`) VALUES ('$categories', '$category_description', '1')");
		}
		header('location:categories.php');
		die();
	}
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                    <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="category_name" class=" form-control-label">Categories</label>
                                <input type="text" name="category_name" placeholder="Enter categories name"
                                    class="form-control" required value="<?php echo $categories?>">
                                <label for="category_description" class=" form-control-label">Categories
                                    Description</label>
                                <input type="text" name="category_description" placeholder="Enter category_description"
                                    class="form-control" required value="<?php echo $category_description?>">
                            </div>
                            <button id="payment-button" name="submit" type="submit"
                                class="btn btn-lg btn-info btn-block">
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