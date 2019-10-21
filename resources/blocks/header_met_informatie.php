<?php
$id        = 'header-met-informatie-' . $block['id'];
$className = 'header-met-informatie';
if (! empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$className .= ' alignfull';
if (get_field('kleine_header')) {
    $className .= ' smallheader';
}
?>

<div id="<?php echo esc_attr($id); ?>" class="background-div <?php echo esc_attr($className); ?>"
     style="background-image: url('<?php the_field('afbeelding'); ?>')">
    <?php if(get_field('informatieblok')) :?>
    <div class="container">
        <div class="header-over-ons">
            <small class="d-block">Over ons</small>
            <h2><?php the_field('over_ons_titel'); ?></h2>
            <p><?php the_field('over_ons_tekst'); ?></p>
            <a class="verautomation_button" href="<?php the_field('over_ons_link'); ?>"><?php the_field('over_ons_button_tekst'); ?></a>
        </div>
    </div>
    <?php endif;?>
</div>
