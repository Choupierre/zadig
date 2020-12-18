<?php get_header() ?>
<div class="rossinante_realisation">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content() ?>
        <?php endwhile;    ?>
    <?php endif; ?>
    <div class="d-flex justify-content-between project_link">
        <div>
            <?php
            $prev_post = get_next_post();
            if (!empty($prev_post) && strpos($prev_post->post_title, 'pas fini') === false) : ?>
                <span>
                    <</span> <a href="<?php echo get_post_permalink($prev_post->ID); ?>"> <?= __('projet précédent', 'rossinante') ?> </a>
                    <?php endif; ?>


        </div>
        <div>
            <?php
            $next_post = get_previous_post();
            if (!empty($next_post) && strpos($next_post->post_title, 'pas fini') === false) : ?>
                <a href="<?php echo get_post_permalink($next_post->ID); ?>"> <?= __('projet suivant', 'rossinante') ?> </a> <span>
                    ></span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer() ?>