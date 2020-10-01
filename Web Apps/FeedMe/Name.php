<?php
include "includes/openconn.php";
// Estabelece uma ligação com a base de dados usando o programa openconn.php
// A variável $conn é inicializada com a ligação estabelecida
$name = $_POST["name"];
$sql = "SELECT firstName, lastName, email, username FROM Users where username = '{$name}'";
$result = mysqli_query($conn, $sql);
echo "<table><tr><th>Nome</th><th>Apelido</th><th>Email</th><th>Username</th></tr>"; 
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
$tabela[] = "<tr><td>" . implode("</td><td>", $row) . "</td></tr>";
}
$tabela = "" . implode("\n", $tabela) . "</table>";
echo $tabela;
echo '<p><a href="baseDeDados.php">Voltar</a></p>';
mysqli_close($conn);
?>