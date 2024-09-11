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
            if(isset($_GET) && !empty($_GET['id'])) {
                $db = new mysqli("localhost", "root", "", "discoteca");

                $artista = $db->query("SELECT id, nome FROM artista WHERE id = {$_GET['id']}");

                if($artista->num_rows==0) {
                    echo "<p>ERRO</p>
                    <a href='../listar/'><button id='botaoV'>↩ Voltar</button></a>";
                    die;
                }
                    
                $artista = $artista->fetch_array();
                
                echo "<h1>Editar  <br> Artista</h1>
                        <form action='editar.php' method='post'>
                            <label for='NomeArtista' id='lblArtista'>Nome do Artista: </label>
                            <input type='text' id='NomeArtista' name='nome' value='{$artista['nome']}' required>
                            <input type='hidden' name='id' value='{$artista['id']}' required>
                            <br>
                            <div id= 'btnAlinharC'>
                                <input type='submit' value='Confirmar!' id='botaoC'>
                            </div>
                        </form>
                        <div id= 'btnAlinharV'>
                            <a href='../listar/'><button id='botaoV'>↩ Voltar</button></a>
                        </div>";
            } else {
                echo "<p>ERRO</p>
                <a href='../listar/'><button id='botaoV'>↩ Voltar</button></a>";
            }
        ?>
        </div>
    </div>
</body>
</html>