<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="container">
    <div class="container m-4">
        <button type="button" class="btn bg-primary text-white" onclick="get()">Formulaire GET</button> 
        <button type="button" class="btn bg-dark text-white" onclick="post()">Formulaire POST</button>
    </div>
    
    <div class="container">
        <div id="get" class="m-4 p-4 d-none">
            <h1 class="text-white">Form GET</h1>
            <form action="" method="get">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control rounded-0" id="password" name="password" rows="3">
                </div>
                <input type="hidden" name="cursor_get">
                <button type="submit" class="btn bg-white">Envoyé</button>
            </form>
        </div>

        <div id="post" class="m-4 p-4 d-none">
            <h1 class="text-white">Form POST</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control rounded-0" id="password" name="password" rows="3">
                </div>
                
                <button type="submit" class="btn bg-white">Envoyé</button>
            </form>
        </div>
    </div>

    <script>
        function get() {
            document.getElementById("get").setAttribute("class","bg-primary m-4 p-4 d-block");
            document.getElementById("post").setAttribute("class","d-none");
        }

        function post() {
            document.getElementById("post").setAttribute("class","bg-dark m-4 p-4 d-block");
            document.getElementById("get").setAttribute("class","d-none");
        }
    </script>
</body>
</html>

<?php
    if ($_GET) {
        $_SESSION["email"] = $_GET['email'];
        $_SESSION["password"] = $_GET['password'];
        header('location: index.php');

    } elseif ($_POST) {
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["password"] = $_POST['password'];
        header('location: index.php');
        
    } 

    if ($_SESSION) {
        echo "Ton email est : ".$_SESSION['email']." et ton mot de passe est : ".$_SESSION['password']."<br>";
        // session_unset();
    } else {
        echo "Aucune donnée n'a été soumise ";
    }

    
?>