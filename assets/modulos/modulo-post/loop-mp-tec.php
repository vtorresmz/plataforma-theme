<?php
/**
 * Custom loop para mostrar posts del CPT "post"
 * que tengan términos asignados en la taxonomía "post"
 */

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'ASC',
    'paged'          => $paged,
    'posts_per_page' => 1,

    /**
     * tax_query permite filtrar por taxonomías personalizadas.
     * En este caso, buscamos posts del CPT "bici"
     * que tengan al menos un término asociado a la taxonomía "autos".
     */
   'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'technology',
        ),
    ),
);

$loop_bicis = new WP_Query( $args );

if ( $loop_bicis->have_posts() ) :
    while ( $loop_bicis->have_posts() ) :
        $loop_bicis->the_post();
        ?>
<article class="group cursor-pointer flex-1 flex flex-col">
    <div class="relative w-full h-[200px] overflow-hidden rounded mb-3">
        <img alt="Tech Innovation"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
            data-alt="A clean, minimalist architectural space featuring sharp geometric lines and smooth concrete textures under bright natural daylight. The composition highlights editorial authority through structured grid-like forms, utilizing a palette of stark whites, charcoal blacks, and a subtle hint of crimson red to align with the modern news interface aesthetic. The atmosphere is quiet, focused, and highly professional."
            src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
    </div>
    <span class="font-label-sm text-label-sm text-secondary uppercase mb-2">
        <?php $categories_list = get_the_category_list( esc_html__( ', ', 'tarea4blog' ) );
            echo $categories_list;
            ?>

    </span>
    <h2 class="font-headline-md text-headline-md text-on-background mb-2 group-hover:text-secondary transition-colors">
        <?php echo get_the_title();?></h2>
    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-2">Researchers achieve a breakthrough in
        <?php echo get_the_excerpt();?></p>
</article>








<?php
    endwhile;
else :
    ?>

<p>No hay noticias disponibles en esta taxonomía.</p>

<?php
endif;

wp_reset_postdata();
?>