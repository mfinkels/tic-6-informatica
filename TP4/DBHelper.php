<?php

function connect() {
  $db = new PDO (
    'mysql:host=localhost;dbname=preguntados;charset=utf8mb4',
    'root',
    'root',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
  return $db;
}

function listarCategorias() {
  $conn = connect();

  $stmt = $conn->prepare('SELECT * FROM categorias');
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
