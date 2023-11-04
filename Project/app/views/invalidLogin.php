<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../public/css/style.css" />
</head>

<body>

    <div class="container w-25 my-5 py-5 border border-info border-2 rounded">
        <h3 class="text-center text-white">Incorrect email or password</h3>
        <form action="../controllers/LoginController.php" method="post" class="mt-5 p-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1 email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1 password">
                <input type="hidden" name="csrf_token" value="<?php session_start();
                                                                echo $_SESSION['csrf_token']; ?>">
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100 my-2">Login</button>
            <button type="submit" class="btn btn-primary w-100"><a class="text-white text-decoration-none" href="../../index.php?page=register">Register</a></button>
        </form>
    </div>

    <footer class="bg-dark p-2 mt-5 text-light position-fixed bottom-0 w-100 text-center">
        Desarrollo Web Desde Cero | Si me quieres apoyar dale Like 👍 Suscribete ✔️ Comenta 😉 y
        Comparte 💚
    </footer>
</body>

</html>