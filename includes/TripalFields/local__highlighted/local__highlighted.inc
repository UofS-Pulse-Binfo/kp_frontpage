<?php
/**
 * @class
 * Purpose:
 *
 * Data:
 * Assumptions:
 */
class local__highlighted extends ChadoField {

  // --------------------------------------------------------------------------
  //                     EDITABLE STATIC CONSTANTS
  //
  // The following constants SHOULD be set for each descendant class.  They are
  // used by the static functions to provide information to Drupal about
  // the field and it's default widget and formatter.
  // --------------------------------------------------------------------------

  // The default label for this field.
  public static $default_label = 'Promote to Frontpage';

  // The default description for this field.
  public static $default_description = 'Promote experiment to Frontpage';

  // The default widget for this field.
  public static $default_widget = 'local__highlighted_widget';

  // The default formatter for this field.
  public static $default_formatter = 'local__highlighted_formatter';

  // The module that manages this field.
  // If no module manages the field (IE it's added via libraries)
  // set this to 'tripal_chado'
  public static $module = 'kp_frontpage';

  // A list of global settings. These can be accessed within the
  // globalSettingsForm.  When the globalSettingsForm is submitted then
  // Drupal will automatically change these settings for all fields.
  // Once instances exist for a field type then these settings cannot be
  // changed.
  public static $default_settings = array(
    'storage' => 'field_chado_storage',
     // It is expected that all fields set a 'value' in the load() function.
     // In many cases, the value may be an associative array of key/value pairs.
     // In order for Tripal to provide context for all data, the keys should
     // be a controlled vocabulary term (e.g. rdfs:type). Keys in the load()
     // function that are supported by the query() function should be
     // listed here.
     'searchable_keys' => array(),
  );


  // Provide a list of instance specific settings. These can be access within
  // the instanceSettingsForm.  When the instanceSettingsForm is submitted
  // then Drupal with automatically change these settings for the instance.
  // It is recommended to put settings at the instance level whenever possible.
  // If you override this variable in a child class be sure to replicate the
  // term_name, term_vocab, term_accession and term_fixed keys as these are
  // required for all TripalFields.
  public static $default_instance_settings = array(
    // The DATABASE name, as it appears in chado.db.  This also builds the link-out url.  In most cases this will simply be the CV name.  In some cases (EDAM) this will be the SUBONTOLOGY.
    'term_vocabulary' => 'local',
    // The name of the term.
    'term_name' => 'highlighted',
    // The unique ID (i.e. accession) of the term.
    'term_accession' => 'highlighted',
    // Set to TRUE if the site admin is not allowed to change the term
    // type, otherwise the admin can change the term mapped to a field.
    'term_fixed' => FALSE,
    // Indicates if this field should be automatically attached to display
    // or web services or if this field should be loaded separately. This
    // is convenient for speed.  Fields that are slow should for loading
    // should have auto_attach set to FALSE so tha their values can be
    // attached asynchronously.
    'auto_attach' => FALSE,
    // The table in Chado that the instance maps to.
    'chado_table' => 'projectprop',
    // The column of the table in Chado where the value of the field comes from.
    'chado_column' => 'projectprop_id',
    // The base table.
    'base_table' => 'projectprop',
  );

  // A boolean specifying that users should not be allowed to create
  // fields and instances of this field type through the UI. Such
  // fields can only be created programmatically with field_create_field()
  // and field_create_instance().
  public static $no_ui = FALSE;

  // A boolean specifying that the field will not contain any data. This
  // should exclude the field from web services or downloads.  An example
  // could be a quick search field that appears on the page that redirects
  // the user but otherwise provides no data.
  public static $no_data = FALSE;

  /**
   * @see ChadoField::load()
   *
   */
  public function load($entity) {
  }

  /**
   * @see ChadoField::query()
   *
   */
  public function query($query, $condition) {
  }

  /**
   * @see ChadoField::queryOrder()
   *
   */
  public function queryOrder($query, $order) {
  }


  /**
   * @see ChadoField::elementInfo()
   *
   */
  public function elementInfo() {
    return array(
      'local:highlighted' => array(
        'operations' => [],
        'sortable' => FALSE,
        'searchable' => FALSE,
        'label' => 'Promote project',
        'type' => 'xs:complexType',
        'readonly' => TRUE,
        'elements' => array(
          'local:highlighted' => array(
            'searchable' => TRUE,
            'name' => 'Promote project',
            'operations' => ['eq', 'ne', 'contains', 'starts'],
            'sortable' => TRUE,
            'readonly' => TRUE,
            'type' => 'xs:string',
            'required' => FALSE,
          ),
        ),
      ),
    );
  }
}
