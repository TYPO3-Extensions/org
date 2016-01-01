<?php

namespace Netzmacher\Org\ViewHelpers\Getter;

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

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
 * Class GetTxOrgJobsectorsViewHelper
 *
 * @package Netzmacher\Org\ViewHelpers\Getter
 * @author Dirk Wildt <http://wildt.at.die-netzmacher.de>
 * @version 7.8.0
 * @since 7.8.0
 * @internal #i0119
 */
class GetTxOrgJobsectorsViewHelper extends AbstractViewHelper
{

  /**
   * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
   * @inject
   */
  protected $configurationManager;

  /**
   * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
   */
  protected $contentObjectRenderer;

  /**
   * sqlRepository
   *
   * @var \Netzmacher\Browser\Domain\Repository\SqlRepository
   * @inject
   */
  protected $sqlRepository;

  /**
   * pid of the sysfolder or pid list of the sysfolders,
   * which contains the records of tx_org_jobsector
   *
   * @var string
   */
  private $_pidList;

  /**
   * Initialize
   *
   * @access public
   * @return void
   */
  public function initialize()
  {
    $this->contentObjectRenderer = $this->objectManager->get(
            'TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer'
    );
    $typoScriptSetup = $this->configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
    );
    $this->settings = $typoScriptSetup[ 'plugin.' ][ 'tx_org.' ][ 'settings.' ];
  }

  /**
   * render( )  : Returns an array proper for the map property of the fluid alias.
   *
   * @access public
   * @return array $map
   */
  public function render()
  {
    if ( $this->_init() )
    {
      return FALSE;
    }

    $map = $this->_map();
    return $map;
  }

  /**
   * _getPidList( ) :
   *
   * @access private
   * @return string
   */
  private function _getPidList()
  {
    return $this->_pidList;
  }

  /**
   * _init( ) :
   *
   * @access private
   * @return boolean
   */
  private function _init()
  {
    $this->_setPidList();
    return FALSE;
  }

  /**
   * _map( ) : Returns an array proper for the map property of the fluid alias.
   *
   * @access private
   * @return array $rows
   */
  private function _map()
  {
    $rows = $this->_mapRows();
    $rows = $this->_mapLabel( $rows, 'tx_org_sector' );
    return $rows;
  }

  /**
   * _mapLabel( ) : Labels the rows array.
   *                Is needed for the map property of the fluid alias.
   *
   * @param array $rows
   * @param string $lable
   * @access private
   * @return array $map
   */
  private function _mapLabel( $rows, $lable )
  {
    $map = array(
      $lable => $rows
    );
    return $map;
  }

  /**
   * _mapRows( ) :
   *
   * @access private
   * @return array $rows
   */
  private function _mapRows()
  {
    $rows = $this->_mapRowsSql();
    $query = $this->_mapRowsSqlQuery();
    $rows = $this->_mapRowsSqlExec( $query );
    return $rows;
  }

  /**
   * _mapRowsSql( ) :
   *
   * @access private
   * @return array $rows
   */
  private function _mapRowsSql()
  {
    $query = $this->_mapRowsSqlQuery();
    $rows = $this->_mapRowsSqlExec( $query );
    return $rows;
  }

  /**
   * _mapRowsSqlExec( ) :
   *
   * @param string $query
   * @access private
   * @return array $rows
   */
  private function _mapRowsSqlExec( $query )
  {
    $rows = $this->sqlRepository->SELECT( $query );
    return $rows;
  }

  /**
   * _mapRowsSqlQuery( ) :
   *
   * @access private
   * @return string $query
   */
  private function _mapRowsSqlQuery()
  {
    $query = '
      SELECT    t1.title AS catParent,
                t2.title AS catChild,
                t1.uid AS catParentUid,
                t2.uid AS catChildUid
      FROM      tx_org_jobsector AS t1
      LEFT JOIN tx_org_jobsector AS t2
                ON  t2.uid_parent = t1.uid
                AND t2.hidden     = 0
                AND t2.deleted    = 0
      WHERE         t1.uid_parent = 0
                AND t1.hidden     = 0
                AND t1.deleted    = 0
      AND       t1.pid IN (' . $this->_getPidList() . ')
      ORDER BY  t1.title, t2.title;
    '
    ;
    return $query;
  }

  /**
   * _setPidList( ) :
   *
   * @access private
   * @return boolean
   */
  private function _setPidList()
  {
    $data = array(
      'dummy' => 'dummy',
    );
    $table = 'tx_org_jobsection';
    $this->contentObjectRenderer->start( $data, $table );
    $value = $this->contentObjectRenderer->cObjGetSingle(
            $this->settings[ 'constants.' ][ 'sysfolders.' ][ 'job' ], $this->settings[ 'constants.' ][ 'sysfolders.' ][ 'job.' ]
    );

    if ( !empty( $value ) )
    {
      $this->_pidList = $value;
      return FALSE;
    }
    $this->_setPidListDie( __METHOD__, __LINE__ );
  }

  /**
   * _setPidListDie( ) :
   *
   * @access private
   * @return boolean
   */
  private function _setPidListDie( $method, $line )
  {
    $header = 'ERROR: pid is emtpy';
    $text = ''
            . '<h2>'
            . '  Check your TypoScript'
            . '</h2>'
            . '<p>'
            . '  Please check your TypoScript setup:'
            . '</p>'
            . '<ul>'
            . '  <li>'
            . '    plugin.tx_org.settings.constants.sysfolders.job'
            . '  </li>'
            . '  <li>'
            . '    value must be the pid of the folder or the pid list of the folders,<br />'
            . '    which contain your job records.'
            . '  </li>'
            . '</ul>'
    ;
    $this->_zzDieWiPrompt( $header, $text, $method, $line );
  }

  /**
   * _zzDieWiPrompt( ) :
   *
   * @access private
   * @return boolean
   */
  private function _zzDieWiPrompt( $header, $text, $method, $line )
  {
    $prompt = '
      <h1 style="color:red;">
        ' . $header . '
      </h1>
      ' . $text . '
      <p>
        Sorry for the trouble. Organiser - TYPO3 for the lobby and the organisers.<br />
        Error occures here: ' . $method . ' at #' . $line . '
      </p>
      <p>
        If you need any help, please visit the
        <a href="http://typo3-browser-forum.de/" target="_blank" title="TYPO3 Browser Forums. 500 TYPO3-integrators are registered.">
          TYPO3 Browser Forum &raquo;</a>
      </p>
      ';
    die( $prompt );
  }

}
