<?php


namespace Drupal\mdl_tourisme\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\mdl_tourisme\Meteo\MeteoParVille;

class MeteoForm extends FormBase
{
  /**
   * @var \Drupal\mdl_tourisme\Meteo\MeteoParVille;
   */
  protected $meteo;

  /**
   * Constructeur MeteoParVille
   *
   * @param \Drupal\mdl_tourisme\Meteo\MeteoParVille $meteo
   */
  public function __construct() {

    $this->meteo = new MeteoParVille();
  }

  /**
   * @inheritDoc
   */
  public function getFormId()
  {

  }

  /**
   * @inheritDoc
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $nameImg = '';
    $request_method = \Drupal::requestStack()->getCurrentRequest()->getMethod();

    $form['ville_meteo'] = [
      '#type' => 'entity_autocomplete',
      '#target_type' => 'taxonomy_term',
      '#title' => $this->t('Selectionnez une ville'),
      '#selection_settings' => [
        'target_bundles' => ['ville'],
      ]
    ];

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


    //Au premier chargement
    if ($request_method == 'GET') {

      $inseeCode = $this->meteo->getCurrentCityInseeByPostalCode();
      $meteoArr = $this->meteo->getMeteoByTown($inseeCode);

      if (empty($meteoArr)){
        return false;
      }

      $cityName =  ucfirst($meteoArr['city']['name']);
      $weatherCode = $meteoArr["forecast"]["aujourd'hui"]['weather'];
      $nameImg = ($resultArr = explode('|', $this->meteo->getWeatherImgName($weatherCode)))[0];
      $weatherText = $resultArr[1];

      $form['image_meteo'] = array(
        '#type' => 'markup',
        '#prefix' => '<div id="edit-output" class="image_class"><h1>Meteo de votre ville actuelle  '.$cityName.'</h1><h2>'.$weatherText.'</h2>',
        '#suffix' => '</div>',
        '#markup' => '<img src="' . base_path() . 'sites/Images/'.$nameImg.'.gif" alt="picture" style="width:100px;max-width: 700px;height:75px;max-height: 75px;">',
      );

    }

    return $form;
  }

  /**
   * @inheritDoc
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {

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

    drupal_set_message("affichage meteo de la ville $remainingSentence");


    $nameImg = 'tonnerre';

    $form['image_meteo'] = array(
      '#type' => 'markup',
      '#prefix' => '<div id="edit-output" class="image_class"><h2>Meteo de votre ville actuelle  '.$cityName.'</h2>',
      '#suffix' => '</div>',
      '#markup' => '<img src="' . base_path() . 'sites/Images/'.$nameImg.'.gif" alt="picture" style="width:100px;max-width: 700px;height:75px;max-height: 75px;">',
    );

    // On retourne l'image'
    return $form['image_meteo'];

  }
}
