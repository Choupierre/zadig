<?php
/* function RecupUrl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
$auchan = RecupUrl('https://www.auchan.fr/jeux-jouets/construction/lego/c-6860409?engine=fh&show=NINETY_SIX&sort=price-desc');
echo substr_count($auchan,'carte Waaoh!');
die; */
?>

<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="rossinante_home">
            <?php the_content() ?>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer() ?>