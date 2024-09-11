<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   
    <div class="container">
        <div id="cadastro">
            <?php 
                if(isset($_GET['erro'])) {
                    echo '<p>Erro ao cadastrar disco</p><br>
                            <a href="index.php">
                                <button>Voltar</button>
                            </a>
                        ';
                } else {
                    $db = new mysqli("localhost", "root", "", "discoteca");

                    $artistas = $db->query("SELECT id, nome FROM artista");

                    if($artistas->num_rows == 0) {
                        echo "<p>Nenhum artista encontrado</p>";
                        die;
                    }

                    echo '<h1>Cadastrar  <br> Disco</h1>
                            <form action="cadastrar.php" method="post" enctype="multipart/form-data">
                            <label for="Titulo" class="lbl">Título: </label>
                            <div class="divAlinhar">
                                <input class="input" type="text" id="titulo" name="titulo" required> 
                            </div>
                            <label for="Artista" class="lbl">Artista: </label>
                            <div class="divAlinhar">
                                <select size="3" class="input" name="artista" id="Artista" required>';

                    foreach($artistas as $artista) {
                        echo "<option value='{$artista['id']}'>{$artista['nome']}</option>";
                    }

                    echo 
                            '</select>
                            </div>
                            <label for="Ano" class="lbl">Ano:</label>
                            <div class="divAlinhar">
                                <input class="input" type="text" id="ano" name="ano" required> 
                            </div>
                            <label for="imagem" class="lbl">Imagem:</label>
                            <div class="divAlinhar">
                                <input class="input" type="file" accept="image/*" name="imagem"> 
                            </div>
                            <div class="alinharBtn">
                                <div id="divBotao">
                                    <input type="submit" value="Cadastrar" id="botao">
                                </div>
                            </div>
                        </form>';
                }
            ?>  
            <div id="divBtn">
                <a href="../../index.php">
                    <button id="BtnS"> ↩Voltar</button>
                </a>
            </div>
        </div>
    </div>  
</body>
</html>