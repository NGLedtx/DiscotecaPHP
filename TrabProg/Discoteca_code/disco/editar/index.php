<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_GET) && !empty($_GET['id'])) {
            $db = new mysqli("localhost", "root", "", "discoteca");

            $resultado = $db->query("SELECT disco.id, disco.titulo, disco.ano, disco.imagem, disco.idArtista, artista.nome AS artista
                                    FROM disco
                                    JOIN artista ON artista.id = disco.idArtista
                                    WHERE disco.id = {$_GET['id']}");

            if($resultado->num_rows==0) {
                echo "Nenhum disco com esse ID";
                die;
            }

            $artistas = $db->query("SELECT artista.id, nome FROM artista 
                                    JOIN disco ON disco.idArtista = artista.id
                                    WHERE disco.id = {$_GET['id']}
                                    UNION
                                    SELECT artista.id, nome FROM artista");

            $disco = $resultado->fetch_array();

            echo "<form action='editar.php' method='post' enctype='multipart/form-data'>
                <img src='../../uploads/{$disco['imagem']}'> <br>
                <input type='text' name='titulo' value='{$disco['titulo']}'>
                <input type='number' name='ano' value='{$disco['ano']}'>
                <input type='file' accept='image/*' name='imagem'>
                <select name='artista'>";

            foreach($artistas as $artista) {
                echo "<option value='{$artista['id']}'>{$artista['nome']}</option>";
            }
                    
            echo "<input type='submit' value='Submit'>
            <input type='hidden' name='id' value='{$disco['id']}'>
            </select>
            </form>";
            
        } else {
            echo "ERRO";
        }
    ?>
</body>
</html>