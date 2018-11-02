        </div><!-- end content -->

    </div><!-- end wrap -->


    <footer role="contentinfo">

        <div id="footer-text">
            <?php echo get_theme_option('Footer Text'); ?>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
            <p style="width:100%;display:inline-block;">
              <?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?>
              <?php if (!current_user()) : ?>
                <a id="login_link" href="http://lonnrot.finlit.fi/omeka/users/login"><?php echo __('Researchers').' >>'; ?></a>
              <?php else: ?>
                <span id="logged_in"><?php echo __('Logged in: %s', current_user()->name);?></span>
                <a id="logout_link" href="http://lonnrot.finlit.fi/omeka/users/logout"><?php echo __('Log Out'); ?></a>
              <?php endif ?>
            </p>

        </div>

        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>

    </footer><!-- end footer -->

    <script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        ThanksRoy.moveNavOnResize();
        ThanksRoy.mobileMenu();
    });
    </script>

</body>
</html>
