<?php 
    if(isset($_POST) && $_POST['titulo'] != null && $_POST['ano'] != null &&
        $_POST['artista'] != null && $_POST['id'] != null && $_FILES['imagem']['error'] == 0) {
            
            $db = new mysqli("localhost", "root", "", "discoteca");

        $extensão = strtolower(pathinfo($_FILES['imagem']['name'],PATHINFO_EXTENSION));
        $nomeArquivo = uniqid() . "." . $extensão;
        $destinoArquivo = "../../uploads/" . $nomeArquivo;

        $imagemAntiga = $db->query("SELECT imagem FROM disco WHERE id = {$_POST['id']}");

        if($imagemAntiga->num_rows == 0 ) {
            header("location:index.php?erro=true");
            die;
        }

        $imagemAntiga = $imagemAntiga->fetch_array()['imagem'];

        unlink("../../uploads/" . $imagemAntiga);

        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $destinoArquivo)) {
            $db->query("UPDATE disco SET titulo = '{$_POST['titulo']}',
                        ano = {$_POST['ano']}, idArtista = {$_POST['artista']}, 
                        imagem = '{$nomeArquivo}' WHERE id = {$_POST['id']}");

            header("location:index.php?id={$_POST['id']}"); 
        }
    } else {
        header("location:index.php?erro=true");
    }
?>