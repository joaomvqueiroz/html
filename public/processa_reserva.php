<?php
// ==============================================================================
// 1. CONFIGURAÇÃO DA BASE DE DADOS
// ==============================================================================
$servername = "localhost";
$username = "root"; 
$password = "atec123"; 
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
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ==============================================================================
    // 2. PROCESSAR E VALIDAR DADOS DO FORMULÁRIO
    // ==============================================================================
    
    // Obter dados do POST
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $data = trim($_POST['data']);
    $hora = trim($_POST['hora']);
    $pessoas = (int)$_POST['pessoas'];

    // Validação básica
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
    <link rel="stylesheet" href="assets/css/style.css"> 
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Vídeo de Fundo -->
    <video autoplay loop muted playsinline id="background-video">
        <source src="assets/videos/sabor_do_mar.mp4" type="video/mp4">
        O seu navegador não suporta vídeos em HTML5.
    </video>

    <!-- Header Fixo com Navegação -->
    <header class="sticky-header">
        <div class="container">
            <a href="index.html" class="logo">
                <img src="assets/images/sabor_do_mar2.png" alt="Sabor do Mar Logo">
            </a>
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.html">início</a></li>
                    <li><a href="menu.html">MENU</a></li>
                    <li><a href="especiais.html">especiais</a></li>
                    <li><a href="contacto.html">Contacto e Reservas</a></li>
                </ul>
                <ul class="nav-icons">
                    <li><a href="#" class="nav-icon"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="#" class="nav-icon"><i class="fas fa-search"></i></a></li>
                    <li><a href="#" class="nav-icon"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="nav-icon"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="container">
        <div class="content-section">
            <h2 style="color: <?php echo $sucesso ? '#4CAF50' : '#F44336'; ?>;"><?php echo $sucesso ? 'Reserva Confirmada' : 'Problema na Reserva'; ?></h2>
            <p style="font-size: 1.1em;"><?php echo $mensagem; ?></p>
            <hr>
            <a href="contacto.html" class="btn-primary" style="margin-right: 15px;">Nova Reserva</a>
            <a href="index.html" class="btn-primary">Voltar ao Início</a>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2025 Sabor do Mar | Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
