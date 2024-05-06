<?php
$servername = "mysql.menegotto.design";
$username = "guileme01";
$password = "W54ER90#!p";
$database = "menegotto_design";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Checar conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}