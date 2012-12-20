<?php

// remove the index loop and page titles
function remove_thematic_loops() {
	// childtheme_override_archive_loop
	remove_action ('thematic_archiveloop','thematic_archive_loop');
	// childtheme_override_author_loop
	remove_action ('thematic_authorloop','thematic_author_loop');
	// childtheme_override_category_loop
	remove_action ('thematic_categoryloop','thematic_category_loop');
	// childtheme_override_index_loop
    remove_action ('thematic_indexloop','thematic_index_loop');
	// childtheme_override_single_loop
	remove_action ('thematic_singlepost','thematic_single_post');
	// childtheme_override_search_loop
	remove_action ('thematic_searchloop','thematic_search_loop');
	// childtheme_override_tag_loop
	remove_action ('thematic_tagloop','thematic_tag_loop');
	// Remove page titles
	remove_action ('thematic_pagetitle','thematic_page_title');
	  
}
add_action('init','remove_thematic_loops');




// rebuild the archive loop
function my_archive_loop() {
    while ( have_posts() ) : the_post(); 
				
				thematic_abovepost(); ?>

				<article id="post-<?php the_ID();
					echo '" ';
					if (!(THEMATIC_COMPATIBLE_POST_CLASS)) {
						post_class();
						echo '>';
					} else {
						echo 'class="';
						thematic_post_class();
						echo '">';
					} ?>
     				<header class="entry-header">
     					<?php thematic_postheader(); ?>
                    </header>
					<div class="entry-content">
<?php thematic_content(); ?>

					</div><!-- .entry-content -->
					<footer class="entry-meta">
						<?php thematic_postfooter(); ?>
                    </footer>
				</article><!-- #post -->

			<?php 
			
				thematic_belowpost();
		
		endwhile;
}
add_action('thematic_archiveloop', 'my_archive_loop');





// rebuild the author loop
function my_author_loop() {
    
	rewind_posts();
		while (have_posts()) : the_post(); 
		
				thematic_abovepost(); ?>

				<article id="post-<?php the_ID();
					echo '" ';
					if (!(THEMATIC_COMPATIBLE_POST_CLASS)) {
						post_class();
						echo '>';
					} else {
						echo 'class="';
						thematic_post_class();
						echo '">';
					} ?> 
					<header class="entry-header">
     					<?php thematic_postheader(); ?>
                    </header>
					<div class="entry-content ">
<?php thematic_content(); ?>

					</div><!-- .entry-content -->
					<footer class="entry-meta">
						<?php thematic_postfooter(); ?>
                    </footer>
				</article><!-- #post -->

			<?php 
		
				thematic_belowpost();
		
		endwhile;
		
}
add_action('thematic_authorloop', 'my_author_loop');




// rebuild the category loop
function my_category_loop() {

   while (have_posts()) : the_post(); 
		
				thematic_abovepost(); ?>
	
				<article id="post-<?php the_ID();
					echo '" ';
					if (!(THEMATIC_COMPATIBLE_POST_CLASS)) {
						post_class();
						echo '>';
					} else {
						echo 'class="';
						thematic_post_class();
						echo '">';
					} ?>
     				<header class="entry-header">
     					<?php thematic_postheader(); ?>
                    </header>
					<div class="entry-content">
<?php thematic_content(); ?>
	
					</div><!-- .entry-content -->
					<footer class="entry-meta">
						<?php thematic_postfooter(); ?>
                    </footer>
				</article><!-- #post -->

			<?php 
		
				thematic_belowpost();
		
		endwhile;
}
add_action('thematic_categoryloop', 'my_category_loop');




