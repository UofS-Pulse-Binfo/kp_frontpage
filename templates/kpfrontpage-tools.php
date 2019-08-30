<?php
 /**
  * @file
  * Markup CROPS section.

  // LAYOUT:
  <ul>
    <li>
      <div><img alt="Tool information" /></div>
      <a>Tool name</a>
    </li>
    ...
  </ul>

  <ul style="display: none">
  ...
  </ul>

  <ul style="display: none">
  ...
  </ul>

  // NOTE:
  - Rearrage items (LI) to desired order where the most used or important tools are in the first row.

  - Use alternate text attribute of image to provide user with descriptive info about tools.

  - Group tool items into six (6) item per UL. Ensure that succeding UL or list is set
  to hidden by default. An option to expose these hidden items is available in the frontend.
  @see note below.
  */

  ////////////
?>
               <ul>
                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/blast.gif'; ?>" alt="The KnowPulse BLAST allows users to BLAST a query sequence against a number of public cDNA and genomic sequence sets for Lentil, Chickpe, Field Pea and Common Bean." /></div>
                   <a href="blast">BLAST</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/jbrowse.gif'; ?>" alt="JBrowse is a graphical means of exploring the features of a genome. KP has JBrowse instances available for Meicago (V4.0), Soybean (Phytosone v2.0), Common Bean (Phytozome v1.0) and Chickpea (Kabuli v1.0)." /></div>
                   <a href="tools/jbrowse">JBROWSE</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/genotype-matrix.gif'; ?>" alt="The Germplasm Genotype Tool allows researchers to compare genotypic data visually. The researcher indicates which germplasm interests them and the genotypes for those germplasm are shown side-by-side." /></div>
                   <a href="chado/genotype/Lens">GENOTYPE MATRIX</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/experiments.gif'; ?>" alt="Many projects produce multiple types of data which are made available as a dataset for easy lookup of project deliverables." /></div>
                   <a href="research/projects">EXPERIMENTS</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/variants.gif'; ?>" alt="Recent large scale genomics projects have resulted a large pool of defined sequence variation between germplasm." /></div>
                   <a href="search/variants">VARIANTS</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/sequences.gif'; ?>" alt="KnowPulse provides to both genomic and transcript sequence from Chickpea, Common Bean, Field Pea and Lentil." /></div>
                   <a href="search/sequences">SEQUENCES</a>
                 </li>
               </ul>

               <?php
               // Additional UL from here down should be hidden by default by setting style-display to none.
               // style="display: none;"
               ?>

               <ul style="display: none;">
                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/markers.gif'; ?>" alt="Many variants already have markers developed for them, providing a good resource for marker association studies." /></div>
                   <a href="search/markers">MARKERS</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/cvitjs.gif'; ?>" alt="" /></div>
                   <a href="cvitjs">CVIT JS</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/germplasm-matrix.gif'; ?>" alt="" /></div>
                   <a href="germplasm/summary/Lens">GERMPLASM MATRIX</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/user-charts.gif'; ?>" alt="" /></div>
                   <a href="user_charts">USER CHARTS</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/position-convert.gif'; ?>" alt="" /></div>
                   <a href="posconvert">POSITION CONVERT</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/bulk-loader.gif'; ?>" alt="" /></div>
                   <a href="filter_vcf">BULK LOADER</a>
                 </li>
               </ul>

