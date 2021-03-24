<?php

/**
 * @file
 * Contains \Drupal\mdl_tourisme\Controller\MeteoController
 */

namespace  Drupal\mdl_tourisme\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\mdl_tourisme\Meteo\MeteoParVille;

class MeteoController extends ControllerBase
{

  public function getMeteo($townCodeInsee){

    $meteoService = new MeteoParVille();
    $meteo = ($meteoService->getMeteoByTown($townCodeInsee))?:[];
    //$meteo = $meteoService->getMeteoByTown($townCodeInsee);

    $node = \Drupal\node\Entity\Node::create(['type' => 'tourisme']);

    $query = \Drupal::entityQuery('node');
    $query->condition('status', 1);
    $query->condition('type', 'tourisme');
    $entity_ids = $query->execute(); //dd($entity_ids);
    $form = \Drupal::service('entity.form_builder')->getForm($node);
    return $form;
    //return \Drupal::entityManager()->getFieldDefinitions('entity_type','tourisme');
    //return new \Symfony\Component\HttpFoundation\JsonResponse($meteo);

  }

}
