<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * Wgblocks module for xoops
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        Wgblocks
 * @author         Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com> XOOPS Project (www.xoops.org) $
 */

/**
 * @return string
 */
function wgblocks_func_sysinfo()
{
    
    $ret = '';
    $moduleHandler = xoops_getHandler('module');
    $installed_mods = $moduleHandler->getObjects();
    foreach ($installed_mods as $module) {
        $ret .= '<h3 style="padding:10px;border-top:1px solid #000;border-bottom:1px solid #000">' . $module->getVar('name') . '</h3>';
        $ret .= '<p style="line-height:30px">Version: ' . $module->getVar('version');
        $ret .= '<br>Last update :' . \formatTimestamp($module->getVar('last_update'), 'm');
        if (1 == (int)$module->getVar('hasmain')) {
            $ret .= '<br><a style="margin-bottom:20px;padding:3px 15px;border:1px solid #000;border-radius:5px;" href="' . \XOOPS_URL . '/modules/' . $module->getVar('dirname') .'">Goto module</a>';
        }
        $ret .= '</p>';
    }

    return $ret;

}
