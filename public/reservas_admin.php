<?php
// ==============================================================================
// 1. CONFIGURAÇÃO DA BASE DE DADOS
// ==============================================================================
$servername = "localhost";
$username = "root";
$password = "atec123"; 
$dbname = "sabor_do_mar";

// ==============================================================================
// 2. LIGAÇÃO E CONSULTA
// ==============================================================================
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a ligação
if ($conn->connect_error) {
    // Em ambiente de produção, este erro só deve ser visível para o administrador
    die("Erro na ligação à Base de Dados: " . $conn->connect_error);
}

// QUERY FINAL: Seleciona TODAS as reservas, ordenadas pela data mais RECENTE.
$sql = "SELECT id, nome, email, telefone, data, hora, pessoas, data_criacao 
        FROM reservas 
        ORDER BY data DESC, hora DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor do Mar | Painel de Reservas</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Estilos específicos para o painel de administração */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 0.95em;
        }
        th {
            background-color: #0D47A1; /* Azul Escuro */
            color: white;
            text-transform: uppercase;
        }
        /* Cor de fundo para linhas pares */
        .admin-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .admin-table th, .admin-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
    </style>
</head>
<body>
    <!-- Header Fixo com Navegação -->
    <header class="sticky-header">
        <div class="container">
            <a href="index.html" class="logo">
                <img src="assets/images/sabor_do_mar2.png" alt="Sabor do Mar Logo">
            </a>
            <nav>
                <ul>
                    <li><a href="index.html">Início</a></li>
                    <li><a href="menu.html">Menu</a></li>
                    <li><a href="reservas_admin.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Header antigo, mantido para o título da página -->
    <header style="background: #f0f4f8; color: #0A1C29; min-height: auto; padding: 20px 0; border: none; box-shadow: none;">
        <div class="container">
            <h1>Sabor do Mar</h1>
            <p>Painel de Gestão de Reservas</p>
        </div>
    </header>

    <div class="container">
        
        <div class="content-section">
            <h2>Todas as Reservas (Ordenadas por Data Recente)</h2>
            
            <?php
            if ($result->num_rows > 0) {
                // Início da Tabela
                echo "<table class='admin-table'>";
                echo "<thead><tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Pessoas</th>
                        <th>Nome</th>
                        <th>Contacto (Email/Tel.)</th>
                        <th>Submetido em</th>
                      </tr></thead>";
                echo "<tbody>";

                // Obter a data e hora atual para destacar reservas passadas
                $agora = time();
                
                // Loop para exibir cada reserva
                while($row = $result->fetch_assoc()) {
                    // Formatar data e hora para exibição
                    $data_formatada = date('d/m/Y', strtotime($row['data']));
                    $hora_formatada = date('H:i', strtotime($row['hora']));
                    $submetido_formatado = date('d/m/Y H:i', strtotime($row['data_criacao']));
                    
                    // Verifica se a reserva está no passado
                    $data_reserva_timestamp = strtotime($row['data'] . ' ' . $row['hora']);
                    $classe_linha = ($data_reserva_timestamp < $agora) ? 'passado' : '';
                    
                    echo "<tr class='$classe_linha'>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td class='data'>" . $data_formatada . "</td>";
                    echo "<td class='data'>" . $hora_formatada . "</td>";
                    echo "<td class='pessoas'>" . $row['pessoas'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "<br>" . htmlspecialchars($row['telefone']) . "</td>";
                    echo "<td>" . $submetido_formatado . "</td>";
                    echo "</tr>";
                }

                // Fim da Tabela
                echo "</tbody></table>";
            } else {
                echo "<p style='padding: 20px; background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba;'>";
                echo "Não existem reservas registadas na base de dados.";
                echo "</p>";
            }
            ?>
        </div>
        
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2025 Sabor do Mar | Painel Administrativo.</p>
        </div>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
