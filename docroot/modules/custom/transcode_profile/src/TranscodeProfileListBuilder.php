<?php

namespace Drupal\transcode_profile;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Transcode profile entities.
 */
class TranscodeProfileListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Transcode profile');
    $header['id'] = $this->t('Machine name');
    $header['codec'] = $this->t('Codec');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['codec'] = $entity->getCodec();
    // You probably want a few more properties here...
    return $row + parent::buildRow($entity);
  }

}
