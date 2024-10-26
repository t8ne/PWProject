<?php
// debug
// print_r($data);
?>

<?php
if (count($data['producers']) == 0) {
    ?>
    <h1>O produtor não existe na nossa base de dados...</h1>
<?php
} else {
    ?>

    <div>
        <?php
        echo "Nome: " . $data['producers'][0]['nome'];
        ?>
    </div>

    <div>
        <?php
        echo "Nacionalidade: " . $data['producers'][0]['nacionalidade'];
        ?>
    </div>
<?php
}
?>
<a href="<?php echo $url_alias; ?>/produtor">Voltar</a>