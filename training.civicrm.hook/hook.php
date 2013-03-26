<?php

require_once 'hook.civix.php';

/**
 * Implementation of hook_civicrm_config
 */
function hook_civicrm_config(&$config) {
  _hook_civix_civicrm_config($config);
}

function hook_civicrm_validateForm( $formName, &$fields, &$files, &$form, &$errors ) {
    if ( $formName == "CRM_Contact_Form_Contact" ) {
        $addressArray = &$fields['address'];
        foreach ( $addressArray as $addressKey => $addressFields ) {
            if ( isset( $addressFields['postal_code'] ) ) {
                if ( !ctype_digit( substr( $addressFields['postal_code'], 0, 4 ) ) ) {
                    $errors['address[' . $addressKey . '][postal_code]'] = "First four positions have to be numbers!";
                }
            }
        }
    }
    return;
}


/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 */
function hook_civicrm_xmlMenu(&$files) {
  _hook_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 */
function hook_civicrm_install() {
  return _hook_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 */
function hook_civicrm_uninstall() {
  return _hook_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 */
function hook_civicrm_enable() {
  return _hook_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 */
function hook_civicrm_disable() {
  return _hook_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 */
function hook_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _hook_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 */
function hook_civicrm_managed(&$entities) {
  return _hook_civix_civicrm_managed($entities);
}
