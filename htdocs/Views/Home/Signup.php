<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $num = $_POST['num'];
        $gmail = $_POST['mail'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "insert into form (fname, lname, num, email, password) values ('$firstname', '$lastname', '$num', '$gmail', '$hashed_password')";

            mysqli_query($conn, $query);

            echo "<script type='text/javascript'> alert('Successfully Registered')</script>";

            if(password_verify($password, $hashed_password))
            {
                // Passwords match, do the login logic here
            }
            else
            {
                // Passwords do not match, show an error message
            }

        }
        else
        {
            echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Login and Register</title>
    <link rel="stylesheet" href="/Signup.css"/>
  </head>
  <body>

      <nav class="navbar">
          <div class="navdiv">
              <li>
                  <a href="Home.html">Home</a>
              </li>
              <li>
                  <a href="Prices.html">Prices</a>
              </li>
              <li>
                  <a href="About.html">About</a>
              </li>
              <li>
                  <a href="Contact.html">Contact</a>
              </li>
              <button>
                  <a href="Login.php">Login</a>
              </button>
              <button>
                  <a href="Signup.php">Sign Up</a>
              </button>
          </div>
      </nav>

    <div class="signup">
        <h1>Sign Up</h1>
        <h4>It's free and only takes a minute!</h4>
        <form method="post">
            <label>First Name</label>
            <input type="text" name="fname" required>
            <label>Last Name</label>
            <input type="text" name="lname" required>
            <label>Phone Number</label>
            <input type="tel" name="num" required>
            <label>Email</label>
            <input type="email" name="mail" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>Already have an account? <a href='Login.php'>Login Here</a></p>
    </div>
  </body>
</html>


