<?php require_once './Modules/Core/Views/header.php'; ?>

<main class="container">
    <h1 class="text-center mt-1 mb-2 mb-md-5">Welcome</h1>
    <div class="row px-3">
        <div class="col-md-6 col-12 mb-4 p-0 p-md-3">
            <div class="card">
                <div class="card-header">
                    Model
                </div>
                <div class="card-body">
                    <h5 class="card-title">Interacts with the database</h5>
                    <p class="card-text">It receives, stores and retrieves data for the user.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 mb-4 p-0 p-md-3">
            <div class="card">
                <div class="card-header">
                    View
                </div>
                <div class="card-body">
                    <h5 class="card-title">Return HTML page</h5>
                    <p class="card-text">Displays information to the user and integrates data from the controller.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 mb-4 p-0 p-md-3">
            <div class="card">
                <div class="card-header">
                    Controller
                </div>
                <div class="card-body">
                    <h5 class="card-title">Connect Model & View</h5>
                    <p class="card-text">Sends and receives data from the model and passes to the view.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 mb-4 p-0 p-md-3">
            <div class="card">
                <div class="card-header">
                    Route
                </div>
                <div class="card-body">
                    <h5 class="card-title">Maps an HTTP request to a request handler</h5>
                    <p class="card-text">Route transforms a path and converts into a call to a method..</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once './Modules/Core/Views/footer.php'; ?>