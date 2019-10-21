<?php
$args         = array(
    'numberposts' => -1,
    'orderby'     => 'post_date',
    'order'       => 'DESC',
    'post_type'   => 'bewoner',
    'post_status' => 'publish'
);
$recent_posts = new WP_Query($args);
?>
<!-- Slider main container -->
<div class="swiper-container bewoner-slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) :
                $recent_posts->the_post();
                ?>
                <div class="swiper-slide" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="WSZ" class="d-block d-md-none img-fluid"/>
                    <div class="bewoner-slogan-wrapper">
                        <div class="bewoner-slogan">
                            <a href="<?php the_permalink(); ?>">
                                <p class="bewoner-slogan-title"><?php the_field('slider_titel', get_the_ID()); ?></p>
                                <p class="bewoner-slogan-text"><?php the_field('slider_tekst', get_the_ID()); ?></p>
                                <p class="bewoner-slogan-name"><?php the_field('slider_naam', get_the_ID()); ?></p>
                                <span class="bewoner-link"></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
        endif;
        wp_reset_query();
        ?>
    </div>
    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev swiper-button-white"></div>
    <div class="swiper-button-next swiper-button-white"></div>
</div>
