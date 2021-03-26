<?php

namespace Drupal\mdl_tourisme\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of MeteoParVilleForm
 *
 * @author kana
 */
class MeteoParVilleForm extends FormBase {
    
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
            '#title'=> $this->t('Selectionnez une ville'),
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
     
        $ville_saisi = $form_state->getValue("ville_meteo");
        
        //dsm($form_state->getValues());
        
    }

}
