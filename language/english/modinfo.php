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

require_once __DIR__ . '/common.php';

// ---------------- Admin Main ----------------
\define('_MI_WGBLOCKS_NAME', 'wgBlocks');
\define('_MI_WGBLOCKS_DESC', 'This module can handle blocks with custom code outside a specific module');
// ---------------- Admin Menu ----------------
\define('_MI_WGBLOCKS_ADMENU1', 'Dashboard');
\define('_MI_WGBLOCKS_ADMENU2', 'Items');
\define('_MI_WGBLOCKS_ADMENU3', 'Clone');
\define('_MI_WGBLOCKS_ADMENU4', 'Feedback');
\define('_MI_WGBLOCKS_ABOUT', 'About');
// ---------------- Admin Nav ----------------
\define('_MI_WGBLOCKS_ADMIN_PAGER', 'Admin pager');
\define('_MI_WGBLOCKS_ADMIN_PAGER_DESC', 'Admin per page list');
// Blocks
\define('_MI_WGBLOCKS_ITEMS_BLOCK', 'Items block');
\define('_MI_WGBLOCKS_ITEMS_BLOCK_DESC', 'Items block description');
// Config
\define('_MI_WGBLOCKS_EDITOR_ADMIN', 'Editor admin');
\define('_MI_WGBLOCKS_EDITOR_ADMIN_DESC', 'Select the editor which should be used in admin area for text area fields');
\define('_MI_WGBLOCKS_EDITOR_MAXCHAR', 'Text max characters');
\define('_MI_WGBLOCKS_EDITOR_MAXCHAR_DESC', 'Max characters for showing text of a textarea or editor field in admin area');
\define('_MI_WGBLOCKS_KEYWORDS', 'Keywords');
\define('_MI_WGBLOCKS_KEYWORDS_DESC', 'Insert here the keywords (separate by comma)');
\define('_MI_WGBLOCKS_IDPAYPAL', 'Paypal ID');
\define('_MI_WGBLOCKS_IDPAYPAL_DESC', 'Insert here your PayPal ID for donations');
\define('_MI_WGBLOCKS_MAINTAINEDBY', 'Maintained By');
\define('_MI_WGBLOCKS_MAINTAINEDBY_DESC', 'Allow url of support site or community');
// ---------------- End ----------------
