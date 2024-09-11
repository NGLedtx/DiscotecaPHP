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
        <h1>Lista de Discos</h1>
    </header>
    <main>
        <div class="divbtn">
            <a href='../../index.php' id="divbtnS">
                <button id="btnS">↩ Voltar à página inicial</button>
            </a>
        </div>
        <div class="divFiltro">
            <div class="divSearch">
                <form action="search.php" method="get">
                    <input type="text" name="search" id="search">
                    <input type="submit" value="🔍" id="pesquisar">
                </form>
            </div>
            <div class="divButtons">
                <label for="" id="lblFiltro">Ordenar por:</label>
                <div id="filtro">
                    <a href="index.php?listar=artista">
                        <button id="btn1">Artista</button>
                    </a>
                    <a href="index.php?listar=ano">
                        <button id="btn2">Ano</button>
                    </a>
                    <a href="index.php?listar=titulo">
                        <button id="btn3">Título</button>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <?php 
        $db = new mysqli("localhost", "root", "", "discoteca");

        $filtros = array("artista", "ano", "titulo");
        $discos = 0;

        if(isset($_GET) && !empty($_GET['listar'])) {
            if(in_array($_GET['listar'], $filtros)){
                $discos = $db->query("SELECT disco.id, disco.titulo, disco.ano, imagem, artista.nome AS artista
                FROM disco
                JOIN artista ON artista.id = disco.idArtista
                ORDER BY {$_GET['listar']}");
            } else {
                $discos = $db->query("SELECT disco.id, disco.titulo, disco.ano, imagem, artista.nome AS artista
                FROM disco
                JOIN artista ON artista.id = disco.idArtista
                WHERE disco.titulo LIKE '%{$_GET['listar']}%'
                ORDER BY disco.titulo");
            }
        } else {
            $discos = $db->query("SELECT disco.id, disco.titulo, disco.ano, imagem, artista.nome AS artista
            FROM disco
            JOIN artista ON artista.id = disco.idArtista");
        }

        if($discos->num_rows == 0) {
            echo "<p>Nenhum disco encontrado</p>";
            die;
        }
        echo '<div class= "dados">';
        foreach($discos as $disco) {
            echo "<div class='dado'>
                    <div id='imagem'>
                        <img id='imagemDados' src='../../uploads/{$disco['imagem']}' alt=''>
                    </div>
                    <div class='dadosDisco'>
                        <div id='lblArtista'>
                            <label for=''>Título:</label> <label id='res' for=''>{$disco['titulo']}</label>
                        </div>
                        <div id='lblTitulo'>
                            <label for=''>Artista: </label> <label id='res' for=''>{$disco['artista']}</label>
                        </div>
                        <div id='lblAno'>
                            <label for=''>Ano: </label> <label id='res' for=''>{$disco['ano']}</label>
                        </div>
                    </div>
                    <div id='Alinharbtn'>
                        <a href='../excluir/excluir.php?id={$disco['id']}' id='divbtnD'>
                            <button id='btnD'>🗑️</button>
                        </a>
                        <a href='../editar/index.php?id={$disco['id']}' id='divbtnE'>
                            <button id='btnE'>✏️</button>
                        </a>
                    </div>
                </div>";
        }
        echo'</div>';
    ?>
</body>
</html>