<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $db = new mysqli("localhost", "root", "", "discoteca");

        $discos = $db->query("SELECT disco.titulo, emprestimo.dataEmprestimo, emprestimo.nome, emprestimo.email
                            FROM disco
                            JOIN emprestimo ON emprestimo.idDisco = disco.id");
        
        echo "<br><br>";

        if ($discos->num_rows == 0) {
            echo "Nenhum emprestimo cadastrado";
            die;
        }

        foreach($discos as $disco) {
            echo "Título: {$disco['titulo']} <br>
                    Data do emprestimo: {$disco['dataEmprestimo']} <br>
                    Nome: {$disco['nome']} <br>
                    E-mail: {$disco['email']}<br><br>";
        }
    ?>
    <a href="../../index.php">
        <button>Voltar</button>
    </a>
</body>
</html>