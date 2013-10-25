<?php
/** 
 * mm_ddMoveFieldsToSection
 * @version 1.0.1 (2013-10-25)
 * 
 * @description Widget allows document fields & TVs to be moved in an another section. However you can’t move the following fields: keywords, metatags, which_editor, show_in_menu, menuindex.
 * 
 * @uses ManagerManager 0.5.2.
 *
 * @param $fields {string} - The name(s) of the document fields (or TVs) this should apply to. @required
 * @param $sectionId {string} - The ID of the section which the fields should be moved to. @required
 * @param $roles {comma separated string} - The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $templates {comma separated string} - Id of the templates to which this widget is applied (when this parameter is empty then widget is applied to the all templates). Default: ''.
 * 
 * @link http://code.divandesign.biz/modx/mm_movefieldstosection/1.0.1
 * 
 * @copyright 2013, DivanDesign
 * http://www.DivanDesign.ru
 */

function mm_ddMoveFieldsToSection($fields, $sectionId, $roles = '', $templates = ''){
	global $modx;
	$e = &$modx->Event;
	
	if ($e->name == 'OnDocFormRender' && useThisRule($roles, $templates)){
		$output = "\n//  -------------- mm_moveFieldsToSection :: Begin ------------- \n";
		
		$output .= '$j.ddMM.moveFields("'.$fields.'", "'.prepareSectionId($sectionId).'_body");';
		
		$output .= "\n//  -------------- mm_moveFieldsToSection :: End ------------- \n";
		
		$e->output($output . "\n");
	}
}
?>