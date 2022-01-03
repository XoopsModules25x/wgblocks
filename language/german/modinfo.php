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

require_once __DIR__ . '/common.php';

// ---------------- Admin Main ----------------
\define('_MI_WGBLOCKS_NAME', 'wgBlocks');
\define('_MI_WGBLOCKS_DESC', 'Dieses Modul kann eigende Blöcke ohne Zuordnung auf ein bestimmtes Modul zur Verfügung stellen');
// ---------------- Admin Menu ----------------
\define('_MI_WGBLOCKS_ADMENU1', 'Übersicht');
\define('_MI_WGBLOCKS_ADMENU2', 'Einträge');
\define('_MI_WGBLOCKS_ADMENU3', 'Klonen');
\define('_MI_WGBLOCKS_ADMENU4', 'Feedback');
\define('_MI_WGBLOCKS_ABOUT', 'Über');
// ---------------- Admin Nav ----------------
\define('_MI_WGBLOCKS_ADMIN_PAGER', 'Anzahl Adminseite');
\define('_MI_WGBLOCKS_ADMIN_PAGER_DESC', 'Anzahl der Einträge in Listen auf Adminseiten');
// Blocks
\define('_MI_WGBLOCKS_ITEMS_BLOCK', 'Items block');
\define('_MI_WGBLOCKS_ITEMS_BLOCK_DESC', 'Items block description');
// Config
\define('_MI_WGBLOCKS_EDITOR_ADMIN', 'Anzahl Benutzerseiten');
\define('_MI_WGBLOCKS_EDITOR_ADMIN_DESC', 'Anzahl der Einträge in Listen auf Benutzerseiten');
\define('_MI_WGBLOCKS_EDITOR_MAXCHAR', 'Maximale Anzahl Zeichen bei Texten');
\define('_MI_WGBLOCKS_EDITOR_MAXCHAR_DESC', 'Maximale Anzahl Zeichen bei Texten zur Anzeige in Listen auf Adminseiten');
\define('_MI_WGBLOCKS_KEYWORDS', 'Schlüsselwörter');
\define('_MI_WGBLOCKS_KEYWORDS_DESC', 'Bitte hier Schlüsselwörter angeben (getrennt durch Komma)');
\define('_MI_WGBLOCKS_IDPAYPAL', 'Paypal ID');
\define('_MI_WGBLOCKS_IDPAYPAL_DESC', 'Bitte hier Paypal ID angeben');
\define('_MI_WGBLOCKS_MAINTAINEDBY', 'Unterstützt durch');
\define('_MI_WGBLOCKS_MAINTAINEDBY_DESC', 'Erlaubt Url für Support-/Communityseite');
// ---------------- End ----------------
