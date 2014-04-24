<?php get_header(); ?>
      
      
      <section>
        
        <!-- START OF "The Loop" -->
        <?php
        /**
         * TODO: use the_ID() to generate a class for each post
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

        <?php endif; ?>
        
        <!-- END OF "The Loop" -->

      </section>

      <!-- START OF sidebar.php -->
      <?php
        /**
         * TODO: Move to sidebar.php
         * TODO: Add dynamic_sidebar functions
         */
      ?><aside>
        <p>This is the_sidebar()</p>
      </aside>
      <!-- END OF sidebar.php -->

<?php get_footer(); ?>