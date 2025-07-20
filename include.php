<?php

// Carrega o arquivo tools.php e permite usar funções e valores definidos nele.
// Caso o arquivo não exista apenas produz uma mensagem de advertência.
include "misc/tools.php";

// Mesmo funcionamento do include, porem não importa o mesmo arquivo mais de uma vez
include_once "misc/tools.php";

// Semelhante ao include, porem caso o arquivo solicitado não exista produz um erro fatal
require "misc/tools.php";

// Mesmo funcionamento do require, porem não importa o mesmo arquivo mais de uma vez
require_once "misc/tools.php";

echo quadrado(5);
