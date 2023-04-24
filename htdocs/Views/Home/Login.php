<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $gmail = $_POST['mail'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "select * from form where email = '$gmail' limit 1";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password)
                    {
                        header("location: indexlogin.php");
                        die;

                        if(password_verify($password, $hashed_password))
                        {
                            // Passwords match, do the login logic here
                        }
                        else
                        {
                            // Passwords do not match, show an error message
                        }

                    }
                }
            }
                        echo "<script type='text/javascript'> alert('Wrong Username or Password')</script>";
        }
        else{
                        echo "<script type='text/javascript'> alert('Wrong Username or Password')</script>";
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

    <div class="login">
        <h1>Login</h1>
        <form method="post">  
            <label>Email</label>
            <input type="email" name="mail" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>Not have an account? <a href='Signup.php'>Sign Up Here</a></p>
    </div>
  </body>
</html>

