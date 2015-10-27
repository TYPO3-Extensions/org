<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

//if (!$extManagerDowngradeEnable_fe_users)
//{
//  return;
//}

t3lib_div::loadTCA('fe_groups');
$TCA['fe_groups']['ctrl']['title'] = 'LLL:EXT:org/Resources/Private/Language/fe_groups.xml:fe_groups';
$TCA['fe_groups']['ctrl']['default_sortby'] = 'ORDER BY title';
if ($andWhere_fegroups_subgroup)
{
  $andWhere_default = $TCA['fe_groups']['columns']['subgroup']['config']['foreign_table_where'];
  $andWhere = $andWhere_fegroups_subgroup . $andWhere_default;
  $TCA['fe_groups']['columns']['subgroup']['config']['foreign_table_where'] = $andWhere;
}
?>