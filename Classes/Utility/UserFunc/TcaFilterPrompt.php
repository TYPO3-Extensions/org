<?php

namespace Netzmacher\Org\Utility\UserFunc;

use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2015 -  Dirk Wildt <http://wildt.at.die-netzmacher.de>
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
 * ************************************************************* */

/**
 * Class for rendering a HTML page by TCPDF methods
 *
 * @package TYPO3
 * @subpackage browser
 * @author Dirk Wildt <http://wildt.at.die-netzmacher.de>
 * @version 7.8.0
 * @since 7.8.0
 */
class TcaFilterPrompt
{

  /**
   * Path to locallang file (with : as postfix)
   *
   * @var string
   */
  protected $_locallangPath = 'LLL:EXT:org/Resources/Private/Language/Userfunc/TcaFilterPrompt/locallang.xlf:';

  /**
   * Max width of the div area of the prompt
   *
   * @var string
   */
  protected $_maxWidth = '600px';

  /**
   * tx_org_downloads( ) : Returns a note, how to configure filter by constant editor
   *
   * @return string
   * @access public
   * @version 7.8.0
   * @since 7.8.0
   *
   */
  public function tx_org_downloads()
  {
    $tableLL = LocalizationUtility::translate( $this->_locallangPath . 'tx_org_downloads', 'DOWNLOADS' );
    return $this->_divPrompt( $tableLL );
  }

  /**
   * tx_org_jobs( ) : Returns a note, how to configure filter by constant editor
   *
   * @return string
   * @access public
   * @version 7.8.0
   * @since 7.8.0
   *
   */
  public function tx_org_jobs()
  {
    $tableLL = LocalizationUtility::translate( $this->_locallangPath . 'tx_org_jobs', 'JOBS' );
    return $this->_divPrompt( $tableLL );
  }

  /**
   * tx_org_jobs( ) :
   *
   * @param string $tableLL
   * @return string
   * @access private
   * @version 7.8.0
   * @since 7.8.0
   *
   */
  private function _divPrompt( $tableLL )
  {
    //.message-notice
    //.message-information
    //.message-ok
    //.message-warning
    //.message-error

    $subject = LocalizationUtility::translate( $this->_locallangPath . 'default.prompt', '<i>default.prompt</i>' );
    $subject = str_replace( '%tableLL%', $tableLL, $subject );

    $prompt = '
      <div class="typo3-message message-information" style="max-width:' . $this->_maxWidth . ';">
        <div class="message-body">
          ' . $subject . '
        </div>
      </div>';

    return $prompt;
  }

}
