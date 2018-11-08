<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mdkids
 */


/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package globus-landing-master
 */

get_header();
$breadcrumbs = fw_ext_get_breadcrumbs('<i class="fas fa-chevron-right"></i>');
$breadcrumbs = preg_match_all('|<span class="last-item">(.*)|', $breadcrumbs, $match);
$breadcrumbs = '<div class="breadcrumbs">
						<span class="first-item">
							<a href="/">Главная</a>
						</span>
						<span class="separator"><i class="fas fa-chevron-right"></i></span>'.$match[0][0].'</div>';
?>
	<!-- start inside-crumbs.html-->
	<section class="crumbs">
		<ul class="crumbs__link">
			<?=$breadcrumbs?><a name="map"></a>
		</ul>
	</section>
	<!-- end inside-crumbs.html-->
	<div class="blog__content">
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', get_post_type() );
			/*the_post_navigation();*/
		endwhile; ?>
	</div>
<?php
get_footer();
?>