<?php

namespace Drupal\transcode_profile\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class TranscodeProfileForm.
 *
 * @package Drupal\transcode_profile\Form
 */
class TranscodeProfileForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $transcode_profile = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $transcode_profile->label(),
      '#description' => $this->t("Label for the Transcode profile."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $transcode_profile->id(),
      '#machine_name' => [
        'exists' => '\Drupal\transcode_profile\Entity\TranscodeProfile::load',
      ],
      '#disabled' => !$transcode_profile->isNew(),
    ];
    
    $form['codec'] = [
      '#type' => 'textfield',
      '#title' => 'Codec',
      '#maxlength' => 255,
      '#default_value' => $transcode_profile->getCodec(),
      '#description' => $this->t('The video codec to use.'),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $transcode_profile = $this->entity;
    $status = $transcode_profile->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Transcode profile.', [
          '%label' => $transcode_profile->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Transcode profile.', [
          '%label' => $transcode_profile->label(),
        ]));
    }
    $form_state->setRedirectUrl($transcode_profile->urlInfo('collection'));
  }

}
