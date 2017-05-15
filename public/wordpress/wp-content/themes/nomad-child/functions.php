<?php
function addPhones() {
    ?>
  <script>
    window.onload = function() {
      $(".site-branding").after('<div class="calls"><img alt="Phone" src="<?= get_stylesheet_directory_uri(). "/img/phone-icon.png "?>"><div class="phones"><p><a href="tel:+77027227802">+7 (702) 722 78 02</a></p><p><a href="tel:+77027583053">+7 (702) 758 30 53</a></p></div></div>');
    }
  </script>

  <?php
}
add_action("wp_head", "addPhones", 5);

function daniiltserin_nomad_setup() {
    wp_enqueue_style( "template", get_template_directory_uri()."/style.css", [], 2 );
    wp_enqueue_style( "main-child", get_stylesheet_directory_uri()."/assets/css/main.css", ["template", "bootstrap"], 2 );
}
add_action( "after_setup_theme", "daniiltserin_nomad_setup" );