// rebuild the index loop
function my_index_loop() {
	// Count the number of posts so we can insert a widgetized area
	$count = 1;
	while ( have_posts() ) : the_post();
		// action hook for insterting content above #post
		thematic_abovepost();
		echo '<article id="post-' . get_the_ID() . '" ';
			// Checking for defined constant to enable Thematic's post classes
			if ( ! ( THEMATIC_COMPATIBLE_POST_CLASS ) ) {
				post_class();
				echo '>';
			} else {
				echo 'class="';
				thematic_post_class();
				echo '">';
			}
			?>
			<header class="entry-header">
				<?php thematic_postheader(); ?>
			</header>
			<div class="entry-content">
				<?php thematic_content(); ?>
				<?php wp_link_pages('before=<div class="page-link">' . __('Pages:', 'thematic') . '&after=</div>') ?>
			</div><!-- .entry-content -->
			<footer class="entry-meta">
				<?php thematic_postfooter(); ?>
			</footer>
		</article><!-- #post -->
		<?php 
			// action hook for insterting content below #post
			thematic_belowpost();
			comments_template();
			if ( $count == thematic_get_theme_opt( 'index_insert' ) ) {
				get_sidebar('index-insert');
			}
			$count = $count + 1;
	endwhile;
}
add_action('thematic_indexloop', 'my_index_loop');




// rebuild the single loop
function my_single_loop() {
				
				thematic_abovepost(); ?>
			
				<article id="post-<?php the_ID();
					echo '" ';
					if (!(THEMATIC_COMPATIBLE_POST_CLASS)) {
						post_class();
						echo '>';
					} else {
						echo 'class="';
						thematic_post_class();
						echo '">';
					} ?>
					<header class="entry-header">
     					<?php thematic_postheader(); ?>
                    </header>
					<div class="entry-content">
<?php thematic_content(); ?>

						<?php wp_link_pages('before=<div class="page-link">' .__('Pages:', 'thematic') . '&after=</div>') ?>
					</div><!-- .entry-content -->
                    <footer class="entry-meta">
						<?php thematic_postfooter(); ?>
                    </footer>
				</article><!-- #post -->
		<?php

			thematic_belowpost();
	
}
add_action('thematic_singlepost', 'my_single_loop');




// rebuild the search loop
function my_search_loop() {
    
		while ( have_posts() ) : the_post(); 
		
				thematic_abovepost(); ?>

				<article id="post-<?php the_ID();
					echo '" ';
					if (!(THEMATIC_COMPATIBLE_POST_CLASS)) {
						post_class();
						echo '>';
					} else {
						echo 'class="';
						thematic_post_class();
						echo '">';
					} ?>
                    <header class="entry-header">
     					<?php thematic_postheader(); ?>
                    </header>
					<div class="entry-content">
<?php thematic_content(); ?>

					</div><!-- .entry-content -->
                    <footer class="entry-meta">
						<?php thematic_postfooter(); ?>
                    </footer>
				</article><!-- #post -->

			<?php 
		
				thematic_belowpost();
		
		endwhile;
	
}
add_action('thematic_searchloop', 'my_search_loop');



// rebuild the tag loop
function my_tag_loop() {

		while (have_posts()) : the_post(); 
		
				thematic_abovepost(); ?>

				<article id="post-<?php the_ID();
					echo '" ';
					if (!(THEMATIC_COMPATIBLE_POST_CLASS)) {
						post_class();
						echo '>';
					} else {
						echo 'class="';
						thematic_post_class();
						echo '">';
					} ?>
                    <header class="entry-header">
     					<?php thematic_postheader(); ?>
                    </header>
					<div class="entry-content">
<?php thematic_content() ?>

					</div><!-- .entry-content -->
					<footer class="entry-meta">
						<?php thematic_postfooter(); ?>
                    </footer>
				</article><!-- #post -->

			<?php 
		
				thematic_belowpost();
		
		endwhile;
}
add_action('thematic_tagloop', 'my_tag_loop');



