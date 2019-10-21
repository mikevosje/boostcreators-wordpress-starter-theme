<div class="container dienstenwrapper">
    <div class="diensten row">
        <?php if (have_rows('diensten','option')) : ?>
            <?php while (have_rows('diensten','option')) : the_row(); ?>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="dienst-wrapper">
                        <h2><?php the_sub_field('dienst_titel'); ?></h2>
                        <p><?php the_sub_field('dienst_tekst'); ?></p>
                        <?php if (get_sub_field('dienst_button_link')) : ?>
                            <a class="btn-green" href="<?php the_sub_field('dienst_button_link'); ?>"><?php the_sub_field('dienst_button_titel'); ?></a>
                        <?php endif; ?>
                        <a class="dienst-link" href="<?php the_sub_field("dienst_link");?>"></a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
