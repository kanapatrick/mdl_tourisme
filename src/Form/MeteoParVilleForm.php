<?php

namespace Drupal\mdl_tourisme\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\mdl_tourisme\MeteoParVille;
use Drupal\Core\Entity\EntityBase;

/**
 * Description of MeteoParVilleForm
 *
 * @author kana
 */
class MeteoParVilleForm extends FormBase {

    /**
     * @var \Drupal\mdl_tourisme\MeteoParVille;
     */
    protected $meteo;

    /**
     * Constructeur MeteoParVille
     * 
     * @param \Drupal\mdl_tourisme\MeteoParVille $meteo 
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
            '#required' => true,
            '#required_error' => $this->t('Ce champ est obligatoire'),
            '#selection_settings' => [
                'target_bundles' => ['liste_ville'],
            ],
        ];

        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Obtenir des informations météo'),
            '#button_type' => 'primary',
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {

        $tid = $form_state->getValue("ville_meteo");
        
        $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
        $insee = $term->field_code_insee->value;
        $data = $this->meteo->getMeteoByTown($insee);
        
        dsm($data);
    }

}
