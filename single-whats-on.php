<?php
get_header();

// override default attributes with user attributes
$the_query = new WP_Query (
    array (
        'post_type' => 'whats-on',
        'posts_per_page' => -1,
        'order' => 'ASC'
    )
);
?>

<div class="section whats-on">
    <div class="row whats-on__row">
        <?php
        if ( $the_query->have_posts() ):
            while ( $the_query->have_posts() ) :
                $the_query->the_post();

                $id = get_the_ID();
                ?>

                <p class="whats-on__backlink">
                    <a href="/whats-on/">
                        Back to What's On
                    </a>
                </p>

                <h2 class="whats-on__heading">
                    <?php echo the_title(); ?>
                </h2>

                <div class="whats-on__items">
                    <?php
                    if ( have_rows ( 'events', $id ) ):
                        while ( have_rows ( 'events', $id ) ):
                            the_row();
                            // Load subfields
                            $event_image = get_sub_field( 'event_image', $id );
                            $event_title = get_sub_field( 'event_title', $id );
                            $event_description = get_sub_field( 'event_description', $id ); ?>

                            <div class="whats-on__item">
                                <img src="<?php echo $event_image['url']; ?>" alt="" class="whats-on__item__image" />

                                <?php if ( !empty  ($event_title ) || !empty ( $event_description ) ) : ?>
                                    <div class="whats-on__item__content">
                                        <p class="whats-on__item__heading">
                                            <?php echo $event_title; ?>
                                        </p>

                                        <p class="whats-on__item__description">
                                            <?php echo $event_description; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>

                        <?php
                        endwhile;
                    endif; ?>
                </div>

            <?php
            endwhile;
        endif;
        ?>
    </div>
</div>

<?php
get_footer();