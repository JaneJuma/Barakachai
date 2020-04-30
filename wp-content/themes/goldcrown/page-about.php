<?php
/*
 *  Template Name: About
 */

get_header();?>
<section>

    <div class="about-video">
            <img src="<?php bloginfo('template_url');?>/assets/images/about-image.png" />
    </div>

    <div class="who-we-are-wrapper">
        <div class="who-we-are about-bg">
            <div class="who-video-wrapper about-detais">
                
                <div class="inner-video-right read-more-about">
                    
                    <?php $content=apply_filters('the_content', get_post_field('post_content')); echo $content; ?>
here
                    <ul class="about-social-share">
                        <li>
							<a class="fa fa-facebook" title="Click to share this product on Facebook" href="https://www.facebook.com/sharer?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank" rel="noopener"></a>
						</li>
                        <li>
							<a class="fa fa-twitter" title="Click to share this product on Twitter" href="http://twitter.com/intent/tweet?text= <?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank" rel="noopener"></a>
						</li>
						
                    </ul>
                    
                    
                </div>
                
                
                
            </div>
        </div>
        <div class="who-description">
            <ul>
                <li class="who1">
                    <h1>5</h1>
                    <p>Tea Variants</p>
                </li>
                <li class="who2">
                    <a href="#">
                        <h1>52</h1>
                        <p>Tea blends</p>
                    </a>

                </li>
                <li class="who3">
                    <h1>1</h1>
                    <p>Company with shared Values, Mission & Vision</p>
                </li>
            </ul>
        </div>
    </div>

    <!--div class="home-brief-about">
        <div class="brief-about mission">
            <h3>Mission</h3>
            <p>Kericho Gold Teas and Infusions are tasty and full of fragrance that is why there is no added sugar, no artificial colors or preservatives, just the great tasting flavors.</p>
        </div>
        <div class="brief-about vision">
            <h3>Vision</h3>
            <p>Kericho Gold Teas and Infusions are tasty and full of fragrance that is why there is no added sugar, no artificial colors or preservatives, just the great tasting flavors.</p>
        </div>
        <div class="brief-about values">
            <h3>Values</h3>
            <p>Kericho Gold Teas and Infusions are tasty and full of fragrance that is why there is no added sugar, no artificial colors or preservatives, just the great tasting flavors.</p>
        </div>
    </div -->
</section>

<?php get_footer();?>
