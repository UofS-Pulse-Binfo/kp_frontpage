<?php
/**
 * @file
 * Blank page template, this template renders the KP overview page.
 */
?>
<div id="kp-pop-window" style="display: none;"></div>
<div id="kp-window-blanket" style="display: none;">&nbsp;</div>
<div class="kp-window">
  <h3>KnowPulse adheres to<br />data, software and research principles.</h3>
  <span>[X]</span>
  <ul>
    <li>
      <strong>Open source</strong> is code made freely available for possible modification and
      redistribution. Products include permission to use the source code, design documents, or
      content of the product.
      <br /><a href="http://opensource.org" target="_blank">www.opensource.org</a>
      <br /><br />
    </li>
    <li>
      <strong>FAIR</strong> data are data which meet principles of findability, accessibility,
      interoperability, and reusability. A March 2016 publication by a consortium of scientists
      and organizations specified the FAIR Guiding Principles for scientific data management and
      stewardship in Scientific Data, using FAIR as an acronym and making the concept easier to discuss.
      <br /><a href="https://www.go-fair.org/fair-principles" target="_blank">www.go-fair.org</a>
      <br /><br />
    </li>
    <li>
      <strong>TRUST</strong> an RDA community effort has led to the development and publication,
      in Nature Research’s Scientific Data, of the article, “The TRUST Principles for digital
      repositories”. These principles offer guidance for maintaining the trustworthiness of digital
      repositories, especially those responsible for the stewardship of research data.
      <br /><a href="https://www.rdc-drc.ca/research-data-canada-endorses-trust-principles-for-trustworthy-digital-data-repositories" target="_blank">www.rdc-drc.ca</a>
      <br /><br />
    </li>
    <li>
      <strong>The Breeding API (BrAPI)</strong> project is an effort to enable interoperability
      among plant breeding databases. BrAPI is a standardized RESTful web service API specification
      for communicating plant breeding data. This community driven standard is free to be used by
      anyone interested in plant breeding data management.
      <br /><a href="https://brapi.org" target="_blank">www.brapi.org/</a>
      <br /><br />
    </li>
  </ul>
</div>

<div id="kp-light-gray-banner">&nbsp;</div>

<div id="kp-main-container">
  <div id="kp-content-wrapper">
    <!-- header -->
    <div id="kp-top-header" class="kp-section">
      <div class="kp-section-wrapper">
        <div id="kp-branding">
          <a href="<?php print $path_host; ?>"><img src="<?php print $path_images . 'header-kp-logo.png'; ?>" height="72" width="263" border="0" alt="Go to KnowPulse homepage" title="Go to KnowPulse homepage" /></a>
        </div>

        <div id="kp-socialnetwork">
          <div class="kp-col-left">
            <ul class="kp-hr-list">
              <li>
                <a href="https://twitter.com/WildLentils" target="_blank"><img src="<?php print $path_images . 'social-network-twitter.jpg'; ?>" height="30" width="30" border="0" alt="twitter" title="twitter" /></a>
              </li>
              <li>
                <a href="https://vimeo.com/uofspulsebinfo" target="_blank"><img src="<?php print $path_images . 'social-network-vimeo.jpg'; ?>" height="30" width="30"  border="0" alt="vimeo" title="vimeo" /></a>
              </li>
              <li>
                <a href="https://github.com/UofS-Pulse-Binfo" target="_blank"><img src="<?php print $path_images . 'social-network-github.jpg'; ?>" height="30" width="30"  border="0" alt="github" title="github" /></a>
              </li>
              <li class="kp-vr-dotted-line">&nbsp;</li>
              <li>&nbsp;</li>
              <li class="kp-launch-window">
                <img src="<?php print $path_images . 'social-network-check.jpg'; ?>" id="kp-all-principles" height="38" width="38" align="absmiddle" />
                <a href="#" class="kp-link-black-nostyle kp-window-on kp-tip-top" data-text="KnowPulse is Open source - source code that is made freely available.">Open Source</a> &bull;
                <a href="#" class="kp-link-black-nostyle kp-window-on kp-tip-top" data-text="KnowPulse adheres to FAIR - data are data which meet principles of findability, accessibility, interoperability, and reusability.">FAIR</a> &bull;
                <a href="#" class="kp-link-black-nostyle kp-window-on kp-tip-top" data-text="KnowPulse adheres to TRUST - guidance for maintaining the trustworthiness of digital repositories.">TRUST</a> &bull;
                <a href="#" class="kp-link-black-nostyle kp-window-on kp-tip-top" data-text="KnowPulse is BrAPI enabled - The Breeding API (BrAPI) project is an effort to enable interoperability among plant breeding databases.">BrAPI</a>
              </li>
            </ul>
          </div>
          <div class="kp-col-right">
            <span class="kp-blue-square-bullet">&#9632;</span><a href="mailto:knowpulse@usask.ca" class="kp-link-black-nostyle">knowpulse&#64;usask.ca</a>
          </div>
          <div class="kp-col-clear-float">&nbsp;</div>
        </div>
      </div>
    </div>

    <!-- sections -->

    <?php
      // Header and footer section identical in either pages, only the content
      // changes. This will load requested page content.
      $content = ($page_content == 'overview') ? 'overview' : 'help';
      include_once('page/' . $content . '.php');
    ?>

    <!-- sections - partners -->
    <div id="kp-section-partners" class="kp-section">
      <div class="kp-section-wrapper kp-section-span">
        <div class="kp-copy">
          <table cellspacing="20">
            <tr>
              <td align="center" valign="middle">
                <a href="http://www.usask.ca" target="_blank"><img src="<?php print $path_images . 'usask-logo-lg.png'; ?>" height="90" width="390" border="0" alt="Go to USASK homepage" title="Go to USASK homepage" ></a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- sections - footer -->
    <div id="kp-section-footer" class="kp-section">
      <div class="kp-section-wrapper">
        <div class="kp-copy">
          <div class="kp-col-left">
            <div class="kp-col-left">
              <a href="<?php print $path_host; ?>"><img src="<?php print $path_images . 'kp-logo-footer.jpg'; ?>" height="39" width="45" border="0" alt="Go to KnowPulse homepage" title="Go to KnowPulse homepage" /></a>
            </div>
            <div class="kp-col-left">
              <h4>KnowPulse</h4>
              Sanderson L-A, Caron CT, Tan R, Shen Y, Liu R and Bett KE (2019)<br />
              KnowPulse: A Web-Resource Focused on Diversity Data for Pulse Crop Improvement<br />
              Front. Plant Sci. 10:965.
            </div>
          </div>
          <div class="kp-col-right">
            <a href="https://www.frontiersin.org/articles/10.3389/fpls.2019.00965/full" target="_blank"><img src="<?php print $path_images . 'icon-doi.jpg'; ?>" height="50" width="51" border="0" alt="Technology and Code ARTICLE" title="Technology and Code ARTICLE" /></a>
            <a href="https://www.frontiersin.org/articles/10.3389/fpls.2019.00965/full" target="_blank">10.3389/fpls.2019.00965</a>
          </div>
          <div class="kp-col-clear-float">&nbsp;</div>
        </div>
      </div>
    </div>
  </div>
  <div id="kp-backtop">Back to top</div>
</div>
