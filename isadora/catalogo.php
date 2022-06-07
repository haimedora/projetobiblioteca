<html>
    <title>Catalogo</title>
    <meta charset= "utf-8">
    <link rel="stylesheet" type="text/css" href="formcatalogo.css">
    <body bgcolor="lightseagreen" text="white"> 
<?php
 session_start();
include "conexão.php";

$livros_sql="select * from livro";
$livros=$conn->prepare($livros_sql);
$livros->execute();
$conn=null;
echo "<table><tr>";
$cont=1;
foreach($livros as $livro){
    echo "<td> <img src='livro/".$livro['foto']."'><br>";
    echo $livro['titulo']. "<br>";
    echo $livro['genero']. "<br>";
    echo $livro['autor']."<br>";
    echo $livro['ISBN']."<br>";
    echo $livro['status']."<br>";
	   if($_SESSION['perfil']==1)
    echo " <a href ='editar_livro.php?id=".$livro['id_livro']."'>Editar</a> <a href='excluir_livro.php?id=".$livro['id_livro']." '>Excluir</a><br> ";
    $cont++;
    if($cont % 4==1){
   echo "</td></tr>"; }
}
echo "</table>";
?>
</body>
</html>