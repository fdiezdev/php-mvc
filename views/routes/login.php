<h1>Login</h1>
<form method="post">
    <input type="text" name="email">
    <br>
    <br>
    <input type="password" name="password">
    <br>
    <br>
    <button type="submit">Autenticar</button>
    
    <?php
      $login = new UserController();
      $login->auth();
    ?>
</form>