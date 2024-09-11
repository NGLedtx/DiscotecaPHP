<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="devolver.php" method="post">
        <?php 
            $db = new mysqli("localhost", "root", "", "discoteca");

            $discos = $db->query("SELECT disco.id, titulo
                                    FROM disco
                                    JOIN emprestimo ON emprestimo.idDisco = disco.id");

            if($discos->num_rows == 0) {
                echo "Nenhum disco disponível";
                die;
            }

            echo "<select name='id'>";

            foreach($discos as $disco) {
                echo "<option value='{$disco['id']}'>{$disco['titulo']}</option>";
            }

            echo '<input type="date" name="dataDevolucao">
                    <input type="submit">
                    </select>';
        ?>
    </form>
</body>
</html>