<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['user_email']);
	$password=get_safe_value($con,$_POST['password']);
    $capResult = $_POST["captchaResult"];
    $firstNum = $_POST["firstNumber"];
    $secondNum = $_POST["secondNumber"];

    $checkTotal = $firstNum + $secondNum;
   if($capResult == $checkTotal){
	$sql="select * from admin_users where user_email='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:categories.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
}
else{
    $showError = "Invalid Captcha";
}
}
?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoks.jpg">
    <link rel="icon" href="img/logoks.jpg">
    <title>Admin Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="img/logoks.jpg">
       
</head>

<body style="background: linear-gradient(to right, #cec5cb,#cec5cb ,#f3a5dd );">
<?php
   $min_num =1;
   $max_num = 9;
   $random_num1 = mt_rand($min_num, $max_num);
   $random_num2 = mt_rand($min_num, $max_num);
   ?> 
    <form method="POST">

        <div class="row mb-3" style=" margin-top: 300px; margin-left:170px">
            <div class="text-3" style="margin-left: 160px;">
                <h1> Admin <span class="typing" style="  color: crimson; 
              font-weight: 500;">Login</span> </h1>
            </div>
            <!-- <label for="inputEmail3" class="col-sm-1 col-form-label">Username</label> -->
            <div class="col-sm-3">
                <input type="text" name="user_email" placeholder="Username" class="form-control" id="inputEmail3" required>
            </div>
        </div>
        <div class="row mb-2" style="margin-left:170px">
           
            <div class="col-sm-3">
                <input type="password" name="password" placeholder="Password" class="form-control" id="inputPassword3" required>
                <br><br>
                            <label for="">Show password</label>
                            <input type="checkbox" name="" onclick="myFunction()" style="    height: 24px;width: 63px;" >
                            <br><br>
                            <script type="text/javascript">
                                    function myFunction() {
                                      var show = document.getElementById('inputPassword3');
                                      if (show.type=='password'){
                                          show.type='text';
                                      }
                                      else{
                                      show.type='password';
                                    }
                                    }
             
                              </script>
            </div>
        </div>
        <div class="form-group text-left" class="row mb-2" >
            <label for="captchaResult" style="margin-left: 300px; color: crimson">Enter The Captcha</label>
            <?php
            echo $random_num1. '+'. $random_num2.' ';
            ?>
            <div class="col-sm-3" style="margin-left:180px; margin-top: 10px" >
            <input name="captchaResult" type="text" class="form-control"  id="inputPassword3" required>
            <input name="firstNumber" type="hidden" value="<?php echo $random_num1;?>"/>
            <input name="secondNumber" type="hidden" value="<?php echo $random_num2;?>"/>
            </div>
        </div> 

        <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 410px; margin-top: 30px">Login</button>
    </form>

    <div class="field_error" style="color: red; margin-left: 340px; margin-top: 30px;"><?php echo $msg ?></div>
</body>

</html>