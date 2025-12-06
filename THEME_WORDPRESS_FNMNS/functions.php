<?php
/**
 * Functions and definitions pour le thème FNMNS Occitanie
 *
 * @package FNMNS_Occitanie
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Empêcher l'accès direct
}

/**
 * Configuration du thème
 */
function fnmns_theme_setup() {
	// Support des traductions
	load_theme_textdomain( 'fnmns-occitanie', get_template_directory() . '/languages' );

	// Support des images à la une
	add_theme_support( 'post-thumbnails' );

	// Support du titre automatique
	add_theme_support( 'title-tag' );

	// Support HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Support des menus
	register_nav_menus( array(
		'primary' => __( 'Menu Principal', 'fnmns-occitanie' ),
	) );
}
add_action( 'after_setup_theme', 'fnmns_theme_setup' );

/**
 * Enqueue scripts and styles
 */
function fnmns_enqueue_scripts() {
	// Styles
	wp_enqueue_style( 
		'fnmns-style', 
		get_stylesheet_uri(), 
		array(), 
		'1.0.0' 
	);
	
	wp_enqueue_style( 
		'fnmns-main-style', 
		get_template_directory_uri() . '/assets/css/style.css', 
		array(), 
		'1.0.0' 
	);

	// Scripts
	wp_enqueue_script( 
		'fnmns-main-js', 
		get_template_directory_uri() . '/assets/js/main.js', 
		array(), 
		'1.0.0', 
		true 
	);
}
add_action( 'wp_enqueue_scripts', 'fnmns_enqueue_scripts' );

/**
 * Ajouter les métadonnées SEO dans le head
 */
function fnmns_add_seo_meta() {
	if ( is_page_template( 'page-landing.php' ) || is_front_page() ) {
		?>
		<!-- Schema.org JSON-LD pour le SEO -->
		<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "EducationalOrganization",
			"name": "FNMNS Occitanie",
			"alternateName": "FNMNS Occitanie Méditerranée",
			"description": "FNMNS Occitanie est un organisme de formation certifié Qualiopi spécialisé dans les métiers du sauvetage, du secourisme et de la natation professionnelle en Occitanie",
			"url": "https://fnmns-occitanie.com",
			"logo": "https://fnmns-occitanie.com/wp-content/uploads/2019/12/cropped-cropped-cropped-bandeau-site-png.png",
			"address": {
				"@type": "PostalAddress",
				"addressRegion": "Occitanie",
				"addressCountry": "FR"
			},
			"hasCredential": {
				"@type": "EducationalOccupationalCredential",
				"credentialCategory": "Qualiopi"
			},
			"keywords": "fnmns occitanie, formation maître-nageur occitanie, sauvetage aquatique occitanie",
			"areaServed": {
				"@type": "State",
				"name": "Occitanie"
			}
		}
		</script>
		<?php
	}
}
add_action( 'wp_head', 'fnmns_add_seo_meta' );

