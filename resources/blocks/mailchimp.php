<?php if (get_field('mailchimp_link') && get_field('mailchimp_name')): ?>
    <div class="mailchimp">
        <a class="btn-green btn-more-padding" href="<?php the_field('mailchimp_link'); ?>"
           target="_blank"><?php the_field('mailchimp_name'); ?></a>
    </div>
<?php endif; ?>
