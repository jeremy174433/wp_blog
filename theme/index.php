<?php get_header(); ?>

	<?php
		if (have_posts() ) {
	?>
			<div id="categories-link" class="bgc-light position-sticky px-xl-5">
				<ul class="container d-flex flex-row align-items-center">
					<li>
						<a href="<?php echo get_home_url(); ?>" <?php if(empty($cat)) { echo 'class="tag-category tag-category-selected"'; } else { echo 'class="tag-category"'; }?>>Tout</a>
					</li>
					<?php
						$categories = get_categories([
							'orderby' => 'name',
							'order'   => 'ASC'
						]);
							
						foreach( $categories as $category ) {
							echo '<li>
									<a href="'. get_category_link( $category->term_id ) .'" '. (($cat === $category->term_id ? 'class="tag-category tag-category-selected"' : 'class="tag-category"')) .'>'. $category->name .'</a>
								 </li>';
						}
					?>
					<li class="invisible">&nbsp;&nbsp;&nbsp;</li>
				</ul>
			</div>
	<?php
		}
	?>

	<main role="main" class="pb-5 px-4 px-xl-5">
	
		<div class="container py-5">

			<div class="row post-list">

				<?php 
					$category = get_category( get_query_var( 'cat' ) );
					$cat_active = $category->name;
					if (isset($cat_active)) {
						echo '<div class="d-flex d-lg-none w-100 p-3 mx-sm-3 mx-lg-4 bgc-light border-full rounded">';
							echo '<object data="'. get_template_directory_uri() . '/img/svg/article/category.svg' .'" width="14" type="image/svg+xml"></object>';
							echo '<span class="ml-2 fz-18">'. $cat_active .'</span>';
						echo '</div>';
					}
				?>

			<?php
				
				if (have_posts() ) {
					while (have_posts() ) {
						
						the_post();
						
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
						$thumb_url = $thumb_url_array[0];
						$image_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
						
						echo '<div class="col-12 col-sm-6 col-lg-4 card-item mt-5 px-0 px-sm-3 px-lg-4">';
							echo '<a href="'. get_permalink() .'" class="card-item-header d-block overflow-hidden" title="'. get_the_title() .'">
									<img src="'. $thumb_url .'" class="d-block" alt="'. $image_alt .'"/>
								 </a>';
							echo '<h2 class="card-item-body fz-20 my-2"><a href="'. get_permalink() .'">' . get_the_title() . '</a></h2>';
							echo '<div class="card-item-footer">';
								if ( has_category() ) {
									$categories_list = get_the_category_list( __( ', ', 'askingfranklin' ) );
									if ($categories_list) {
										printf(
											'<p class="d-flex align-items-start">
												<object data="'. get_template_directory_uri() . '/img/svg/article/category.svg' .'" class="mt-1" width="12" type="image/svg+xml"></object>
												<span class="ml-2">' . esc_html__( 'Catégorie : %s', 'askingfranklin' ) . '</span>
											</p>',
											$categories_list
										);
									}
								}
								echo '<p class="d-flex align-items-start mt-1">
										<object data="'. get_template_directory_uri() . '/img/svg/article/date.svg' .'" class="mt-1" width="12" type="image/svg+xml"></object>
										<time class="ml-2" datetime="'. get_the_date() .'">Le '. get_the_date() .'</time>
									 </p>';
							echo '</div>';
						echo '</div>';
					
					}
				}
				else {
					echo '<div class="w-100 my-5 text-center">';
						echo '<p class="fz-26">Oups, la page demandée semble introuvable...</p>';
						echo '<button class="mt-5">
								<a href="'. get_home_url() .'" class="pmy-btn pmy-btn-full pmy-btn-big">
									Revenir au blog
								</a>
							</button>';
					echo '</div>';
				}
			?>
			</div>
			
		</div>

	</main>

<?php get_footer(); ?>