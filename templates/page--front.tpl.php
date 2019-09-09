<?php
/**
 * @file
 * Based on Bartiks page template, this template renders the frontpage of KnowPulse.
 */
?>

<div id="page-wrapper">
  <div id="page">
    <div id="kpfrontpage-page-wrapper">
       <div id="kpfrontpage-content-wrapper">
         <div id="kpfrontpage-header">
           <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
             <img src="<?php print $logo; ?>" alt="KnowPulse Home" title="KnowPulse Home" height="75" width="250" border="0" />
           </a>
           <div id="kpfrontpage-userpanel" class="kpfrontpage-element-right kpfrontpage-bg-navyblue">
             <ul class="kpfrontpage-horizontal-list">
               <?php if (user_is_logged_in()) {
                 // User is logged in, show more option in this panel.
               ?>

               <li class="kpfrontpage-popupwindow-element kpfrontpage-popupwindow-effect-dropwindow">
                 <a href="#" class="kpfrontpage-navigation-white" title="Explore KnowPulse: My Rawphenotypes panel.">My Raw Phenotypes</a>
                 <div class="kpfrontpage-popupwindow">
                   <?php
                   // Rawphenotypes Control Panel.
                   print render($page['sidebar_second']['rawpheno_rawpheno_notification_block']);
                   ?>
                 </div>
               </li>
               <li><a href="<?php print $path_host. '/admin/content/bio_data/add/kp-frontpage-cms'; ?>" class="kpfrontpage-navigation-white" title="Explore KnowPulse: Add news, updates and upcoming events.">Add News & Events</a></li>
               <li><a href="<?php print $path_host. '/admin/content/bio_data/add'; ?>" class="kpfrontpage-navigation-white" title="Explore KnowPulse: Add Biological Content.">Add Biological Content</a></li>
               <li><a href="<?php print $path_host . '/user/logout'; ?>" class="kpfrontpage-navigation-white" title="Explore KnowPulse: Sign out.">Logout</a></li>

               <?php
               } else {
                 // Current user is not logged in, show login link and login form.
               ?>

               <li class="kpfrontpage-popupwindow-element kpfrontpage-popupwindow-effect-dropwindow"><a href="user" class="kpfrontpage-navigation-white" title="Explore KnowPulse: Login to KnowPulse.">Sign in KP</a></li>
               <li><a href="user/register" class="kpfrontpage-navigation-white" title="Explore KnowPulse: Create an account in KnowPulse.">Signup an Account</a></li>

               <?php } ?>
             </ul>
             <div class="kpfrontpage-clearfloat">&nbsp;</div>
           </div>
         </div>
         <!-- /#header -->

         <div id="kpfrontpage-copy">
           <!-- /#quick summary -->
           <div id="kpfrontpage-copy-summary">
             <h2>&#9724; Explore KnowPulse:</h2>
             <p>a web-resource focused on <span class="kpfrontpage-text-italic">diversity data</span> for pulse crop improvement.</p>

             <div class="kpfrontpage-popupwindow-element kpfrontpage-popupwindow-effect-dropmenu kpfrontpage-element-right">
               <img src="<?php print $path_images . 'infographics/infographics-side-menu.png'; ?>" alt="Explore KnowPulse" title="Explore KnowPulse" />
               <div id="kpfrontpage-copy-summary-menu" class="kpfrontpage-popupwindow">
                 <?php
                 // Render side navigation into a drop down menu.
                 print '<ul id="kpfrontpage-copy-summary-menu-main">';
                 $m = array_keys($page['sidebar_second']);
                 $markup = '';

                 for($i = 2; $i < 7; $i++) {
                   if (trim($m[$i]) != '#sorted') {
                     $markup .= render($page['sidebar_second'][ $m[$i] ]);
                     print '<li id="' . str_replace('_', '-', $m[$i]) . '" class="kpfrontpage-navigation-horizontal-bar">'
                       . '&#x276F; ' . $page['sidebar_second'][ $m[$i] ]['#block']->subject . '</li>';
                   }

                 }

                 print '</ul>' . $markup;
                 ?>
               </div>
             </div>
             <div class="kpfrontpage-clearfloat">&nbsp;</div>
           </div>

           <!-- /#quick start -->
           <div id="kpfrontpage-copy-quickstart">
             <div class="kpfrontpage-element-left">
               <input id="kpfrontpage-copy-quickstart-searchbox" type="text" value="Find germplasm, publications, experiments and more..." title="Search all of KnowPulse: Find germplasm, publications, experiments and more..." />
               <input id="kpfrontpage-copy-quickstart-searchbutton" type="image" src="<?php print $path_images . 'infographics/infographics-quickstart-search.jpg'; ?>" alt="Submit" />
             </div>

             <div class="kpfrontpage-element-right">
               <ul class="kpfrontpage-horizontal-list">
                 <li><a href="research/projects" title="Explore KnowPulse see our experiments.">Our Experiments</a></li>
                 <li><a href="research/publications" title="Explore KnowPulse browse our publications.">Browse Publications</a></li>
                 <li><a href="germplasm/accession" title="Explore KnowPulse search germplasm.">Search Germplasm</a></li>
               </ul>
             </div>
             <div class="kpfrontpage-clearfloat">&nbsp;</div>
           </div>

           <!-- /#explore kp -->
           <div id="kpfrontpage-copy-explore-data">
             <!-- /#CROPS -->
             <div id="kpfrontpage-copy-explore-data-crops">
               <h1 class="kpfrontpage-data-header"><span class="kpfrontpage-text-italic">Crops</span></h1>
               <?php
               // CROPS:
               //
               //
               // Module page $module_path required:
               include_once('kpfrontpage-crops.php');
               ?>
               <a href="http://localhost/KnowPulse-TEST/research/species" target="_blank" alt="link opens a new window" title="link opens a new window" class="kpfrontpage-element-right kpfrontpage-more">&#9724; View other species of interest
               <img src="<?php print $path_images . 'infographics/infographics-new-window.gif'; ?>" align="absmiddle" /></a>
               <div class="kpfrontpage-clearfloat">&nbsp;</div>
             </div>

             <!-- /#TOOLS -->
             <div id="kpfrontpage-copy-explore-data-tools">
               <h1 class="kpfrontpage-data-header"><span class="kpfrontpage-text-italic">Tools</span></h1>
               <div id="kpfrontpage-popupwindow-remote-window">
                 <div>&nbsp;</div>
               </div>
               <?php
               // TOOLS:
               //
               //
               include_once('kpfrontpage-tools.php');
               ?>
               <div class="kpfrontpage-clearfloat">&nbsp;</div>
               <a href="#" class="kpfrontpage-element-right kpfrontpage-more">&#9724; View other bioinformatics tools</a>
             </div>

             <div class="kpfrontpage-clearfloat">&nbsp;</div>

             <!-- /#DATA -->
             <div id="kpfrontpage-copy-explore-data-data">
               <h1 class="kpfrontpage-data-header"><span class="kpfrontpage-text-italic">Data</span></h1>
               <div>
                 <div>
                   <div class="kpfrontpage-copy-explore-data-data-summary-count kpfrontpage-bg-diagonallines" title="<?php print $data_stats['Phenotypes']['long_value']; ?>">
                     <span><?php print $data_stats['Phenotypes']['short_value']; ?></span> Phenotypes
                   </div>
                   <h2><img src="<?php print $path_images . 'infographics/infographics-data.gif'; ?>" align="absmiddle" /> Phenotypic Data</h2>
                   <ul class="kpfrontpage-horizontal-list">
                   <?php
                   $li = '<li>&nbsp;&nbsp;<a href="%s">&#9724; %s</a></li>';

                   // PHENOTYPES:
                   //
                   //
                   foreach ($page['sidebar_second']['menu_menu-phenotypic-data'] as $p) {
                     foreach ($p as $x) {
                       if (strlen($x['title']) > 5) {
                         printf($li, $x['href'], $x['title']);
                       }

                       foreach($x as $u) {
                         if (strlen($u['#title']) > 5) {
                           printf($li, $u['#href'], $u['#title']);
                         }
                       }
                     }
                   }
                   ?>
                   </ul>
                   <div class="kpfrontpage-clearfloat">&nbsp;</div>
                 </div>
                 <div>
                   <div class="kpfrontpage-copy-explore-data-data-summary-count kpfrontpage-bg-diagonallines" title="<?php print $data_stats['Genotype Calls']['long_value']; ?>">
                     <span><?php print $data_stats['Genotype Calls']['short_value']; ?></span> Genotype Calls
                   </div>
                   <h2><img src="<?php print $path_images . 'infographics/infographics-data.gif'; ?>" align="absmiddle" /> Genomic Data</h2>
                   <ul>
                   <?php
                   // GENOMIC DATA:
                   //
                   //
                   foreach ($page['sidebar_second']['menu_menu-genomic-data'] as $p) {
                     foreach ($p as $x) {
                       if (strlen($x['title']) > 5) {
                         printf($li, $x['href'], $x['title']);
                       }

                       foreach($x as $u) {
                         if (strlen($u['#title']) > 5) {
                           printf($li, $u['#href'], $u['#title']);
                          }
                       }
                     }
                   }
                   ?>
                   </ul>
                   <div class="kpfrontpage-clearfloat">&nbsp;</div>
                 </div>
                 <div>
                   <div class="kpfrontpage-copy-explore-data-data-summary-count kpfrontpage-bg-diagonallines" title="<?php print $data_stats['Germplasm']['long_value']; ?>">
                     <span><?php print $data_stats['Germplasm']['short_value']; ?></span> Germplasm
                   </div>
                   <h2><img src="<?php print $path_images . 'infographics/infographics-data.gif'; ?>" align="absmiddle" /> Germplasm</h2>
                   <ul>
                   <?php
                   // GERMPLASM:
                   //
                   //
                   foreach ($page['sidebar_second']['menu_menu-germplasm'] as $p) {
                     foreach ($p as $x) {
                       if (strlen($x['title']) > 3) {
                         printf($li, $x['href'], $x['title']);
                       }

                       foreach($x as $u) {
                         if (strlen($u['#title']) > 5) {
                           printf($li, $u['#href'], $u['#title']);
                          }
                       }
                     }
                   }
                   ?>
                   </ul>
                   <div class="kpfrontpage-clearfloat">&nbsp;</div>
                 </div>
               </div>
               <p>* Current data includes sequence and genotypic data for Chickpea, Common Bean, Field Pea and Lentil.</p>
             </div>

             <!-- /#NEWS, UPDATS, UPCOMING EVENTS AND WORKSHOPS -->
             <div id="kpfrontpage-copy-explore-data-extra" class="kpfrontpage-bg-navyblue">
               <div id="kpfrontpage-copy-explore-data-extra-news" class="kpfrontpage-element-left">
                 <h4>News and Updates</h4>
                 <div class="kpfrontpage-copy-explore-data-entry kpfrontpage-bg-diagonallines">
                   <?php print views_embed_view('kp_frontpage_news_and_updates', 'default'); ?>
                 </div>
                 <div class="kpfrontpage-copy-explore-data-entry-bullets">
                   <?php
                   $news = views_get_view_result('kp_frontpage_news_and_updates', 'default');
                   $news_count = count($news);
                   print str_repeat('<div>&nbsp;</div>', $news_count);
                   ?>
                 </div>
               </div>
               <div id="kpfrontpage-copy-explore-data-extra-events" class="kpfrontpage-element-left">
                 <h4>Upcoming Events <a href="https://knowpulse.usask.ca/research/workshops" class="kpfrontpage-navigation-white">&#9724; Workshops</a></h4>
                 <div class="kpfrontpage-copy-explore-data-entry kpfrontpage-bg-diagonallines">
                   <?php print views_embed_view('kp_frontpage_upcoming_events', 'default'); ?>
                 </div>
                 <div class="kpfrontpage-copy-explore-data-entry-bullets">
                   <?php
                   $events = views_get_view_result('kp_frontpage_upcoming_events', 'default');
                   $events_count = count($events);
                   print str_repeat('<div>&nbsp;</div>', $events_count);
                   ?>
                 </div>
               </div>
               <div class="kpfrontpage-clearfloat">&nbsp;</div>
             </div>
           </div>
         </div>
         <!-- /#copy -->
       </div>

       <div class="kpfrontpage-clearfloat">&nbsp;</div>
       <div id="kpfrontpage-footer-info">
         <div>
           <div class="kpfrontpage-element-left">
             <h4 style="font-size: 1.2em">University of Saskatchewan Pulse Crop Research</h4>
             <p>The <a href="https://agbio.usask.ca/research/centres-and-facilities/crop-development-centre.php" target="_blank">Crop Development Centre at the University of Saskatchewan</a> is well known as a major research center for pulse crop breeding and genetics (classical and molecular).</p>
           </div>

           <div class="kpfrontpage-element-right">
             <h4 style="font-size: 1.2em">What are Pulses?</h4>
             <p>Pulses are the dried, edible seeds of plants in the legume family and are both very high in protein and fibre, and low in fat. Dried peas, edible beans, lentils and chickpeas are the most common varieties of pulses.</p>
           </div>
         </div>
       </div>
    </div>

  <div class="kpfrontpage-clearfloat">&nbsp;</div>

  <div id="footer-wrapper">
    <div class="section">
      <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']);  ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']);  ?>
        <?php print render($page['footer_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
      <?php endif; ?>

      <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
      <?php endif; ?>
      <!-- /.section, /#footer-wrapper -->
      </div>
    </div>
    <!-- /#page, /#page-wrapper -->
  </div>
</div>




