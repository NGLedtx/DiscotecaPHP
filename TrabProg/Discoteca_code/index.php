<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Discoteca</title>
</head>

<body>
    <div class="container">
        <div id="discoteca">
            <h1>Discoteca</h1>
            <?php 
                $db = new mysqli("localhost", "root", "", "discoteca");

                $artistas = $db->query("SELECT COUNT(*) AS num FROM artista")->fetch_array();
                $discos = $db->query("SELECT COUNT(*) AS num FROM disco")->fetch_array();
                $emprestimos = $db->query("SELECT COUNT(*) AS num FROM emprestimo")->fetch_array();

                echo "<p>Artistas cadastrados: {$artistas['num']} - Discos cadastrados: {$discos['num']}
                - Empréstimos cadastrados: {$emprestimos['num']}</p>";
            ?>
            <a href="disco/cadastrar/">
                <button class="button">Cadastrar disco</button>
            </a>
            <a href="disco/listar/">
                <button class="button">Listar disco</button>
            </a>
            <a href="artista/cadastrar/">
                <button class="button">Cadastrar artista</button>
            </a>
            <a href="artista/listar/">
                <button class="button">Listar artista</button>
            </a>
            <a href="emprestimo/cadastrar/">
                <button class="button">Cadastrar empréstimo</button>
            </a>
            <a href="emprestimo/listar/">
            <button class="button">Listar empréstimo</button>
            </a>
        </div>
    </div>
</body>

</html>