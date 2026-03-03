<?php
    include "../php/config.php";
    $register_err = "";

    if ($_SERVER[REQUEST_METHOD] == "POST") {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $param_password = password_hash($password);

        $sql = "INSERT INTO customer_details (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, 'sssss', $firstname, $lastname, $email, $username, $param_password)
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>
                        alert('Registration Successful.')
                        window.location.href = 'login.html'
                    </script>";
                exit;          
            }
            mysqli_close($stmt);
        }
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/general.css">
    </head>

    <header>
        <nav>
            <ul>
                <li><img src="../assets/logo.png" alt="" id="logo"></li>
                <li onclick="(window.location.href = '../index.html')">HOME</li>
                <li><u>JOIN US</u></li>
                <li>ABOUT US</li>
                <li>SETTINGS</li>
            </ul>
        </nav>
    </header><br>

    <body>
        <h2 class="heading">REGISTER</h2>
        <div class="access_div">
            <form action="register.html" method="POST">
                <label for="firstname">FIRST NAME</label> <br>
                <input type="text" name="firstname" placeholder="Enter First Name"> <br><br>

                <label for="lastname">LAST NAME</label> <br>
                <input type="text" name="lastname" placeholder="Enter Last Name"> <br><br>

                <label for="email">EMAIL ADDRESS</label> <br>
                <input type="text" name="email" placeholder="Enter Email Address"> <br><br>

                <label for="username">USERNAME</label> <br>
                <input type="text" name="username" placeholder="Enter Username"> <br><br>

                <label for="password">PASSWORD</label> <br>
                <input type="password" name="password" placeholder="Enter Password"> <br> <br>

                <label for="confirm_password">CONFIRM PASSWORD</label> <br>
                <input type="password" name="confirm_password" placeholder="Enter Password"> <br>

                <span class="invalid_feedback">
                    <?php echo $register_error; ?>
                </span>

                <button class="login/register" type="submit">REGISTER</button>
            </form>
            <p>Already have an account? <a href="login.html">Login</a></p>
        </div>

        <script src="../javaScript/general.js"></script>
    </body>
</html>