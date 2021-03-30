<?php
/**
 * @file
 * help content.
 */

 // $path_images points to module kp-page assets
 // and crops sections uses image shared with crops
 // section of the homepage.

 // Redirect help page crops to this directory.
 $path_crop_img = str_replace('kp-page', 'crops-img', $path_images);
?>

<div id="kp-section-overview" class="kp-section">
  <div class="kp-section-wrapper">
    <br />
    <div class="kp-copy">
      <h1 class="kp-h1-title-main-text">Getting started with KnowPulse</h1>
      <h2 class="kp-h2-title-support-text">No matter which pulse crop data your are interested in,
      <br />these tips will help you get off a quick start with KnowPulse.

      <br /><br />Get to know KnowPulse in <a href="<?php print $path_host . 'overview'; ?>">KnowPulse Overview.</a>
      </h2>

     <br /><br />

      <div class="kp-video-container">
        <div>
          <div class="kp-video-presenter">
          <a href="#" class="kp-window-on kp-tip-top" data-text="Presented by: # Carolyn Caron"><img src="<?php print $path_images . 'team/carolyn.png'; ?>" height="90" width="90" /></a>
          </div>
          <iframe title="vimeo-player" src="https://player.vimeo.com/video/490326245" height="570" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>

      <div class="kp-section-title">
        <h3 class="kp-title-h3">Navigating KnowPulse</h3>
        <div class="kp-quick-notes" style="margin: 20px 0">
          <div>
            <div class="kp-green-round-bullet kp-col-left">&nbsp;</div>
            <div class="kp-col-left">Carolyn Caron</div>
          </div>

          <div class="kp-col-clear-float">&nbsp;</div>
          <small><i>Bioinformaticist <br />Pulse Crop Breeding and Genetics</i></small>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- knowledge based -->
<div id="kp-section-knowledge-based" class="kp-section">
  <div class="kp-section-wrapper kp-section-span">
    <div class="kp-copy">
      <div class="kp-section-title">
        <div>
          <div class="kp-col-left">
            <h3 class="kp-title-h3" style="color:#000000">Got Questions?<a name="questions"></a></h3>
          </div>
          <div class="kp-col-right" style="padding-top: 15px;">
            <a href="https://knowpulse-knowledgebase.github.io/" class="kp-window-on kp-tip-top" data-text="View all help topics using KP Data Carpentry Repository" target="_blank"><img src="<?php print $path_images . 'go-to-carpentry.jpg'; ?>" height="33" width="57" border="0"></a>
          </div>
          <div class="kp-col-clear-float">&nbsp;</div>
        </div>

        <div id="kp-search-box-container">
          <input type="text" value="Ask a question" id="kp-search-box" />
          <a href="#" id="kp-clear-search-box">Clear</a>
        </div>
      </div>

      <small>We found 5 results:</small>
      <table cellpadding="10" cellspacing="0">
        <?php
          // Only interested in values, header is irrelevant at this point.
          foreach($help_topics['values'] as $i => $value) {
            // NOTE: index values:
            // 0 - title
            // 1 - new?
            // 2 - content link
            // 3 - update link

            $highlight = ($i % 2) ? 'kp-td-highlight' : '';
        ?>

        <tr class="<?php print $highlight; ?>">
          <td width="97%"><a href="<?php print $value[2]; ?>" target="_blank"><?php print $value[0]; ?></a></td>
          <td width="1%">
            <?php
            // No update link provided, do not show.
            if ($value[1] == 'T') {
            ?>
              <img src="<?php print $path_images . 'kp-new-tutorial.png'; ?>" height="30" width="30" border="0" />
            <?php } ?>
          </td>

          <td width="1%">
            <?php
            // No update link provided, do not show.
            if ($value[3] != '') {
            ?>
            <a href="<?php print $value[3]; ?>" target="_blank"><img src="<?php print $path_images . 'kp-edit-tutorial.png' ;?>" height="25" width="25" border="0" /></a>
            <?php } ?>
          </td>

          <td width="1%"><a href="<?php print $value[2]; ?>" target="_blank"><img src="<?php print $path_images . 'kp-launch-tutorial.png'; ?>" height="25" width="25" border="0" /></a></td>
        </tr>

        <?php
            // End foreach loop.
          }
        ?>
      </table>

      <div id="kp-section-help-border">&nbsp;</div>
      <div class="kp-section-title">
        <h3 class="kp-title-h3">KnowPulse KnowledgeBase Overview</h3>
        <div class="kp-video-container">
          <div>
            <div class="kp-video-presenter">
              <a class="kp-window-on kp-top-top" href="#" data-text="Presented by: # Lacey Sanderson"><img src="<?php print $path_images . 'team/lacey.png'; ?>" width="90" height="90"></a>
            </div>
            <iframe title="vimeo-player" allowfullscreen="" src="https://player.vimeo.com/video/503668210" height="450" frameborder="0"></iframe>
          </div>
        </div>        
        <div class="kp-quick-notes" style="position: relative">
          <div>
            <div class="kp-green-round-bullet kp-col-left">&nbsp;</div>
            <div class="kp-col-left">Lacey Sanderson</div>
          </div>

          <div class="kp-col-clear-float">&nbsp;</div>
          <small><i>Lead Developer, Bioinformaticist<br>Pulse Crop Breeding and Genetics</i></small>
          <div id="kp-knowledgebase">
            <a href="https://knowpulse-knowledgebase.github.io/" target="_blank">knowpulse-knowledgebase.github.io</a>
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>

