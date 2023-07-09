<?php

namespace Drupal\autozone\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class AutozoneForm.
 */
class AutozoneForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'autozone_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $option = array('' => '1|Year');
    for($i=1995;$i<=date('Y');$i++){
       $option[$i] = $i;
    }
    $form['year'] = [
      '#type' => 'select',
      '#title' => $this->t(''),
      '#options' => $option,  
     
    ];
    $option = array('' => '2|Make');
    $form['make'] = [
      '#type' => 'select',
      '#title' => $this->t(''),
      '#options' => $option,
      
    ];
    $option = array('' => '3|Model');
    $form['model'] = [
      '#type' => 'select',
      '#title' => $this->t(''),
      '#options' => $option,
      
    ];
    $option = array('' => '4|Engine');
    $form['engine'] = [
      '#type' => 'select',
      '#title' => $this->t(''),
      '#options' => $option,
      
    ]; 
    
    $form['#theme'] = 'autozone_form';

    $form['#attached']['library'][] = 'autozone/autozonejs';
    $form['#attached']['library'][] = 'autozone/autozonecss';

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
