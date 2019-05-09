<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['id_usuario']);
unset($_SESSION['nivel_acesso']);
unset($_SESSION['navegacao']);

header('location:index.php');