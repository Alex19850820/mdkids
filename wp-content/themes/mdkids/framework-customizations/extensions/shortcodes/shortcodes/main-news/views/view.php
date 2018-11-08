<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/***
  * Верстка шорткода
  * весь контент лежит в переменной $atts
 *@var $atts array
 *
 **/
	
$blogQuery = new WP_Query([
	'category_name' => 'news',
	'posts_per_page' => 3,
//	'paged' => $_GET['cur_p'],
]);
$contacts = fw_get_db_customizer_option();
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
			<?php $z = 0; while ( $blogQuery->have_posts() ) { $z++; $blogQuery->the_post();  ?>
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
			<?}?>
		</div>
	</div>
</div>