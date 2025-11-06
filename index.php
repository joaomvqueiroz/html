<?php 
$page_title = 'Sabor do Mar: Da Lota à Mesa | Restaurante de Peixe e Marisco';
$page_description = 'Sabor do Mar | Gastronomia de Peixe e Marisco Fresco. Reserve online e desfrute de pratos de excelência.';
$body_class = 'home-page';
$is_home_page = true; // Variável para lógicas específicas da home page
include 'header.php'; 
?>

    <!-- 1. Secção Hero com Vídeo/Imagem de Fundo -->
    <section class="hero-section">
        <!-- O vídeo será o novo fundo -->
        <video autoplay loop muted playsinline id="hero-video">
            <source src="assets/videos/hero-video.mp4" type="video/mp4">
            O seu navegador não suporta vídeos em HTML5.
        </video>
        <div class="hero-overlay"></div> <!-- O overlay continua por cima do vídeo -->
        <div class="hero-content">
            <h1>Sabor do Mar: Da Lota à Mesa.</h1>
            <p>A arte de servir o peixe e marisco mais fresco, com tradição e elegância.</p>
            <a href="contacto.php" class="btn-primary">Reservar Mesa Agora</a>
        </div>
    </section>
    
    <!-- Nova Secção de Parcerias (agora em largura total) -->
    <div class="content-section partnerships-section">
        <img src="assets/images/parcerias.png" alt="Nossos Parceiros" class="partnerships-image">
    </div>

    <div class="container">
        
        <!-- 2. Destaques do Menu (Grid Interativo) -->
        <div class="content-section">
            <h2>Destaques do Nosso Menu</h2>
            <div class="menu-highlights-grid">
                <!-- Cartão 1 -->
                <div class="menu-card">
                    <img src="assets/images/ameijoas.jpg" alt="Amêijoas à Bulhão Pato">
                    <div class="menu-card-content">
                        <h4>Amêijoas à Bulhão Pato</h4>
                        <p class="price">12.50€</p>
                        <p class="description">O clássico com coentros frescos e limão. Uma excelente entrada.</p>
                        <a href="menu.php" class="card-link">Ver no Menu</a>
                    </div>
                </div>
                <!-- Cartão 2 -->
                <div class="menu-card">
                    <img src="assets/images/peixe.jpg" alt="Robalo Grelhado">
                    <div class="menu-card-content">
                        <h4>Robalo Grelhado</h4>
                        <p class="price">18.00€</p>
                        <p class="description">Servido com legumes da estação e batata cozida. O sabor simples do mar.</p>
                        <a href="menu.php" class="card-link">Ver no Menu</a>
                    </div>
                </div>
                <!-- Cartão 3 -->
                <div class="menu-card">
                    <img src="assets/images/arroz_marisco.jpg" alt="Arroz de Marisco">
                    <div class="menu-card-content">
                        <h4>Arroz de Marisco</h4>
                        <p class="price">25.00€ / Pessoa</p>
                        <p class="description">Camarão, amêijoas e lagosta, servido em tacho tradicional.</p>
                        <a href="menu.php" class="card-link">Ver no Menu</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Secção da Equipa -->
        <div id="equipa" class="content-section">
            <h2>Os Rostos por Detrás do Sabor</h2>
            <div class="equipa-grid">
                <div class="membro">
                    <img src="assets/images/chef.jpg" alt="Foto do Chef António Silva">
                    <h4>Chef António Silva</h4>
                    <p>O Mestre dos grelhados, com mais de 20 anos de experiência em peixe e marisco. <a href="#" class="social-link">LinkedIn</a></p>
                </div>
                <div class="membro">
                    <img src="assets/images/gerente.jpg" alt="Foto do Gerente Miguel Lopes">
                    <h4>Miguel Lopes</h4>
                    <p>Responsável pelo serviço de sala e por garantir que a sua experiência é inesquecível.</p>
                </div>
                <div class="membro">
                    <img src="assets/images/sommelier.jpg" alt="Foto da Sommelier Catarina Costa">
                    <h4>Catarina Costa</h4>
                    <p>A nossa especialista em vinhos, para o acompanhamento perfeito. <a href="#" class="social-link">LinkedIn</a></p>
                </div>
            </div>
        </div>

        <!-- 4. Testemunhos -->
        <div class="content-section">
            <h2>O Que Dizem os Nossos Clientes</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p>"O peixe mais fresco que já comi em anos. O Robalo estava divino. Serviço impecável. Voltarei sempre!"</p>
                    <span>- Joana F.</span>
                </div>
                <div class="testimonial-card">
                    <p>"Uma experiência gastronómica memorável. O Arroz de Marisco é obrigatório. Ambiente acolhedor e elegante."</p>
                    <span>- Ricardo M.</span>
                </div>
            </div>
        </div>

        <!-- 5. Localização e Horário -->
        <div class="content-section location-section">
            <div class="location-info">
                <h2>Onde nos Encontrar</h2>
                <p>Rua Principal, nº 10, Cidade, País</p>
                <h3>Horário</h3>
                <p><strong>Terça a Domingo:</strong> 10:00 - 22:00</p>
                <p><strong>Segunda-feira:</strong> Encerrado</p>
                <a href="contacto.php" class="btn-primary">Ver Contactos e Reservar</a>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3112.3344999999997!2d-9.142685!3d38.736946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1933a645042999%3A0x429195404665644!2sLisbon!5e0!3m2!1sen!2spt!4v1670000000000!5m2!1sen!2spt" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
