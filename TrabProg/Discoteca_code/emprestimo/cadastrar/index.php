<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div id="emprestimo">
            <form action="cadastrar.php" method="post">
                <?php 
                    $db = new mysqli("localhost", "root", "", "discoteca");

                    $discos = $db->query("SELECT id, titulo
                                            FROM disco
                                            WHERE id NOT IN (SELECT idDisco FROM emprestimo)");

                    if($discos->num_rows == 0) {
                        echo "<p>Nenhum disco disponível</p>";
                        die;
                    }

                    echo '<h1>Empréstimo de <br> Discos</h1>
                            <div id="divDestinatario">
                                <label for="nomeE">Nome do Destinatário: </label>
                                <input type="text" name="nome" id="nomeE" required>
                            </div>
                            <div id="divEmail">
                                <label for="emailE">Email do Destinatário: </label>
                                <input type="email" name="email" id="emailE" required>
                            </div>
                            <div id="divData">
                                <label for="dataE">Data do Empréstimo: </label>
                                <input type="date" name="dataEmprestimo" id="dataE" required>
                            </div>
                            <div id="divAlinhar">
                                <div id = "lblbtn">
                                 <label for="discoE"> Discos Disponíveis: </label>
                                </div>
                                <select name="idDisco" id="discoE">';
                           

                    foreach($discos as $disco) {
                        echo "<option value='{$disco['id']}'>{$disco['titulo']}</option>";
                    }

                    echo '</select>
                            </div>
                            <div id="divBtn">
                                <input type="submit" id="btnE"></input>
                            </div>';
                ?>
            </form>
            <div id="btnV">
            <a href='../../index.php' id="divBtnSair">
                <button id="btnS">↩ Voltar</button>
            </a>
            </div>
        </div>
    </div>
</body>
</html>