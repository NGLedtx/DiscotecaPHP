<?php 
    if(isset($_POST) && $_POST['nome'] != null) {
        $db = new mysqli("localhost", "root", "", "discoteca");

        $artistas = $db->query("SELECT nome FROM artista");

        foreach($artistas as $artista) {
            if($artista['nome'] == $_POST['nome']) {
                header("location:index.php?erro=true");
                die;
            }
        }

        $db->query("INSERT INTO artista (nome) VALUES ('{$_POST['nome']}')");
        header("location:index.php");
    }
?>