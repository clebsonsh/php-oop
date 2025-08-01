<?php

// Superglobais são variáveis que estão disponíveis em qualquer escopo.

// $_SERVER contém informações sobre o ambiente onde o script foi execultado, como
// endereço do servidor, browser que fez a requisição, etc.
var_dump($_SERVER);

// $_GET contém um array com os dados enviados na query string de uma requisição
// GET. Exemplo: acessar http://127.0.0.1:8080/index.php?answer=42 vai definir o valor
// de $_GET para ["answer" => "42"].
// Todos valores recebidos em uma requisição get são do tipo string
var_dump($_GET);

// $_POST contém um array com os dasos enviados no corpo de uma reuisição POST.
// geralmente usado no envio de formulários.
var_dump($_POST);

// $_FILES contém um array com informações dos arquivos enviados via upload.
// Os arquivos são guardados de forma temporaria na pasta /tmp. Exemplo: /tmp/phpPDUTQl.
// Esse caminho vai constar em $_FILES logo após o upload do arquivo, junto com outras
// informações como tamanho do arquivo, tipo, nome original, etc.
var_dump($_FILES);

// Contém um array com as informações recebidas pelo script
// que atualmente estão armazenadas nos cookies.
setcookie('user_id', 1, time() + 3600);
var_dump($_COOKIE);

// Contém um array com as variáveis da sessão do usuário.
session_start();
$_SESSION['user_name'] = 'Ken Masters';
var_dump($_SESSION);

// Contém um array com as informações de $_GET, $_POST, e $_COOKIE
setcookie('user_id', 1, time() + 3600);
var_dump($_REQUEST);

// Contém um array com variáveis de ambiente. O PHP não faz o parse automático
// de arquivos .env, para isso precisamos de bibliotecas como vlucas/phpdotenv
$_ENV['DB_HOST'] = 'localhost';
var_dump($_ENV);

// Contém uma array com todas as variáveis globais disponíveis
var_dump($GLOBALS);

