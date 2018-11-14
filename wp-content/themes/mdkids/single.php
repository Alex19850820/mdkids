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
	<section class="single-news">
		<hr class="pages-hr"/>
		<div class="container m-1">
			<div class="news-block m-1">
			<h3 class="news-block__head">
				<?php the_title();?>
			</h3>
			<img class="news-block__image-left" src="<?php the_post_thumbnail_url()?>" alt="" role="presentation"/>
			<p class="news-block__text">
				<?=fw_get_db_post_option($post->ID, 'description')?>
			</p>
			<img class="news-block__image-right" src="<?=fw_get_db_post_option($post->ID, 'img')['url']?>" alt="" role="presentation"/>
				<p class="news-block__text">
					<?=fw_get_db_post_option($post->ID, 'description2')?>
				</p>
<!--				<div class="blog__content">-->
<!--				-->
<!--				--><?php //while ( have_posts() ) : the_post();
//					get_template_part( 'template-parts/content', get_post_type() );
//					/*the_post_navigation();*/
//				endwhile; ?>
<!--			</div>-->
			</div>
		</div>
		<div class="head"><hr class="head__big-head"/>
			<div class="head__circle">
			</div>
			<h2>
				Другие новости
			</h2>
			<div class="head__circle">
			</div><hr class="head__big-head"/>
		</div>
		<div class="container">
			<div class="main-news-items m-1">
				<?php
				$blogQuery = new WP_Query([
					'category_name' => 'news',
					'posts_per_page' => 3,
//					'paged' => get_query_var( 'paged') ,
					'post__not_in' => array( $post->ID),
				]);?>
				<?php while ( $blogQuery->have_posts() ) :  $blogQuery->the_post();  ?>
					<div class="main-news-items__item">
						<div class="main-news-items__item__image">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="" role="presentation"/>
						</div>
						<p>
							<?php the_title(); ?>
						</p>
						<span class="mainNewsDot">
						<?=fw_get_db_post_option($blogQuery->post->ID, 'description')?>
                    </span>
						<div class="main-news-items__item__links">
							<a href="<?php the_permalink(); ?>">Подробрее
								<img src="<?php bloginfo('template_url')?>/assets/images/icons/right-arrow.svg" alt="" width="12" height="8" role="presentation"/>
							</a>
							<time><?=get_the_date('d.m.Y')?></time>
							<a href="">
								<img src="<?php bloginfo('template_url')?>/assets/images/icons/share.svg" alt="" width="25" height="25" role="presentation"/>
							</a>
						</div>
					</div>
				<?php endwhile;?>
			</div>
		</div>
	</section>
<?php
get_footer();
?>