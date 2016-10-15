<?php

/**
 * @file
 * Contains \Drupal\classify\Form\ClassifySettings.
 */

namespace Drupal\classify\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ClassifySettings extends ConfigFormBase {

  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'classify_settings_form';
  }

  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Form constructor
    $form = parent::buildForm($form, $form_state);
    // Default settings
    $config = $this->config('classify.settings');

    // sample field
    $form['sample'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Classify Something:'),
      '#default_value' => $config->get('classify.sample'),
      '#description' => $this->t('Do something to this field.'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('classify.settings');
    $config->set('classify.sample', $form_state->getValue('sample'));
    $config->save();
    return parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}.
   */
  protected function getEditableConfigNames() {
    return [
      'classify.settings',
    ];
  }
}
