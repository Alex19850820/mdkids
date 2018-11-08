<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
/***
  * Верстка шорткода
  * весь контент лежит в переменной $atts
 *@var $atts array
 *
 **/
$contacts = fw_get_db_customizer_option();
$cat_name = get_query_var('name');
?>
<section class="news"><hr class="pages-hr"/>
	<div class="head"><hr/>
		<div class="head__circle">
		</div>
		<h2>Новости</h2>
		<div class="head__circle">
		</div><hr/>
	</div>
	<div class="container">
		<div class="main-news-items m-1">
			<?php $blogQuery = new WP_Query([
				'category_name' => 'news',
				'posts_per_page' => 1,
				'paged' => $_GET['cur_p'] ?? 1,
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
		<div class="pagination">
			<?php $n = getPagination($post, 1); ?>
			<ul class="pagination__ul">
				<li class="pagination__ul__prev">
					<a href="#" id="move_page_left" data-cat="<?=$cat_name?>" data-all="<?=$n?>" data-np="<?=$_GET['cur_p'] ?? 1 ?>">Предыдущая</a>
				</li>
				<?php for($i=1; $i <= $n; $i++):?>
					<li class="pagination__ul__li">
						<a href="#" id="next" data-page="<?=$i?>" data-cat="<?=$cat_name?>">
							<?=$i?>
						</a>
					</li>
				<?php endfor;?>
				<li class="pagination__ul__next" >
					<a href="#" id="move_page_right" data-cat="<?=$cat_name?>" data-all="<?=$n?>" data-np="<?=$_GET['cur_p'] ?? 1?>">Следующая</a>
				</li>
			</ul>
		</div>
	</div>
</section>
<?php function getPagination($post = [], $p) {
	$count = '';
	$arr = get_the_category($post->ID);
	foreach ($arr as $item) {
		if($item->slug == 'news') {
			$count = $item->category_count;
		}
	}
	if($count) {
		$n = ceil($count/$p);
	} else {
		$n = ceil(get_the_category($post->ID)[0]->category_count/$p);
	}
	return $n;
}?>