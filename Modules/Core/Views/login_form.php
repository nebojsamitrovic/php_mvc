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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>

<!-- Clippy -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/clippy.js/1.0/clippy.min.css">
<script src="//cdn.jsdelivr.net/clippy.js/1.0/clippy.min.js"></script>

<script type="text/javascript">
    clippy.load('Clippy', function(agent) {
        agent.show();
        agent.gestureAt(0, 0);
        agent.speak("<?= empty($this->message) ? 'Enter the required login credentials.' :  $this->message ?>");
        agent.animations('IdleSnooze');
    });
</script>

<?php require_once './Modules/Core/Views/footer.php'; ?>
