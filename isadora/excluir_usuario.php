<?php
include 'conexão.php';
$id_usuario= $_GET['id'];
$apaga_dados='delete from usuario where id_usuario=?';
$usuario =$conn->prepare($apaga_dados);
echo "
<script> alert('desejar excluir o registro?');</script>";
$usuario->execute(array($id_usuario));

?>