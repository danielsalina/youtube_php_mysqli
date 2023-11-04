<!DOCTYPE html>
<html lang="es-AR">

<head>
    <!-- CHARSET -->
    <meta charset="UTF-8" />
    <!-- IE-EDGE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- VIEWPORT -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- DESCRIPTION -->
    <meta name="description" content="Desarrollo web desde cero" />
    <!-- AUTHOR -->
    <meta name="author" content="Daniel Salinas" />
    <!-- TITTLE -->
    <title>Dani Code | CRUD</title>
    <!-- STYLES -->
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../public/css/style.css" />

</head>

<body>
    <div class="dashboard">
        <nav class="navbar bg-primary">
            <div class="container-fluid">
                <p class="navbar-brand fw-bold text-light">TASK APP</p>
                <form class="d-flex">
                    <input type="search" id="search" placeholder="Filtrar" class="form-control me-2" />
                    <button type="submit" class="btn btn-warning mx-3">
                        <a class="text-black text-decoration-none" href="../../index.php?page=login">Exit</a>
                    </button>
                </form>
            </div>
        </nav>

        <div class="container my-5">
            <div class="row p-4">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form id="task-form">
                                <div class="form-group">
                                    <input type="text" id="name" placeholder="Task name" class="form-control my-2" />
                                </div>
                                <div class="form-group">
                                    <textarea name="descrption" id="description" cols="30" rows="10" class="form-control my-2" placeholder="Task description"></textarea>
                                </div>
                                <input type="hidden" id="taskId" />
                                <button type="submit" class="btn btn-primary text-center w-100">
                                    Save task
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card my-4" id="task-result">
                        <div class="card-body">
                            <ul id="container"></ul>
                        </div>
                    </div>

                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <td class="text-center fw-bold">ID</td>
                                <td class="text-center fw-bold">Name</td>
                                <td class="text-center fw-bold">Description</td>
                                <td class="text-center fw-bold">Actions</td>
                            </tr>
                        </thead>
                        <tbody id="tasks"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <footer class="bg-dark p-2 mt-5 text-light position-fixed bottom-0 w-100 text-center">
        Desarrollo Web Desde Cero | Si me quieres apoyar dale Like 👍 Suscribete ✔️ Comenta 😉 y
        Comparte 💚
    </footer>
    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/ajax.js"></script>
</body>

</html>