
<html>
    <head>
	   <title> Biblioteca </title> 
	   <meta charset= "utf-8">
	   <link rel="stylesheet" type="text/css" href="form_usu.css">
	</head>
	<body text="white">
	<header>
    <div class="logo">
		<img src="img/logo2.png">
	</div>
	</header>
	<br>
	<div id="form">
	<form action="" method="POST">
	<br>
	    <input class="text-input" type="text" name="nome" placeholder= "Digite seu nome">
		<br> 
		<input class="text-input" type="text" name="cpf"  placeholder= "Digite seu cpf">
		<br> 
		<input class="text-input" type="text" name="email" placeholder= "Digite seu email">
		<br>
		<input class="text-input" type="password" name="senha" placeholder="Digite sua senha">
		<br>
		<input type="radio" name="função" value="professor"> professor
		<input type="radio" name="função" value="aluno"> aluno
		<br>
		<input type="submit" value= "Cadastrar" name="cadastrar">
		<input type="reset" value= "Cancelar" name="cancelar">
		<br>
	</form>
	</div>

<?php
if(isset($_POST["cadastrar"])){ 
	require_once 'usuario.php';
      $usuario = new usuario();
	  $usuario->nome= $_POST["nome"];
	  $usuario->cpf= $_POST["cpf"];
	  $usuario->email= $_POST["email"];
	  $usuario->função= $_POST["função"];
	  $usuario->senha= $_POST["senha"];
  
  include 'conexão.php';
 $sql = ' INSERT INTO usuario(nome,email,cpf,função,perfil,senha) values (?,?,?,?,?,?)';
 $cad = $conn->prepare($sql);
 $cad -> execute(array($usuario->nome,$usuario->email,$usuario->cpf,$usuario->função,2,md5($usuario->senha))); 
 $conn=null;
}
?>
</body>
</html>