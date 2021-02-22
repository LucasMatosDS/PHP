<?php
// informo o tipo de documento a ser enviado.
header('Content-Type: application/png');

// faço o redirecionamento e defino o nome do arquivo a ser salvo.
header('Content-Disposition: attachment; filename="downloaded.png"');

// faz a leitura do arquivo de origem
readfile('/home/lucas/Imagens/rota.png');
?>
