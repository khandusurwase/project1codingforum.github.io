<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logoks.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Welcome to K-30!</title>
</head>

<body style=" 
background: linear-gradient(to right, #cec5cb,#cec5cb ,#f3a5dd );">
<?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    
    <?php 
            $id = $_GET['catid'];
            $sql ="SELECT * FROM `categories` WHERE category_id=$id";
            $result = mysqli_query( $conn, $sql);
     while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
        }
    ?>
    <?php
                $showAlert = false;
            $method = $_SERVER['REQUEST_METHOD'];
            if( $method =='POST'){
                //insert into thread into db
                $th_title =$_POST['title'];
                $th_desc =$_POST['desc'];
                $sno = $_POST['sno']; 
                $th_title = str_replace("<", "&lt;", $th_title);
                $th_title = str_replace(">", "&gt;", $th_title); 
        
                $th_desc = str_replace("<", "&lt;", $th_desc);
                $th_desc = str_replace(">", "&gt;", $th_desc); 

                $sql ="INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`)
                 VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
                $result = mysqli_query( $conn, $sql);
                $showAlert = true;
                if($showAlert){
                    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Thread has been added! Please wait community to respond.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                  
                }

            }
     ?>

    <!-- Categories container starts here -->
    <div class="container my-2 " style="background: aliceblue;">
        <div class="jumbotron">
            <h1 class="display-3"><?php echo $catname; ?> forum!</h1>
            <p class="lead"><?php echo $catdesc; ?> </p>
            <hr class="my-4">
            <p> This is perr to perr forum..! No Spam / Advertising / Self-promote in the forums is not allowed.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Remain respectful of other members at all times...</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo'
    
    <div class="container my-2" style="background: azure;">
        <h1 class="py-2">Start a Discussion</h1>
        <form action=" '.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible </div>
            </div>
            <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Ellaborate Your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';}
    else{
        echo'<div class="container"><p class="lead" style="color:red";>You are not logged in. Please login to be able to start a Discussion</p></div>';
    }
    ?>

    <div class="container my-2 mb-5" id="ques" style="background:azure;">
        <h1 class="py-2">Browse Question</h1>
        <?php 
            $id = $_GET['catid'];
            $sql ="SELECT * FROM `threads` WHERE thread_id='$id' AND status='1';";
            $result = mysqli_query( $conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
             $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp']; 
            $thread_user_id = $row['thread_user_id'];
            $sql2 ="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query( $conn, $sql2);
           $row2= mysqli_fetch_assoc($result2);
         

       echo' <div class="media my-3">
            <img src="img/download.png" width="54px" style="border-radius: 50px;" width="40px" class="mr-3" alt="User_default_img">
            <div class="media-body">'.
                '<h5 class="mt-0"><a href="thread.php?threadid='.$id.'">'.$title.'</a></h5>
                '.$desc.'
            </div> '.'
            <div class="font-weight-bold my-0">Asked by '.$row2['user_email'].' '.$thread_time.'</div>'.'
        </div>';
    }
    //echo var_dump($noResult);
    if($noResult){
        echo '<div class="jumbotron-fluid mb-3">
        <div class="container"> 
        <p class="display-6">No Results Found </p>
        <p class="lead">Be the first person to ask a question </p>
        </div>
        </div> ';
    }
 ?>

    </div>
    <?php include 'partials/_footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>