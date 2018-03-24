<?php
/**
 * Core admin functionality here
 * Credits Link
 */

// Add Quicktags
function JHQuickTags() {

    if ( wp_script_is( 'quicktags' ) ) {
        ?>
        <script type="text/javascript">
            QTags.addButton( 'JHh1', 'H1', '<div class="h1">', '</div>', '', 'H1 Custom', 21 );
            QTags.addButton( 'JHh2', 'H2', '<div class="h2">', '</div>', '', 'H2 Custom', 21 );
            QTags.addButton( 'JHh3', 'H3', '<div class="h3">', '</div>', '', 'H3 Custom', 21 );
            QTags.addButton( 'JHh4', 'H4', '<div class="h4">', '</div>', '', 'H4 Custom', 21 );
            QTags.addButton( 'JHh5', 'H5', '<div class="h5">', '</div>', '', 'H5 Custom', 21 );
        </script>
        <?php
    }

}

function JHCredits() {
    $creditsText = '<a href="http://julianhook.com/" target="_blank">'.__('Development by Julian Hook', 'jhfw').'</a>';
    echo $creditsText;
}

function JH_add_editor_styles() {
    add_editor_style( 'css/jhfw-editor-style.css' );
}

function add_property_attribute($link, $handle) {
    $link = str_replace( '/>', 'property />', $link );
    return $link;
}


add_filter( 'style_loader_tag', 'add_property_attribute', 10, 2 );
add_action( 'admin_print_footer_scripts', 'JHQuickTags' );
add_action( 'admin_init', 'JH_add_editor_styles' );