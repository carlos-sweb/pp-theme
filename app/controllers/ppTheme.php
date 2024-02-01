<?php

use Nette\Utils\Strings;
use Nette\Utils\Html;

class ppTheme{
    
    private $filesystem;
    
    private $css_links = array(
        "/node_modules/bootstrap/dist/css/bootstrap.min.css",
        "/node_modules/@fontsource/jetbrains-mono/100.css",
        "/node_modules/@fontsource/jetbrains-mono/200.css",
        "/node_modules/@fontsource/jetbrains-mono/300.css",
        "/node_modules/@fontsource/jetbrains-mono/400.css",
        "/node_modules/@fontsource/jetbrains-mono/500.css",
        "/node_modules/@fontsource/jetbrains-mono/600.css",
        "/node_modules/@fontsource/jetbrains-mono/700.css",
        "/node_modules/@fontsource/jetbrains-mono/800.css",
        "/node_modules/animate.css/animate.min.css"
    );

    function __construct(){        
        $f3 = Base::instance();        
        $f3->set("css_links",$this->css_links);
        $path = $f3->get("SERVER.DOCUMENT_ROOT").DIRECTORY_SEPARATOR.$f3->get("UI");
        $adapter = new League\Flysystem\Local\LocalFilesystemAdapter($path);
        $this->filesystem = new League\Flysystem\Filesystem($adapter);        
        add_action('wp_footer',array($this,'wp_footer'));
        add_action('wp_head', array($this,'wp_head') );        
   
    }

    public function render($filename){
        $f3 = \Base::instance();
        $view = \View::instance()->render($filename);
        $minify = $f3->exists("MINIFY") ? $f3->get("MINIFY") : false ;
        echo !is_user_logged_in() && $minify ? $this->minify($view):$view;        
    }

    public function minify($html) {
        // Eliminar espacios en blanco y saltos de línea entre las etiquetas
        $html = preg_replace('/\s+/', ' ', $html);    
        // Eliminar espacios en blanco antes y después de las etiquetas
        $html = preg_replace('/\s*<\s*/', '<', $html);
        $html = preg_replace('/\s*>\s*/', '>', $html);    
        return $html;
    } 
     
    function wp_head(){
        $filename = "wp/wp_head.php";
        try{            
            if( $this->filesystem->fileExists($filename) ){                
                $this->render($filename);
            }
        }catch( FilesystemException | UnableToCheckExistence $exception ){
            // If Error create log
        }
    }
    function wp_footer($pass){                
        $filename = "wp/wp_footer.php";
        try{            
            if( $this->filesystem->fileExists($filename) ){
                $this->render($filename);
            }
        }catch( FilesystemException | UnableToCheckExistence $exception ){
            // If Error create log
        }
    }

    function home(){        
        $filename = "home.php";
        try{
            if( $this->filesystem->fileExists($filename) ){
                $this->render($filename);
            }
        }catch( FilesystemException | UnableToCheckExistence $exception ){

        }                                                             
    }
}