<?php
// debug
// print_r($data);
?>

<?php
if (count($data['artists']) == 0) {
    ?>
    <h1>O artista não existe na nossa base de dados...</h1>
<?php
} else {
    ?>

    <div>
        <?php
        echo "Nome: " . $data['artists'][0]['nome'];
        ?>
    </div>

    <div>
        <?php
        echo "Nacionalidade: " . $data['artists'][0]['nacionalidade'];
        ?>
    </div>
<?php
}
?>
<a href="<?php echo $url_alias; ?>/artista">Voltar</a>