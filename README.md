# :racing_car: Street-Fighter

##  Street-Fighter  
- Jogo simples baseado no Street-Fighter
- HTML, CSS, JS e PHP
- Interface de usuário agradável.
- Desenvolvido em grupo (Universitário)
- Banco de Dados necessário:
-   create database gamephp;
    use gamephp;
    CREATE TABLE `usuario` (
        `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `email` varchar(255) NOT NULL UNIQUE,
        `senha` varchar(255) NOT NULL
    )
##