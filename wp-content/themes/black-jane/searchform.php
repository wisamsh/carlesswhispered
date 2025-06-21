<?php
/**
 * Template for displaying search forms in Black Jane
 *
 */
 
 if ( current_filter() === 'blackjane_header_layout' ) : ?>

    <form role="search" method="get" id="header-searchform" action="<?php echo esc_url(home_url('/')); ?>">
        <div><input type="text" value="" placeholder="<?php esc_attr_e( 'Type here & click enter.', 'black-jane') ?>" name="s" id="header-s" autocomplete="off" /></div>
    </form>
    
<?php else : ?>
    
    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
        <div><label class="screen-reader-text" for="s"><?php esc_html_e( 'Search', 'black-jane') ?></label>
            <input type="text" value="" name="s" id="s" />
            <input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'black-jane') ?>" />
        </div>
    </form>
    
<?php endif; ?>