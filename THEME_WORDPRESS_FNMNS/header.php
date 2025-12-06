<?php
/**
 * Header template
 *
 * @package FNMNS_Occitanie
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'fnmns-landing' ); ?>>
<?php wp_body_open(); ?>

<div id="fnmns-landing" class="fnmns-landing" lang="fr">
	
	<!-- Skip link pour l'accessibilité -->
	<a href="#formations" class="skip-link">Aller au contenu principal</a>

	<!-- ==================== HEADER STICKY ==================== -->
	<header class="header" role="banner">
		<div class="header__container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__logo" aria-label="FNMNS Occitanie - Retour à l'accueil">
				<img src="https://fnmns-occitanie.com/wp-content/uploads/2019/12/cropped-cropped-cropped-bandeau-site-png.png" alt="FNMNS Occitanie - Logo organisme de formation maîtres-nageurs Occitanie" loading="eager">
			</a>
			<nav class="header__nav" role="navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'header__nav-links',
					'container'      => false,
					'fallback_cb'    => 'fnmns_default_menu',
				) );
				?>
			</nav>
			<div class="header__cta">
				<a href="tel:+33612345678" class="header__phone" aria-label="Appeler la FNMNS Occitanie">
					<svg class="header__phone-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
					</svg>
					<span>06 12 34 56 78</span>
				</a>
				<a href="#contact" class="btn btn--primary" style="padding: 10px 20px; font-size: 14px;">
					Contact
				</a>
			</div>
		</div>
	</header>

<?php
/**
 * Menu par défaut si aucun menu n'est configuré
 */
function fnmns_default_menu() {
	?>
	<ul class="header__nav-links">
		<li class="header__nav-item header__nav-item--dropdown">
			<a href="#formations" class="header__nav-link header__nav-link--dropdown">
				Formations
				<svg class="header__dropdown-icon" width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
				</svg>
			</a>
			<ul class="header__dropdown-menu" role="menu">
				<li role="none"><a href="https://fnmns-occitanie.com/bpjeps-aan/" class="header__dropdown-link" role="menuitem">BPJEPS AAN</a></li>
				<li role="none"><a href="https://fnmns-occitanie.com/bnssa/" class="header__dropdown-link" role="menuitem">BNSSA</a></li>
				<li role="none"><a href="https://fnmns-occitanie.com/caep/" class="header__dropdown-link" role="menuitem">CAEP MNS</a></li>
			</ul>
		</li>
		<li><a href="#pourquoi-nous" class="header__nav-link">Pourquoi Nous</a></li>
		<li><a href="#adhesion" class="header__nav-link">Adhésion</a></li>
		<li><a href="#contact" class="header__nav-link">Contact</a></li>
	</ul>
	<?php
}
?>

