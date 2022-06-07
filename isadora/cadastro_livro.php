<html>
    <head>
        <title>Cadastro de Livros</title>
        <meta charset= "utf-8">
        <link rel="stylesheet" type="text/css" href="formlivro.css">
    </head>
    <body text="white">
	<header>
                <h1>Cadastro de Livros</h1>
    </header>
    </body>
</html>
<div id="formlivro">
<form action="" method="post" enctype="multipart/form-data">
<label> Titulo:</label><input type="text" name="titulo"><br>
<label> Genero:</label><input type="text" name="genero"><br>
<label> Autor:</label> <input type="text" name="autor"><br>
<label> ISBN:</label><input type="text" name="ISBN"><br>
<Label>Status:</label>
<select name="status">
    <option value="disponivel">disponivel</option>
    <option value="indisponivel">indisponivel</option>
</select>
<input type="file" name="foto"><br>
  <input type="submit" name="cadastro" value="cadastrar">
  <input type="reset" name="apagar" value="cancelar">
</form>

<?php
/*session_start();
if($_SESSION['logado'] != "logado"){
 session_destroy();
 echo "
 <script>
 alert('Usuário não autenticado');
 window.location='index.php';
 </script>";
}*/

include "conexão.php";
if(isset($_POST["cadastro"])){
    $nome=$_POST["titulo"];
    $autor=$_POST["autor"];
    $genero=$_POST["genero"];
    $ISBN=$_POST["ISBN"];
    $status=$_POST["status"];
    $foto=$_FILES["foto"];
    $nome_foto=$foto["name"];
    $sql_livro = "insert into livro(titulo,autor,genero,ISBN,status,foto) values (?,?,?,?,?,?)";
    $cadastro = $conn->prepare($sql_livro);
    $cadastro->execute(array($nome,$genero,$autor,$ISBN,$status,$nome_foto));
}
?>