<?php
/**
 * @class
 * Purpose:
 *
 * Allowing edit?
 * Data:
 * Assumptions:
 */
class local__highlighted_widget extends ChadoFieldWidget {

  // The default label for this field.
  public static $default_label = 'Promote to Frontpage';

  // The list of field types for which this formatter is appropriate.
  public static $field_types = array('local__highlighted');


 /**
  * @see ChadoFieldWidget::form()
  *
  **/
  public function form(&$widget, &$form, &$form_state, $langcode, $items, $delta, $element) {
    parent::form($widget, $form, $form_state, $langcode, $items, $delta, $element);

    if ($element['#field_name'] == 'local__highlighted') {
      // Term cvterm id number.
      $highlighted_type = chado_get_cvterm(array(
        'name' => $this->instance['settings']['term_name'],
      ))
        ->cvterm_id;

      // Set a promote setting of type local:highlighted.
      $widget['chado-projectprop__type_id'] = array(
        '#type' => 'value',
        '#value' => $highlighted_type,
      );

      if (isset($element['#entity']->chado_record_id) && (int)$element['#entity']->chado_record_id > 0) {
        // Update.
        $project_id = $element['#entity']->chado_record_id;
        $result = chado_select_record('projectprop', ['projectprop_id', 'value'], ['project_id' => $project_id, 'type_id' => $highlighted_type]);

        if ($result) {
          $value = reset($result);
          $highlighted_value = $value->value;

          // This is the record id number of the experiment's promote settings.
          $widget['chado-projectprop__projectprop_id'] = array(
            '#type' => 'value',
            '#value' => $value->projectprop_id,
          );
        }
        else {
          // Not set keep it to 0 - not promoted.
          $highlighted_value = 0;
        }
      }
      else {
        // Create.
        // Default to not promoted when creating.
        $highlighted_value = 0;
      }

      // Field select options.
      $widget['chado-projectprop__value'] = array(
        '#type' => 'select',
        '#title' => t($element['#title']),
        '#description' => 'Select option - <em>Promote to Frontpage and set as default</em> to assign a higher rank over other promoted experiments.',
        '#options' => array(0 => '---', 1 => 'Promote to Frontpage', 2 => 'Promote to Frontpage and set as default'),
        '#default_value' => $highlighted_value,
        'requred' => $element['#required'],
        '#delta' => $delta,
      );
    }
  }

  /**
  * @see ChadoFieldWidget::validate()
  *
  **/
  public function validate($element, $form, &$form_state, $langcode, $delta) {
  }

   /**
  * @see ChadoFieldWidget::submit()
  *
  **/
  public function submit($form, &$form_state, $entity_type, $entity, $langcode, $delta) {
  }
}
