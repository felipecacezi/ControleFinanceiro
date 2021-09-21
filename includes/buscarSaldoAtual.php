<?php

// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

include '../src/classes/controllers/Financeiro.php';

$financeiro = new Financeiro();

echo json_encode($financeiro->getSaldoAtual());