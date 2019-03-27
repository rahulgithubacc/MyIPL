<?php

namespace Drupal\weather\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Entity;
/**
 * @Block(
 *   id = "weather_block",
 *   admin_label = @Translation("weather block"),
 *   category = @Translation("City weather")
 * )
 */
class weatherblock extends BlockBase {
  /**
   * {@inheritdoc}
   */



   public function blockForm($form,FormStateInterface $form_state)
   {

     $form['city'] = array(
 
        '#type' => 'textfield',
   
        '#title' => $this->t('city'),
      );
      $form['desc'] = array(
 
        '#type' => 'textfield',
   
        '#title' => $this->t('desc'),
      );
      $form['img'] = array(
 
        '#type' => 'managed_file',
        '#upload' => 'public://upload/myimages',
        '#title' => $this->t('img'),
      );
     
      return $form;
   }
   public function blockSubmit($form,FormStateInterface $form_state)
   {
      
      $this->setConfigurationValue('city',$form_state->getValue('city'));
      $this->setConfigurationValue('desc',$form_state->getValue('desc'));
      $this->setConfigurationValue('img',$form_state->getValue('img'));
   }
   public function build() {
    $service = \Drupal::service('weatherservice');
    $data=$service->myservice($city);
    $res=Json::decode($data);
     $config = $this->getConfiguration();
     $city= $config['city'];
     $desc= $config['desc'];
     $imag= $config['img'];
     $img= \Drupal\file\Entity\File::load($imag[0]);
     $path = $img->getFileUri();
     
     return [
         '#theme' => 'weather',
         '#city' => $city,
         '#description'=>$desc,
         '#image'=> $path,
         '#min_temp'=>$res['main']['temp_min'],
         '#max_temp'=>$res['main']['temp_max'],
         '#pressure' =>$res['main']['pressure'],
         '#humidity' =>$res['main']['humidity'],
         '#temp'=>$res['main']['temp']
     ];
      }

}