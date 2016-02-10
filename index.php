<?php include("Login.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Secret diary</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <style>
        .navbar-brand {
            font-size: 1.8em;
        }

        #topContainer {
            background-image: url("image.jpg");
            width: 100%;
            background-size: cover;
        }

        #topRow {
            margin-top: 100px;
            text-align: center;
        }

            #topRow h1 {
                font-size: 350%;
            }

        .bold {
            font-weight: bold;
        }

        .marginTop {
            margin-top: 30px;
        }

        .center {
            text-align: center;
        }

        .title {
            margin-top: 100px;
            font-size: 300%;
        }

        #footer {
            background-color: #B0D1FB;
            padding-top: 70px;
            width: 100%;
        }

        .marginBottom {
            margin-bottom: 30px;
        }

        .appStoreImage {
            width: 250px;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
    <!-- those are added to integrate the "scroll-spy" -->
    <!-- the first one is constant, the second one is the name of class of id of the div which contains our navbar links which we want to update when user scrolls down -->
    <div class="navbar navbar-default navbar-fixed-top">

        <div class="container">

            <div class="navbar-header">
                <a href="" class="navbar-brand">Secret diary</a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse">

                <form class="navbar-form navbar-right" method="post">
                    <div class="form-group">
                        <input type="email" name="loginEmail" id="loginEmail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginEmail']) ;?>" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="loginPassword" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['loginPassword']) ;?>" />
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="Log In"/>
                </form>
            </div>

        </div>

    </div>

    <div class="container contentContainer home" id="topContainer">

        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="topRow">
                <h1 class="marginTop">Secret diary</h1>
                <p class="lead">Your own private diary, with you wherever you go.</p>

                <?php
                    if($error){ // if error exists
                        echo '<div class="alert alert-danger">'.addslashes($error).'</div>' ;    
                    }
                    
                    if($message){
                        echo '<div class="alert alert-info">'.addslashes($message).'</div>' ;   
                    }
                ?>

                <p class="bold marginTop">Interested? Sign Up bellow!</p>
                <form class="marginTop" method="post">
                    <div class="form-group">
                        <label for="email">Email Address</label>
 <input class="form-control" type="email" name="email" placeholder="Your email" value="<?php echo addslashes($_POST['email']) ;?>" />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
 <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo addslashes($_POST['password']) ;?>" />
                    </div>

                    <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg marginTop" />
                </form>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(".contentContainer").css("min-height", $(window).height()) ;
    </script>

</body>
</html>

