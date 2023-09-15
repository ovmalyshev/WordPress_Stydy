<?php
function my_child_theme_credits() {
    echo 'Additional footer text';
}
add_action( 'unite_credits', 'my_child_theme_credits' );

function twentytwelve_content_nav( $html_id ) {
    if ( function_exists( 'wp_pagenavi' ) )
        wp_pagenavi();
}

function wpschool_insert_header() {
    echo 'Some text';
}

add_action( 'wp_head', 'wpschool_insert_header' );


function insertFootNote($content){
    if(!is_feed()&&!is_home()){
        $content.="<div class='subscribe'>";
        $content.="<h4>Enjoyed this article?</h4>";
        $content.="<p>Subscribe to our <a href='http://feeds2.feedburner.com/WpRecipes'>RSS feed</a> and never miss a recipe!</p>";
        $content.="</div>";
    }
    return $content;
}
add_filter ('the_content', 'insertFootNote');

function wp_add_description() { ?>
    <h1><?php echo get_the_ID(); ?></h1>
    <?php
    $terms = get_the_terms(get_the_ID(), 'country');

    if( $terms ): ?>



            <h1><?php print_r ($terms[0]->data); ?></h1>



    <?php endif;
}

add_action( 'add_description', 'wp_add_description' );
?>
