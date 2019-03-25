<?php

namespace Drupal\weather\Form;
 
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
 
class ConfigForm extends ConfigFormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function getFormId() {
 
    return 'weather_config_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {
 
    $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('weather.settings');
 
    $form['appid'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('appid'),
 
      '#default_value' => $config->get('appid'),
 
      '#required' => TRUE,
 
    );
 
    
 
    return $form;
 
  }
//   public function validateForm(array &$form,FormStateInterface $form_state){
//     $name = $form_state->getValue('name');
//     if(!preg_match("/^([a-zA-Z]+)$/",$name)){
//       $form_state->setErrorByName('name',$this->t('Enter a valid name.Name contains only letters'));
//     }
//   }
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('weather.settings')
    ->set('appid', $form_state->getValue('appid'))
 
    ->save();
 
  parent::submitForm($form, $form_state);

 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  protected function getEditableConfigNames() {
 
    return [
 
      'weather.settings',
 
    ];
 
  }
 
}