<?php
// debug
// print_r($data);
?>

<?php
if (count($data['generos']) == 0) {
    ?>
    <h1>O género não existe na nossa base de dados...</h1>
<?php
} else {
    ?>

    <div>
        <?php
        echo "Nome: " . $data['generos'][0]['nome'];
        ?>
    </div>

    <div>
        <?php
        echo "Álbum: " . $data['generos'][0]['id_album'];
        ?>
    </div>
<?php
}
?>
<a href="<?php echo $url_alias; ?>/genero">Voltar</a>