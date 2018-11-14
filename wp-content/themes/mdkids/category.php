<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 27.03.2018
 * Time: 11:04
 */
get_header();

$cat_name = get_query_var('category_name');
$cur_id = get_the_category( $post->ID );
foreach ($cur_id as $value => $item ){
	if($item->slug == $cat_name ) $title = $item->cat_name;
}
$adrQuery = new WP_Query([
	'category_name' => $cat_name,
	'posts_per_page' => 0,]);
?>
	<section class="category-block">
		<?php
		
		$blogQuery = new WP_Query([
			'category_name' => $cat_name,
			'posts_per_page' => 1,
			'paged' => $_GET['page'],
		]);
		$contacts = fw_get_db_customizer_option();
		
		?>
		
		<hr class="pages-hr"/>
		<div class="head">
			<hr/>
			<div class="head__circle">
			</div>
			<h2>
				<?=$cur_id[0]->name?>
			</h2>
			<div class="head__circle">
			</div><hr/>
		</div>
		<div class="container m-1">
			<div class="collections-items similar-items">
				<?php $z = 0; while ( $blogQuery->have_posts() ) : $z++; $blogQuery->the_post();  ?>
					<a class="collections-items__item" href="<?php the_permalink(); ?>">
						<span class="collections-items__item__image">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="" role="presentation"/>
						</span>
						<span class="collections-items__item__text">
							<h3>
								<?php the_title(); ?>
							</h3>
							<span class="price-block">
								<span class="old-price">
									<?php if(fw_get_db_post_option($blogQuery->post->ID, 'price_old')):?>
										<?=fw_get_db_post_option($blogQuery->post->ID, 'price_old')?>
									<?endif;?>
								</span>
								<span class="real-price">
								   <?php if(fw_get_db_post_option($blogQuery->post->ID, 'price_new')):?>
									   <?=fw_get_db_post_option($blogQuery->post->ID, 'price_new')?>
								   <?endif;?>
								</span>
							</span>
						</span>
					</a>
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
							<a href="#" id="next" data-action="get_next_product" data-page="<?=$i?>" data-cat="<?=$cat_name?>">
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
<?php get_footer(); ?>
<script type="text/javascript">
	changeHash(<?=$_GET['cur_p'] ?? 1?>);
	var button = $('[data-page=<?=$_GET['cur_p'] ?? 1?>]');
	console.log(button);
	button.addClass("active");
</script>
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