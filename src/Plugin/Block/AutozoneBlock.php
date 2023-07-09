<?php

namespace Drupal\autozone\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'AutozoneBlock' block.
 *
 * @Block(
 *  id = "autozone_block",
 *  admin_label = @Translation("Autozone block"),
 * )
 */
class AutozoneBlock extends BlockBase {
  
  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\autozone\Form\AutozoneForm');
    return $form;
  }

  

}
