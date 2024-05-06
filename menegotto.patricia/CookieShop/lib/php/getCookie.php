<?php
include 'dbconnect.php'; // Inclui o arquivo de conexão

// Checa se o ID do cookie foi passado como parâmetro na URL
if(isset($_GET['id'])) {
  $cookieId = $_GET['id'];

  // Prepara a consulta SQL para evitar SQL Injection
  $stmt = $conn->prepare("SELECT nome, ingredientes, descricao FROM cookies WHERE id = ?");
  $stmt->bind_param("i", $cookieId); // "i" indica que o parâmetro é um inteiro

  // Executa a consulta
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Saída dos dados do cookie
    while($row = $result->fetch_assoc()) {
      echo "Nome: " . $row["nome"]. "<br>Ingredientes: " . $row["ingredientes"]. "<br>Descrição: " . $row["descricao"]. "<br>";
    }
  } else {
    echo "Nenhum resultado encontrado";
  }
  
  $stmt->close();
  $conn->close();
} else {
  echo "ID do cookie não especificado";
}