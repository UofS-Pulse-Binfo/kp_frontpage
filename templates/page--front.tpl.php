<?php

/**
 * @file
 * Based on Bartiks page template, this template renders the frontpage of KnowPulse.
 */

$module_path = drupal_get_path('module','kp_frontpage');
?>
<div id="page-wrapper"><div id="page">

  <div id="header" style="height: 115px;" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>">

  <div class="section clearfix">

    <?php if ($logo): ?>

      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" height="87" width="309" />
      </a>

    <?php endif; ?>

    <!-- Omnibox Search bar!!! -->
    <div id="kp-header-search-box">
      <?php
        $render_arr = drupal_get_form('search_form');
        print drupal_render($render_arr);
      ?>
    </div>

    <!-- Need help button which is only on the front page -->
    <?php if ($variables['is_front'] === TRUE): ?>
     <div id="frontpage-start-tour">
      <span id="frontpage-tour-help">Need Help?</span>
      <a href="#" id="frontpage-tour-button">Start Tour</a>
     </div>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

      </div> <!-- /#name-and-slogan -->
    <?php endif; ?>

    <?php print render($page['header']); ?>

  </div></div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">
    <?php
    if (isset($breadcrumb)) {
      unset($breadcrumb);
    }

    if (isset($breadcrumb)):
    ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

    <div id="content" class="column"><div class="section">


      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>


      <!-- BEGIN NEW LAYOUT -->


      <?php
      // Sorry, IE ver 8 and below. Can't load the new layout to you.
      // This will force you to download a recent version and let's move forward.
      if (preg_match('/(?i)msie [1-8]/', $_SERVER['HTTP_USER_AGENT'])) :
      ?>

        <?php if ($title): ?>
          <h1 class="title" id="page-title">
            <?php print $title; ?>
          </h1>
        <?php endif; ?>

        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?>
          <div class="tabs">
            <?php print render($tabs); ?>
          </div>
        <?php endif; ?>

        <?php print render($page['help']); ?>

        <?php if ($action_links): ?>
          <ul class="action-links">
            <?php print render($action_links); ?>
          </ul>
        <?php endif; ?>

        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>

     <?php
     // Browser is not IE ver 8 and below. Enjoy!
     else:
     ?>
        <div id="main-slideshow-container">
          <div id="main-slideshow" class="container-row">
            <div class="info-col chevron-left"><span>&lang;</span></div>
            <div class="info-col slide-info">
              <div id="bg-main-slider">
                <?php print views_embed_view('kp_frontpage_main_slideshow', 'default'); ?>
              </div>
            </div>
            <div class="info-col chevron-right"><span>&rang;</span></div>
            <div class="clear-no-height">&nbsp;</div>
          </div>
           <ul class="bullets">
            <?php print str_repeat('<li>&nbsp;</li>', $main_slideshow_view); ?>
          </ul>
        </div>

        <!-- 2 COL LAYOUT -->
        <div class="container-row main-copy-container">
          <div class="info-col main-copy-left-container">
            <div id="infographics-container">
            <h2 class="h-section-title">&#9632; Explore <span>KnowPulse</span></h2>
              <?php print views_embed_view('kp_frontpage_infographics', 'default'); ?>
            </div>
            <div class="h-line clear-left"><hr /></div>
            <div id="general-info-container" class="info-text-block">
              <div id="general-information">
                <?php print views_embed_view('kp_frontpage_general_information', 'default'); ?>
              </div>
              <div class="tab-info-footer-shadow">&nbsp;</div>
            </div>

            <div class="container-row tab-info-block">
              <div class="tab-info-top-extension">&nbsp;</div>
              <div class="tab-info-tab-title">
                <h2 class="text-white"><a href="<?php print url('research/crop-species');?>">Crops</a></h2>
                <a href="research/crop-species" class="context-link">&raquo; More Crops</a>
              </div>
              <div class="tab-info-copy-text">
                <div class="tab-info-copy-wrapper">
                  <ul id="tab-info-crops" class="all-trim">
                    <?php
                      foreach($copy_crops_view as $view) :
                        $gs = $view['genus'] . ' ' . $view['species'];
                    ?>
                    <li>
                      <a href="<?php print url($view['genus'] . '/' . $view['species']); ?>">
                        <img src="<?php print url($module_path . '/images/kphome/crops-' . str_replace(' ', '-', strtolower($view['title'])) . '.jpg'); ?>" class="tab-info-img" height="107" width="107" alt="<?php print $gs; ?>" title="<?php print $gs; ?>" />
                        <?php print $view['title'] . '<em>' . $gs . '</em>'; ?>
                      </a>
                    </li>
                    <?php
                      endforeach;
                    ?>
                  </ul>
                  <div class="clear-no-height">&nbsp;</div>
                </div>
              </div>
              <div class="tab-info-footer-shadow">&nbsp;</div>
            </div>

            <div class="container-row tab-info-block">
              <div class="tab-info-top-extension">&nbsp;</div>
              <div class="tab-info-tab-title">
                <h2 class="text-white"><a href="<?php print url('data');?>">Tools</a></h2>
                <a href="<?php print url('data');?>" class="context-link">&raquo; More Tools</a>
              </div>
              <div class="tab-info-copy-text">
                <div class="tab-info-copy-wrapper">
                  <div class="container-row tab-info-tools-container">
                    <div class="info-col tab-info-tools-left">
                      <?php print views_embed_view('kp_frontpage_tools_left_column', 'default'); ?>
                    </div>
                    <div class="info-col tab-info-tools-center">&nbsp;</div>
                    <div class="info-col tab-info-tools-right">
                      <?php print views_embed_view('kp_frontpage_tools_right_column', 'default'); ?>
                    </div>
                    <div class="clear-no-height">&nbsp;</div>
                  </div>
                </div>
              </div>
              <div class="tab-info-footer-shadow">&nbsp;</div>
            </div>

            <div id="footer-slideshow" class="container-row footer-slideshow-container">
              <div class="info-col footer-slideshow-left">
                <div id="footer-slideshow-project" class="container-row">
                  <div class="info-col chevron-left"><span>&lang;</span></div>
                  <div class="info-col slide-info">
                    <h2 class="section-title">&#9632; Projects:</h2>
                    <a href="<?php print url('research/projects');?>" class="context-link">&raquo; More Projects</a>
                    <?php print views_embed_view('kp_homepage_footer_project_slideshow_view', 'default'); ?>
                  </div>
                  <div class="info-col chevron-right"><span>&rang;</span></div>
                  <div class="clear-no-height">&nbsp;</div>
                </div>
                <ul class="bullets">
                  <?php print str_repeat('<li>&nbsp;</li>', $footer_project_view); ?>
                </ul>
              </div>
              <div class="info-col footer-slideshow-center">
                &nbsp;<div class="h-line clear-left"><hr /></div>
              </div>
              <div class="info-col footer-slideshow-right">
                <div id="footer-slideshow-publication" class="container-row">
                  <div class="info-col chevron-left"><span>&lang;</span></div>
                  <div class="info-col slide-info">
                    <h2 class="section-title">&#9632; Publications:</h2>
                    <a href="<?php print url('research/publications')?>" class="context-link">&raquo; More Publications</a>
                    <?php print views_embed_view('kp_homepage_footer_publication_slideshow_view', 'default'); ?>
                  </div>
                  <div class="info-col chevron-right"><span>&rang;</span></div>
                  <div class="clear-no-height">&nbsp;</div>
                </div>
                <ul class="bullets">
                  <?php print str_repeat('<li>&nbsp;</li>', $footer_publication_view); ?>
                </ul>
              </div>
              <div class="clear-no-height">&nbsp;</div>
            </div>
          </div>

          <div class="info-col main-copy-right-container">
            <div class="col-stats">
              <h2 class="all-trim">Data Available <span style="float: right;"><img src="<?php print url($module_path . '/images/kphome/icon-stats-more-info.gif');?>" alt="More information" title="More information" height="22" width="22" id="btn-more-info" /></span></h2>
              <?php
                for ($i = 0; $i < 2; $i++) :
                  $stats = ($i == 0) ? $stats_bar_chart : $stats_bubble_chart;

                  foreach($stats as $t => $v) :
                    print '<input type="hidden" class="statset-' . $i . '" id="' . str_replace(' ', '-', trim($t)) . '" value="' . $v . '">';
                  endforeach;
                endfor;
              ?>
              <svg id="kp-chart">
                <defs>
                  <filter id="d-shadow" x="0" y="0">
                    <feOffset result="offOut" in="SourceAlpha" dx="2" dy="0" />
                    <feGaussianBlur result="blurOut" in="offOut" stdDeviation="2" />
                    <feBlend in="SourceGraphic" in2="blurOut" mode="normal" />
                  </filter>
                  <filter id="c-glow" x="-20%" y="-20%" width="200%" height="200%">
                    <feOffset result="offOut" in="SourceAlpha" dx="2" dy="0" />
                    <feGaussianBlur result="blurOut" in="offOut" stdDeviation="2" />
                    <feBlend in="SourceGraphic" in2="blurOut" mode="normal" />
                  </filter>
                </defs>
              </svg>
              <div id="stat-more-info">
                <span>&#x25B2;</span>
                <p>Current data includes sequence and genotypic data for <br /><br />&bull; Chickpea<br /> &bull; Common Bean<br /> &bull; Field Pea<br /> &bull; Lentil</p>
              </div>
            </div>
            <div class="col-social-network">
              <h2 class="h-section-title">&#9632; News & <span>Updates</span></h2>
              <?php print views_embed_view('kp_frontpage_news_and_updates', 'default'); ?>
            </div>
          </div>
          <div class="clear-no-height">&nbsp;</div>
        </div>

      <?php endif; ?>


      <!-- END NEW LAYOUT -->
    </div></div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

  <div id="footer-wrapper"><div class="section">

    <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
