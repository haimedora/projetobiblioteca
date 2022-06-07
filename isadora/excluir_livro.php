<?php
include 'conexão.php';
$id_livro= $_GET['id'];
$apaga_dados='delete from livro where id_livro=?';
$livro =$conn->prepare($apaga_dados);
echo "
<script> alert('desejar excluir o registro?');</script>";
$livro->execute(array($id_livro));
?>