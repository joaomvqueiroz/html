# 🐟 Sabor do Mar - Sistema de Reservas e Gastronomia

Bem-vindo ao repositório oficial do **Restaurante Sabor do Mar**, especializado em **peixe fresco e marisco da costa portuguesa**.  
Este projeto inclui o **website estático** do restaurante e um **sistema interno de gestão de reservas** desenvolvido em PHP e MariaDB.

---

## 🚀 1. Visão Geral do Projeto

| Característica | Detalhe |
| :--- | :--- |
| **Nome** | Sabor do Mar |
| **Tipo de Site** | Restaurante, Gastronomia Costeira |
| **Tecnologias** | HTML5, CSS3, PHP (Back-end), MariaDB (Base de Dados) |
| **Ambiente de Servidor** | LAMP Stack (Linux, Apache, MariaDB, PHP) – **CentOS** |
| **Funcionalidade Principal** | Sistema de Reservas Online (`/contacto.html`) |
| **Painel de Administração** | Gestão de Reservas (Acesso Restrito: `/reservas_admin.php`) |

---

## 📁 2. Estrutura de Ficheiros

Estrutura típica do diretório raiz do site (ex.: `/var/www/html/` em CentOS):

.
├── contacto.html # Página de Contacto e Formulário de Reservas (Front-end)
├── index.html # Página Inicial (Home) + Link de Acesso Admin no Rodapé
├── menu.html # Menu Completo do Restaurante
├── sobrenos.html # Página "Sobre Nós" (Fundado em 2010)
├── style.css # Estilos globais (Tema Azul-Marinho)
├── processa_reserva.php # Script PHP: Insere reservas na Base de Dados (com Prepared Statements)
├── reservas_admin.php # Painel de Administração para listar todas as reservas
└── .htaccess # Proteção de acesso ao Painel Admin

yaml
Copiar código

---

## ⚙️ 3. Configuração Técnica e Requisitos

### 3.1. Base de Dados

O projeto utiliza a base de dados **`sabor_do_mar`** com a tabela **`reservas`**.  
Certifique-se de criar o utilizador `web_user` no MariaDB com permissões adequadas.

#### ⚠️ Atenção de Segurança:
Nos ficheiros `processa_reserva.php` e `reservas_admin.php`, **substitua a password** pela sua credencial segura:

```php
$password = "SUA_PASSWORD_FORTE";
3.2. Permissões de Escrita (Erro Comum)
Se as submissões do formulário falharem após a primeira tentativa, corrija as permissões no diretório de sessões do PHP (exemplo com utilizador apache):

bash
Copiar código
sudo chown -R apache:apache /var/lib/php/session
sudo chmod -R 700 /var/lib/php/session
🔐 4. Gestão e Segurança do Painel de Administração
O Painel de Reservas (/reservas_admin.php) é protegido com autenticação HTTP Basic via .htaccess e .htpasswd.

4.1. Criar o ficheiro .htpasswd
Execute no terminal:

bash
Copiar código
# Cria o ficheiro .htpasswd e define a password para o utilizador 'admin'
sudo htpasswd -c /etc/httpd/.htpasswd admin
4.2. Aceder ao Painel
URL: http://seuservidor/reservas_admin.php

Autenticação: O navegador pedirá o nome de utilizador (admin) e a password definida.

Atalho: Link disponível no rodapé de /index.html.

🔄 5. Manutenção e Comandos Essenciais
Após alterações em ficheiros PHP, HTML ou configurações .htaccess, reinicie os serviços para aplicar as mudanças:

bash
Copiar código
# Reinicia o servidor Apache
sudo systemctl restart httpd

# Reinicia o serviço PHP-FPM (se estiver em uso)
sudo systemctl restart php-fpm
💾 6. Backup e Restauração da Base de Dados
6.1. Backup
Recomenda-se um backup regular da base de dados sabor_do_mar:

bash
Copiar código
# Exporta a base de dados para um ficheiro SQL
mysqldump -u root -p sabor_do_mar > backup_reservas_$(date +%Y%m%d_%H%M%S).sql
6.2. Restauração
bash
Copiar código
# Restaura a base de dados a partir de um ficheiro de backup
mysql -u root -p sabor_do_mar < nome_do_seu_ficheiro_backup.sql
🧪 7. Guia de Testes
Passo	Ação	Resultado Esperado
Teste 1	Aceder a /contacto.html e submeter uma reserva válida com a data de hoje.	Página /processa_reserva.php deve mostrar “Reserva efetuada com sucesso!”.
Teste 2	Aceder a /reservas_admin.php e autenticar-se.	Deve ver a tabela de reservas e o registo do Teste 1.
Teste 3	Repetir o Teste 1 (duas reservas seguidas).	Ambas devem ser inseridas corretamente.
Teste 4	Verificar via terminal (SELECT * FROM reservas;).	Os dados devem coincidir com os exibidos no painel.

🧭 8. Créditos e Informações
Autor: Equipa Técnica do Restaurante Sabor do Mar

Ano: 2025

Última Atualização: Outubro de 2025

Licença: Uso interno (projeto proprietário)

Este ficheiro README documenta a instalação, configuração e manutenção do sistema de reservas Sabor do Mar.
