<?php
    session_start();

    if(!isset($_POST['login']) || !isset($_POST['password']))
    {
        header('Location: ../login.php');
        exit();
    }

    require_once "connect.php";

    $connection = @new mysqli($host, $db_user, $db_pass, $db_name);

    if ($connection->connect_errno!=0){
      echo "Error: ".$connection->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");

        if ($result = @$connection->query(
            sprintf("SELECT * FROM users WHERE username='%s'",
            mysqli_real_escape_string($connection, $login))))
        {
            $user_num = $result->num_rows;
            if ($user_num > 0)
            {
                $row = $result->fetch_assoc();

                if (password_verify($password, $row['password']))
                {
                    $_SESSION['logged'] = true;

                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];

                    unset($_SESSION['error']);

                    $result->free_result();

                    header('Location: ../account.php');
                } 
                else 
                {
                    $_SESSION['error'] = "Nieprawidłowe hasło!";
                    header('Location: ../login.php');
                } 
            } 
            else 
            {
                $_SESSION['error'] = "Nieprawidłowy login!";
                header('Location: ../login.php');
            }
        }
        $connection->close();
    }
?>
