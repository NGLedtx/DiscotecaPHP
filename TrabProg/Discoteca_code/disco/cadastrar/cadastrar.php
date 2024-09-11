<?php
    if(isset($_POST) && $_POST['titulo'] != null && $_POST['artista'] != null &&
        $_POST['ano'] != null && $_POST['ano'] <= date('Y') && $_FILES['imagem']['error'] == 0) {

        $db = new mysqli("localhost", "root", "", "discoteca");

        $artista = $db->query("SELECT id FROM artista WHERE id = {$_POST['artista']}");

        if($artista->num_rows == 0) {
            header("location:index.php?erro=true");
            die;
        }
            
        $uploads = "../../uploads/";

        $extensão = strtolower(pathinfo($_FILES['imagem']['name'],PATHINFO_EXTENSION));
        $nomeArquivo = uniqid() . "." . $extensão;
        $destinoArquivo = $uploads . $nomeArquivo;

        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $destinoArquivo)) {
            $db->query("INSERT INTO disco (titulo, idArtista, ano, imagem) VALUES ('{$_POST['titulo']}', 
            {$_POST['artista']}, {$_POST['ano']}, '{$nomeArquivo}')");
            header("location:index.php");
        }
    } else {
        header("location:index.php?erro=true");
    }
?>