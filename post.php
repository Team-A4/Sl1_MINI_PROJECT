<?php
    include('connection.php');
    session_start();
    if(!isset($_SESSION['user_email'])){
        header("Location:signin.php");
    }
    else{
        $active_user_email=$_SESSION['user_email'];
        $fetch_active_user_details = "SELECT * from users where user_email= '$active_user_email';";
        $run_fetch_active_user_details= mysqli_query($conn,$fetch_active_user_details);
        $active_user_array = mysqli_fetch_array($run_fetch_active_user_details);
        $active_user_username = $active_user_array['user_username'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project</title>
    <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            

    <style>
         body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    }

    main {
        flex: 1 0 auto;
    }
    </style>
</head>
<body>

        <!--navbar-->

    <header>
        <div class="navbar">
            <nav class="navbar-wrapper grey lighten-2">
                <div class="container">
                    <a href="home.php" class="brand-logo grey-text text-darken-4" style="font-size: 27px">Parcel Mate</a>
                    <a href="#" class="sidenav-trigger" data-target="mobile-menu"><i class="material-icons grey-text text-darken-3">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="post.php" class="grey-text text-darken-4">Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="update_profile.php" class="grey-text text-darken-4">Update Profile</a></li>
                        <li><a href="home.php" class="grey-text text-darken-4">Logout</a></li>                    </ul>
                    <ul class="sidenav grey lighten-2 " id="mobile-menu">
                        <li><a href="post.php"class="grey-text text-darken-4" >Post your trip</a></li>
                        <li><a href="search.php" class="grey-text text-darken-4">Search for traveller</a></li>
                        <li><a href="update_profile.php" class="grey-text text-darken-4">Update Profile</a></li>
                        <li><a href="home.php" class="grey-text text-darken-4">Logout</a></li>                    </ul>
                </div>
            </nav>
        </div>
       
    </header>

    <!--Main content-->

    <main style="padding-top: 4vw;">
        <div class="container">
            <div class="row">
            
                    <div class="form-start" style="padding-left: 10px;"">
                        <h4>Post a trip </h4>
                        <div class="divider yellow darken-4" style="padding-top: 3px;"></div>
                    </div>
                    <form class="col s12 " method="POST">
        
                        <div class="row z-depth-1" style="margin-top:50px ; padding-top: 40px;border: rgb(226, 217, 217) 1px solid;">
                                <div class="input-field col s12 l3" style="padding-left:4vw;">
                                    <input type="text" id="from" class="validate" placeholder="City or Country" style="padding-top:10px; " required name="from_location">
                                    <label for="from" style="font-size: 25px; padding-left:4vw;"> <i class="material-icons green-text">location_on</i>From</label>
                                </div>
                                <div class="input-field col s12 l3 offset-l1 " style="padding-left:1vw;">
                                    <input type="text" id="stopover" class="validate" placeholder="City or Country" style="padding-top:10px ;" name="stopover_location">
                                    <label for="stopover" style="font-size: 25px; padding-left:1vw;"> <i class="material-icons blue-text">location_on</i>Add Stopovers</label>
                                </div>
                                <div class="input-field col s12 l3 offset-l1">
                                    <input type="text" id="to" class="validate" placeholder="City or Country" style="padding-top:10px ;" required name="to_location">
                                    <label for="to" style="font-size: 25px;"> <i class="material-icons red-text">location_on</i>TO</label>
                                </div>
                                
                        </div>


                        <div class="row " style="padding-top: 30px;">
                            <div class="col s12 l4 z-depth-1" style="border: rgb(226, 217, 217) 1px solid;">
                                    <h5>Fixed date of journey</h5><div class="divider yellow darken-4"></div>  
                                        <div style="padding-top: 10px;padding-bottom: 20px;">
                                            <div class="input-field" style="padding-top: 14px" >
                                                <i class="material-icons prefix">calendar_today</i>
                                                <input type="text" id="date" class="datepicker"  name="date_departure" required >
                                                <label for="date">Date of departure</label>
                                            </div>
                                            <div class="input-field" style="padding-top: 14px">
                                                <i class="material-icons prefix">calendar_today</i>
                                                <input type="text" id="date" class="datepicker"  name="date_arrival" required >
                                                <label for="date">Date of Arrival</label>
                                            </div>
                                            <div style="padding-top:5px"></div>
                                        </div>                                    
                                        
                            </div>
                            <div class="col s12 l7 offset-l1  z-depth-1" style="border: rgb(226, 217, 217) 1px solid;">
                                <h5>Other details</h5><div class="divider yellow darken-4"></div>
                                    <h6 style="padding-top: 5px;font-size: 20px;color: rgb(243, 174, 25);" >Size you may transport</h6>
                                        <div class="input-field" style="padding-left: 1vw;" >
                                            <select id="weight" name="weight" >
                                                <option  disabled selected >Select size</option>
                                                <option value="1">Small (Ex. keys)</option>
                                                <option value="2">Medium (Ex. Bag, Book, Mobile)</option>
                                                <option value="3">Large (Ex. Big Box)</option>
                                                <option value="4">X-Large( Ex. Vehicle)</option>
                                              </select>
                                        </div>  
                                        <h6 style="padding-top: 5px;font-size: 20px;color: rgb(243, 174, 25);" >Mode of transport</h6>
                                        <div class="input-field" style="padding-left: 1vw;" >
                                            <select id="mode" name="mode" >
                                                <option value="" disabled selected >Select mode</option>
                                                <option value="1">Private Car</option>
                                                <option value="2">Train</option>
                                                <option value="3">Bus</option>
                                                <option value="4">Plane</option>
                                              </select>
                                        </div>                                    
                            </div>
                        </div>
                        <div class="row " style="padding-top: 30px;">
                        <div class="col s12 l12  z-depth-1" style="border: rgb(226, 217, 217) 1px solid;">
                                <h5>Do You Want a Companion For Journey?</h5><div class="divider yellow darken-4"></div>
                                        <div class="input-field col s12 l5" style="padding-left: 1vw;" >
                                        <h6 style="padding-top: 5px;font-size: 20px;color: rgb(243, 174, 25);" >Number Of seats Available</h6>
                                            <select id="seats" name="seats" >
                                                <option selected value="0">Select seats</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">more than 4</option>
                                              </select>
                                        </div>  
                                        <div class="input-field col s12 l5 offset-l1">
                                        <h6 style="padding-top: 5px;font-size: 20px;color: rgb(243, 174, 25);" >Fare</h6>
                                            <input type="number" id="fare" class="validate" placeholder="Fare per head" style="color:black " name="fare">
                                        </div>                                    
                            </div> 
                        </div>
                        <div class="input-field right">
                            <button class="btn grey lighen-1" style="border: 2px solid black" name="submit">Post your trip</button>
                        </div>
                           
                    </form>                
                    <?php 
                            if(isset($_POST['submit']))
                            {   
                                $fare=0;
                                $from_location = $_POST['from_location'];
                                $to_location = $_POST['to_location'];                              
                                $stopover_location = $_POST['stopover_location'];         
                                $date_departure = $_POST['date_departure'];
                                $date_arrival = $_POST['date_arrival'];
                                $weight = $_POST['weight'];
                                $mode = $_POST['mode'];
                                $seats= $_POST['seats'];
                                $fare = $_POST['fare'];
                                if($date_departure > $date_arrival )
                                {
                                    echo "<script>alert('Date of arrival must be older than Departure') </script>";
                                }
                                else
                                {
                                    //Serarch for similar trip is posted already
                                    $search_qq="SELECT * from post where (from_location='$from_location' AND to_location='$to_location' AND date_departure = '$date_departure' AND date_arrival='$date_arrival' AND mode='$mode' ); " ;    
                                    $run_search_query = mysqli_query($conn,$search_qq); 
                                    if($run_search_query){
                                    $num_rows = mysqli_num_rows($run_search_query);

                                    if($num_rows==0)
                                    {
                                        $insert_trip_query = " INSERT into post(from_location,to_location,stopover_location,date_departure,date_arrival,size,mode,user_username) values('$from_location','$to_location','$stopover_location','$date_departure','$date_arrival',$weight,$mode,'$active_user_username') ;";
                                        $run_insert_trip_query = mysqli_query($conn,$insert_trip_query);
                                        if($run_insert_trip_query)
                                        {
                                           if($seats > 0 )      //Companion
                                           {
                                               $insert_comp_query= "INSERT into comp values ('$active_user_username',$seats,$fare,$mode);";
                                               $runn=mysqli_query($conn,$insert_comp_query);
                                               if($runn)
                                               {
                                                    echo " <script>alert('Trip posted succesfully!') </script>";
                                               }
                                           }
                                           else
                                           {
                                                    echo " <script>alert('Trip posted succesfully!') </script>";
                                           }
                                        }
                                    }else{
                                        echo " <script>alert('Found Similar Journey!!!')</script>";
                                    }

                                    }else
                                        echo "<script> window.open('home.php', '_self')</script>";
                                }
                            }
                        ?>
                 
            </div>

        </div>
        
    </main>

        <!--footer-->

        <footer class="page-footer grey lighten-2" >
            <div class="container">
                <div class="row">
                    <div class="col s12 l6 grey-text text-darken-4">
                        <h5 >About Us</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque assumenda ipsum, quam voluptate magni dolor aut beatae facilis adipisci </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque assumenda ipsum, quam voluptate magni dolor aut beatae facilis adipisci </p>
                    </div>
                    <div class="col s12 l4 offset-l2 grey-text text-darken-4">
                        <h5>Connect</h5>
                        <ul>
                            <li><i class="fab fa-facebook "></i>  <span>Facebook</span></li>
                            <li><i class="fab fa-instagram "></i>  <span>Instagram</span></li>
                            <li><i class="fab fa-twitter "></i>  <span>Twitter</span></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
            <div class="container grey-text text-darken-4 center"><p>&copy;Friend Shipper 2020</p></div>
            </div>
        </footer>

    <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('select').formSelect();
      $('.datepicker').pickadate();
    });
    $('.datepicker').datepicker({ 
        selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            format: 'yyyy-mm-dd'
        });
  </script>
    
</body>
</html>

<?php } ?>