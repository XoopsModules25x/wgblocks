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

// ---------------- Admin Index ----------------
\define('_AM_WGBLOCKS_STATISTICS', 'Statistics');
// There are
\define('_AM_WGBLOCKS_THEREARE_ITEMS', "There are <span class='bold'>%s</span> items in the database");
// ---------------- Admin Files ----------------
// There aren't
\define('_AM_WGBLOCKS_THEREARENT_ITEMS', "There aren't items");
// Save/Delete
\define('_AM_WGBLOCKS_FORM_OK', 'Successfully saved');
\define('_AM_WGBLOCKS_FORM_DELETE_OK', 'Successfully deleted');
\define('_AM_WGBLOCKS_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
\define('_AM_WGBLOCKS_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
// Buttons
\define('_AM_WGBLOCKS_ADD_ITEM', 'Add New Item');
// Lists
\define('_AM_WGBLOCKS_LIST_ITEMS', 'List of Items');
// ---------------- Admin Classes ----------------
// Item add/edit
\define('_AM_WGBLOCKS_ITEM_ADD', 'Add Item');
\define('_AM_WGBLOCKS_ITEM_EDIT', 'Edit Item');
// Elements of Item
\define('_AM_WGBLOCKS_ITEM_ID', 'Id');
\define('_AM_WGBLOCKS_ITEM_NAME', 'Name');
\define('_AM_WGBLOCKS_ITEM_TYPE', 'Type');
\define('_AM_WGBLOCKS_ITEM_TYPE_TEXT', 'Text');
\define('_AM_WGBLOCKS_ITEM_TYPE_PHP', 'PHP-Function');
\define('_AM_WGBLOCKS_ITEM_TYPE_FILE', 'Html-File');
\define('_AM_WGBLOCKS_ITEM_TEXT', 'Text');
\define('_AM_WGBLOCKS_ITEM_FILE', 'File');
\define('_AM_WGBLOCKS_ITEM_FUNC', 'Func');
\define('_AM_WGBLOCKS_ITEM_TEXT_DESC', 'Only necessary for text items');
\define('_AM_WGBLOCKS_ITEM_FILE_DESC', 'Necessary for php function and file items');
\define('_AM_WGBLOCKS_ITEM_FUNC_DESC', 'Only necessary for php function items');
\define('_AM_WGBLOCKS_ITEM_WEIGHT', 'Weight');
\define('_AM_WGBLOCKS_ITEM_STATUS', 'Status');
\define('_AM_WGBLOCKS_ITEM_BLOCKS', 'Used in blocks');
\define('_AM_WGBLOCKS_ITEM_DATECREATED', 'Datecreated');
\define('_AM_WGBLOCKS_ITEM_SUBMITTER', 'Submitter');
// General
\define('_AM_WGBLOCKS_FORM_UPLOAD', 'Upload file');
\define('_AM_WGBLOCKS_FORM_UPLOAD_NEW', 'Upload new file: ');
\define('_AM_WGBLOCKS_FORM_UPLOAD_SIZE', 'Max file size: ');
\define('_AM_WGBLOCKS_FORM_UPLOAD_SIZE_MB', 'MB');
\define('_AM_WGBLOCKS_FORM_UPLOAD_IMG_WIDTH', 'Max image width: ');
\define('_AM_WGBLOCKS_FORM_UPLOAD_IMG_HEIGHT', 'Max image height: ');
\define('_AM_WGBLOCKS_FORM_IMAGE_PATH', 'Files in %s :');
\define('_AM_WGBLOCKS_FORM_ACTION', 'Action');
\define('_AM_WGBLOCKS_FORM_EDIT', 'Modification');
\define('_AM_WGBLOCKS_FORM_DELETE', 'Clear');
// Clone feature
\define('_AM_WGBLOCKS_CLONE', 'Clone');
\define('_AM_WGBLOCKS_CLONE_DSC', 'Cloning a module has never been this easy! Just type in the name you want for it and hit submit button!');
\define('_AM_WGBLOCKS_CLONE_TITLE', 'Clone %s');
\define('_AM_WGBLOCKS_CLONE_NAME', 'Choose a name for the new module');
\define('_AM_WGBLOCKS_CLONE_NAME_DSC', 'Do not use special characters! <br>Do not choose an existing module dirname or database table name!');
\define('_AM_WGBLOCKS_CLONE_INVALIDNAME', 'ERROR: Invalid module name, please try another one!');
\define('_AM_WGBLOCKS_CLONE_EXISTS', 'ERROR: Module name already taken, please try another one!');
\define('_AM_WGBLOCKS_CLONE_CONGRAT', 'Congratulations! %s was sucessfully created!<br>You may want to make changes in language files.');
\define('_AM_WGBLOCKS_CLONE_IMAGEFAIL', 'Attention, we failed creating the new module logo. Please consider modifying assets/images/logo_module.png manually!');
\define('_AM_WGBLOCKS_CLONE_FAIL', 'Sorry, we failed in creating the new clone. Maybe you need to temporally set write permissions (CHMOD 777) to modules folder and try again.');
// ---------------- Admin Others ----------------
\define('_AM_WGBLOCKS_ABOUT_MAKE_DONATION', 'Submit');
\define('_AM_WGBLOCKS_SUPPORT_FORUM', 'Support Forum');
\define('_AM_WGBLOCKS_DONATION_AMOUNT', 'Donation Amount');
\define('_AM_WGBLOCKS_MAINTAINEDBY', ' is maintained by ');
// ---------------- Status ----------------
\define('_AM_WGBLOCKS_STATUS_NONE', 'No status');
\define('_AM_WGBLOCKS_STATUS_OFFLINE', 'Offline');
\define('_AM_WGBLOCKS_STATUS_ONLINE', 'Online');
// ---------------- End ----------------
