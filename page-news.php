<?php
/*
Template Name: для списка Новостей
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

get_header(); 
?>
<?php if ( have_posts() ) : the_post(); ?>

<?php posterity_title_bar(); ?>

<article id="content" class="clearfix">
    <div class="content-limiter">
        <div id="col-mask">

            <div id="post-<?php the_ID(); ?>" <?php post_class('content-box'); ?>>
                <div class="formatter">
                    <?php posterity_title_bar( 'inside' ); ?>
                    <div class="real-content">

                        <div class="chv-news-list">

<div class="chv-news-one">
</div>

<div class="chv-news-one">
</div>

<div class="chv-news-one">
</div>

                        </div>
                      

                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</article>

<?php endif; ?>

<?php get_footer(); ?>
