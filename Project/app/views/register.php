<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/css/style.css" />
</head>

<body>

    <div class="container w-25 my-5 py-5 border border-info border-2 rounded">
        <h3 class="text-center text-white">Sign up</h3>
        <form action="app/controllers/RegisterController.php" method="post" class="mt-5 p-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1 email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1 email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1 password" aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text text-white">A length equal to or greater than 6</div>
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
            </div>
            <button type="submit" name="login" value="Register" class="btn btn-primary w-100 my-2">Register</button>
            <button type="submit" class="btn btn-primary w-100 my-2"><a class="text-white text-decoration-none" href="?page=login">Login</a></button>
        </form>
    </div>

    <footer class="bg-dark p-2 mt-5 text-light position-fixed bottom-0 w-100 text-center">
        Desarrollo Web Desde Cero | Si me quieres apoyar dale Like 👍 Suscribete ✔️ Comenta 😉 y
        Comparte 💚
    </footer>
</body>

</html>