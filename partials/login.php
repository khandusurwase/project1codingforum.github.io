<?php include"_header.php"; ?>
<?php include "_dbconnect.php"?>
<style>
        body{
            background-image: url("svg/admin.svg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
    <div class="container p-4 mt-4 mb-5 shadow border rounded w-75">
        <h2 class="text-center">K-30 Coding Forum</h2>
        <h2 class="text-center">Login</h2>
       
        <form action="admin_con.php" id="admin_login" method="POST" class="form p-4">
            <div class="mb-3">
                <label for="username" class="text-dark mb-2 fs-3 bg-light rounded px-4"><b>Username :</b></label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username Here" required>
            </div>
            
            <input type="hidden" name="csrf_admin" value="<?php echo $csrf_admin; ?>">
            <div class="mb-3">
                <label for="password" class="text-dark mb-2 fs-3 bg-light rounded px-4"><b>Password :</b></label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password Here" required>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="loginBtn" type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>