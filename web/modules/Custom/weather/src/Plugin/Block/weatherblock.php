<?php

namespace Drupal\weather\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * @Block(
 *   id = "weather_block",
 *   admin_label = @Translation("pune block"),
 *   category = @Translation("City weather")
 * )
 */
class weatherblock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $appid=\Drupal::service('weather.settings')->get('appid');
    print_r($appid);
    $form['wind -> speed'] = array(
 
        '#type' => 'textfield',
   
        '#title' => $this->t('wind -> speed'),
      );
      $form['temp_max'] = array(
 
        '#type' => 'textfield',
   
        '#title' => $this->t('temp_max'),
      );
      $form['pressure'] = array(
 
        '#type' => 'number',
   
        '#title' => $this->t('pressure'),
      );
      $form['humidity'] = array(
 
        '#type' => 'textfield',
   
        '#title' => $this->t('humidity'),
        
      );
      $form['temp_min'] = array(
 
        '#type' => 'textfield',
   
        '#title' => $this->t('temp_min'),
      );
    return $form;
   }
}