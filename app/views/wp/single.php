
<div class="container pt-5">
  <div class="row">
    <div class="col">
      <figure class="figure d-flex flex-row justify-content-center" ><?php the_post_thumbnail( 'medium',['class'=>'figure-img img-fluid rounded'] ) ?></figure>
    </div>    
  </div>
</div>
<div class="container pt-4"><h1 class="h1 text-center" style="color:#<?=get_header_textcolor()?>" ><?php the_title() ?></h1></div>
<div class="container pt-4"><?php the_content();?></div>
