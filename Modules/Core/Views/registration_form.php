<?php require_once './Modules/Core/Views/header.php'; ?>

<main class="col-md-4 col-10 m-auto border p-4 bg-light">
    <h1 class="text-center text-success">Register</h1>
    <form  method="POST" id="regForm" action="register">
        <div class="form-group my-2">
            <label for="registerEmail">Email address</label>
            <input type="email" class="form-control" name="registerEmail" id="registerEmail" placeholder="Enter Email" minlength="6" maxlength="100" required>
        </div>
        <div class="form-group my-2">
            <label for="registerUsername">Username</label>
            <input type="text" class="form-control" name="registerUsername" id="registerUsername" placeholder="Enter Username" minlength="4" maxlength="64" required>
        </div>
        <div class="form-group my-2">
            <label for="registerPassword">Password</label>
            <input type="password" class="form-control" name="registerPassword" id="registerPassword" placeholder="Enter Password" minlength="8" maxlength="64" required>
        </div>
        <div class="form-group my-2">
            <label for="passwordCheck">Password</label>
            <input type="password" class="form-control" name="passwordCheck" id="passwordCheck" placeholder="Enter Password again" minlength="8" maxlength="64" required>
        </div>
        <button type="submit" class="btn btn-primary my-2">Sign Up</button>
    </form>
    <p class="text-danger"><?= $this->message ?></p>
</main>

<?php require_once './Modules/Core/Views/footer.php'; ?>
