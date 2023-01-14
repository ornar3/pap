<?php
//inicializa a sessao

session_start();

//destroi as variaveis

unset($_SESSION[iduser]);
unset($_SESSION[user]);
unset($_SESSION[tipo]);
session_destroy();

//redireciona para a tela de login
Header("Location:index.php");

?>