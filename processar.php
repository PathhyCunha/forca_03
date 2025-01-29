<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "root";
$dbname = "user_registration";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("INSERT INTO users (nome, email, telefone, genero, data_nascimento, cidade, estado, endereco) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $nome, $email, $telefone, $genero, $data_nascimento, $cidade, $estado, $endereco);


$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$genero = $_POST['genero'];
$data_nascimento = $_POST['data_nascimento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