<!-- Use cases -->
<div id="kp-section-use-cases" class="kp-section">
 <div class="kp-section-wrapper kp-section-span">
   <div class="kp-hr-dotted-line">&nbsp;</div>
   <div class="kp-copy">
     <div class="kp-col-left kp-col" style="width: 45%">
       <div>
         <div class="kp-col-left">
           <img src="<?php print $path_images . 'team/ruobin.png'; ?>" height="104" width="106" />
         </div>
         <div class="kp-col-left">
           <div class="kp-section-title">
             <div class="kp-quick-notes" style="margin: 10px 0">
               <div>
                 <div class="kp-green-round-bullet kp-col-left">&nbsp;</div>
                 <div class="kp-col-left">Ruobin Liu</div>
               </div>

               <div class="kp-col-clear-float">&nbsp;</div>
               <small><i>Data Curator</i></small>
             </div>
           </div>
         </div>
         <div class="kp-col-clear-float"></div>
       </div>

       <p><br />Ruobin Liu talks about 2 breeding use cases: 1) How to use
       pedigree tool and linked phenotypic data to explore a
       specific cross in the field and 2) How to use germplasm
       search to find parents for a crossing block.<br /><br /></p>

       <div class="kp-video-container">
         <div>
           <iframe title="vimeo-player" src="https://player.vimeo.com/video/461892218" height="290" frameborder="0" allowfullscreen></iframe>
         </div>
       </div>


       <div class="kp-section-title">
         <h3 class="kp-title-h3">Breeding use cases</h3>
       </div>
     </div>

     <div class="kp-col-right" style="width: 45%">
       <div>
         <div class="kp-col-left">
           <img src="<?php print $path_images . 'team/laura.png'; ?>" height="104" width="106" />
         </div>
         <div class="kp-col-left">
           <div class="kp-section-title">
             <div class="kp-quick-notes" style="margin: 10px 0">
               <div>
                 <div class="kp-green-round-bullet kp-col-left">&nbsp;</div>
                 <div class="kp-col-left">Laura Jardine, M.Sc</div>
               </div>

               <div class="kp-col-clear-float">&nbsp;</div>
               <small><i>Project Manager, EVOLVES<br />Lentil Breeding and Genetics</i></small>
             </div>
           </div>
         </div>
         <div class="kp-col-clear-float"></div>
       </div>

       <p><br />KnowPulse provides the backbone structure that every
         project needs. With all project data housed, organized and made available in one
         versitile plantform, KnowPulse is also the face of a project.<br /><br /></p>

       <div class="kp-video-container">
         <div>
           <iframe title="vimeo-player" src="https://player.vimeo.com/video/502777927" height="290" frameborder="0" allowfullscreen></iframe>
         </div>
       </div>

       <div class="kp-section-title">
         <h3 class="kp-title-h3">Manager use cases</h3>
       </div>
     </div>
     <div class="kp-col-clear-float"></div>
   </div>
 </div>
