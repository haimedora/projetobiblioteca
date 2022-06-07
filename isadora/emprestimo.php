<?php 
include "conexão.php";
$usuario_sql="select id_usuario, nome from usuario";
$usuario=$conn->prepare($usuario_sql);
$usuario->execute();

$livro_sql="select id_livro, titulo from livro";
$livro=$conn->prepare($livro_sql);
$livro->execute();
?>
<html>
    <title>Emprestimo</title>
    <link rel="stylesheet" type="text/css" href="form_emp.css">
    <div id="emp">
    <body text="white">
	<header>
                <h3>Emprestimo</h3>
    </header>
	</body>
</html>
<form action="" method="post" enctype="multipart/form-data">
<label> usuario:</label> 
<?php
echo "<select name='usuario'>";
    foreach($usuario as $usuario_bd){
        echo "<option value= ".$usuario_bd['id_usuario'].">".$usuario_bd['nome']."</option>";
    }
echo "</select>"; 
?>
<br>
<label> data do emprestimo:</label><input type="date" name="data_emp"><br>
<label> data de devolução:</label> <input type="date" name="data_dev"><br>
<label> livro:</label> <br>
<?php
echo "<select name='livro'>";
    foreach($livro as $livro_bd){
        echo "<option value= ".$livro_bd['id_livro'].">".$livro_bd['titulo']."</option>";
    }
echo "</select>";
?>
<br>
<Label>Status:</label>
<select name="status">
    <option value="0">não devolvido</option>
    <option value="1">devolvido</option>
</select>
<br>
  <input type="submit" name="cadastro" value="emprestar">
  <input type="reset" name="apagar" value="cancelar">
</form>

<?php
include "conexão.php";
if(isset($_POST["cadastro"])){
    $nome=$_POST["usuario"];
    $data=$_POST["data_emp"];
    $data_dev=$_POST["data_dev"];
    $livro=$_POST['livro'];
    $status=$_POST["status"];
    $sql_livro = "insert into movimentação(data_emp,data_dev,id_usuario,confirm_dev) values (?,?,?,?)";
    $cadastro = $conn->prepare($sql_livro);
    $cadastro->execute(array($data,$data_dev,$nome,$status));
    $id_mov=$conn->lastInsertId();

    $sql_itens= "insert into itens_mov(cod_mov,cod_livro) values (?,?)";
    $inserir_item=$conn->prepare($sql_itens);
    $inserir_item->execute(array($id_mov,$livro));
}
?>