<?php

namespace Drupal\configform\Form;
 
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
 
class SimpleConfigForm extends ConfigFormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function getFormId() {
 
    return 'simple_config_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {
 
    $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('custom.settings');
 
    $form['email'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Email'),
 
      '#default_value' => $config->get('custom.email'),
 
      '#required' => TRUE,
 
    );
    $form['name'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Name'),
 
      '#default_value' => $config->get('custom.name'),
 
      '#required' => TRUE,
 
    );
 
    
 
    return $form;
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('custom.settings')
    ->set('email', $form_state->getValue('email'))
    ->set('name', $form_state->getValue('name'))
 
    ->save();
 
  parent::submitForm($form, $form_state);
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  protected function getEditableConfigNames() {
 
    return [
 
      'custom.settings',
 
    ];
 
  }
 
}