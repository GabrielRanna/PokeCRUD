<div class="container">
    <h2>Cadastro</h2>
    
<form method="post" action="?pagina=cadastro">

    <div class="form-group">
        <label for="exampleFormControlInput1">Nome</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nome"  >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email@exemplo.com" name="email"  >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Login</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="username" >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Senha</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="" name="password_1">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Confirmar Senha</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="" name="password_2">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Dinheiro</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="dinheiro" >
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Gênero</label>
        <select class="form-control" id="exampleFormControlSelect1" name="genero" >
            <option>Masculino</option>
            <option>Feminino</option>
            <option>Outro</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Número de Insígnias</label>
        <select class="form-control" id="exampleFormControlSelect1" name="insignia" ">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
        </select>
    </div>

    <div class="form-group d-flex justify-content-center">
  	  <button type="submit" class="" name="reg_user">Registrar</button>
  	</div>

      <?php  if (count($errors) > 0) : ?>
      <div class="error">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
      </div>
    <?php  endif ?>

</form>
</div>