</div>

<!-- Crops -->
<div id="kp-section-crop-links" class="kp-section">
 <div class="kp-section-wrapper kp-section-span">
   <div class="kp-copy">
     <ul class="kp-hr-list">
       <li>
         <img src="<?php print  $path_crop_img . 'chickpea.jpg'; ?>" height="90%" width="100%" border="0" alt="Chickpea" title="Chickpea" />
         <div>
           <a href="<?php print $path_host . 'Cicer/arietinum'; ?>">Chickpea</a>
           <a href="<?php print $path_host . 'Cicer/arietinum'; ?>"><img src="<?php print $path_images . 'icon-go.png'; ?>" height="45" width="45" border="0" /></a>
         </div>
       </li>
       <li>
         <img src="<?php print  $path_crop_img . 'lentil.jpg'; ?>" height="90%" width="100%" border="0" alt="Lentil" title="Lentil" />
         <div>
           <a href="<?php print $path_host . 'Lens/culinaris'; ?>">Lentil</a>
           <a href="<?php print $path_host . 'Lens/culinaris'; ?>"><img src="<?php print $path_images . 'icon-go.png'; ?>" height="45" width="45" border="0" /></a>
         </div>
       </li>
       <li>
         <img src="<?php print  $path_crop_img . 'drybean.jpg'; ?>" height="90%" width="100%" border="0" alt="Dry Bean" title="Dry Bean" />
         <div>
           <a href="<?php print $path_host . 'Phaseolus/vulgaris'; ?>">Dry Bean</a>
           <a href="<?php print $path_host . 'Phaseolus/vulgaris'; ?>"><img src="<?php print $path_images . 'icon-go.png'; ?>" height="45" width="45" border="0" /></a>
         </div>
       </li>
       <li>
         <img src="<?php print  $path_crop_img . 'faba.jpg'; ?>" height="90%" width="100%" border="0" alt="Faba Bean" title="Faba Bean" />
         <div>
           <a href="<?php print $path_host . 'Vicia/faba'; ?>">Faba Bean</a>
           <a href="<?php print $path_host . 'Vicia/faba'; ?>"><img src="<?php print $path_images . 'icon-go.png'; ?>" height="45" width="45" border="0" /></a>
         </div>
       </li>
       <li>
         <img src="<?php print  $path_crop_img . 'pea.jpg'; ?>" height="90%" width="100%" border="0" alt="Pea" title="Pea" />
         <div>
           <a href="<?php print $path_host . 'Pisum/sativum'; ?>">Pea</a>
           <a href="<?php print $path_host . 'Pisum/sativum'; ?>"><img src="<?php print $path_images . 'icon-go.png'; ?>" height="45" width="45" border="0" /></a>
         </div>
       </li>
     </ul>
     <div class="kp-col-clear-float"></div>
   </div>
 </div>
</div>

<!-- sections - skew element -->
<div id="kp-section-skew" class="kp-section">
  <div class="kp-section-wrapper" class="kp-section-span">
    <div id="kp-section-info">
      <div class="kp-skew-container">
        <div class="kp-skew-container-wrapper">
          <div class="kp-col-left" style="width: 15%;"><img src="<?php print $path_images . 'icon-pulses.png'; ?>" alt="Pulses" title="Pulses" height="90%" width="100%" /></div>
          <div class="kp-col-left kp-col" style="width: 80%;">
            <p>What are Pulses?<br /><br />
            Pulses are the dried, edible seeds of plants in the legume family and are both very high in protein and fibre,
            and low in fat. Dried peas, edible beans, lentils and chickpeas are the most common varieties of pulses.</p>
            <div class="kp-col-clear-float">&nbsp;</div>
          </div>
          <div class="kp-col-clear-float">&nbsp;</div>
        </div>
      </div>
      <div class="kp-skew-container-drop-shadow">&nbsp;</div>
    </div>
  </div>
</div>
