<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Lista de Artistas</h1>
    </header>
    <main>
        <div class="divbtn">
            <div id="divbtnS">
                <a href="../../index.php"><button id="btnS"> ↩ Voltar à página inicial</button></a>
            </div>
        </div>
    </main>
        <?php 
            $db = new mysqli("localhost", "root", "", "discoteca");

            $artistas = $db->query("SELECT artista.id AS id, artista.nome AS artista
                                    FROM artista
                                    GROUP BY artista.id
                                    ORDER BY artista.nome");

            if($artistas->num_rows == 0) {
                echo "<p style='text-align: center;
                        color: white;
                        margin-top: 50px ;
                        font-family: 'Bebas Neue', sans-serif;'
                    >Nenhum artista encontrado</p>";
                die;
            }

            echo ' <div class="dados">';

            foreach($artistas as $artista) {
                $discos = $db->query("SELECT COUNT(disco.id) AS discos
                                        FROM disco
                                        WHERE disco.idArtista = {$artista['id']}")->fetch_array();

                echo "<div class='dado'>
                        <div class='dadosDisco'>
                            <div id='lblTitulo'>
                                <label id='res' for=''>{$artista['artista']} - {$discos['discos']} discos</label>
                            </div>
                        </div>
                        <div id='Alinharbtn'>
                            <div id='divbtnD'>
                                <a href='../excluir/excluir.php?id={$artista['id']}'><button id='btnD'>🗑️</button></a>
                            </div>
                            <div id='divbtnE'>
                                <a href='../editar/index.php?id={$artista['id']}'><button id='btnE'>✏️</button></a>
                            </div>
                        </div>
                    </div>";
            }

            echo '</div>';
        ?>
</body>
</html>