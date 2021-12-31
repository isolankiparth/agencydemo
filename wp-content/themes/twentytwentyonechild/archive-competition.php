<?php
/**
 * The template for displaying all competition
 *
 * @package Twenty_Twenty_One
 * @since Twenty Twenty-One Child 1.0.0
 */

get_header(); ?>

<div class="container">
    <div class="row">
    <!-- Get all competition -->
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <!-- Get featured image -->
                <?php if ( has_post_thumbnail() ) :
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); ?>
                        <img src="<?php echo $image[0]; ?>" class="card-img-top" alt="">
                <?php endif; ?>
                <div class="card-body">
                    <!-- Get title, description & post link -->
                    <?php the_title( '<h2 class="fs-2 card-title">', '</h2>' ); ?>
                    <p class="card-text"><?php the_excerpt(); ?></p><br>
                    <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">View Competition</a>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer();

        
