<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['user_email'];
    $pass = $_POST['user_pass'];
    $capResult = $_POST["captchaResult"];
    $firstNum = $_POST["firstNumber"];
    $secondNum = $_POST["secondNumber"];
   
    $checkTotal = $firstNum + $secondNum;
   if($capResult == $checkTotal){
    $status = 1;
    $sql = "SELECT * FROM `users` WHERE user_email='$email' AND status='$status'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($status!=0 ) {
        if($numRows==1){
        $row = mysqli_fetch_assoc($result);
                if(password_verify($pass, $row['user_pass']) ){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['sno'] = $row['sno'];
                    $_SESSION['user_email'] = $email;
                    echo "logged in". $email;
                } 
                header("Location: /forum/index.php");  
                $showError = "Password do not match"; 
    // <div class="field_error" style="color: red; margin-left: 340px; margin-top: 30px;"><?php echo $msg </div>

           }
    }
    header("Location: /forum/index.php");  
    $showError = "You are Blocked abnormal activity"; 
  }
else{
    $showError = "Invalid Captcha";
}
}
?>