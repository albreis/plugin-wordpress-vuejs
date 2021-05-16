<?php 
/**
 * Template utilizado para renderizar o VueJs no front e manter a compatibilidade com algumas funções do WordPress.
 * Por exemplo permitir carregar o conteúdo da tag <head> padrão do wordpress.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <style>html{margin-top:0!important;}</style>
    <script>window.baseurl = '<?php echo site_url(); ?>'</script>
    <?php wp_head(); ?>
    <style media="screen">
        html { margin-top: 0 !important; }
        * html body { margin-top: 0 !important; }
        @media screen and ( max-width: 782px ) {
            html { margin-top: 0 !important; }
            * html body { margin-top: 0 !important; }
        }
    </style>
</head>
<body>
    <div id="app"></div>
    <?php wp_footer(); ?>
</body>
</html>