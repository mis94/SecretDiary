<?php  
session_start() ;
include("Connection.php") ;
//echo $_SESSION['id'] ;
$query = "SELECT diary FROM users WHERE id = '".$_SESSION['id']."' LIMIT 1" ;
$result = mysqli_query($link, $query) ;
$row = mysqli_fetch_array($result) ;
$diary = $row['diary'] ;
?>


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
            margin-top: 80px;
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

            <div class="navbar-header pull-left">
                <a class="navbar-brand">Secret diary</a>
            </div>

            <div class="pull-right">
                <ul class="navbar-nav nav">
                    <li>
                        <a href="index.php?logout=1">Log Out</a>
                    </li>
                </ul>
            </div>

        </div>

    </div>

    <div class="container contentContainer home" id="topContainer">

        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="topRow">
                <textarea class="form-control"><?php echo $diary ;?></textarea>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(".contentContainer").css("min-height", $(window).height());
        $("textarea").css("height", $(window).height() - 137);
        $("textarea").keyup(function () { // keyup is just like 'click' function, it takes action when we press a key
            $.post("UpdateDiary.php", { diary: $("textarea").val() });
            // this simply posts to the specified file, the second parameter which is textarea.val as 'diary' variable
        });
    </script>

</body>
</html>

