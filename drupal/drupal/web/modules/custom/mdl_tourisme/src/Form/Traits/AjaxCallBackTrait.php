<?php


namespace Drupal\mdl_tourisme\Form\Traits;
use Drupal\Core\Form\FormStateInterface;

trait AjaxCallBackTrait
{

  public function myAjaxCallback(array &$form, FormStateInterface $form_state) {

    $form_state->setRebuild(TRUE);
    $tid = $form_state->getValue("ville_meteo");

    $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
    $insee = $term->field_c->value;
    $townMeteoInfoArr = $this->meteo->getMeteoByTown($insee); //affiche les sonnes du tablea ci
    $cityName = !empty($townMeteoInfoArr)?$townMeteoInfoArr['city']['name']:'';
    $cityName = ucfirst($cityName);
    $remainingSentence = ((ctype_alpha($cityName) && preg_match('/^[aeiou]/i', $cityName))?'d\'':'de ').$cityName;

    drupal_set_message("affichage meteo de la ville $remainingSentence");

    $header = array(
      array('data' => t('Jours'), 'field' => 'id'),
      array('data' => t('Cummul pluie'), 'field' => 'name'),
      array('data' => t('Température minimale'), 'field' => 'field1'),
      array('data' => t('Température maximale'), 'field' => 'field2', 'sort' => 'desc')
    );


    $rows = [];

    if(!empty($townMeteoInfoArr)) {

      foreach($townMeteoInfoArr["forecast"] as $key => $val){
        $rows[] = [$key, $val['rr10'], $val['tmin'], $val['tmax']];
      }
    }

    $form['table'] = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#empty' => t('Empty Rows'),
      '#prefix' => '<div id="edit-output">',
      '#suffix' => '</div>',
    );

    // On retourne le tableau
    return $form['table'];

  }

}
