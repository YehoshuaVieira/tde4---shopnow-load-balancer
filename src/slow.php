<?php

$servidor = getenv('SERVER_ID') ?: 'Servidor desconhecido';

usleep(1500000);

header('Content-Type: text/plain; charset=utf-8');

echo $servidor . " - resposta lenta";