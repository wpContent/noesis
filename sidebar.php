      <?php
        /**
         * Check of the given sidebar has any widgets (is in use/is active)
         *
         * @uses $index (mixed) (required) Sidebar name or id.
         * @return (boolean) True if the sidebar is in use, otherwise the function returns false
         */
        if( is_active_sidebar( 'noesis-right-sidebar' ) ) : ?><!-- START OF sidebar.php -->
        <aside>
          <?php dynamic_sidebar( 'noesis-right-sidebar' ); ?>
        </aside>
        <!-- END OF sidebar.php -->
        <?php endif; ?>