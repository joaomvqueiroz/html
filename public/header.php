<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- O título será definido em cada página individualmente -->
    <title><?php echo isset($page_title) ? $page_title : 'Sabor do Mar'; ?></title>
    
    <?php if (isset($page_description)): ?>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="assets/css/style.css"> 
    <!-- Google Fonts: Montserrat, Poppins, Lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome para Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- O Schema Markup será específico da página principal -->
    <?php if (isset($is_home_page) && $is_home_page): ?>
    <script type="application/ld+json">
    {
      // ... (código do schema.org) ...
    }
    </script>
    <?php endif; ?>
</head>
<body class="<?php echo isset($body_class) ? $body_class : ''; ?>">
    <!-- Vídeo de Fundo -->
    <video autoplay loop muted playsinline id="background-video">
        <source src="assets/videos/sabor_do_mar.mp4" type="video/mp4">
        O seu navegador não suporta vídeos em HTML5.
    </video>

    <!-- Header Fixo com Navegação -->
    <header class="sticky-header">
        <div class="container">
            <a href="index.php" class="logo">
                <img src="assets/images/sabor_do_mar2.png" alt="Sabor do Mar Logo">
            </a>
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php">início</a></li>
                    <li><a href="menu.php">MENU</a></li>
                    <li><a href="especiais.php">especiais</a></li>
                    <li><a href="sobrenos.php">Sobre Nós</a></li>
                    <li><a href="contacto.php">Contacto e Reservas</a></li>
                </ul>
                <ul class="nav-icons">
                    <li><a href="#" class="nav-icon" aria-label="Carrinho de Compras"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="#" class="nav-icon" aria-label="Pesquisar"><i class="fas fa-search"></i></a></li>
                    <li><a href="#" class="nav-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="nav-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>