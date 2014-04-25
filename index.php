<?php get_header(); ?>
      
      
      <section>

        <main>
        
        <!-- START OF "The Loop" -->
        <?php
        /**
         * TODO: use the_ID() to generate a CSS class for each post
         * TODO: Add metadat for author, time, categories, taxonomy etc
         * TODO: Add moretag functionality
         * TODO: Add "edit post" functionality
         * TODO: Ensure scheduled posts don't appear before they're meant to
         */
        ?><?php if( have_posts() ) : ?>

          <?php while( have_posts() ) : the_post();  ?>

          <article>
            
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            
            <?php the_content(); ?>
            
          </article>          

            <?php endwhile; ?>

          <?php endif; ?><!-- END OF "The Loop" -->

        </main>

<?php get_sidebar(); ?>

      </section>


<?php get_footer(); ?>