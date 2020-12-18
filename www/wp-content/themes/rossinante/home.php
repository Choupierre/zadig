<?php get_header() ?>

<div class="rossinante_realisations">
    <?php
    $page_for_posts_id = get_option('page_for_posts');
    echo get_post_field('post_content', $page_for_posts_id);
    $args = ['post_type' => 'realisation'];
    $realisations = new WP_Query($args);
    ?>

    <div class="rossinante_realisations-content">
        <?php if ($realisations->have_posts()) : while ($realisations->have_posts()) : $realisations->the_post(); ?>
                <?php if (strpos(get_the_title(), 'pas fini') === false) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('post-thumbnail', array('class' => 'photos_link')); ?>
                        <div class="rossinante_realisations_hover"><span><?php the_title_attribute(); ?></span></div>
                    </a>
                <?php else : ?>
                    <div>
                        <?php the_post_thumbnail('post-thumbnail', array('class' => 'photos_link')); ?>
                        <div class="rossinante_realisations_hover"><span><?= __('en cours', 'rossinante') ?></span></div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer() ?>