<?php


namespace Drupal\mdl_tourisme\Controller;


use Drupal\Core\Controller\ControllerBase;

class FirstPageController extends ControllerBase
{

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */

  /**
   * @file
   * Contains \Drupal\FirstPage\Controller\FirstPageController.
   */
  public function content() {

    $node = \Drupal\node\Entity\Node::create(['type' => 'tourisme']);
    $form = \Drupal::service('entity.form_builder')->getForm($node);
    $element = array(
     // '#markup' => $this->t('Hello World!!'),
      //'#markup' => $form,
      '#theme' => 'mdl_tourisme',
      '#markup' => $form,
      //'#test_var' => $this->t('Test Value'),
    );
    return $element;
  }
}
