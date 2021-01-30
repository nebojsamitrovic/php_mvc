<!DOCTYPE html>
<html>
<head>
    <title>PHP MVC Framework</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
</head>
<body class="d-flex align-content-between flex-wrap min-vh-100">
<header class="fluid-container p-2 bg-dark text-light w-100">
    <div class="row m-0">
        <div class="col-4 d-flex">
            <a id="logo" class="text-info p-2 text-decoration-none" href="/">Welcome</a>
        </div>
        <div class="col-8 d-flex flex-row-reverse">
            <?php if($this->isLogged()) { ?>
                <a class="p-2 text-light text-decoration-none" href="logout">logout</a>
                <a class="p-2 text-light text-decoration-none" href="home">Home</a>
            <?php } else { ?>
                <a class="p-2 text-light text-decoration-none" href="register">Registration</a>
                <a class="p-2 text-light text-decoration-none" href="login">Login</a>
            <?php } ?>
        </div>
    </div>
</header>
