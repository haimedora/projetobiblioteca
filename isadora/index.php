
<html>
    <head>
	   <title> Menu </title> 
	   <meta charset= "utf-8">
	   <link rel="stylesheet" type="text/css" href="form_index.css">
	</head>
	<body text="white">
    <div id="logo">
		<img src="img/logo2.png">
	</div>

<div id="menu">
<ul>
<?php 
session_start();
	   if($_SESSION['perfil']==1){
        echo "menu adm";
        echo "<li><a href='cadastro_livro.php'>cadastrar livro</a></li>";
        echo "<li><a href='cadastro_salvos.php'>cadastros salvos</a></li>";
        echo "<li><a href='catalogo.php'>catalogo</a></li>";
        echo "<li><a href='sair.php'>sair</a></li>";
	   }else if($_SESSION['perfil']==2){
        echo "<li><a href='emprestimo.php'>empreste ou devolva aqui!</a></li>";
        echo "<li><a href='catalogo.php'>catalogo</a></li>";
        echo "<li><a href='sair.php'>sair</a></li>";
	   }
	   else{
		   echo "perfil geral";
        echo "<li><a href='cadastro_usuario.php'>cadastrar-se</a></li>";
        echo "<li><a href='catalogo.php'>catalogo</a></li>";
        echo "<li><a href='sair.php'>sair</a></li>";
	   }
?>
</ul>
</div>
<div id="conteudo">

         <form action=""method="POST">
        <input type="text" name="login" placeholder="email"> 
        <input type="password" name="senha" placeholder="senha">
        <input type="submit" name="logar" value="Acessar">
            </form>
</div>
<?php
include 'conexão.php';
if(isset($_POST['logar'])){
    $email=$_POST['login'];
    $senha=md5($_POST['senha']);
    echo "preenchimento : ". $email. "<br>". $senha;
    $sql= 'select *  from usuario where email = ? and senha = ?';
    $usuario = $conn->prepare($sql); 
    $usuario->execute(array($email, $senha)); 
    $logado = $usuario->rowCount();
    foreach($usuario as $usu){ 
    }
    if($logado ==0){
        echo "usuario ou senha invalido";
    }else{
        echo "USuário logado";
        $_SESSION['usuario']= $usu['usuario'];
        $_SESSION['logado']= "logado";
        $_SESSION['perfil']=$usu['perfil'];
        header("location:sistema.php");
    }
}
?>
</body>
</html>