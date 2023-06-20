<?php
function get_events($atts = []) {
    ob_start();

    $atts = array_change_key_case((array) $atts, CASE_LOWER);

    // override default attributes with user attributes
    $wp_atts = shortcode_atts(
        array(
            'number' => -1,
        ),
        $atts
    );

    $limit = $wp_atts['number'];

    $the_query = new WP_Query (
        array (
            'post_type' => 'whats-on',
            'posts_per_page' => $limit,
            'order' => 'ASC'
        )
    );
    ?>

    <div class="section whats-on filtergrid">
        <div class="row whats-on__row width-100">
            <?php
            if ( $the_query->have_posts() ):
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();

                    $id = get_the_ID();

                    // ACF variables
                    $events_featured_image = get_field( 'featured_image', $id ); ?>

                    <h4 class="whats-on__heading">
                        What's on
                    </h4>

                    <div class="dp-dfg-container dp-dfg-layout-grid">
                        <div class="dp-dfg-items">
                            <article class="dp-dfg-item">
                                <figure class="dp-dfg-image entry-thumb">
                                    <a href="<?php the_permalink(); ?>" class="dp-dfg-image-link">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="dp-dfg-featured-image" />
                                    </a>
                                </figure>

                                <div class="dp-dfg-header entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                </div>

                                <div class="dp-dfg-content entry-summary">
                                    <?php echo the_excerpt(); ?>
                                </div>
                            </article>
                        </div>
                    </div>

                <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>

    <?php
    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode( 'get_events', 'get_events' );
?>