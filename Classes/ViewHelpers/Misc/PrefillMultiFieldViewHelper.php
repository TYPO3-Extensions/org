<?php

namespace Netzmacher\Org\ViewHelpers\Misc;

use \In2code\Powermail\Domain\Model\Field;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Prefill a multi field
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class PrefillMultiFieldViewHelper extends AbstractViewHelper
{

  /**
   * Prefill fields from type
   *        check
   *        radio
   *
   * @param Field $field  field
   * @param string $value field value
   * @return bool Prefill field
   */
  public function render( Field $field, $value )
  {
    $fieldMarker = $field->getMarker();
    $pmGPFields = ( array ) $this->_PowermailGP[ 'field' ];
    //var_dump( __METHOD__, __LINE__, $fieldMarker, array_keys( $pmGPFields ) );
    if ( !in_array( $fieldMarker, array_keys( $pmGPFields ) ) )
    {
      return NULL;
    }
    $pmGPFieldValues = ( array ) $pmGPFields[ $fieldMarker ];
    //var_dump( __METHOD__, __LINE__, $value, $pmGPFieldValues );
    if ( !in_array( $value, $pmGPFieldValues ) )
    {
      return NULL;
    }
    //die();
    return TRUE;
  }

  /**
   * Init
   *
   * @return void
   */
  public function initialize()
  {
    $this->_PowermailGP = GeneralUtility::_GP( 'tx_powermail_pi1' );
  }

}
