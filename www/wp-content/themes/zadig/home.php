<?php get_header() ?>

<div class="zadig_concerts">
    <?php
    $page_for_posts_id = get_option('page_for_posts');
    echo get_post_field('post_content', $page_for_posts_id);
    $args = ['post_type' => 'realisation'];
    $concerts = new WP_Query($args);
    ?>

    <div class="zadig_concerts-content">
        <?php if ($concerts->have_posts()) : while ($concerts->have_posts()) : $concerts->the_post(); ?>
               
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer() ?>