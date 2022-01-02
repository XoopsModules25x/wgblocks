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

use Xmf\Request;
use XoopsModules\Wgblocks;
use XoopsModules\Wgblocks\Constants;
use XoopsModules\Wgblocks\Common;

require __DIR__ . '/header.php';
// Get all request values
$op     = Request::getCmd('op', 'list');
$itemId = Request::getInt('item_id');
$start  = Request::getInt('start');
$limit  = Request::getInt('limit', $helper->getConfig('adminpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);

switch ($op) {
    case 'list':
    default:
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'wgblocks_admin_items.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('items.php'));
        $adminObject->addItemButton(\_AM_WGBLOCKS_ADD_ITEM, 'items.php?op=new');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $itemsCount = $itemsHandler->getCountItems();
        $itemsAll = $itemsHandler->getAllItems($start, $limit);
        $GLOBALS['xoopsTpl']->assign('items_count', $itemsCount);
        $GLOBALS['xoopsTpl']->assign('wgblocks_url', \WGBLOCKS_URL);
        $GLOBALS['xoopsTpl']->assign('wgblocks_icons_url_16', \WGBLOCKS_ICONS_URL . '/16/');

        $blockHandler = xoops_getHandler('block');
        $crBlocks = new \CriteriaCompo();
        $crBlocks->add(new \Criteria('mid', $GLOBALS['xoopsModule']->getVar('mid')));
        $blocksArr = $blockHandler->getObjects($crBlocks);
        // Table view items
        if ($itemsCount > 0) {
            foreach (\array_keys($itemsAll) as $i) {
                $item = [];
                $item = $itemsAll[$i]->getValuesItems();
                switch ((int)$itemsAll[$i]->getVar('item_type')) {
                    case Constants::TYPE_PHP:
                        $file = \WGBLOCKS_UPLOAD_FUNC_PATH . '/' .$itemsAll[$i]->getVar('item_file');
                        $func = $itemsAll[$i]->getVar('item_func');
                        if (\file_exists($file)) {
                            $item['file_check'] = 'ok.png';
                            include $file;
                            if (\function_exists($func)){
                                $item['func_check'] = 'ok.png';
                            } else {
                                $item['func_check'] = 'attention.png';
                            }
                        } else {
                            $item['file_check'] = 'attention.png';
                            $item['func_check'] = 'attention.png';
                        }
                        break;
                    case Constants::TYPE_FILE:
                        $file = \WGBLOCKS_UPLOAD_FILES_PATH . '/' .$itemsAll[$i]->getVar('item_file');
                        if (\file_exists($file)) {
                            $item['file_check'] = 'ok.png';
                        } else {
                            $item['file_check'] = 'attention.png';
                        }
                        break;
                    case Constants::TYPE_TEXT:
                    default:
                        break;
                }
                $usedBlocks = '';
                foreach ($blocksArr as $block) {
                    $options = explode('|', $block->getVar('options'));
                    \array_shift($options);
                    \array_shift($options);

                    if (in_array($item['id'], $options)) {
                        $usedBlocks .= $block->getVar('title') . '<br>';
                    }
                    $item['usedBlocks'] = $usedBlocks;
                }
                $item['blocks'] = $usedBlocks;
                $GLOBALS['xoopsTpl']->append('items_list', $item);
                unset($item);
            }
            // Display Navigation
            if ($itemsCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($itemsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', \_AM_WGBLOCKS_THEREARENT_ITEMS);
        }
        break;
    case 'new':
        $templateMain = 'wgblocks_admin_items.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('items.php'));
        $adminObject->addItemButton(\_AM_WGBLOCKS_LIST_ITEMS, 'items.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $itemsObj = $itemsHandler->create();
        $form = $itemsObj->getFormItems();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'clone':
        $templateMain = 'wgblocks_admin_items.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('items.php'));
        $adminObject->addItemButton(\_AM_WGBLOCKS_LIST_ITEMS, 'items.php', 'list');
        $adminObject->addItemButton(\_AM_WGBLOCKS_ADD_ITEM, 'items.php?op=new');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Request source
        $itemIdSource = Request::getInt('item_id_source');
        // Get Form
        $itemsObjSource = $itemsHandler->get($itemIdSource);
        $itemsObj = $itemsObjSource->xoopsClone();
        $form = $itemsObj->getFormItems();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('items.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($itemId > 0) {
            $itemsObj = $itemsHandler->get($itemId);
        } else {
            $itemsObj = $itemsHandler->create();
        }
        // Set Vars
        $itemsObj->setVar('item_name', Request::getString('item_name'));
        $itemsObj->setVar('item_type', Request::getInt('item_type'));
        $itemsObj->setVar('item_text', Request::getText('item_text'));
        $itemsObj->setVar('item_file', Request::getString('item_file'));
        $itemsObj->setVar('item_func', Request::getString('item_func'));
        $itemsObj->setVar('item_weight', Request::getString('item_weight'));
        $itemsObj->setVar('item_status', Request::getInt('item_status'));
        $itemDatecreatedArr = Request::getArray('item_datecreated');
        $itemDatecreatedObj = \DateTime::createFromFormat(\_SHORTDATESTRING, $itemDatecreatedArr['date']);
        $itemDatecreatedObj->setTime(0, 0, 0);
        $itemDatecreated = $itemDatecreatedObj->getTimestamp() + (int)$itemDatecreatedArr['time'];
        $itemsObj->setVar('item_datecreated', $itemDatecreated);
        $itemsObj->setVar('item_submitter', Request::getInt('item_submitter'));
        // Insert Data
        if ($itemsHandler->insert($itemsObj)) {
                \redirect_header('items.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_AM_WGBLOCKS_FORM_OK);
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $itemsObj->getHtmlErrors());
        $form = $itemsObj->getFormItems();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'wgblocks_admin_items.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('items.php'));
        $adminObject->addItemButton(\_AM_WGBLOCKS_ADD_ITEM, 'items.php?op=new');
        $adminObject->addItemButton(\_AM_WGBLOCKS_LIST_ITEMS, 'items.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $itemsObj = $itemsHandler->get($itemId);
        $itemsObj->start = $start;
        $itemsObj->limit = $limit;
        $form = $itemsObj->getFormItems();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'wgblocks_admin_items.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('items.php'));
        $itemsObj = $itemsHandler->get($itemId);
        $itemName = $itemsObj->getVar('item_name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('items.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($itemsHandler->delete($itemsObj)) {
                \redirect_header('items.php', 3, \_AM_WGBLOCKS_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $itemsObj->getHtmlErrors());
            }
        } else {
            $customConfirm = new Common\Confirm(
                ['ok' => 1, 'item_id' => $itemId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_AM_WGBLOCKS_FORM_SURE_DELETE, $itemsObj->getVar('item_name')));
            $form = $customConfirm->getFormConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
}
require __DIR__ . '/footer.php';
