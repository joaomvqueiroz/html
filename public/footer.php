    <footer>
        <div class="container">
            <div class="newsletter-form">
                <h4>Receba a Sugestão do Chef</h4>
                <form action="#" method="post">
                    <input type="email" name="email" placeholder="O seu melhor e-mail" required>
                    <button type="submit">Subscrever</button>
                </form>
            </div>
            <?php if (isset($is_home_page) && $is_home_page): ?>
            <p style="font-size: 0.8em; margin-bottom: 5px;">
                <a href="reservas_admin.php" style="color: #FF9800; text-decoration: none;"><i class="fas fa-user-shield"></i> Acesso Admin</a>
            </p>
            <?php endif; ?>
            <p>&copy; <?php echo date("Y"); ?> Sabor do Mar | Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>