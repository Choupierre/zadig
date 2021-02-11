<?php

/*
 * Template Name: Medias
 */

get_header() ?>

<div class="zadig_medias">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="zadig_medias_title">
                <?php the_content() ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>


    <?php
    /*   $page_for_posts_id = get_option('page_for_posts');
    echo get_post_field('post_content', $page_for_posts_id); */
    $args = ['post_type' => 'discographie'];
    $discographie = new WP_Query($args);
    ?>

    <div class="zadig_discographie_content">
        <?php if ($discographie->have_posts()) : while ($discographie->have_posts()) : $discographie->the_post(); ?>
                <?php the_content();  ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>


    <?php
    $args = array(
        'p'         => 91, // ID of a page, post, or custom type
        'post_type' => 'any'
      );
      $my_videos = new WP_Query($args);
      ?>

      <div class="zadig_discographie_videos">
      <?php if ($my_videos->have_posts()) : while ($my_videos->have_posts()) : $my_videos->the_post(); ?>
              <?php the_content();  ?>
          <?php endwhile; ?>
      <?php endif; ?>
  </div>
    


</div>

<?php get_footer() ?>