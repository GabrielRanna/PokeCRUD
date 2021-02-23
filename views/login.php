


<div class="text-center login-body">

  <form class="form-signin" method="post" action='?pagina=login'>
    <img class="mb-4" src="images/pokeball.png" alt="" width="72" height="72">
    <label for="inputEmail" class="sr-only" >Email address</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Login" required="" autofocus="" name="username">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required="" name="password">
    <button class="login-button" type="submit" name="login_user">Entrar</button>

    <?php  if (count($errors) > 0) : ?>
      <div class="error">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
      </div>
    <?php  endif ?>
    <p>Ainda não é membro? <a href="?pagina=cadastro">Cadastrar</a></p>
    
  </form>

  

 


</div>


