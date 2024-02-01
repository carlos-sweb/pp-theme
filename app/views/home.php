<!DOCTYPE html>
<html <?=language_attributes()?>>
<head>
    <meta charset="<?=bloginfo( 'charset' )?>">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach( $css_links  as $link ): ?>
    <link rel="stylesheet" href="<?=get_template_directory_uri().$link?>">
    <?php endforeach;?>
    <link rel="stylesheet" href="<?=get_stylesheet_uri()?>">
    <title><?=get_bloginfo("name")." - ".get_the_title()?></title>
    <?php wp_head();?>
</head>
<body <?php body_class();?> ><?php wp_body_open();?>
<nav class="navbar navbar-expand-lg shadow-sm" style="background-color:#CFD8DC;"  >
    <div class="container-fluid">
                <a class="navbar-brand" href="/"><?=get_bloginfo('title')?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">                    
                <?php
wp_nav_menu(array(
    'echo'=>true,
    'container'=>false,                
    'fallback_cb' => '__return_false',
    'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
    'depth' => 2,
    'walker'=>new bootstrap_5_wp_nav_menu_walker()                
))
?>
                    <form class="d-flex" role="search" action="/" >
                        <input class="form-control me-2" type="search" placeholder="Escribe aqui..." aria-label="Search" name="s" id="s" value="<?=isset($_GET["s"]) ? $_GET['s']:""?>" >
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>            
    </div>
</nav>





<?php 

function checkFileExists( $filename ){
    return file_exists( __DIR__.DIRECTORY_SEPARATOR."wp".DIRECTORY_SEPARATOR.$filename.".php" );
}

?>

<?php if( is_page() && checkFileExists("page") ){  include_once __DIR__.DIRECTORY_SEPARATOR."wp/page.php"; }?>
<?php if( is_category() && checkFileExists("category") ){  include_once __DIR__.DIRECTORY_SEPARATOR."wp/category.php"; }?>
<?php if( is_single() && checkFileExists("single")  ){  include_once __DIR__.DIRECTORY_SEPARATOR."wp/single.php"; }?>
<?php if( is_search() && checkFileExists("search") ){  include_once __DIR__.DIRECTORY_SEPARATOR."wp/search.php"; }?>
<?php if( is_404() &&  checkFileExists("404") ){  include_once __DIR__.DIRECTORY_SEPARATOR."wp/404.php"; }?>
<?php // if( is_archive() &&  checkFileExists("archive") ){  include_once __DIR__.DIRECTORY_SEPARATOR."wp/archive.php"; }?>
<?php if( is_tag() &&  checkFileExists("tag") ){  include_once __DIR__.DIRECTORY_SEPARATOR."wp/tag.php"; }?>
<?php if( is_author() &&  checkFileExists("author") ){  include_once __DIR__.DIRECTORY_SEPARATOR."wp/author.php"; }?>


<?php wp_footer() ?>
<script type="text/javascript" src="<?=get_template_directory_uri()?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>