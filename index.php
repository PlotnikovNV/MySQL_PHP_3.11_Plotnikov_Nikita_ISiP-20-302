<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
        require('connect.php');
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "INSERT INTO users (username, password, email) VALUES ('$username','$email','$password')";
            $result = mysqli_query($connection, $query);

            if($result){
                $smsg = "Регистрация прошла успешно";
            }
            else $fsmsg = "Ошибка";
        }
    ?>
    <div class="container">
        <form class="form-singin" method="POST">
            <h2>Registration</h2>
            <?php if(isset($smsg)){?> <div class="alert alert-success" role="alert"><?php echo $smsg; ?></div><?php }?>
            <?php if(isset($fsmsg)){?> <div class="alert alert-danger" role="alert"><?php echo $fsmsg; ?></div><?php }?>
            <input type="text" name="username" class="form-control" placeholder="username" required>
            <input type="text" name="email" class="form-control" placeholder="email" required>
            <input type="text" name="password" class="form-control" placeholder="password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>
    </div>
</body>
</html>