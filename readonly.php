<?php

require_once 'readonly.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function readonly_civicrm_config(&$config) {
  _readonly_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function readonly_civicrm_xmlMenu(&$files) {
  _readonly_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function readonly_civicrm_install() {
  _readonly_civix_civicrm_install();
}

/**
* Implements hook_civicrm_postInstall().
*
* @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
*/
function readonly_civicrm_postInstall() {
  _readonly_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function readonly_civicrm_uninstall() {
  _readonly_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function readonly_civicrm_enable() {
  _readonly_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function readonly_civicrm_disable() {
  _readonly_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function readonly_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _readonly_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function readonly_civicrm_managed(&$entities) {
  _readonly_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function readonly_civicrm_caseTypes(&$caseTypes) {
  _readonly_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function readonly_civicrm_angularModules(&$angularModules) {
_readonly_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function readonly_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _readonly_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function readonly_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function readonly_civicrm_navigationMenu(&$menu) {
  _readonly_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'nl.bosqom.readonly')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _readonly_civix_navigationMenu($menu);
} // */

function readonly_civicrm_buildForm($formName, &$form) {
  global $user;
  
  /*echo('$formName: ' . $formName) . '<br/>' . PHP_EOL;
  echo('$form->getAction(): ' . $form->getAction()) . '<br/>' . PHP_EOL;
  var_dump($form->getAction());
  var_dump(CRM_Core_Action::ADD);
  var_dump(CRM_Core_Action::UPDATE);
  var_dump(CRM_Core_Action::DELETE);
  
  CRM_Utils_System::civiExit();*/
  
  if(!in_array('administrator', $user->roles) && !in_array('beheerder', $user->roles)){
    if($formName != 'CRM_Mailing_Form_Search' && $formName != 'CRM_Case_Form_Search'){
    
      if ($form->getAction() == CRM_Core_Action::ADD || $form->getAction() == CRM_Core_Action::UPDATE || $form->getAction() == CRM_Core_Action::DELETE) {
        $message = ts('LET OP! Het is niet de bedoeling dat er in CiviCRM nog inhoud wordt gewijzigd. Er kan nog wel worden geraadpleegd. U heeft niet voldoende rechten om dit %1 aan te passen!', array(1 => $form->_attributes['name']));
        CRM_Core_Session::setStatus($message, '', 'Error');
        CRM_Utils_System::redirect($_SESSION['CiviCRM']['CRM_Utils_Recent'][0]['url']);
      }
    }
  }
}