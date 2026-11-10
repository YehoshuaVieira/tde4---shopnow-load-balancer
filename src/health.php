<?php

http_response_code(200);

header('Content-Type: application/json');

echo json_encode([
    'status' => 'online',
    'servidor' => getenv('SERVER_ID') ?: 'desconhecido'
]);
