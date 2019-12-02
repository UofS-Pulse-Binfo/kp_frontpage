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
  apply spacer to achieve balance and center fewer than 6 items.
  </ul>

  <ul style="display: none">
  ...
  apply spacer to achieve balance and center fewer than 6 items.
  </ul>

  // NOTE:
  - Rearrage items (LI) to desired order where the most used or important tools are in the first row.

  - Use alternate text attribute of image to provide user with descriptive info about tools.

  - Group tool items into six (6) item per UL. Ensure that succeding UL or list is set
  to hidden by default. An option to expose these hidden items is available in the frontend.
  @see note below.

  - To maintain balance count and item positioning, apply a spacer element.
  <li class="kpfrontpage-tools-spacer">&nbsp;</li>
  to indicate a blank or empty item.
  Exampple: 10 tools, 6 item first row and 4 items 2nd row.

  tool 1 tool 2 tool 3 tool 4 tool 5 tool 6
  spacer tools 7 tool 8 tool 9 tool 10 spacer - this will center 4 items underneath 6 item row.
  */

  // ORDER (based on frequencey of use): BLAST, JBrowse, Genotype Matrix, CVITjs, VCF Bulk Export, Experiments

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
                   <div><img src="<?php echo $path_images . 'tool-icon/cvitjs.gif'; ?>" alt="CViTjs provides an interactive whole genome diagram and was developed by the Legume Federation." /></div>
                   <a href="cvitjs">CVIT JS</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/bulk-loader.gif'; ?>" alt="Bioinformatics tool to filter an existing Variant Call Format (VCF) files and export into common formats such as ABH, Haplotype Map (Hapmap) or Bgzipped VCF." /></div>
                   <a href="filter_vcf">VCF BULK EXPORT</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/experiments.gif'; ?>" alt="Many projects produce multiple types of data which are made available as a dataset for easy lookup of project deliverables." /></div>
                   <a href="research/projects">EXPERIMENTS</a>
                 </li>
               </ul>

               <?php
               // Additional UL from here down should be hidden by default by setting style-display to none.
               // style="display: none;"
               ?>

               <ul>
                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/trait-distribution.gif'; ?>" alt="Visualization tool to summarize the observed values for a specific trait in a particular phenotyping experiment." /></div>
                   <a href="phenotypes/trait-distribution">TRAIT DISTRIBUTION PLOT</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/germplasm-matrix.gif'; ?>" alt="This module also provides a means for keeping track of RIL development through use of stock properties." /></div>
                   <a href="germplasm/summary/Lens">GERMPLASM MATRIX</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/user-charts.gif'; ?>" alt="Visualization tool to generate Heatmap Chart, Beanplot Chart and Principal Complonent Analysis (PCoA)." /></div>
                   <a href="user_charts">USER CHARTS</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/position-convert.gif'; ?>" alt="Position Convert converts marker positions from L.culinaris genome version 0.8 to 1.2." /></div>
                   <a href="posconvert">POSITION CONVERT</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/vcf-position-search.gif'; ?>" alt="VCF Position search is a companion tool to VCF Bulk Export and allows searching for variants across all available VCF files." /></div>
                   <a href="filter_vcf/Position_search">VCF POSITION SEARCH</a>
                 </li>

                 <li>
                   <div><img src="<?php echo $path_images . 'tool-icon/map-viewer.gif'; ?>" alt="MapViewer is a graphical tool for viewing and comparing genetic maps. It includes dynamically scrollable maps, correspondence matrices, dot plots, links to details about map features, and exporting functionality." /></div>
                   <a href="MapViewer">MAP VIEWER</a>
                 </li>

               </ul>
<?php
  // Defaults to show the first 2 rows (sets of 6). The frontend will add a reveal link to show
  // other sets beyond this point. Link is unavailable when only showing this 2 sets.

  // Add more set here...
?>
