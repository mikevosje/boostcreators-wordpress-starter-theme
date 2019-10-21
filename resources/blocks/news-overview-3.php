<div class="container-fluid news-overview-3 grey-background">
    <div class="row">
        <div class="container">
            <div class="d-flex justify-content-between headerdiv">
                <h3 class="h2 news-over-3-header"><?php echo is_single() ? 'Andere berichten' : 'Laatste nieuws';?></h3>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Bekijk alle berichten &raquo;</a>
            </div>
            <div class="row">
                <?php
                $args         = array(
                    'posts_per_page' => 3,
                    'orderby'     => 'post_date',
                    'order'       => 'DESC',
                    'post_type'   => 'post',
                    'post_status' => 'publish'
                );
                $recent_posts = new WP_Query($args);
                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) :
                        $recent_posts->the_post();
                        include(\App\template_path(locate_template('views/partials/content.blade.php')));
                    endwhile;
                endif;
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</div>
