<?php

namespace Drupal\mdl_tourisme\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of MeteoParVilleForm
 *
 * @author kana
 */
class MeteoParVilleForm extends ConfigFormBase {
    
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
        
        $config = $this->config('mdl_tourisme.custom_meteo');
        
        $form['meteo'] = [
            '#type'=> 'select',
            '#title'=> $this->t('Selectionnez une ville'),
            '#required' => true,
            '#required_error' => $this->t('Ce champ est obligatoire'),
            '#vocabulary' => liste_ville,
        ];
        
        return parent::buildForm($form, $form_state);
    }
    

}
