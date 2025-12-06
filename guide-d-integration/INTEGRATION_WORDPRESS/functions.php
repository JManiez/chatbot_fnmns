<?php
/**
 * Fonctions du thème enfant Astra pour FNMNS Occitanie
 * 
 * @package Astra_Child
 */

// Empêcher l'accès direct
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Charger les styles et scripts
 */
add_action( 'wp_enqueue_scripts', 'fnmns_child_enqueue_styles', 15 );
function fnmns_child_enqueue_styles() {
    // Charger le style du thème parent
    wp_enqueue_style( 'astra-parent-style', get_template_directory_uri() . '/style.css' );
    
    // Charger le style du thème enfant
    wp_enqueue_style( 'astra-child-style', get_stylesheet_directory_uri() . '/style.css', array('astra-parent-style'), wp_get_theme()->get('Version') );
    
    // Charger les styles de la landing page uniquement sur la page landing
    if ( is_page_template( 'page-landing-fnmns.php' ) ) {
        wp_enqueue_style( 
            'fnmns-landing-style', 
            get_stylesheet_directory_uri() . '/assets/css/landing-page.css', 
            array('astra-child-style'), 
            '1.0.0' 
        );
        
        // Charger les scripts de la landing page
        wp_enqueue_script( 
            'fnmns-landing-script', 
            get_stylesheet_directory_uri() . '/assets/js/landing-page.js', 
            array('jquery'), 
            '1.0.0', 
            true 
        );
    }
}

/**
 * Enregistrer les emplacements de menus
 */
add_action( 'after_setup_theme', 'fnmns_register_menus' );
function fnmns_register_menus() {
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'astra-child' ),
        'footer'   => __( 'Menu Footer', 'astra-child' ),
    ) );
}

/**
 * Ajouter des options personnalisées
 */
add_action( 'admin_init', 'fnmns_register_settings' );
function fnmns_register_settings() {
    register_setting( 'fnmns_options', 'fnmns_phone', 'sanitize_text_field' );
    register_setting( 'fnmns_options', 'fnmns_email', 'sanitize_email' );
    register_setting( 'fnmns_options', 'fnmns_footer_text', 'sanitize_textarea_field' );
}

/**
 * Ajouter une page d'options dans l'admin
 */
add_action( 'admin_menu', 'fnmns_add_admin_menu' );
function fnmns_add_admin_menu() {
    add_options_page(
        'Options FNMNS',
        'FNMNS Options',
        'manage_options',
        'fnmns-options',
        'fnmns_options_page'
    );
}

function fnmns_options_page() {
    ?>
    <div class="wrap">
        <h1>Options FNMNS Occitanie</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'fnmns_options' ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="fnmns_phone">Téléphone</label></th>
                    <td><input type="text" id="fnmns_phone" name="fnmns_phone" value="<?php echo esc_attr( get_option( 'fnmns_phone', '06 12 34 56 78' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="fnmns_email">Email</label></th>
                    <td><input type="email" id="fnmns_email" name="fnmns_email" value="<?php echo esc_attr( get_option( 'fnmns_email', get_option( 'admin_email' ) ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="fnmns_footer_text">Texte Footer</label></th>
                    <td><textarea id="fnmns_footer_text" name="fnmns_footer_text" rows="5" class="large-text"><?php echo esc_textarea( get_option( 'fnmns_footer_text', 'La FNMNS Occitanie est un organisme de formation certifié Qualiopi spécialisé dans les métiers du sauvetage, du secourisme et de la natation professionnelle en région Occitanie.' ) ); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * Ajouter des champs personnalisés pour la page landing
 */
add_action( 'add_meta_boxes', 'fnmns_add_landing_meta_boxes' );
function fnmns_add_landing_meta_boxes() {
    add_meta_box(
        'fnmns_landing_hero',
        'Paramètres Hero',
        'fnmns_landing_hero_callback',
        'page',
        'normal',
        'high'
    );
}

function fnmns_landing_hero_callback( $post ) {
    wp_nonce_field( 'fnmns_landing_meta_box', 'fnmns_landing_meta_box_nonce' );
    
    $hero_title = get_post_meta( $post->ID, '_fnmns_hero_title', true );
    $hero_subtitle = get_post_meta( $post->ID, '_fnmns_hero_subtitle', true );
    $hero_image = get_post_meta( $post->ID, '_fnmns_hero_image', true );
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="fnmns_hero_title">Titre Hero</label></th>
            <td><input type="text" id="fnmns_hero_title" name="fnmns_hero_title" value="<?php echo esc_attr( $hero_title ); ?>" class="large-text" /></td>
        </tr>
        <tr>
            <th><label for="fnmns_hero_subtitle">Sous-titre Hero</label></th>
            <td><textarea id="fnmns_hero_subtitle" name="fnmns_hero_subtitle" rows="3" class="large-text"><?php echo esc_textarea( $hero_subtitle ); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="fnmns_hero_image">Image Hero (URL)</label></th>
            <td>
                <input type="url" id="fnmns_hero_image" name="fnmns_hero_image" value="<?php echo esc_url( $hero_image ); ?>" class="large-text" />
                <button type="button" class="button" id="fnmns_hero_image_button">Sélectionner une image</button>
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'save_post', 'fnmns_save_landing_meta' );
function fnmns_save_landing_meta( $post_id ) {
    if ( ! isset( $_POST['fnmns_landing_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['fnmns_landing_meta_box_nonce'], 'fnmns_landing_meta_box' ) ) {
        return;
    }
    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    if ( isset( $_POST['fnmns_hero_title'] ) ) {
        update_post_meta( $post_id, '_fnmns_hero_title', sanitize_text_field( $_POST['fnmns_hero_title'] ) );
    }
    
    if ( isset( $_POST['fnmns_hero_subtitle'] ) ) {
        update_post_meta( $post_id, '_fnmns_hero_subtitle', sanitize_textarea_field( $_POST['fnmns_hero_subtitle'] ) );
    }
    
    if ( isset( $_POST['fnmns_hero_image'] ) ) {
        update_post_meta( $post_id, '_fnmns_hero_image', esc_url_raw( $_POST['fnmns_hero_image'] ) );
    }
}

/**
 * Désactiver le header/footer Astra sur la page landing
 */
add_filter( 'astra_get_header_layout', 'fnmns_disable_astra_header' );
function fnmns_disable_astra_header( $layout ) {
    if ( is_page_template( 'page-landing-fnmns.php' ) ) {
        return 'disabled';
    }
    return $layout;
}

add_filter( 'astra_get_footer_layout', 'fnmns_disable_astra_footer' );
function fnmns_disable_astra_footer( $layout ) {
    if ( is_page_template( 'page-landing-fnmns.php' ) ) {
        return 'disabled';
    }
    return $layout;
}