function childtheme_page_title() {
		if (is_attachment()) {
				$content .= '<h2 class="page-title"><a href="';
				$content .= apply_filters('the_permalink',get_permalink($post->post_parent));
				$content .= '" rev="attachment"><span class="meta-nav">&laquo; </span>';
				$content .= get_the_title($post->post_parent);
				$content .= '</a></h2>';
		} elseif (is_author()) {
				$content .= '<header class="page-header"><h1 class="page-title author">';
				$author = get_the_author_meta( 'display_name' );
				$content .= __('Author Archives: ', 'thematic');
				$content .= '<span>';
				$content .= $author;
				$content .= '</span></h1></header>';
		} elseif (is_category()) {
				$content .= '<header class="page-header"><h1 class="page-title">';
				$content .= __('Category Archives:', 'thematic');
				$content .= ' <span>';
				$content .= single_cat_title('', FALSE);
				$content .= '</span></h1></header>' . "\n";
				$content .= '<div class="archive-meta">';
				if ( !(''== category_description()) ) : $content .= apply_filters('archive_meta', category_description()); endif;
				$content .= '</div>';
		} elseif (is_search()) {
				$content .= '<header class="page-header"><h1 class="page-title">';
				$content .= __('Search Results for:', 'thematic');
				$content .= ' <span id="search-terms">';
				$content .= esc_html(stripslashes($_GET['s']));
				$content .= '</span></h1></header>';
		} elseif (is_tag()) {
				$content .= '<header class="page-header"><h1 class="page-title">';
				$content .= __('Tag Archives:', 'thematic');
				$content .= ' <span>';
				$content .= ( single_tag_title( '', false ));
				$content .= '</span></h1></header>';
		} elseif (is_tax()) {
			    global $taxonomy;
				$content .= '<header class="page-header"><h1 class="page-title">';
				$tax = get_taxonomy($taxonomy);
				$content .= $tax->labels->singular_name . ' ';
				$content .= __('Archives:', 'thematic');
				$content .= ' <span>';
				$content .= thematic_get_term_name();
				$content .= '</span></h1></header>';
 		} elseif (thematic_is_custom_post_type() && is_archive() ) { // this can be changed to is_post_type_archive when min WP version support is = 3.1
				$content .= '<header class="page-header"><h1 class="page-title">';
				$post_type_obj = get_post_type_object( get_post_type() );
				$post_type_name = $post_type_obj->labels->singular_name;
				$content .= __('Archives:', 'thematic');
				$content .= ' <span>';
				$content .= $post_type_name;
				$content .= '</span></h1></header>';	
		} elseif (is_day()) {
				$content .= '<header class="page-header"><h1 class="page-title">';
				$content .= sprintf(__('Daily Archives: <span>%s</span>', 'thematic'), get_the_time(get_option('date_format')));
				$content .= '</h1>';
		} elseif (is_month()) {
				$content .= '<header class="page-header"><h2 class="page-title">';
				$content .= sprintf(__('Monthly Archives: <span>%s</span>', 'thematic'), get_the_time('F Y'));
				$content .= '</h1></header>';
		} elseif (is_year()) {
				$content .= '<header class="page-header"><h2 class="page-title">';
				$content .= sprintf(__('Yearly Archives: <span>%s</span>', 'thematic'), get_the_time('Y'));
				$content .= '</h1></header>';
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
				$content .= '<header class="page-header"><h1 class="page-title">';
				$content .= __('Blog Archives', 'thematic');
				$content .= '</h1></header>';
		}
			return $content;
		}
add_filter('thematic_page_title', 'childtheme_page_title');




// Change h2 tags to h1 tags in loop PROBABLY A BETTER WAY TO DO THIS
function childtheme_override_postheader_posttitle() {
	    if (is_single() || is_page()) {
	        $posttitle = '<h1 class="entry-title">' . get_the_title() . "</h1>\n";
	    } elseif (is_404()) {
	        $posttitle = '<h1 class="entry-title">' . __('Not Found', 'thematic') . "</h1>\n";
	    } else {
	        $posttitle = '<h1 class="entry-title"><a href="';
	        $posttitle .= apply_filters('the_permalink', get_permalink());
	        $posttitle .= '" title="';
	        $posttitle .= __('Permalink to ', 'thematic') . the_title_attribute('echo=0');
	        $posttitle .= '" rel="bookmark">';
	        $posttitle .= get_the_title();
	        $posttitle .= "</a></h1>\n";
	    }
	    return $posttitle;
    	}
add_filter('thematic_postheader_posttitle','childtheme_override_postheader_posttitle');




?>