<html>
    <head>
        <title> Editar Usuario </title>
        <meta charset= "utf-8">
        <link rel="stylesheet" type="text/css" href="formlivro.css">
    </head>
</html>
<?php
include 'conexão.php';
$id_livro= $_GET['id'];
 $atualiza_sql= 'select * from livro where id_livro=?';
$livro=$conn->prepare($atualiza_sql);
$livro->execute(array($id_livro));
$conn= null;
foreach($livro as $li){ 
}
if(isset($_POST['atualizar'])){
    include 'conexão.php';

   $titulo = $_POST['titulo'];
$genero=$_POST['genero'];
$autor=$_POST['autor'];
$ISBN=$_POST['ISBN'];
$status=$_POST['status'];
$id=$_POST['cod_livro'];

echo "dados preenchidos : ".$id. ",".$titulo;
echo $genero;
echo $autor;
echo $autor;
echo $ISBN;
echo $status;
$update_sql="UPDATE livro set titulo = ?, genero = ?, autor=?, ISBN=?,status=? where id_livro=?";
$usuario_a= $conn->prepare($update_sql);
$usuario_a->execute(array($titulo,$genero,$autor,$ISBN,$status,$id));

$conn = null;
}

?>
<form action='' method="POST">
    <input type="text" name="cod_livro" value="<?php echo $li['id_livro'];?>" disable>
    <input type="text" name="titulo" value="<?php echo $li['titulo'];?>">
    <input type="text" name="genero" value="<?php echo $li['genero'];?>">
    <input type="text" name="autor" value="<?php echo $li['autor'];?>">
    <input type="text" name="ISBN" value="<?php echo $li['ISBN'];?>">
    <input type="text" name="status" value="<?php echo $li['status'];?>">
<input type="submit" name="atualizar" value="atualizar">

</form>