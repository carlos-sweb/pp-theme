<?php

class ppTheme{
 
    function home($f3){
       
         if( function_exists("wp_nav_menu") ){
             
            $my_nav = wp_nav_menu(array(
                "echo"=>false,
                "container"=>false,                
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker'=>new bootstrap_5_wp_nav_menu_walker()                
            ));

         }
        
         $f3->set("nav",$my_nav);


         $f3->set("the_content",function(){
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            else :
                _e( 'Sorry, no posts were found.', 'textdomain' );
            endif;
         });

        echo \Template::instance()->render("home.htm","text/html");
    }
}