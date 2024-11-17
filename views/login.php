<?php 

$error = $_GET['error'] ?? "";
?>

<div class="container d-flex flex-column">
  <form action="../config/api/processLogin.php" method="POST" class=" p-3 border d-flex flex-column w-50 align-self-center gap-3">
    <h1>Login</h1>
    <div class="mb-3 row form-group">
      <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="staticEmail" name="email">
      </div>
    </div>
    <div class="mb-3 row form-group">
      <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10 formg-roup">
        <input type="password" class="form-control" id="inputPassword" name="password">
      </div>

    </div>

    <button type="submit" class="btn btn-primary align-self-center w-25 p-2">Logar</button>
    <?php if(isset($error)):?>
      <p class="text-danger"><?php echo $error?></p>
      <?php endif;?>
    <p>esqueceu sua senha? <a href="/client/recoveryAccount">clique aqui</a></p>
  </form>
</div>