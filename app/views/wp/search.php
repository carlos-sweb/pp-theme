
<div class="container pt-4">
<h2>Resultados : <?=isset($_GET['s']) ? $_GET['s'] : ""?></h2>
</div>

<?php if( have_posts() ){
    while ( have_posts() ) : the_post(); ?>
    <div class="container pt-4">
        <div class="card" style="width: 18rem;">  
        <?php the_post_thumbnail( 'medium',['class'=>'card-img-top'] ) ?>
        <div class="card-body">
            <h5 class="card-title"><?=get_the_title()?></h5>
            <p class="card-text"><?=get_the_excerpt()?></p>
            <a href="<?=esc_attr(esc_url(get_permalink()));?>" class="btn btn-primary">Ver Más</a>    
        </div>
        </div>
    </div>
<?php endwhile;}?>

<?php the_posts_navigation() ?>

