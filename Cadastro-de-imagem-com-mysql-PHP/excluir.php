<?php
         include_once 'class/Imagem.php';
         $p = new Imagem('form_produtos', 'localhost', 'root', '');
         $p->deletarTodosOsRegistros();
         $p->reiniciarId();
         header('location: index.php');
 ?>
