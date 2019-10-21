<?php if (have_rows('veelgestelde_vragen')) : ?>
    <div class="accordion mt-4" id="veelgesteldevragen">
        <?php while (have_rows('veelgestelde_vragen')) : the_row(); ?>
            <div class="mb-2">
                <a class="veelgesteldevragen-question color-green-link font-weight-bold" href="#" data-toggle="collapse"
                   data-target="#collapse-<?php the_row_index(); ?>" aria-expanded=" true"
                   aria-controls="collapse-<?php the_row_index(); ?>">
                    <?php the_sub_field('vraag'); ?>
                </a>

                <div id="collapse-<?php the_row_index(); ?>" class="collapse"
                     aria-labelledby="heading-<?php the_row_index(); ?>" data-parent="#veelgesteldevragen">
                    <?php the_sub_field('antwoord'); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
