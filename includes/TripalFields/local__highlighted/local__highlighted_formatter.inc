<?php
/**
 * @class
 * Purpose:
 *
 * Display:
 * Configuration:
 */
class local__highlighted_formatter extends ChadoFieldFormatter {
  // The default label for this field.
  public static $default_label = 'Pronote project';

  // The list of field types for which this formatter is appropriate.
  public static $field_types = array('local__highlighted');

    /* @see ChadoFieldFormatter::settingsForm()
    *
    **/

  public function settingsForm($view_mode, $form, &$form_state) {
  }

    /**
    * @see ChadoFieldFormatter::View()
    *
    **/

  public function view(&$element, $entity_type, $entity, $langcode, $items, $display) {

  }
}
