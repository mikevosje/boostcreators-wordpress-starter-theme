<?php
$id        = 'intro-' . $block['id'];
$className = 'intro';
if (! empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$className .= ! empty($block['align']) ? ' align' . $block['align'] : ' alignwide';
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php the_field('tekst');?>
</div>
