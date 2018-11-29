<?php
/*
 Single Post Template: product
 Description: This part is optional, but helpful for describing the Post Template
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
	<section class="product">
		<hr class="pages-hr"/>
		<div class="head"><hr/>
			<div class="head__circle">
			</div>
			<h2>
				<?php the_title()?>
			</h2>
			<div class="head__circle">
			</div>
			<hr/>
		</div>
		<div class="container m-1">
			<div class="product-image">
				<div class="product-slider jsNavSlider">
					<?php foreach (fw_get_db_post_option($post->ID, 'img_slider') as $slider):?>
						<div class="product-slider__image-block">
							<img src="<?=$slider['url']?>" alt="" role="presentation"/>
						</div>
					<?php endforeach;?>
				</div>
				<div class="product-big-image jsForSlider">
					<?php foreach (fw_get_db_post_option($post->ID, 'img_slider') as $slider):?>
						<figure class="product-big-image__link">
							<a href="<?=$slider['url']?>" data-size="330x270"></a>
							<img src="<?=$slider['url']?>" alt="" role="presentation"/>
						</figure>
					<?php endforeach;?>
				</div>
			</div>
			<div class="product-info">
				<p>
					Артикул:
					<span><?=fw_get_db_post_option($post->ID, 'article')?></span>
				</p>
				<p>
					Металл:<span><?=fw_get_db_post_option($post->ID, 'metal')?></span>
				</p>
				<p>
					Вес:<span><?=fw_get_db_post_option($post->ID, 'weight')?></span>
				</p>
				<p>
					Цвет металла:
				</p>
				<div class="product-info__radio-btn">
					<?php foreach (fw_get_db_post_option($post->ID, 'color') as $color):?>
						<label>
							<?=$color['text']?><input type="radio" name="color" value="<?=$color['text']?>"/>
						</label>
					<?php endforeach;?>
				</div>
				<p>
					Размер:
					<span>
						<?=fw_get_db_post_option($post->ID, 'size')?>
					</span>
				</p>
				<span>
					<?=fw_get_db_post_option($post->ID, 'description')?>
				</span>
				<div class="product-info__price">
					<span class="line-through">
						<?=fw_get_db_post_option($post->ID, 'price_old')?>
					</span>
					<span>
						<?=fw_get_db_post_option($post->ID, 'price_new')?>
					</span>
				</div>
				<button class="product-info__btn <?=(!$current_user->ID) ? 'jsReg' : 'add_product'?>">
					Добавить в корзину
				</button>
			</div>
		</div>
	</section>
	<section class="similar-products">
		<input type="hidden" id="prodPath" value="<?php bloginfo('template_url')?>">
		<div class="head m-1">
			<hr class="head__big-head"/>
			<div class="head__circle">
			</div>
			<h2>
				Похожие товары
			</h2>
			<div class="head__circle">
			</div>
			<hr class="head__big-head"/>
		</div>
		<?php // Восстанавливаем оригинальные данные поста
		wp_reset_postdata();?>
		<div class="container">
			<div class="collections-items similar-items jsSliderProduct">
				<?php
				$cur_id = get_the_category( $post->ID );
				$products = new WP_Query([
					'category_name' => $cur_id[0]->slug,
					'posts_per_page' => 10,
//					'paged' => $_GET['cur_p'] ?? 1,
					'post__not_in' => array( $post->ID),
				]);
				?>
				<?php while ( $products->have_posts() ) :  $products->the_post();  ?>
					<a class="collections-items__item" href="<?php the_permalink(); ?>">
						<span class="collections-items__item__image">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="" role="presentation"/>
						</span>
								<span class="collections-items__item__text">
							<h3>
								<?php the_title();?>
							</h3>
							<span class="price-block">
								<span class="old-price">
									<?=fw_get_db_post_option($products->post->ID, 'price_old')?>
								</span>
								<span class="real-price">
									<?=fw_get_db_post_option($products->post->ID, 'price_new')?>
								</span>
							</span>
						</span>
					</a>
				<?php endwhile;?>
			</div>
		</div>
	</section>
<?php
	// Восстанавливаем оригинальные данные поста
	wp_reset_postdata();
?>
	<div class="main-news">
		<div class="head"><hr/>
			<div class="head__circle">
			</div>
			<h2>Новости
			</h2>
			<div class="head__circle">
			</div><hr/>
		</div>
		<div class="container">
			<div class="main-news-items m-1">
				<?php $blogQuery = new WP_Query([
					'category_name' => 'news',
					'posts_per_page' => 3,
//					'paged' => $_GET['cur_p'] ?? 1,
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
	</div>
<?php
// Восстанавливаем оригинальные данные поста
wp_reset_postdata();
get_footer();
?>