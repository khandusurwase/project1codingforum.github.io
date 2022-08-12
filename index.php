<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logoks.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

         <style>
            #ques{
                min-height: 433px;
            }
       </style> 
        <title>Welcome to K-30!</title>
        
</head>

<body  style="background: linear-gradient(to right, #cec5cb,#cec5cb ,#f3a5dd );"> 
<?php include 'partials/_dbconnect.php';?>  
<?php include 'partials/_header.php';?>
<div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
   
<!-- slider starts here  -->

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="height: 500px;">
            <div class="carousel-item active">
                <img src="img/img.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/apple.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/apple.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Categories container starts here -->
    <div class="container my-4" id ="ques">
        <h2 class="text-center">K-30 -Browse Categories </h2>
        <div class="row my-3">
          <!-- Fetch all the categories && Use a loop to iterate through categories -->
         <?php $sql ="SELECT * FROM `categories` WHERE status ='1'";
         $result = mysqli_query( $conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
          //  echo $row['category_id'];
          //  echo $row['category_name'];
          $id = $row['category_id'];
          $cat= $row['category_name'];
          $desc = $row['category_description'];
          echo '<div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                <img src="img/download.jpg" class="card-img-top" alt="...">    
                '.#<img src="img/card.jpg" class="card-img-top" alt="...">.'
                    '<div class="card-body">
                        <h5 class="card-title"><a href="threadslist.php?catid= ' .$id. '">' .$cat. '</a></h5>
                        <p class="card-text">' .substr($desc, 0, 90). '...</p>
                        <a href="threadslist.php?catid= ' .$id. '" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
            </div>';
         }

         ?>
            
        </div>
    </div>
     <!-- services section start -->
     <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">Services</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-paint-brush"></i>
                        <div class="text">Web Design</div>
                        <p>Web design encompasses The different areas of web design include web graphic design; user interface design; authoring, including standardised code and proprietary software; user experience design; and search engine optimization. </p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-chart-line"></i>
                        <div class="text">Advertising</div>
                        <p>Promote your content & build lasting connections with professionals on the LinkedIn® feed. Extend your reach to a larger audience beyond your followers by boosting your posts. #1 lead gen network. 3.5x higher CVR for B2B. #1 B2B platform.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-code"></i>
                        <div class="text">Apps Design</div>
                        <p>A curated collection of mobile app to inspire you in your mobile UI/UX design process. Create User Stories & Issues, Plan Sprints, & Distribute Tasks Across Your Software Team. Built for Every Member of the Team to Plan, Track, and Release Great Software. Try It!</p>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </section>

    <!-- skills section start -->
    <section class="skills" id="skills">
        <div class="max-width">
            <h2 class="title">Skills</h2>
            <div class="skills-content">
                <div class="column left">
                    <div class="text">My creative skills & experiences.</div>
                    <p>A team player with excellent interpersonal, communication and presentation Skills. I’m a web developer. I spend my whole day, practically every day, experimenting with HTML, CSS, and JavaScript; dabbling with Python and php; and inhaling a wide variety of potentially useless information through a few hundred RSS feeds. I build websites that delight and inform. I do it well.</p>
                    <a href="#">Read more</a>
                </div>
                <div class="column right">
                    <div class="bars">
                        <div class="info">
                            <span>HTML</span>
                            <span>98%</span>
                        </div>
                        <div class="line html"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>Java</span>
                            <span>80%</span>
                        </div>
                        <div class="line css"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>JavaScript</span>
                            <span>80%</span>
                        </div>
                        <div class="line js"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>PHP</span>
                            <span>90%</span>
                        </div>
                        <div class="line php"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>MySQL</span>
                            <span>87%</span>
                        </div>
                        <div class="line mysql"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- teams section start -->
    <section class="teams" id="teams">
        <div class="max-width">
            <h2 class="title">Teams</h2>
            <div class="carousel owl-carousel">              
                <div class="card">
                    <div class="box">
                        <img src="images/profile-4.jpeg" alt="">
                        <div class="text">Khandu Surwase</div>
                        <p>Full stack developer, Exerpt in JavaScript.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact me</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <p>K-30 Coding forum Privated Limited. oppo Zensar, maya building 4th floor, Kharadi Pune Maharashtra. 411001 India</p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">Khandu Surwase</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Pune, Maharashtra, India</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">surwaseKhandu30@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message me</div>
                    <form action="#">
                       
                        <div class="field textarea">
                            <textarea cols="30" rows="10" placeholder="Message.." required></textarea>
                        </div>
                        <div class="button-area">
                            <button type="submit"> <a href="https://api.whatsapp.com/send/?phone=918459948333&text&app_absent=0">Send message</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'partials/_footer.php';?>
    <script src="script.js"></script>
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