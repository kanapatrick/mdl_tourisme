<?php

namespace Drupal\mdl_tourisme\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormState;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\mdl_tourisme\Meteo\MeteoParVille;
use Drupal\Core\Entity\EntityBase;

/**
 * Description of MeteoParVilleForm
 *
 * @author Alain
 */
class MeteoParVilleForm extends FormBase {

  /**
   * @var \Drupal\mdl_tourisme\Meteo\MeteoParVille;
   */
  protected $meteo;

  /**
   * Constructeur MeteoParVille
   *
   * @param \Drupal\mdl_tourisme\Meteo\MeteoParVille $meteo
   */
  public function __construct(MeteoParVille $meteo) {

    $this->meteo = $meteo;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('mdl_tourisme.meteo')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['mdl_tourisme.custom_meteo'];
  }

  /**
   *
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'meteo_par_ville_form';
  }

  /**
   * {@inheritdoc}
   * @param array $form
   * @param FormStateInterface $form_state
   */
  public function buildForm(array $form, FormStateInterface $form_state) {



    $form['ville_meteo'] = [
      '#type' => 'entity_autocomplete',
      '#target_type' => 'taxonomy_term',
      '#title' => $this->t('Selectionnez une ville'),
      '#selection_settings' => [
        'target_bundles' => ['ville'],
      ],
    ];


    $header = array(
      array('data' => t('Jours'), 'field' => 'id'),
      array('data' => t('Cummul pluie'), 'field' => 'name'),
      array('data' => t('Température minimale'), 'field' => 'tmin'),
      array('data' => t('Température maximale'), 'field' => 'tmax', 'sort' => 'desc'),
    );
    $form['table'] = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => [],
      '#empty' => t('Empty Rows'),
      '#prefix' => '<div id="edit-output">',
      '#suffix' => '</div>',
    );

    $form['actions']['#type'] = 'actions';
    $form['actions'] = [
      '#type' => 'button',
      '#value' => $this->t('Obtenir des informations météo'),
      '#button_type' => 'primary',
      '#ajax' => [
        'callback' => '::myAjaxCallback', // don't forget :: when calling a class method.
        //'callback' => [$this, 'myAjaxCallback'], //alternative notation
        'disable-refocus' => FALSE, // Or TRUE to prevent re-focusing on the triggering element.
        'wrapper' => 'edit-output', // This element is updated with this AJAX callback.
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Verifying entry...'),
        ],
      ]
    ];


    return $form;
  }

  /**
   * {@inheritdoc}
   * @param array $form
   * @param FormStateInterface $form_state
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {


  }


  public function myAjaxCallback(array &$form, FormStateInterface $form_state) {

    $form_state->setRebuild(TRUE);
    $tid = $form_state->getValue("ville_meteo");

    $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
    $insee = $term->field_c->value;
    $townMeteoInfoArr = $this->meteo->getMeteoByTown($insee); //affiche les sonnes du tablea ci
    $cityName = !empty($townMeteoInfoArr)?$townMeteoInfoArr['city']['name']:'';
    $cityName = ucfirst($cityName);
    $remainingSentence = ((ctype_alpha($cityName) && preg_match('/^[aeiou]/i', $cityName))?'d\'':'de ').$cityName;

    drupal_set_message("affichage prévisions meteo sur 5 jours de la ville de $remainingSentence");

    $header = array(
      array('data' => t('Jours'), 'field' => 'id'),
      array('data' => t('Cummul pluie'), 'field' => 'name'),
      array('data' => t('Température minimale'), 'field' => 'field1'),
      array('data' => t('Température maximale'), 'field' => 'field2', 'sort' => 'desc'),
      array('data' => t('Code du temps'), 'field' => 'weather', 'sort' => 'desc')
    );


    $rows = [];

    if(!empty($townMeteoInfoArr)) {

      foreach($townMeteoInfoArr["forecast"] as $key => $val){
        $rows[] = [$key, $val['rr10'].' mm', $val['tmin'].' °C', $val['tmax'].' °C', $val['weather']];
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
