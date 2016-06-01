<?php
/**
 * Implements HOOK_form_system_theme_settings_alter
 * Adds base color field to theme settings
 */
function thl_sarvaka_form_system_theme_settings_alter(&$form, $form_state) {
  global $base_path;
   //unset($form['shanti_sarvaka_shanti_site']);
	 
  $form['shanti_sarvaka_icon_class'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Icon Class Name for Banner'),
    '#default_value' => theme_get_setting('shanti_sarvaka_icon_class'),
    '#description'   => t('Icon in title banner for this site. Use the class name as listed on the <a href="@link" target="_blank">Shanticon Reference Page</a> or the <a href="@link2" target="_blank">THL Icon Reference page</a>.', 
        array("@link" => $base_path . drupal_get_path('theme', 'shanti_sarvaka') . '/fonts/shanticon/bin/demo.html',
							"@link2" => $base_path . drupal_get_path('theme', 'thl_sarvaka') . '/fonts/thlicon/demo.html')),
  );
  
  /** old method
  $form['shanti_sarvaka_icon_code'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Icon Code'),
    '#default_value' => theme_get_setting('shanti_sarvaka_icon_code'),
    '#description'   => t("Icon for this site"),
  );*/
} 
