<?php
// debug
// print_r($data);
?>

<?php
if (count($data['musicas']) == 0) {
    ?>
    <h1>A música não existe na nossa base de dados...</h1>
<?php
} else {
    ?>

    <div>
        <?php
        echo "Nome: " . $data['musicas'][0]['nome'];
        ?>
    </div>

    <div>
        <?php
        echo "Álbum: " . $data['musicas'][0]['id_album'];
        ?>
    </div>

    <div>
        <?php
        echo "Produtor: " . $data['musicas'][0]['id_produtor'];
        ?>
    </div>
<?php
}
?>
<a href="<?php echo $url_alias; ?>/musica">Voltar</a>