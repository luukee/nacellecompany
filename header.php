<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/safari-pinned-tab.svg" color="#4a90e2">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">

	<!-- font awesome kit -->
	<script src="https://kit.fontawesome.com/5dd607493a.js"></script>

	<meta name="google-site-verification" content="TVz0X0JqzKCcIcb6ksAseGCiw8NK5nRGLlYtxhM0VTQ" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157434723-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-157434723-1');
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
	<?php get_template_part('template-parts/mobile-off-canvas'); ?>
	<?php endif; ?>

	<?php get_template_part('template-parts/search-off-canvas'); ?>


	<header class="site-header cell shrink medium-cell-block-container" role="banner">
		<div class="site-title-bar title-bar mobile-nav" <?php Nacelle_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left grid-x align-middle">
				<button aria-label="<?php _e('Main Menu', 'nacelle'); ?>" class="menu-icon" type="button" data-toggle="<?php Nacelle_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
					<?php if (function_exists('the_custom_logo')) {
						the_custom_logo();
					} ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">

						<svg width="65" height="64" xmlns="http://www.w3.org/2000/svg">
							<g fill-rule="evenodd">
								<path class="svg-icon" d="M4.85004996 54.54171124l-3.44398004-8.19934013H0V63.1161991h2.32226969V55.196872l3.40256337 7.9193271h1.44748659V46.34237111H4.85004996zM15.0134722 57.7298137h-1.8833048l.9691179-5.40964039.9141869 5.40964039zm-2.1265558-11.38744259L9.78924709 63.1161991h2.46433441l.5113943-3.173884h2.610222l.4900731 3.173884h2.5501444l-3.0540816-16.77382799h-2.4744173zM26.4929064 46.30338157h-4.1356352c-.8162271 0-1.4803622.69318331-1.4803622 1.54505606V61.523832c0 .8807158.6640295 1.5450561 1.5445788 1.5450561h4.0714186c.8438994 0 1.4803622-.6643403 1.4803622-1.5450561v-4.5461035h-2.4894504v3.9226506h-2.11767V48.47178493h2.11767v3.02238915h2.4894504v-3.64573645c0-.86624143-.6502989-1.54505606-1.4803622-1.54505606M33.4377444 55.5880761h2.9784685v-2.18995639h-2.9784685v-4.9262397h3.171224V46.303371h-5.6603576v16.7655065h5.7247855v-2.168509h-3.2356519zM42.0093226 46.30338157h-2.4893448V63.0688881h6.1319484v-2.168509h-3.6426036zM50.4949794 46.30338157h-2.489028V63.0688881h6.1318429v-2.168509h-3.6428149zM58.9808369 60.9003896v-5.31229237h2.9785741v-2.18995639h-2.9785741v-4.92634535h3.1713296v-2.16840336h-5.6603576V63.068793h5.7247855v-2.1684034z" />
								<g>
									<path class="svg-icon" d="M44.5471156 21.3280565c0-7.38979-6.0119321-13.40172201-13.4016488-13.40172201-7.3897168 0-13.40172203 6.01193201-13.40172203 13.40172201 0 7.38979 6.01200523 13.4016488 13.40172203 13.4016488 7.3897167 0 13.4016488-6.0118588 13.4016488-13.4016488" />
									<path class="svg-icon" d="M32.4235201.03869404v5.34152412c8.2393691.66451613 14.7402602 7.56296934 14.7402602 15.94780174 0 8.3848323-6.5008911 15.2832124-14.7402602 15.9478749v5.3414509c11.1885954-.6749815 20.0842696-9.9648878 20.0842696-21.2893258 0-11.3243649-8.8956742-20.61427115-20.0842696-21.28932586M29.8673403 42.6173457v-5.3414509c-8.2393993-.6645893-14.74031413-7.5630426-14.74031413-15.9478017 0-8.3849056 6.50091483-15.28328562 14.74031413-15.94787494V.03869404C18.67877734.71374875 9.78307061 10.003655 9.78307061 21.3280931c0 11.3243648 8.89570673 20.6142711 20.08426969 21.2892526" />
								</g>
								<path class="svg-icon" d="M63.68749 48.0253687h-.1819691v-1.287968h.682518c.1294431 0 .1853924.0804512.1853924.1784476v.4304995c0 .1226025-.0979916.181978-.1853924.181978h-.0945683l.3289565.4970429h-.2099973l-.4303714-.6369766.0243909-.0280296h.3780593v-.4549985H63.68749v1.1200047zm-.6999554-.6263853c0 .6088401.360515.9343893.9205435.9343893.5667681 0 .9203296-.3604257.9203296-.9343893 0-.5600559-.346394-.9346032-.9203296-.9346032-.5811031 0-.9205435.3674865-.9205435.9346032zm.9169063-1.0956126c.6649737 0 1.0955591.4445142 1.0955591 1.0956126 0 .6647922-.4305854 1.0953986-1.0955591 1.0953986-.6648667 0-1.0954521-.4165917-1.0954521-1.0953986 0-.672067.4444925-1.0956126 1.0954521-1.0956126z" />
							</g>
						</svg>

					</a>

				</span>
			</div>
		</div>

		<nav class="site-navigation top-bar desktop-menu" role="navigation">

			<div class="nav-container">

				<!-- custom logo -->
				<div class="site-desktop-title top-bar-title">

					<?php if (function_exists('the_custom_logo')) {
						the_custom_logo();
					} ?>

					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<svg width="65" height="100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<defs>
								<path class="svg-icon" id="a" d="M.02305024.0331637H7.1012026v16.7172415H.02305024z" />
								<path class="svg-icon" id="c" d="M.06080713.03315316h5.71009725V16.7504052H.06080713z" />
								<path class="svg-icon" id="e" d="M.07695705.0331637h6.11621556v16.7172415H.07695705z" />
								<path class="svg-icon" id="g" d="M.00793274.0331637h6.11611021v16.7172415H.00793274z" />
								<path class="svg-icon" id="i" d="M.06806564.03241572h2.15763128V2.1899522H.06806564z" />
							</defs>
							<g fill-rule="evenodd">
								<path class="svg-icon" d="M4.87304052 83.1657301v8.1716694l-3.46027553-8.1716694H.00004214v16.7172205h2.3332577v-7.892496l3.41866288 7.892496h1.4543355V83.1657301zM12.8567261 83.1657301L9.7497893 99.8829506h2.4716856l.513047-3.1630876h2.6181199l.4914506 3.1630876h2.5577552l-3.0633225-16.7172205h-2.481799zm1.2160373 5.9575608l.916953 5.3914182h-1.8888979l.9719449-5.3914182z" />
								<g transform="translate(20.858995 83.132577)">
									<path class="svg-icon" d="M5.62463857.0331637H1.49961426c-.8141329 0-1.47656402.69119124-1.47656402 1.54061588V15.2098736c0 .8781847.66232577 1.5406159 1.54061589 1.5406159h4.06097244c.8417342 0 1.47656402-.6624312 1.47656402-1.5406159v-4.5330389H4.61813938v3.9113776H2.50590276V2.19533549h2.11223662V5.2090389h2.48306321V1.57377958c0-.86375203-.64863047-1.54061588-1.47656402-1.54061588" fill="#FFF" mask="url(#b)" />
								</g>
								<g transform="translate(30.867098 83.132577)">

									<path class="svg-icon" mask="url(#d)" d="M2.54355429 9.29117585h2.97082659V7.10751297H2.54355429V2.19543031h3.16308753V.03315316H.06080713V16.7504789h5.71009725v-2.1622771H2.54355429z" />
								</g>
								<g transform="translate(39.400324 83.132577)">

									<path class="svg-icon" mask="url(#f)" d="M2.55991491.0331637H.07695705v16.7173258h6.11621556v-2.1622772h-3.6332577z" />
								</g>
								<g transform="translate(47.933549 83.132577)">

									<path class="svg-icon" mask="url(#h)" d="M2.49057455.0331637H.00793274v16.7173258h6.11611021v-2.1622772h-3.6334684z" />
								</g>
								<path class="svg-icon" d="M58.8882087 97.7208v-5.2970259h2.9709319v-2.1836629h-2.9709319v-4.912188h3.1631929v-2.1621718h-5.6458347v16.7172204h5.7100972V97.7208zM50.3440798 30.7511841c0-10.634611-8.6517423-19.2863533-19.2862479-19.2863533-10.6345057 0-19.2863534 8.6517423-19.2863534 19.2863533 0 10.6346111 8.6518477 19.286248 19.2863534 19.286248 10.6345056 0 19.2862479-8.6516369 19.2862479-19.286248" />
								<path class="svg-icon" d="M32.931233.10536971V7.7944378C44.7589153 8.75100181 54.090998 18.681253 54.090998 30.7511315c0 12.0698784-9.3320827 22.0000243-21.159765 22.956799v7.6889627c16.0613209-.9716288 28.8311345-14.3443517 28.8311345-30.6457617 0-16.3013047-12.7698136-29.67402759-28.8311345-30.64576179M29.1843149 61.3968827V53.70792C17.3566325 52.7512506 8.02454986 42.8209994 8.02454986 30.7512263c0-12.0699838 9.33208264-22.00012968 21.15976504-22.95679905V.10535918C13.1230993 1.07709338.35328568 14.4498162.35328568 30.7512263c0 16.3013047 12.76981362 29.6740275 28.83102922 30.6456564" fill="#FFF" />
								<g transform="translate(62.682333 83.132577)">

									<path class="svg-icon" d="M.9331872 1.72810454H.75398946V.45981443h.67212318c.12747164 0 .18256888.07922204.18256888.17572123v.4239222c0 .12072934-.09649919.17919773-.18256888.17919773H1.3329846l.32394652.48944895h-.20679903l-.42381685-.62724473.02401944-.0276013h.37230146v-.448047H.9331872v1.10289303zM.24389222 1.1112893c0 .59953809.35502431.92011346.9065235.92011346.55813614 0 .90631281-.35491897.90631281-.92011346 0-.55149919-.34111832-.92032415-.90631281-.92032415-.57225284 0-.9065235.36187196-.9065235.92032415zM1.14683387.03241572c.65484603 0 1.07887359.43772285 1.07887359 1.07887358 0 .65463534-.42402756 1.07866289-1.07887359 1.07866289-.65474068 0-1.07876823-.41022691-1.07876823-1.07866289 0-.66179902.43772285-1.07887358 1.07876823-1.07887358z" fill="#FFF" mask="url(#j)" />
								</g>
							</g>
						</svg>
					</a>
				</div>

				<!-- top bar right -->
				<div class="right">

					<?php Nacelle_top_bar_r(); ?>

					<?php if (!get_theme_mod('wpt_mobile_menu_layout') || get_theme_mod('wpt_mobile_menu_layout') === 'topbar') : ?>

					<?php get_template_part('template-parts/mobile-top-bar'); ?>

					<?php endif; ?>

					<!-- search icon -->
					<!-- <div class='header-search-container' tabindex='1'>

						<div class='search-container' tabindex='1'>

							<i class="fas fa-search"></i>

							<?php //echo do_shortcode('[searchandfilter id="4711" fields="search" search_placeholder="Search. . ."]'); 
							?>

						</div>

					</div> -->

				</div>

			</div>

		</nav>

	</header>