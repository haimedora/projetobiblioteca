
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
 if($_SESSION['perfil']==1){
     echo "menu adm";
 }else if($_SESSION['perfil']==2){
 }
 else{
     echo "perfil geral";
 }
 echo "<a href='sair.php'>Logout</a>";
?>