<?php
function get_announcements() {
    ob_start();

    $args = array(
        'post_type' => 'announcements'
    );

    $the_query = new WP_Query( $args );
    ?>

    <!-- Code to run and wrap around the loop -->
    <div class="announcement-bar">
        <div class="announcement-bar__items">

        <?php if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) :
                $the_query->the_post();

                $id = get_the_ID();

                // ACF variables
                $announcement_text = get_field('announcement_text', $id);
                $announcement_link_text = get_field('announcement_link_text', $id);
                $announcement_link_url = get_field('announcement_link_url', $id);
                ?>

                <!-- Code to display each announcement goes here -->
                <div class="announcement-bar__item">
                    <p class="announcement-bar__item__content"><?php echo esc_html($announcement_text); ?></p>

                    <?php if (!empty($announcement_link_text)): ?>
                        <a href="<?php echo esc_url($announcement_link_url); ?>" class="announcement-bar__item__link"><?php echo esc_html($announcement_link_text); ?></a>
                    <?php endif; ?>
                </div>
            <?php endwhile;
        endif; ?>
        </div>
    </div>

    <?php
    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode( 'get_announcements', 'get_announcements' );
?>