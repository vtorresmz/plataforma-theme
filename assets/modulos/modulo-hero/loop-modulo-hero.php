<section class="hero__v6 section" id="home">
    <?php 
        $temp = $wp_query; 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
        $args = array( 
            'post_type' => 'hero', 
            'orderby' => 'date', 
            'order' => 'ASC', 
            'paged' => $paged, 
            'posts_per_page' => 1 
        ); 
        $wp_query = new WP_Query($args); 
        if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="row">
                    <div class="col-lg-11">
                        <span class="hero-subtitle text-uppercase" data-aos="fade-up" data-aos-delay="0">
                            <?php echo get_the_excerpt(); ?>
                        </span>

                        <h1 class="hero-title mb-3" data-aos="fade-up" data-aos-delay="100">
                            <?php the_title(); ?>
                        </h1>

                        <p class="hero-description mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="200">
                            <?php the_content(); ?>
                        </p>

                        <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="300">
                            <a class="btn" href="<?php echo esc_url(get_field('link_boton_uno_hero')); ?>">
                                <?php echo esc_html(get_field('boton_uno_hero')); ?>
                            </a>

                            <a class="btn btn-white-outline"
                                href="<?php echo esc_url(get_field('link_boton_uno_hero')); ?>">
                                <?php echo esc_html(get_field('boton_dos_hero')); ?>
                                <svg class="lucide lucide-arrow-up-right" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7 7h10v10"></path>
                                    <path d="M7 17 17 7"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="logos mb-4" data-aos="fade-up" data-aos-delay="400">
                            <span class="logos-title text-uppercase mb-4 d-block">
                                <?php echo esc_html(get_field('texto_logo_hero')); ?>
                            </span>
                            <div class="logos-images d-flex gap-4 align-items-center">
                                <?php
                                if( have_rows('logo_hero') ):
                                    while( have_rows('logo_hero') ) : the_row();
                                        $image_id = get_sub_field('imagen_logo');
                                        echo wp_get_attachment_image($image_id, 'full', false, array('class' => 'img-fluid js-img-to-inline-svg', 'style' => 'width: 110px;'));
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-img">
                    <?php 
                    $image_targeta = get_field('imagen_targeta_hero');
                    if( !empty($image_targeta) ): ?>
                    <img class="img-card img-fluid" src="<?php echo esc_url($image_targeta['url']); ?>"
                        alt="<?php echo esc_attr($image_targeta['alt']); ?>" data-aos="fade-down" data-aos-delay="600">
                    <?php endif; ?>

                    <img class="img-main img-fluid rounded-4"
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                        alt="<?php the_title_attribute(); ?>" data-aos="fade-in" data-aos-delay="500">
                </div>
            </div>
        </div>
    </div>

    <?php endwhile; endif; wp_reset_query(); $wp_query = $temp; ?>
</section>