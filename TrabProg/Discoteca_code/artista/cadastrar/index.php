<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="imagem">
        <img  id="imagem" src="../../img/BackgroundArtistas.webp " alt="">
    </div>
    <div class="container">
        <div id="cadastro">
            <?php 
                if(isset($_GET['erro'])) {
                    echo 'Erro ao cadastrar usuario';
                } else {
                    echo '<h1>Cadastrar  <br> Artista</h1>
                        <form action="cadastrar.php" method="post">
                            <label for="NomeArtista" id="lblArtista">Nome do Artista: </label>
                            <div id="divAlinhar">
                                <input type="text" id="NomeArtista" name="nome" required>
                                <div id="divBotao">
                                    <input type="submit" value="Cadastrar" id="botaoC">
                                </div>
                            </div>
                        </form>';
                }
            ?>
            <div id="divBtn">
                <a href="../../index.php">
                    <button id="botaoV">↩ Voltar</button>
                </a>
            </div>

            </div>
      </div>
</body>
</html>