<?php
session_start() ;

// This actually logs user out(end their session)
if($_GET["logout"]==1 and $_SESSION['id'])
{
    session_destroy() ; // closes all sessions
    $message = "You have been logged out. Have a nice day!" ;
    session_start() ;
}

include("Connection.php") ; // Includes another PHP file in our PHP file
if($_POST['submit']=='Sign Up')
{
    if(!$_POST['email']) // email not entered
        $error .= "<br />Please enter your email" ;
    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // This checks if the given parameter is valid according
        $error .= "<br />Please enter a valid email address" ;           // to the second parameter(validate email)

    if(!$_POST['password'])
        $error .= "<br />Please enter a password" ;
    else // we need to check that it is at least 8 chars. long and contains at least one capital case letter
    {
        if(strlen($_POST['password'])<8)
            $error .= "<br />Please enter a password at least 8 characters long" ;
        if(!preg_match('`[A-Z]`', $_POST['password'])) // First parameter is a regex checking if there exits a letter from
            $error .= "<br />Please include at least one capital letter in your password" ; // A to Z in the second parameter
    }

    if($error)
        $error = "There were error(s) in your signup details:".$error ;
    else
    {
        $link = mysqli_connect("localhost", "root", "5032144", "secretDiaryDB") ;
        $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."'" ;
        /* Without real escape this will work but hackers can use SQL injection by entering characters '); in a text field
         * then type any SQL command it will work and they can retrieve any data from our DB so to avoid this we use
         * the real escape function
         * */
        $result = mysqli_query($link, $query) ; // go execute

        $results = mysqli_num_rows($result) ;
        $hashed =  md5(md5($_POST['email']).$_POST['password']) ;
        if($results!=0)
            $error = "That email address is already registered. Do you want to log in?" ;
        else
        {
            $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."', '.$hashed.')" ;
            // Here we used the email of the user as a salt(changes with each user) hashed it -- append our password -- and re-hash again
            mysqli_query($link, $query) ; // go execute
            //echo "You've been signed up" ;

            //create a session variable
          
            $_SESSION['id'] = mysqli_insert_id($link) ;
            echo $_SESSION['id'] ;
            // insert id function gets the id of the element inserted most recently in the specified link(DB)
            
            header("Location: MainPage.php") ;
            // used to head between php files, but it is like session starts it needs to be put before any HTML output
        }
    }
}

if($_POST['submit']=='Log In')
{
    $hashed =  md5(md5($_POST['loginEmail']).$_POST['loginPassword']) ;
    $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST['loginEmail'])."' AND password = '.$hashed.' LIMIT 1" ;
    // LIMIT 1 is used to just check for one user
    $result = mysqli_query($link, $query) ;
    $row = mysqli_fetch_array($result) ;
    if($row) // if it exists
    {
        $_SESSION['id'] = $row['id'] ;
        header("Location: MainPage.php") ;
    }else
    {
        $error = "We couldn't find a user with such an email and password. Please try again." ;
    }
}
?>