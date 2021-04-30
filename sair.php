<?php

session_start();
//matar a sessao
unset($_SESSION['idMed']);

header ("Location: index.php");


?>