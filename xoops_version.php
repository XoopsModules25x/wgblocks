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
 * @since        1.0
 * @min_xoops    2.5.11 Beta1
 * @author       Goffy - Wedega.com - Email:webmaster@wedega.com - Website:https://xoops.wedega.com
 */

// 
$moduleDirName      = \basename(__DIR__);
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);
// ------------------- Informations ------------------- //
$modversion = [
    'name'                => \_MI_WGBLOCKS_NAME,
    'version'             => '1.1.0',
    'release'             => '04/09/2023',
    'release_date'        => '2023/04/09',
    'module_status'       => 'RC1',
    'description'         => \_MI_WGBLOCKS_DESC,
    'author'              => 'Goffy - Wedega.com',
    'author_mail'         => 'webmaster@wedega.com',
    'author_website_url'  => 'https://xoops.wedega.com',
    'author_website_name' => 'XOOPS Project on Wedega',
    'credits'             => 'XOOPS Development Team',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'https://www.gnu.org/licenses/gpl-3.0.en.html',
    'help'                => 'page=help',
    'release_info'        => 'release_info',
    'release_file'        => \XOOPS_URL . '/modules/wgblocks/docs/release_info file',
    'manual'              => 'link to manual file',
    'manual_file'         => \XOOPS_URL . '/modules/wgblocks/docs/install.txt',
    'min_php'             => '7.4',
    'min_xoops'           => '2.5.11 Stable',
    'min_admin'           => '1.2',
    'min_db'              => ['mysql' => '5.6', 'mysqli' => '5.6'],
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => \basename(__DIR__),
    'dirmoduleadmin'      => 'Frameworks/moduleclasses/moduleadmin',
    'sysicons16'          => '../../Frameworks/moduleclasses/icons/16',
    'sysicons32'          => '../../Frameworks/moduleclasses/icons/32',
    'modicons16'          => 'assets/icons/16',
    'modicons32'          => 'assets/icons/32',
    'demo_site_url'       => 'https://xoops.wedega.com',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'https://xoops.org/modules/newbb',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    'system_menu'         => 1,
    'hasAdmin'            => 1,
    'hasMain'             => 0,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    'onInstall'           => 'include/install.php',
    'onUninstall'         => 'include/uninstall.php',
    'onUpdate'            => 'include/update.php',
];
// ------------------- Templates ------------------- //
$modversion['templates'] = [
    // Admin templates
    ['file' => 'wgblocks_admin_about.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgblocks_admin_header.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgblocks_admin_index.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgblocks_admin_items.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgblocks_admin_clone.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgblocks_admin_footer.tpl', 'description' => '', 'type' => 'admin'],
    // User templates
    ['file' => 'wgblocks_header.tpl', 'description' => ''],
    ['file' => 'wgblocks_index.tpl', 'description' => ''],
    ['file' => 'wgblocks_breadcrumbs.tpl', 'description' => ''],
    ['file' => 'wgblocks_footer.tpl', 'description' => ''],
];
// ------------------- Mysql ------------------- //
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables
$modversion['tables'] = [
    'wgblocks_items',
];
// ------------------- Default Blocks ------------------- //
// Items
$modversion['blocks'][] = [
    'file'        => 'items.php',
    'name'        => \_MI_WGBLOCKS_ITEMS_BLOCK,
    'description' => \_MI_WGBLOCKS_ITEMS_BLOCK_DESC,
    'show_func'   => 'b_wgblocks_items_show',
    'edit_func'   => 'b_wgblocks_items_edit',
    'template'    => 'wgblocks_block_items.tpl',
    'options'     => 'default|0',
];
// ------------------- Config ------------------- //
// Editor Admin
\xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name'        => 'editor_admin',
    'title'       => '\_MI_WGBLOCKS_EDITOR_ADMIN',
    'description' => '\_MI_WGBLOCKS_EDITOR_ADMIN_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'dhtml',
    'options'     => array_flip($editorHandler->getList()),
];
// Editor : max characters admin area
$modversion['config'][] = [
    'name'        => 'editor_maxchar',
    'title'       => '\_MI_WGBLOCKS_EDITOR_MAXCHAR',
    'description' => '\_MI_WGBLOCKS_EDITOR_MAXCHAR_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 50,
];
// Keywords
$modversion['config'][] = [
    'name'        => 'keywords',
    'title'       => '\_MI_WGBLOCKS_KEYWORDS',
    'description' => '\_MI_WGBLOCKS_KEYWORDS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'wgblocks, items',
];
// Admin pager
$modversion['config'][] = [
    'name'        => 'adminpager',
    'title'       => '\_MI_WGBLOCKS_ADMIN_PAGER',
    'description' => '\_MI_WGBLOCKS_ADMIN_PAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
// Paypal ID
$modversion['config'][] = [
    'name'        => 'donations',
    'title'       => '\_MI_WGBLOCKS_IDPAYPAL',
    'description' => '\_MI_WGBLOCKS_IDPAYPAL_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'textbox',
    'default'     => 'XYZ123',
];
// Make Sample button visible?
$modversion['config'][] = [
    'name'        => 'displaySampleButton',
    'title'       => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON',
    'description' => 'CO_' . $moduleDirNameUpper . '_' . 'SHOW_SAMPLE_BUTTON_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Maintained by
$modversion['config'][] = [
    'name'        => 'maintainedby',
    'title'       => '\_MI_WGBLOCKS_MAINTAINEDBY',
    'description' => '\_MI_WGBLOCKS_MAINTAINEDBY_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'https://xoops.org/modules/newbb',
];
