<?php
/**
 * The template for displaying competition details
 *
 * @package Twenty_Twenty_One
 * @since Twenty Twenty-One Child 1.0.0
 */

get_header(); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <!-- Get competition info -->
            <div class="card">
                <?php 
                // Define entry form button url
                $submit_entry_url = get_site_url().'/'.$post->post_name.'/submit-entry/';
                // Get featured image
                if ( has_post_thumbnail() ) :
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); ?>
                        <img src="<?php echo $image[0]; ?>" class="card-img-top" alt="">
                <?php endif; ?>
                <div class="card-body">
                    <!-- Get title & description -->
                    <?php the_title( '<h1 class="fs-1 card-title">', '</h1>' ); ?>
                    <p class="card-text"><?php the_content(); ?></p><br>
                    <a href="<?php echo $submit_entry_url; ?>" class="btn btn-primary">Submit Entry</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
