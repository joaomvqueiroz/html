<?php
// ==============================================================================
// 1. CONFIGURAÇÃO DA BASE DE DADOS
// ==============================================================================
$servername = "localhost";
$username = "web_user"; // O utilizador que criou no Passo 2
$password = "SUA_PASSWORD_FORTE"; // <<<<<< OBRIGATÓRIO: MUDAR PARA A SUA PASSWORD
$dbname = "sabor_do_mar";

// Variáveis para a mensagem de feedback
$mensagem = "";
$sucesso = false;

// Tentar ligar à Base de Dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a ligação
if ($conn->connect_error) {
    // Se houver erro de ligação, termina e informa
    $mensagem = "❌ Erro na ligação à Base de Dados. Por favor, tente novamente mais tarde.";
    $sucesso = false;
    // Em ambiente de produção, não deve mostrar o erro técnico
    // $mensagem .= " Detalhe Técnico: " . $conn->connect_error; 
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ==============================================================================
    // 2. PROCESSAR E VALIDAR DADOS DO FORMULÁRIO
    // ==============================================================================
    
    // Obter dados, assumindo que já foram validados pelo HTML (required)
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $data = trim($_POST['data']);
    $hora = trim($_POST['hora']);
    $pessoas = (int)$_POST['pessoas'];

    // Validação básica (pode expandir esta secção)
    if (empty($nome) || empty($data) || empty($hora) || $pessoas < 1) {
        $mensagem = "❌ Por favor, preencha todos os campos obrigatórios corretamente.";
        $sucesso = false;
    } else {
        // ==============================================================================
        // 3. PREPARAR E EXECUTAR CONSULTA SEGURA (Prepared Statements)
        // ==============================================================================
        
        // Comando SQL com placeholders (?)
        $sql = "INSERT INTO reservas (nome, email, telefone, data, hora, pessoas) 
                VALUES (?, ?, ?, ?, ?, ?)";

        // Preparar o statement
        $stmt = $conn->prepare($sql);

        if ($stmt === FALSE) {
            // Erro ao preparar o statement
            $mensagem = "❌ Erro interno do servidor. Não foi possível preparar a inserção.";
            $sucesso = false;
        } else {
            // Ligar os parâmetros ao statement: "sssssi" significa (string, string, string, string, string, integer)
            $stmt->bind_param("sssssi", $nome, $email, $telefone, $data, $hora, $pessoas);

            // Executar o statement
            if ($stmt->execute()) {
                // Sucesso na inserção
                $mensagem = "✅ Reserva efetuada com sucesso! Aguardamos a sua visita, " . htmlspecialchars($nome) . ". Receberá um e-mail de confirmação.";
                $sucesso = true;
            } else {
                // Erro na execução
                $mensagem = "❌ Erro ao submeter a reserva. Por favor, tente novamente.";
                // $mensagem .= " Detalhe Técnico: " . $stmt->error; 
                $sucesso = false;
            }

            // Fechar o statement
            $stmt->close();
        }
    }
} else {
    // Acesso direto ao script sem submissão do formulário
    $mensagem = "Por favor, utilize o formulário na página de <a href='contacto.html'>Contacto</a> para efetuar a sua reserva.";
    $sucesso = false;
}

// Fechar a ligação à base de dados
if (isset($conn)) {
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor do Mar | Confirmação de Reserva</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <header>
        <div class="container">
            <h1>Sabor do Mar</h1>
            <p>Confirmação de Reserva</p>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="index.html">Início</a></li>
                <li><a href="menu.html">Menu Completo</a></li>
                <li><a href="sobrenos.html">Sobre Nós</a></li>
                <li><a href="contacto.html">Contacto e Reservas</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <div class="content-section">
            <h2 style="color: <?php echo $sucesso ? '#4CAF50' : '#F44336'; ?>;"><?php echo $sucesso ? 'Reserva Confirmada' : 'Problema na Reserva'; ?></h2>
            <p style="font-size: 1.1em;"><?php echo $mensagem; ?></p>
            
            <hr>
            
            <p>
                <a href="contacto.html" style="margin-right: 15px;">Voltar para o Formulário de Reservas</a>
                <a href="menu.html">Ver o Menu Completo</a>
            </p>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2025 Sabor do Mar | Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
