<?php
 /**
  * @file
  * Markup CROPS section.

  // LAYOUT:
  <table>
    // A - Active image and more species.
    <tr>
     <td>
       // - Drop window showin more species
       <div>
         // - List of species.
         <ul>
           <li><a></a></li>
         </ul>
       </div>
       // - Link, image of the crop.
       <a><img /></a>
     </td>
    </tr>

    // B - Link, the name of the crop, with genus and species (lorem)
    <tr>
      <td><a></a>Lorem</td>
    </tr>
  </table>

  Adding a crops invlolves 2 items - 1 is for the image and the other is the name of the crop
  find note where to correctly insert the markup.

  // Use this relative path to embed image.
  // Crop images are located in images/crops-img folder of this module.
  // @see first example below. First <a> of this include file.
  */

  ////////////
?>
              <table>
                 <tr>
                   <td>
                     <div>
                       More Cicer Species
                       <ul>
                         <li><a href="Cicer/arietinum">&#9724; C .arietinum</a></li>
                       </ul>
                     </div>
                     <a href="Cicer/arietinum"><img src="<?php echo $path_images . 'crops-img/chickpea.jpg'; ?>" /></a>
                   </td>

                   <td>
                     <div>
                       More Lens Species
                       <ul>
                         <li><a href="Lens/culinaris">&#9724; L. culinaris</a>&nbsp;</li>
                         <li><a href="Lens/erviudes">&#9724; L. ervoides</a>&nbsp;</li>
                         <li><a href="Lens/lamottei">&#9724; L. lamottei</a>&nbsp;</li>
                         <li><a href="Lens/nigricans">&#9724; L. nigricans</a>&nbsp;</li>
                         <li><a href="Lens/odemensis">&#9724; L. odemensis</a>&nbsp;</li>
                         <li><a href="Lens/orientalis">&#9724; L. orientalis</a>&nbsp;</li>
                         <li><a href="Lens/tomentosus">&#9724; L. tomentosus</a>&nbsp;</li>
                       </ul>
                     </div>
                     <a href="Lens/culinaris"><img src="<?php echo $path_images . 'crops-img/lentil.jpg'; ?>" /></a>
                   </td>

                   <td>
                     <div>
                       More Phaseolus Species
                       <ul>
                         <li><a href="Phaseolus/acutifolius">&#9724; L. acutifolius</a>&nbsp;</li>
                         <li><a href="Phaseolus/coccineus">&#9724; P. coccineus</a>&nbsp;</li>
                         <li><a href="Phaseolus/vulgaris">&#9724; L. vulgaris</a>&nbsp;</li>
                       </ul>
                     </div>
                     <a href="Phaseolus/vulgaris"><img src="<?php echo $path_images . 'crops-img/drybean.jpg'; ?>" /></a>
                   </td>

                   <td>
                     <div>
                       More Vicia Species
                       <ul>
                         <li><a href="Vicia/faba">&#9724; V. faba</a>&nbsp;</li>
                       </ul>
                     </div>
                     <a href="Vicia/faba"><img src="<?php echo $path_images . 'crops-img/faba.jpg'; ?>" /></a>
                   </td>

                   <td>
                     <div>
                       More Pisum Species
                       <ul>
                         <li><a href="Pisum/fulvum">&#9724; P. fulvum</a>&nbsp;</li>
                         <li><a href="Pisum/sativum">&#9724; P. sativum</a>&nbsp;</li>
                       </ul>
                     </div>
                     <a href="Pisum/sativum"><img src="<?php echo $path_images . 'crops-img/pea.jpg'; ?>" /></a>
                   </td>

                   <?php
                     // ADD ADDITIONAL CROP BEFORE THE OPENING TAG: `<?php`
                   ?>
                 </tr>

                 <tr>
                   <td><a href="Cicer/arietinum">Chickpea</a> Cicer arientinum</td>
                   <td><a href="Lens/culinaris">Lentil</a> Lens culinaris</td>
                   <td><a href="Phaseolus/vulgaris">Dry Bean</a> Phaseolus vulgaris</td>
                   <td><a href="Vicia/faba">Faba Bean</a> Vicia faba</td>
                   <td><a href="Pisum/sativum">Pea</a> Pisum sativum</td>

                   <?php
                     // ADD ADDITIONAL CROP BEFORE THE OPENING TAG: `<?php`
                   ?>
                 </tr>
               </table>
