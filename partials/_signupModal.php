<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup for the K-30  Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="/forum/partials/_handleSignup.php" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">UserEmail</label>
                        <!-- <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp"> -->
                        <input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> -->
                            <span class="emailText"></span>
                    </div>
                    <div class="form-group">
                        <label class="emailBox" for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="signupName" name="signupName" aria-describedby="emailHelp" required>
                        </div>
                    <div class="form-group">
                        <label class="passBox" for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                        <span class="passText"></span>
                        <br><br>
                            <label for="">Show password</label>
                            <input type="checkbox" name="" onclick="myFunction()" style="   height: 24px;width: 63px;" >
                            <br><br>
                            <script type="text/javascript">
                                    function myFunction() {
                                      var show = document.getElementById('signupPassword');
                                      if (show.type=='password'){
                                          show.type='text';
                                      }
                                      else{
                                      show.type='password';
                                    }
                                    }
             
                              </script>
                    </div>
                    <script>
                          const email = document.getElementById("signupEmail");
                          const password = document.getElementById("signupPassword");

                          email.addEventListener('input',()=>{
                            const emailBox = document.querySelector('.emailBox');
                            const emailText = document.querySelector('.emailText');
                            const emailPattern = /[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/;

                            if(email.value.match(emailPattern)){
                              emailBox.classList.add('valid');
                              emailBox.classList.remove('invalid');
                              emailText.innerHTML = "Your Email Address is Valid"; 
                            }else{
                              emailBox.classList.add('invalid');
                              emailBox.classList.remove('valid');
                              emailText.innerHTML = "Must be a valid email address."; 
                            }
                          });

                          password.addEventListener('input',()=>{
                            const passBox = document.querySelector('.passBox');
                            const passText = document.querySelector('.passText');
                            const passPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

                            if(password.value.match(passPattern)){
                              passBox.classList.add('valid');
                              passBox.classList.remove('invalid');
                              passText.innerHTML = "Your Password is Valid"; 
                            }else{
                              passBox.classList.add('invalid');
                              passBox.classList.remove('valid');
                              passText.innerHTML = "Your password must be at least 6 characters as well as contain at least one uppercase, one lowercase, and one number."; 
                            }
                          });
                        </script>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword"required>
                    </div>
                     
                    <button type="submit" class="btn btn-primary">Signup</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            </div>
                </form>
    </div>
  </div>
</div>