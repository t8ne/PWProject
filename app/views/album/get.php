<?php
// debug
// print_r($data);
?>

<?php
if (count($data['albums']) == 0) {
    ?>
    <h1>O álbum não existe na nossa base de dados...</h1>
<?php
} else {
    ?>

    <div>
        <?php
        echo "Nome: " . $data['albums'][0]['nome'];
        ?>
    </div>

    <div>
        <?php
        echo "Data: " . $data['albums'][0]['data'];
        ?>
    </div>
<?php
}
?>
<a href="<?php echo $url_alias; ?>/album">Voltar</a>