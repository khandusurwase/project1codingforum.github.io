

 <?php
   $min_num =1;
   $max_num = 9;
   $random_num1 = mt_rand($min_num, $max_num);
   $random_num2 = mt_rand($min_num, $max_num);
   ?> 
   <!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to K-30</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/forum/partials/_handleLogin.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginEmail">UserName(Email)</label>
                        <input type="text" class="form-control" id="loginEmail" name="user_email"
                            aria-describedby="emailHelp">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="loginPass" class="passBox">Password</label>
                        <input type="text" class="form-control" id="loginPass" Name="user_pass">
                        <!-- <span class="passText"></span>
                        <br><br>
                            <label for="">Show password</label>
                            <input type="checkbox" name="" onclick="myFunction()" style= "height: 24px;width: 63px;" >
                            <br><br>
                            <script type="text/javascript">
                                    function myFunction() {
                                      var show = document.getElementsByName('user_pass');
                                      if (show.type=='password'){
                                          show.type='text';
                                      }
                                      else{
                                      show.type='password';
                                    }
                                    }
             
                              </script> -->
                    </div>
                    <div class="form-group text-center">
            <label for="captchaResult">Enter The Captcha</label>
            <?php
            echo $random_num1. '+'. $random_num2.' ';
            ?>
            <input name="captchaResult" type="text" class="form-control" size="4">
            <input name="firstNumber" type="hidden" value="<?php echo $random_num1;?>"/>
            <input name="secondNumber" type="hidden" value="<?php echo $random_num2;?>"/>

        </div> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

                  
     