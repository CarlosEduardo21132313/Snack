<?php 
      session_start();

      include("conexão.php");
      if(isset($_POST['submit'])){
      $nome = $_POST['nome'];
      $email =$_POST['email'];
      $senha = $_POST['senha'];
      $tipo = $_POST['tipoConta'];

      $test = "select count(*) as total from usuarios where email = '$email'";

      $result = mysqli_query($coon,$test);

      $row = mysqli_fetch_assoc($result);
      
      if($row['total']==1){

        $_SESSION['usuario existe']=true;
        header('Location: registro.php');
        exit;

      }else{
      
      $sql = mysqli_query($coon,"INSERT INTO usuarios(nome,email,senha,conta) VALUES ('$nome', '$email', '$senha','$tipo')");
      }
      
      $coon->close();

      header('Location: registro.php');
      exit;
    }
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.ico">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="style.css">
  <script src="validation.js"></script>
</head>
<body>
  <img src="img/logobranco.png" alt="Logo CEEP SNACK" class="logo">
  <div class="principal">
    <form action="registro.php" method="POST">
      <h2>Cadastro</h2>
      <div class="opcoes">
        <label>
          <input type="radio" name="tipoConta" value="cliente" id="clienteOption"> Cliente
        </label>
        <label>
          <input type="radio" name="tipoConta" value="colaborador" id="colaboradorOption"> Colaborador
        </label>               
      </div>
      <div class="entrada">
        <input type="text" name = "nome" required>
        <label>Insira seu nome</label>
      </div>
      <div class="entrada">
        <input id="email" type="text" name = "email" required>
        <label>Insira seu e-mail</label>
      </div>
      <div class="entrada">
        <input type="password" name = "senha" required>
        <label>Insira uma senha</label>
      </div>
      <button type="submit" name = "submit">Cadastrar</button>
      <div class="registro">
        <p>Já possui uma conta? <a href="/CEEPSNACKS/index.php"><b>Entre</b></a></p>
      </div>
    </form>
  </div>
</body> 
</html>