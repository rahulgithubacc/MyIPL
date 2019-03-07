<?php

namespace Drupal\configform\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Logger\LoggerChannelFactory;
class SimpleForm extends FormBase{
 
  /**
 
   * {@inheritdoc}
 
   */
  protected $logger_factory;

  public function __construct(LoggerChannelFactory $logger_factory) {
    $this->logger_factory = $logger_factory->get('configform');
  }
  public static function create(ContainerInterface $container) {
    return new static($container->get('logger.factory'));

  }
  
  public function getFormId() {
 
    return 'simple_config_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {
 
    // $form = parent::buildForm($form, $form_state);
 
    // $config = $this->config('custom.settings');
 
    $form['email'] = array(
 
      '#type' => 'email',
 
      '#title' => $this->t('Email'),
 
    //   '#default_value' => $config->get('custom.email'),
 
      '#required' => TRUE,
 
    );
    $form['name'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Name'),
 
    //   '#default_value' => $config->get('custom.name'),
 
      '#required' => TRUE,
 
    );
    $form['submit']=array(
        '#type' =>'submit',
        '#value' =>'Save',
        '#required' =>TRUE,
    );
    return $form;
 
  }
  
  public function validateForm(array &$form,FormStateInterface $form_state){
    $name = $form_state->getValue('name');
    if(!preg_match("/^([a-zA-Z]+)$/",$name)){
      $form_state->setErrorByName('name',$this->t('Enter a valid name.Name contains only letters'));
    }
  }
  // public function logSomething($something) {
  //   $this->logger_factory->error('Yo: @something', [
  //     '@something' => $something,
  //   ]);
  // }
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage(t('Name :'. $form_state->getValue('name')));
    \Drupal::messenger()->addMessage(t('Email :'. $form_state->getValue('email')));
    $this->logger_factory->notice('Name :@name Email: @email', ['@name' =>$form_state->getValue('name'), '@email' => $form_state->getValue('email')]);
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
