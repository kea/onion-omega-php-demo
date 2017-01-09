<?php

header("Content-type: application/json");

$response = [];

echo json_encode(['version' => phpversion(), 'extension_version' => phpversion('omega')]);

