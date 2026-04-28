<?php // views/header.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Tarefas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; max-width: 900px; }
        table { border-collapse: collapse; width: 100%; margin-top: 12px; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background: #f5f5f5; text-align: left; }
        a { text-decoration: none; }
        .row { display: flex; gap:10px; align-items:center; flex-wrap: wrap; }
        .btn { padding: 8px 12px; border: 1px solid #333; border-radius: 6px;
    display:inline-block; }
    .btn-danger { border-color: #a00; color: #a00; }
    .badge { padding: 3px 8px; border-radius: 999px; border: 1px solid #999; }
    </style>
</head>
<body>
    <h1>CRUD de Tarefas (PHP + SQL)</h1>
    <hr>