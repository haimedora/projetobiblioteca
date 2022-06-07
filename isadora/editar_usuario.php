<html>
    <head>
        <title> Editar Usuario </title>
        <meta charset= "utf-8">
        <link rel="stylesheet" type="text/css" href="form.css">
    </head>
</html>
<?php
include 'conexão.php';
$id_usuario= $_GET['id'];
 $atualiza_sql= 'select * from usuario where id_usuario=?';
$usuario=$conn->prepare($atualiza_sql);
$usuario->execute(array($id_usuario));
$conn= null;
foreach($usuario as $usu){ 
}
if(isset($_POST['atualizar'])){
    include 'conexão.php';

   $nome = $_POST['nome'];
$email=$_POST['email'];
$id=$_POST['cod_usuario'];

echo "dados preenchidos : ".$id. ",".$nome;
echo $email;
$update_sql="UPDATE usuario set nome = ?, email = ? where id_usuario=?";
$usuario_a= $conn->prepare($update_sql);
$usuario_a->execute(array($nome,$email,$id));

$conn = null;
}

?>
<form action='' method="POST">
    <input type="text" name="cod_usuario" value="<?php echo $usu['id_usuario'];?>" disable>
    <input type="text" name="nome" value="<?php echo $usu['nome'];?>">
    <input type="text" name="email" value="<?php echo $usu['email'];?>">
<input type="submit" name="atualizar" value="atualizar">

</form>
