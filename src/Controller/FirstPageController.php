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
  public function content() {

    $node = \Drupal\node\Entity\Node::create(['type' => 'tourisme']);
    $form = \Drupal::service('entity.form_builder')->getForm($node);
    $element = array(
     // '#markup' => $this->t('Hello World!!'),
      '#markup' => $form,
    );
    return $element;
  }
}
