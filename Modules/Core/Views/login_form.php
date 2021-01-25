<?php require_once './Modules/Core/Views/header.php'; ?>

<main class="col-md-4 col-10 m-auto border p-4 bg-light">
    <h1 class="text-center text-success">Login</h1>
    <form  method="POST" id="loginForm" action="login">
        <div class="form-group my-2">
            <label for="loginEmail">Email address</label>
            <input type="email" class="form-control" name="loginEmail" id="loginEmail" placeholder="Enter Email" minlength="6" maxlength="100" required>
        </div>
        <div class="form-group my-2">
            <label for="loginPassword">Password</label>
            <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Enter Password" minlength="8" maxlength="64" required>
        </div>
        <button type="submit" class="btn btn-primary my-2">Sign In</button>
    </form>
    <p class="text-danger"><?= $this->message ?></p>
</main>

<?php require_once './Modules/Core/Views/footer.php'; ?>
