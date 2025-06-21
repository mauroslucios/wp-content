<?php //to use wp udpate plugin
wp_enqueue_script( 'updates' ); ?>

<div class="theme-offer">
	<?php 
  if(isset($_GET['import-demo'])){
    $home_id=''; $blog_id=''; $page_id=''; $about_id='';


    // Function to check if a page with a specific title exists
    function page_exists_by_title($title) {
      $page_query = new WP_Query(array(
          'post_type'   => 'page',
          'title'       => $title,
          'post_status' => 'publish',
          'numberposts' => 1
      ));
      
      if ($page_query->have_posts()) {
          // Return the ID of the first matching page
          $page = $page_query->posts[0];
          return $page->ID;
      }
    
      return false; // Return false if no page found
    }

    //Homepage
    $home_title = 'Home';
    if (!page_exists_by_title($home_title)) {
      $home_content = '';
      $home = array(
        'post_type'    => 'page',
        'post_title'   => $home_title,
        'post_content' => $home_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_name'    => 'home'
      );

      $home_id = wp_insert_post($home);
      
      // Set the home page template
      add_post_meta($home_id, '_wp_page_template', 'page-template/custom-home-page.php');
      
      // Set the static front page
      update_option('page_on_front', $home_id);
      update_option('show_on_front', 'page');
    }

    // Create a Page if it doesn't exist
    if ( !page_exists_by_title('Page') ) {
      $page_title = 'Page';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page'
      );
      $page_id = wp_insert_post($ot_page);
    }

    if ( !page_exists_by_title('Page Left Sidebar') ) {
      $page_title = 'Page Left Sidebar';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page-left'
      );
      $page_id = wp_insert_post($ot_page);

      // Set the page template
      add_post_meta($page_id, '_wp_page_template', 'page-template/left-sidebar.php');
    }

    if ( !page_exists_by_title('Page Right Sidebar') ) {
      $page_title = 'Page Right Sidebar';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page-right'
      );
      $page_id = wp_insert_post($ot_page);

      // Set the page template
      add_post_meta($page_id, '_wp_page_template', 'page-template/right-sidebar.php');
    }

    // ------- Create Left Menu --------
    $menuname =  'Main Menu';
    $bpmenulocation = 'primary';
    $menu_exists = wp_get_nav_menu_object( $menuname );

    if (!$menu_exists) {
      // Create the menu
      $menu_id = wp_create_nav_menu($menuname);

      // Add the HOME item
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Home', 'medical-care'),
          'menu-item-classes' => 'home',
          'menu-item-url'     => home_url('/'),
          'menu-item-status'  => 'publish'
      ));

      // Add the PAGE item
      $parent_page_item_id = wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Pages', 'medical-care'),
          'menu-item-classes' => 'page',
          'menu-item-url'     => home_url('/index.php/page/'),
          'menu-item-status'  => 'publish'
      ));

      // Add the Page Left Sidebar item as a child of PAGE
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'   => __('Page Left Sidebar', 'medical-care'),
          'menu-item-classes' => 'page-left',
          'menu-item-url'     => home_url('/index.php/page-left/'),
          'menu-item-status'  => 'publish',
          'menu-item-parent-id' => $parent_page_item_id
      ));

      // Add the Page Right Sidebar item as a child of PAGE
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'   => __('Page Right Sidebar', 'medical-care'),
          'menu-item-classes' => 'page-right',
          'menu-item-url'     => home_url('/index.php/page-right/'),
          'menu-item-status'  => 'publish',
          'menu-item-parent-id' => $parent_page_item_id
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('About Us', 'medical-care'),
          'menu-item-classes' => 'aboutus',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Contact', 'medical-care'),
          'menu-item-classes' => 'contact',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Support', 'medical-care'),
          'menu-item-classes' => 'support',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));
      
      // Assign the menu to the desired location if not already assigned
      if (!has_nav_menu($bpmenulocation)) {
          $locations = get_theme_mod('nav_menu_locations');
          $locations[$bpmenulocation] = $menu_id;
          set_theme_mod('nav_menu_locations', $locations);
      }
    }
       
    // --------Header------------------------

    set_theme_mod( 'medical_care_our_location', 'Our Location' ); 

    set_theme_mod( 'medical_care_address', 'Dhaka,Uttara 1225' ); 

    set_theme_mod( 'medical_care_location_icon', 'fas fa-map-marker-alt' ); 

    set_theme_mod( 'medical_care_our_contact', 'Contact' ); 

    set_theme_mod( 'medical_care_phone_no', '+99 02 1122 88' ); 

    set_theme_mod( 'medical_care_phone_icon', 'fas fa-phone-volume' ); 

    set_theme_mod( 'medical_care_days_open', 'Sunday-Friday' ); 

    set_theme_mod( 'medical_care_opening_time', '09:00-22:00' ); 

    set_theme_mod( 'medical_care_time_icon', 'far fa-clock' ); 

    //-------------- Slider-----------------------

    for($i=1;$i<=4;$i++){

      $title = 'We are Always here to Serve You.';
      $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.Aster ipsum dolor Tur adipiscing elit, sed do eiusmod. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum';

      // Create post object
      $my_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
      );

      $slider_post_id = wp_insert_post($my_post);

      // Set theme mod for each post created
      set_theme_mod('medical_care_post_setting' . $i, $slider_post_id);

    }

    //-------------- Service-----------------------

    set_theme_mod( 'medical_care_our_services_subtitle', 'Our Services' ); 

    set_theme_mod( 'medical_care_our_services_title', 'Lorem Ipsum is simply dummy text' ); 

    $service_category = wp_create_category('Our Services'); 

    set_theme_mod( 'medical_care_service_count', '6' );

    for($i=1;$i<=6;$i++){

      $title = 'Lorem Ipsum';
      $content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

      // Create post object
      $my_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
       'post_category' => array($service_category) 
      );

      $service_post_id = wp_insert_post($my_post);

    }

    set_theme_mod( 'medical_care_category_setting', 'Our Services' );

  } ?>
    
  <p class="note"><?php esc_html_e("If your website is already live and containing data, please make a backup.This importer will override the Medical Care's new customizable values.",'medical-care'); ?></p>
  <form id="mep-demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=medical-care-guide-page" method="POST">
    <input type="submit" name="submit" value="<?php echo esc_attr( __('Begin With Demo Import', 'medical-care') ); ?>" class="button button-primary button-large">
    <a href="<?php echo esc_url(home_url('/')); ?>" target="_blank" class="button button-primary button-large"><?php esc_html_e('View Site','medical-care'); ?></a>
  </form>
  <div class="mep-spinner-div"><p class="spinner"></p></div>
  <div class="success">
    <?php if (isset($_GET['import-demo'])) {
       echo esc_html(__('Demo Import Successful', 'medical-care'));
    } ?>
  </div>
  <?php $admin_url = admin_url( 'admin-ajax.php' ); ?>

  <script type="text/javascript">
    function validate() {
      document.forms[0].submit();
    }
    jQuery(document).ready(function($) {
      var pathUrl = new URL(window.location.href)
      var searchParams = pathUrl.searchParams.get("import-demo")
      if(searchParams) {
        history.replaceState({}, '', 'themes.php?page=medical-care-guide-page')
      }
      $( "#mep-demo-importer-form" ).submit(function( event ) {
        event.preventDefault();
        if(confirm("Are you sure, you want to import demo content?")){
          $('.spinner').addClass('is-active');
          location.href = location.href + '&import-demo=true';
        } else {
          return false;
        }
      });
    });
  </script>
</div>