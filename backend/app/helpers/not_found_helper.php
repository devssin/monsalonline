<?php

function notFound()
{
    http_response_code(404);
    echo json_encode([
        "Message" => "404 not found"
    ]);
    exit;
}
