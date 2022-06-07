<html>
    <head>
    <title> Cadastros Salvos </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="form_usu.css">
	<style>
	table{
		position: absolute;
		top: 150px;
		left:-15px;
		background-color: lightseagreen;
		border-radius: 5px;
	}
	</style>
	</head>
	<body bgcolor="LightBlue" text="white">
	<header>
                <h1>Usuarios Cadastrados</h1>
    </header>
	</body>
</html>

<?php
	session_start();
	if($_SESSION['logado'] != "logado"){
	 session_destroy();
	 echo "
	 <script>
	 alert('Usuário não autenticado');
	 window.location='menu.php';
	 </script>
	 ";
	 }
	 
    include 'conexão.php';
   $sql= 'select * from usuario';
   $usuario= $conn->prepare($sql);
   $usuario->execute();
   $conn= null; 
   
    echo"<table>
   <tr><td colspan=1><id= 'titulo'> Usuarios </td></tr>
   <tr>.<td> Codigo</td><td>Nome</td><td>cpf</td><td>Email</td><td>Função</td><tr>";
   
   foreach($usuario as $usu) {
	   echo "<tr><td>". $usu['id_usuario'] ."</td>";
	   echo "<td>". $nome= $usu['nome'] ."</td>";
	   echo "<td>". $cpf= $usu['cpf'] ." </td>";
	   echo "<td>". $email= $usu['email'] ." </td>";
	   echo "<td>". $função=$usu['função']. "</td>";
	   if($_SESSION['perfil']==1)
	   echo "<td> <a href='excluir_usuario.php?id=".$usu['id_usuario']."'.>Excluir</a><a href='editar_usuario.php?id=".$usu['id_usuario']."'.>Editar</a> </td>";
   }
