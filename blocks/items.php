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

use XoopsModules\Wgblocks;
use XoopsModules\Wgblocks\ {
    Helper,
    Constants,
    Utility
};


require_once \XOOPS_ROOT_PATH . '/modules/wgblocks/include/common.php';

/**
 * Function show block
 * @param  $options
 * @return array
 */
function b_wgblocks_items_show($options)
{
    $moduleDirName = \basename(\dirname(__DIR__));

    $block        = [];
    $typeBlock    = $options[0];
    $length       = (int)$options[1];
    $helper       = Helper::getInstance();
    $itemsHandler = $helper->getHandler('Items');
    $crItems = new \CriteriaCompo();
    \array_shift($options);
    \array_shift($options);

    if (\count($options) > 0 && (int)$options[0] > 0) {
        $crItems->add(new \Criteria('item_id', '(' . \implode(',', $options) . ')', 'IN'));
    }
    $crItems->setSort('item_weight ASC, item_id');
    $crItems->setOrder('DESC');
    $itemsAll = $itemsHandler->getAll($crItems);
    unset($crItems);
    if (\count($itemsAll) > 0) {
        foreach (\array_keys($itemsAll) as $i) {
            $content = $itemsAll[$i]->getVar('item_text');
            switch ((int)$itemsAll[$i]->getVar('item_type')) {
                case Constants::TYPE_PHP:
                    $file = \WGBLOCKS_UPLOAD_FUNC_PATH . '/' .$itemsAll[$i]->getVar('item_file');
                    $func = $itemsAll[$i]->getVar('item_func');
                    if (\file_exists($file)) {
                        include $file;
                        if (\function_exists($func)){
                            $content = call_user_func($func);
                        } else {
                            $content = \_MB_WGBLOCKS_ERROR_FUNCNOTFOUND;
                        }
                    } else {
                        $content = \_MB_WGBLOCKS_ERROR_FILENOTFOUND;
                    }
                    break;
                case Constants::TYPE_FILE:
                    $file = \WGBLOCKS_UPLOAD_FILES_PATH . '/' .$itemsAll[$i]->getVar('item_file');
                    if (\file_exists($file)) {
                        $fileRes = fopen($file,'r');
                        $content = fread($fileRes, filesize($file));
                        fclose($fileRes);
                    } else {
                        $content = \_MB_WGBLOCKS_ERROR_FILENOTFOUND;
                    }
                    break;
                case Constants::TYPE_TEXT:
                default:
                    break;
            }
            if ($length > 0) {
                $content = Utility::truncateHtml($content, $length);
            }
            $block[$i]['content'] = $content;
        }
    }

    return $block;

}

/**
 * Function edit block
 * @param  $options
 * @return string
 */
function b_wgblocks_items_edit($options)
{
    $helper = Helper::getInstance();
    $itemsHandler = $helper->getHandler('Items');

    $form = "<input type='hidden' name='options[0]' value='".$options[0]."' >"; // input for block type
    $form .= \_MB_WGBLOCKS_CONTENT_LENGTH . " : <input type='text' name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' ><br><br>";
    \array_shift($options);
    \array_shift($options);

    $crItems = new \CriteriaCompo();
    $crItems->add(new \Criteria('item_id', 0, '!='));
    $crItems->add(new \Criteria('item_status', Constants::STATUS_ONLINE));
    $crItems->setSort('item_id');
    $crItems->setOrder('ASC');
    $itemsAll = $itemsHandler->getAll($crItems);
    unset($crItems);
    $form .= \_MB_WGBLOCKS_ITEMS_TO_DISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    foreach (\array_keys($itemsAll) as $i) {
        $item_id = $itemsAll[$i]->getVar('item_id');
        $form .= "<option value='" . $item_id . "' " . (!\in_array($item_id, $options) ? '' : "selected='selected'") . '>' . $itemsAll[$i]->getVar('item_name') . '</option>';
    }
    $form .= '</select>';

    return $form;

}
