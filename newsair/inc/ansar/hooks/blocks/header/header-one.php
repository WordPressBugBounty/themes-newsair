<?php function newsair_header_default_section() { ?>
  <!--header-->
  <header class="bs-default">
    <!--top-bar-->
    <div class="bs-head-detail d-none d-lg-block">
      <?php do_action('newsair_action_header_section'); ?>
    </div>
    <!--/top-bar-->
    <div class="clearfix"></div>
    <!-- Main Menu Area-->
    <?php do_action('newsair_action_header_logo_section'); ?>
    <!-- /Main Menu Area-->
    <?php do_action('newsair_action_header_menu_section'); ?>
  </header>
  <!--/header-->
<?php }