<?php 
    if(isset($_GET) && !empty($_GET['id'])) {
        $db = new mysqli("localhost", "root", "", "discoteca");

        $contem_emprestimo = $db->query("SELECT emprestimo.id
                                            FROM emprestimo
                                            JOIN disco ON disco.id = emprestimo.idDisco
                                            WHERE disco.idArtista = {$_GET['id']}");

        if($contem_emprestimo->num_rows != 0) {
            header("location:erro.php");
            die;
        }

        $discos = $db->query("SELECT id, imagem FROM disco WHERE idArtista = {$_GET['id']}");

        if($discos->num_rows != 0) {
            foreach($discos as $disco) {
                unlink("../../uploads/{$disco['imagem']}");
            }
        }

        $db->query("DELETE FROM disco WHERE idArtista = {$_GET['id']}");
        $db->query("DELETE FROM artista WHERE id = {$_GET['id']}");

        header("location:../listar/");
    } else {
        header("location:erro.php");
    }
?>