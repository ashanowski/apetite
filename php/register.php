<?php
    session_start();

    if ( isset($_POST['email']))
    {
        $valid = true;
        $login = $_POST['login'];
        $pattern = "/^[a-z0-9_-]{3,15}$/";
        $reg_match = preg_match($pattern, $login);

        if (!$reg_match)
        {
            $valid = false;
            $_SESSION['e_nick'] = 'Nick musi posiadać od 3 do 15 znaków';
        }

        $email = $_POST['email'];
        $email_filtered = filter_var($email, FILTER_SANITIZE_EMAIL);

        if ( ($email != $email_filtered) || (filter_var($email_filtered, FILTER_VALIDATE_EMAIL)) == false ){
            $valid = false;
            $_SESSION['error'] = 'Podaj poprawny adres e-mail';
        }

        $pass1 = $_POST['password'];
        $pass2 = $_POST['password_repeat'];

        if ( strlen($pass1) < 8 || strlen($pass1 > 20) ){
            $valid = false;
            $_SESSION['error'] = 'Hasło musi mieć od 8 do 20 znaków';
        }

        if ( $pass1 != $pass2){
            $valid = false;
            $_SESSION['error'] = 'Hasła muszą być identyczne!';
        }

        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try {
            $connection = new mysqli($host, $db_user, $db_pass, $db_name);
            if ($connection->connect_errno!=0) throw new Exception(mysqli_connect_errno());

            else
            {
                $result = $connection->query("SELECT id FROM users WHERE email='$email'");

                if (!$result) throw new Exception($connection->error);

                $mail_num = $result->num_rows;

                if ($mail_num > 0)
                {
                    $valid = false;
                    $_SESSION['error'] = 'Istnieje już konto z tym adresem e-mail!';
                }

                $result = $connection->query("SELECT id FROM users WHERE username='$login'");

                if (!$result) throw new Exception($connection->error);

                $username_num = $result->num_rows;

                if ($username_num > 0)
                {
                    $valid = false;
                    $_SESSION['error'] = 'Istnieje już gracz z takim nickiem!';
                }

                if ($valid){
                    //dodanie do bazy
                    if ($connection->query("INSERT INTO users VALUES (NULL, '$login', '$pass_hash', '$email')"))
                    {
                        $_SESSION['register_success'] = true;
                        header('Location: ../login.php');
                    }
                    else throw new Exception($connection->error);
                }
                else header('Location: ../register.php');
                $connection->close();
            }
        } catch (Exception $e) {
            echo '<span style="color:red">Błąd serwera! Rejestracja chwilowo niedostępna.</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
?>