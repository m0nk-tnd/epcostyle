<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<header id="navbar" role="banner">
  <div class="<?php print $container_class; ?>">
    <div class="row">
      <div class="navbar-header">
        <div id="logo-wrapper" class="col-xs-4 col-sm-2">
          <?php if ($logo): ?>
            <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>

          <?php if (!empty($site_name)): ?>
            <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
          <?php endif; ?>
        </div>

        <?php if (!empty($page['header'])): ?>
          <?php print render($page['header']); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div id="main-menu-wrapper">

    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
      <div class="container">
        <div class="row">
          <div class="button-container visible-xs visible-sm">
            <div class="btn-wrapper visible-xs visible-sm pull-left">
              <button type="button" class="navbar-toggle visible-xs visible-sm" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <p class="navbar-toggle-tnd"><?php print t('Site menu'); ?></p>
          </div>

          <div class="navbar-collapse collapse">
            <nav role="navigation">
              <?php if (!empty($primary_nav)): ?>
                <?php print render($primary_nav); ?>
              <?php endif; ?>
              <?php if (!empty($secondary_nav)): ?>
                <?php print render($secondary_nav); ?>
              <?php endif; ?>
              <?php if (!empty($page['navigation'])): ?>
                <?php print render($page['navigation']); ?>
              <?php endif; ?>
            </nav>
          </div>
        </div>
      </div>

    <?php endif; ?>
  </div>
</header>

<div class="main-container <?php print $container_class; ?>">

  <!-- <header role="banner" id="page-header">
</header> -->

<div class="row">

  <div class="col-xs-12 h1-bread-wrapper">
    <?php print render($title_prefix); ?>
    <?php if (!empty($title)): ?>
      <h1 class="page-header"><?php print $title; ?></h1>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
    <?php print $messages; ?>
    <?php if (!empty($tabs)): ?>
      <?php print render($tabs); ?>
    <?php endif; ?>
  </div>

  <?php if (!empty($page['sidebar_first'])): ?>
    <aside class="col-xs-12 col-sm-12 col-md-3 sidebar-first-wrapper" role="complementary">
      <div class="row">
        <?php print render($page['sidebar_first']); ?>
      </div>
    </aside>  <!-- /#sidebar-first -->
  <?php endif; ?>

  <section<?php print $content_column_class; ?>>
  <?php if (!empty($page['highlighted'])): ?>
    <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
  <?php endif; ?>
  <a id="main-content"></a>
  <?php if (!empty($page['help'])): ?>
    <?php print render($page['help']); ?>
  <?php endif; ?>
  <?php if (!empty($action_links)): ?>
    <ul class="action-links"><?php print render($action_links); ?></ul>
  <?php endif; ?>
  <?php print render($page['content']); ?>
</section>

<?php if (!empty($page['sidebar_second'])): ?>
  <aside class="col-sm-3 sidebar-second-wrapper" role="complementary">
    <?php print render($page['sidebar_second']); ?>
  </aside>  <!-- /#sidebar-second -->
<?php endif; ?>

</div>
</div>

<?php if (!empty($page['footer'])): ?>
  <footer class="footer <?php print $container_class; ?>">
    <?php print render($page['footer']); ?>
  </footer>
<?php endif; ?>
<svg class="defs">
  <defs>
    <g id="mail-svg"><path d="M79.734,14.87H20.264c-3.013,0-5.849,0.756-8.333,2.081l34.871,34.874c1.695,1.688,4.701,1.688,6.399,0   l34.871-34.874C85.581,15.626,82.747,14.87,79.734,14.87z"/><path d="M40.405,58.221l-6.795-6.796L6.137,78.899c3.243,4.264,8.354,7.027,14.127,7.027h59.471   c5.77,0,10.884-2.764,14.129-7.027L66.389,51.425l-6.791,6.796c-2.559,2.553-5.966,3.964-9.598,3.964   C46.368,62.185,42.961,60.773,40.405,58.221z"/><path d="M2.5,68.164c0,0.507,0.035,1.006,0.074,1.5l24.638-24.636L5.29,23.104c-1.758,2.757-2.79,6.023-2.79,9.532   V68.164z"/><path d="M97.5,32.636c0-3.509-1.032-6.775-2.79-9.532L72.785,45.028l24.641,24.636   c0.037-0.494,0.074-0.993,0.074-1.5V32.636z"/></g>
    <g id="marker-svg">
      <path d="M12,2C8.1,2,5,5.1,5,9s7,13,7,13s7-9.1,7-13S15.9,2,12,2z M12,12c-1.7,0-3-1.3-3-3c0-1.7,1.3-3,3-3c1.7,0,3,1.3,3,3  C15,10.7,13.7,12,12,12z"/>
    </g>
    <g id="phone-svg">
      <path d="M77.5,1.7H22.5C11,1.7,1.7,11,1.7,22.5v54.9C1.7,89,11,98.3,22.5,98.3h54.9c11.5,0,20.8-9.3,20.8-20.8V22.5  C98.3,11,89,1.7,77.5,1.7z M79.8,73.8c-1.5,1.6-3.3,3.1-4.7,4.8c-2.2,2.4-4.9,3.3-8,3.1c-4.4-0.3-8.5-1.8-12.6-3.7  c-8.9-4.3-16.6-10.3-23-18c-4.7-5.7-8.6-11.7-11.2-18.7c-1.2-3.4-2.1-6.8-1.8-10.3c0.2-2.2,1.1-4.1,2.7-5.7c1.7-1.7,3.4-3.4,5.2-5.2  c2.3-2.2,5.2-2.2,7.4,0c1.4,1.3,2.8,2.8,4.2,4.2c1.3,1.3,2.7,2.7,4.1,4.1c2.4,2.4,2.4,5.2,0,7.6c-1.7,1.7-3.4,3.4-5.2,5.1  c-0.5,0.5-0.5,0.8-0.3,1.3c1.1,2.8,2.8,5.2,4.6,7.5c3.7,4.6,8,8.6,12.9,11.8c1.1,0.7,2.3,1.1,3.4,1.8c0.6,0.3,1,0.2,1.4-0.3  c1.7-1.7,3.4-3.4,5.2-5.2c2.3-2.3,5.2-2.3,7.4,0c2.8,2.8,5.6,5.6,8.3,8.3C82.1,68.5,82.1,71.4,79.8,73.8z"/>
    </g>
  </defs>
</svg>