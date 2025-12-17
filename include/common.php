<?php

declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * wgBlocks module for xoops
 *
 * @copyright    2021 XOOPS Project (https://xoops.org)
 * @license      GPL 2.0 or later
 * @package      wgblocks
 * @author       Goffy - Wedega.com - Email:webmaster@wedega.com - Website:https://xoops.wedega.com
 */
if (!\defined('XOOPS_ICONS32_PATH')) {
    \define('XOOPS_ICONS32_PATH', \XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/icons/32');
}
if (!\defined('XOOPS_ICONS32_URL')) {
    \define('XOOPS_ICONS32_URL', \XOOPS_URL . '/Frameworks/moduleclasses/icons/32');
}
\define('WGBLOCKS_DIRNAME', 'wgblocks');
\define('WGBLOCKS_PATH', \XOOPS_ROOT_PATH . '/modules/' . \WGBLOCKS_DIRNAME);
\define('WGBLOCKS_URL', \XOOPS_URL . '/modules/' . \WGBLOCKS_DIRNAME);
\define('WGBLOCKS_ICONS_PATH', \WGBLOCKS_PATH . '/assets/icons');
\define('WGBLOCKS_ICONS_URL', \WGBLOCKS_URL . '/assets/icons');
\define('WGBLOCKS_IMAGE_PATH', \WGBLOCKS_PATH . '/assets/images');
\define('WGBLOCKS_IMAGE_URL', \WGBLOCKS_URL . '/assets/images');
\define('WGBLOCKS_UPLOAD_PATH', \XOOPS_UPLOAD_PATH . '/' . \WGBLOCKS_DIRNAME);
\define('WGBLOCKS_UPLOAD_URL', \XOOPS_UPLOAD_URL . '/' . \WGBLOCKS_DIRNAME);
\define('WGBLOCKS_UPLOAD_FILES_PATH', \WGBLOCKS_UPLOAD_PATH . '/files');
\define('WGBLOCKS_UPLOAD_FILES_URL', \WGBLOCKS_UPLOAD_URL . '/files');
\define('WGBLOCKS_UPLOAD_FUNC_PATH', \WGBLOCKS_UPLOAD_PATH . '/functions');
\define('WGBLOCKS_UPLOAD_FUNC_URL', \WGBLOCKS_UPLOAD_URL . '/functions');
\define('WGBLOCKS_ADMIN', \WGBLOCKS_URL . '/admin/index.php');
$localLogo = \WGBLOCKS_IMAGE_URL . '/goffy-wedega.com_logo.png';
// Module Information
$copyright = "<a href='https://xoops.wedega.com' title='XOOPS Project on Wedega' target='_blank'><img src='" . $localLogo . "' alt='XOOPS Project on Wedega' ></a>";
require_once \XOOPS_ROOT_PATH . '/class/xoopsrequest.php';
require_once \WGBLOCKS_PATH . '/include/functions.php';
