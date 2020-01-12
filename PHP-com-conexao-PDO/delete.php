<?php

require './config.php';

$c = new Config;

$c->conectar('livraria', 'localhost', 'root', '');

$c->deletar();