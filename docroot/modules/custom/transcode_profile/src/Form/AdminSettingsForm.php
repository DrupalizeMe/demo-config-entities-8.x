<?php

namespace Drupal\transcode_profile\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Entity\EntityTypeManager;

/**
 * Class AdminSettingsForm.
 *
 * @package Drupal\transcode_profile\Form
 */
class AdminSettingsForm extends ConfigFormBase {
  /**
   * Drupal\Core\Config\ConfigFactory definition.
   *
   * @var Drupal\Core\Config\ConfigFactory
   */
  protected $config_factory;
  
  /**
   * Drupal\Core\Entity\EntityTypeManager definition.
   *
   * @var Drupal\Core\Entity\EntityTypeManager
   */
  protected $entity_type_manager;
  
  public function __construct(
    ConfigFactoryInterface $config_factory,
    ConfigFactory $config_factory,
    EntityTypeManager $entity_type_manager
  ) {
    parent::__construct($config_factory);
    $this->config_factory = $config_factory;
    $this->entity_type_manager = $entity_type_manager;
  }
  
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('config.factory'),
      $container->get('entity_type.manager')
    );
  }
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'transcode_profile.adminsettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('transcode_profile.adminsettings');
    $transcode_profiles = $this->entity_type_manager->getStorage('transcode_profile')->loadMultiple();
    $dropdown_array = [];
    foreach($transcode_profiles as $profile) {
      $key = $profile->id();
      $value = $profile->label();
      $dropdown_array[$key] = $value;
    }
    $form['profile_name'] = [
      '#type' => 'select',
      '#title' => $this->t('Profile Name'),
      '#description' => $this->t('Video transcode profile name'),
      '#default_value' => $config->get('profile_name'),
      '#options' => $dropdown_array,
    ];
    $form['enable_transcoding'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable transcoding'),
      '#description' => $this->t('Enables video transcoding'),
      '#default_value' => $config->get('enable_transcoding'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('transcode_profile.adminsettings')
      ->set('profile_name', $form_state->getValue('profile_name'))
      ->set('enable_transcoding', $form_state->getValue('enable_transcoding'))
      ->save();
  }

}
