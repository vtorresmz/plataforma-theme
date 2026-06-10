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
            'terms'    => 'Ecanomy',
        ),
    ),
);

$loop_bicis = new WP_Query( $args );

if ( $loop_bicis->have_posts() ) :
    while ( $loop_bicis->have_posts() ) :
        $loop_bicis->the_post();
        ?>

<article class="md:col-span-8 group cursor-pointer">
    <div class="relative w-full h-[500px] overflow-hidden rounded mb-4">
        <img alt="Global Economic Summit"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
            data-alt="A striking digital installation art piece featuring glowing, generative geometric shapes suspended in a vast, minimalist gallery space. The room is illuminated by high-key, soft white lighting that creates a bright, modern light-mode aesthetic. The artwork relies on a sophisticated palette of deep blacks and pristine whites, punctuated by intense accents of vibrant red. The mood is serene yet technologically advanced."
            src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
        <div
            class="absolute top-4 left-4 bg-surface-container-lowest/90 px-3 py-1 rounded-full border border-outline-variant">
            <span class="font-label-sm text-label-sm text-primary uppercase"><?php $categories_list = get_the_category_list( esc_html__( ', ', 'tarea4blog' ) );
            echo $categories_list;
            ?></span>
        </div>
    </div>
    <h1 class="font-display-xl text-display-xl text-on-background mb-2 group-hover:text-secondary transition-colors">
        <?php echo get_the_title();?></h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant line-clamp-2">
        <?php echo get_the_excerpt();?>
    </p>
    <div class="mt-4 flex items-center gap-4 font-meta-xs text-meta-xs text-outline">
        <span>
            <?php tarea4blog_posted_by();?></span>
        <span>•</span>
        <span><?php tarea4blog_posted_on();?></span>
    </div>
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