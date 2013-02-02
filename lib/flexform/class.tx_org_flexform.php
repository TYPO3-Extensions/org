<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 - Dirk Wildt <http://wildt.at.die-netzmacher.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
* Class provides methods for the flexform
*
* @author    Dirk Wildt <http://wildt.at.die-netzmacher.de>
* @package    TYPO3
* @subpackage    flipit
* @version  3.1.1
* @since    3.1.1
*/


  /**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   49: class tx_org_flexform
 *   67:     function promptCheckUpdate()
 *  102:     function promptCurrIP()
 *
 * TOTAL FUNCTIONS: 2
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */
class tx_org_flexform
{
  
 /**
  * Extension key
  *
  * @var string
  */
  private $extKey = 'flipit';

 /**
  * Extension configuration
  *
  * @var array
  */
  private $arr_extConf = null;
  
 /**
  * Max width for prompts
  *
  * @var string
  */
  private $pid = null;

 /**
  * Max width for prompts
  *
  * @var string
  */
  private $maxWidth = '600px';



/**
 * Constructor. The method initiate the parent object
 *
 * @param    object        The parent object
 * @return    void
 */
  function __construct( $pObj )
  {
    $this->pObj = $pObj;
  }






/**
 * evaluate_plugin: Evaluates the plugin, flexform, TypoScript
 *                  Returns a HTML report
 *
 * Tab [evaluate]
 *
 * @param	array		$arr_pluginConf:  Current plugin/flexform configuration
 * @param	array		$obj_TCEform:     Current TCE form object
 * @return	string		$str_prompt: HTML prompt
 * @version 3.1.1
 * @since 3.1.1
 */
  public function evaluate( $arr_pluginConf )
  {
      //.message-notice
      //.message-information
      //.message-ok
      //.message-warning
      //.message-error
    $str_prompt = null;

    $str_prompt = '
      <div class="typo3-message message-information" style="max-width:' . $this->maxWidth . ';">
        <div class="message-body">
          ' . $GLOBALS['LANG']->sL('LLL:EXT:org/lib/flexform/locallang.xml:sheetFlipit_evaluate') . '
        </div>
      </div>
      ';

    $str_prompt = $str_prompt . $this->evaluate_promptSwftools( );
    return $str_prompt;
  }
  
  
/**
 * evaluate_promptSwftools: Evaluates the plugin, flexform, TypoScript
 *                  Returns a HTML report
 *
 * Tab [evaluate]
 *
 * @param	array		$arr_pluginConf:  Current plugin/flexform configuration
 * @param	array		$obj_TCEform:     Current TCE form object
 * @return	string		$str_prompt: HTML prompt
 * @version 1.0.1
 * @since 1.0.1
 */
  private function evaluate_promptSwftools( )
  {
      //.message-notice
      //.message-information
      //.message-ok
      //.message-warning
      //.message-error

      // Include class userfunc
    $typo3_document_root  = t3lib_div::getIndpEnv( 'TYPO3_DOCUMENT_ROOT' );
    $pathToUserfunc       = $typo3_document_root . '/typo3conf/ext/flipit/lib/userfunc/class.tx_flipit_userfunc.phpXX';
    
    if( ! file_exists( $pathToUserfunc ) ) 
    {
      return;
    }
    
    require_once( $pathToUserfunc );
    $this->objUserfunc = new tx_flipit_userfunc( $this );
    $this->objUserfunc->set_allParams( );
      // Include class userfunc

    switch( $this->objUserfunc->swfTools )
    {
      case( 'installed' ):
        $type   = 'ok';
        $prompt = $GLOBALS['LANG']->sL('LLL:EXT:flipit/locallang_db.xml:sheetFlipit_evaluate_ok_swftools');
        break;
      case( 'notInstalled' ):
      default:
        $type   = 'information';
        $prompt = $GLOBALS['LANG']->sL('LLL:EXT:flipit/locallang_db.xml:sheetFlipit_evaluate_warn_swftools');
        break;
    }

    $str_prompt = '
      <div class="typo3-message message-'. $type . '" style="max-width:' . $this->maxWidth . ';">
        <div class="message-body">
          ' . $prompt . '
        </div>
      </div>
      ';
    
    $str_prompt = str_replace( '%pid%', $this->pid, $str_prompt );
    return $str_prompt;
  }

}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/org/flexform/class.tx_org_flexform.php'])
{
  include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/org/flexform/class.tx_org_flexform.php']);
}

?>