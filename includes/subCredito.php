<?php

// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

include '../src/classes/controllers/Financeiro.php';

$body = file_get_contents('php://input');

$financeiro = new Financeiro();

echo json_encode($financeiro->initTransacaoDebito($body));