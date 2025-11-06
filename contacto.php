<?php 
$page_title = 'Sabor do Mar | Contacto e Reservas';
include 'header.php'; 
?>
    
    <div class="container">
        <div class="content-section">
            <h2>Contacto e Reservas</h2>
            <p>Use o formulário para garantir a sua mesa ou contacte-nos diretamente. Estamos ansiosos pela sua visita!</p>
            <div class="contact-layout">
                <!-- Coluna do Formulário -->
                <div class="form-column">
                    <div class="form-reserva">
                        <h3>Faça a sua Reserva Online</h3>
                        <form action="processa_reserva.php" method="POST">
                            <label for="nome">Nome Completo:</label>
                            <input type="text" id="nome" name="nome" required>
                            
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email" required>
        
                            <label for="telefone">Telefone:</label>
                            <input type="tel" id="telefone" name="telefone">
        
                            <label for="data">Data da Reserva:</label>
                            <input type="date" id="data" name="data" required>
        
                            <label for="hora">Hora da Reserva (10:00 - 22:00):</label>
                            <input type="time" id="hora" name="hora" required min="10:00" max="22:00">
                            
                            <label for="pessoas">Nº de Pessoas:</label>
                            <input type="number" id="pessoas" name="pessoas" min="1" max="20" required>
        
                            <button type="submit" class="btn-primary">Confirmar Reserva</button>
                        </form>
                    </div>
                </div>
                <!-- Coluna de Informações -->
                <div class="info-column">
                    <h3>Contactos e Horário</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Rua Principal, nº 10, Cidade, País</p>
                    <p><i class="fas fa-phone-alt"></i> +351 211 234 567</p>
                    <p><i class="fas fa-envelope"></i> geral@sabordomar.pt</p>
                    <hr>
                    <h3><i class="fas fa-clock"></i> Horário</h3>
                    <p><strong>Terça a Domingo:</strong> 10:00 - 22:00</p>
                    <p><strong>Segunda-feira:</strong> Encerrado</p>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
