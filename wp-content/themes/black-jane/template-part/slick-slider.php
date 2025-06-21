<?php

/**
 * WPinProgress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('blackjane_slick_slider_function')) {

	function blackjane_slick_slider_function() { 
	
		$args = array(
			'post_type' => 'post',
			'meta_key' => '_thumbnail_id',
			'posts_per_page' => suevafree_setting('blackjane_slick_limit','-1'),
		);

		$query = new WP_Query($args); 

		if ( $query->have_posts() ) :  
                                
?>
        <section id="slick_wrapper">
            
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-md-12">
                    
                        <div id="jane-carousel" class="slick-jane-slideshow" data-center="true" data-columns="1" >
                        
                            <div class="slider jane-slick-wrapper slick-slides">
                            
                            <?php 
								
								while ( $query->have_posts() ) : $query->the_post(); 
								
								global $post;
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blackjane_slick');
							
							?>
                            	<div>
                            
                            		<div class="slick-article">
                                                    
                            			<img src="<?php echo esc_url($thumb[0]); ?>" alt="<?php echo get_the_title(); ?>">
                                        
                            			<?php if ( suevafree_setting('blackjane_slick_overlay', 'on') == 'on' ) :?>
                                                        
                            				<div class="slider-overlay">
                            
                            					<span class="entry-category"><?php the_category(' . '); ?></span>
                            					<h2 class="title"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>" tabindex="0"><?php echo esc_html(get_the_title()); ?></a></h2>
                            					<span class="entry-date"><?php echo esc_html__('On ','black-jane') . esc_html(get_the_date()) . esc_html__(' by ','black-jane') . get_the_author_posts_link(); ?></span>	
                                                    
                            				</div>
                                                        
                            			<?php endif; ?>
                                                    
                            		</div>
                                                
                            	</div>
                                
                            <?php
                        
                            	endwhile; 
                            	wp_reset_postdata();
                            
                            ?>
                                        
                            </div>
                                    
                        </div>
                    
                    </div>
            
                </div>
            
            </div>
            
        </section>
    
<?php

        endif;
	
	}

	add_action( 'blackjane_slick_slider', 'blackjane_slick_slider_function');

}

?>