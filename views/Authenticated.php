<?php 
var_dump($_SESSION);
?>
<div class="container d-flex flex-column">
    <form action="../config/api/processAuthenticated.php" method="POST" class=" p-3 border d-flex flex-column w-50 align-self-center gap-3">
        <h1>Autenticar</h1>

        <div class="mb-3 row form-group">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10 formg-roup">
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-25 p-2 align-self-center">Alterar</button>
</div>