<?php

declare(strict_types=1);


namespace XoopsModules\Wgblocks;

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

use XoopsModules\Wgblocks\Constants;

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Items
 */
class Items extends \XoopsObject
{
    /**
     * @var int
     */
    public $start = 0;

    /**
     * @var int
     */
    public $limit = 0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initVar('item_id', \XOBJ_DTYPE_INT);
        $this->initVar('item_name', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('item_type', \XOBJ_DTYPE_INT);
        $this->initVar('item_text', \XOBJ_DTYPE_OTHER);
        $this->initVar('item_file', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('item_func', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('item_weight', \XOBJ_DTYPE_TXTAREA);
        $this->initVar('item_status', \XOBJ_DTYPE_INT);
        $this->initVar('item_datecreated', \XOBJ_DTYPE_INT);
        $this->initVar('item_submitter', \XOBJ_DTYPE_INT);
    }

    /**
     * @static function &getInstance
     */
    public static function getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
    }

    /**
     * The new inserted $Id
     * @return inserted id
     */
    public function getNewInsertedIdItems()
    {
        return $GLOBALS['xoopsDB']->getInsertId();
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormItems($action = false)
    {
        $helper = \XoopsModules\Wgblocks\Helper::getInstance();
        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $isAdmin = \is_object($GLOBALS['xoopsUser']) && $GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid());
        // Title
        $title = $this->isNew() ? \_AM_WGBLOCKS_ITEM_ADD : \_AM_WGBLOCKS_ITEM_EDIT;
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');

        // Form Select itemType
        $itemType = $this->isNew() ? Constants::TYPE_TEXT : $this->getVar('item_type');
        $itemTypeSelect = new \XoopsFormRadio(\_AM_WGBLOCKS_ITEM_TYPE, 'item_type', $itemType);
        $itemTypeSelect->addOption(Constants::TYPE_TEXT, \_AM_WGBLOCKS_ITEM_TYPE_TEXT);
        $itemTypeSelect->addOption(Constants::TYPE_PHP, \_AM_WGBLOCKS_ITEM_TYPE_PHP);
        $itemTypeSelect->addOption(Constants::TYPE_FILE, \_AM_WGBLOCKS_ITEM_TYPE_FILE);
        $form->addElement($itemTypeSelect);

        // Form Text itemName
        $form->addElement(new \XoopsFormText(\_AM_WGBLOCKS_ITEM_NAME, 'item_name', 50, 255, $this->getVar('item_name')));
        // Form Editor DhtmlTextArea itemText
        $editorConfigs = [];
        if ($isAdmin) {
            $editor = $helper->getConfig('editor_admin');
        } else {
            $editor = $helper->getConfig('editor_user');
        }
        $editorConfigs['name'] = 'item_text';
        $editorConfigs['value'] = $this->getVar('item_text', 'e');
        $editorConfigs['rows'] = 5;
        $editorConfigs['cols'] = 40;
        $editorConfigs['width'] = '100%';
        $editorConfigs['height'] = '400px';
        $editorConfigs['editor'] = $editor;
        $textItemText = new \XoopsFormEditor(\_AM_WGBLOCKS_ITEM_TEXT, 'item_text', $editorConfigs);
        $textItemText->setDescription(\_AM_WGBLOCKS_ITEM_TEXT_DESC);
        $form->addElement($textItemText);
        // Form Text itemFile
        $textItemFile = new \XoopsFormText(\_AM_WGBLOCKS_ITEM_FILE, 'item_file', 50, 255, $this->getVar('item_file'));
        $textItemFile->setDescription(\_AM_WGBLOCKS_ITEM_FILE_DESC);
        $form->addElement($textItemFile);
        // Form Text itemFunc
        $textItemFunc = new \XoopsFormText(\_AM_WGBLOCKS_ITEM_FUNC, 'item_func', 50, 255, $this->getVar('item_func'));
        $textItemFunc->setDescription(\_AM_WGBLOCKS_ITEM_FUNC_DESC);
        $form->addElement($textItemFunc);
        // Form Text itemWeight
        $itemWeight = $this->isNew() ? '0' : $this->getVar('item_weight');
        $form->addElement(new \XoopsFormText(\_AM_WGBLOCKS_ITEM_WEIGHT, 'item_weight', 20, 150, $itemWeight));
        // Form Select Status itemStatus
        $itemStatus = $this->isNew() ? Constants::STATUS_OFFLINE : $this->getVar('item_status');
        $itemStatusSelect = new \XoopsFormRadio(\_AM_WGBLOCKS_ITEM_STATUS, 'item_status', $itemStatus);
        $itemStatusSelect->addOption(Constants::STATUS_OFFLINE, \_AM_WGBLOCKS_STATUS_OFFLINE);
        $itemStatusSelect->addOption(Constants::STATUS_ONLINE, \_AM_WGBLOCKS_STATUS_ONLINE);
        $form->addElement($itemStatusSelect);
        // Form Text Date Select itemDatecreated
        $itemDatecreated = $this->isNew() ? \time() : $this->getVar('item_datecreated');
        $form->addElement(new \XoopsFormDateTime(\_AM_WGBLOCKS_ITEM_DATECREATED, 'item_datecreated', '', $itemDatecreated));
        // Form Select User itemSubmitter
        $uidCurrent = \is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->uid() : 0;
        $itemSubmitter = $this->isNew() ? $uidCurrent : $this->getVar('item_submitter');
        $form->addElement(new \XoopsFormSelectUser(\_AM_WGBLOCKS_ITEM_SUBMITTER, 'item_submitter', false, $itemSubmitter));
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save'));
        $form->addElement(new \XoopsFormHidden('start', $this->start));
        $form->addElement(new \XoopsFormHidden('limit', $this->limit));
        $form->addElement(new \XoopsFormButtonTray('', \_SUBMIT, 'submit', '', false));
        return $form;
    }

    /**
     * Get Values
     * @param null $keys
     * @param null $format
     * @param null $maxDepth
     * @return array
     */
    public function getValuesItems($keys = null, $format = null, $maxDepth = null)
    {
        $helper   = \XoopsModules\Wgblocks\Helper::getInstance();
        $utility  = new \XoopsModules\Wgblocks\Utility();
        $ret      = $this->getValues($keys, $format, $maxDepth);
        $typeText = '';

        $ret['id']          = $this->getVar('item_id');
        $type               = $this->getVar('item_type');
        $ret['type']        = $type;
        switch ((int)$type) {
            case Constants::TYPE_TEXT:
                $typeText = \_AM_WGBLOCKS_ITEM_TYPE_TEXT;
                break;
            case Constants::TYPE_PHP:
                $typeText = \_AM_WGBLOCKS_ITEM_TYPE_PHP;
                break;
            case Constants::TYPE_FILE:
                $typeText = \_AM_WGBLOCKS_ITEM_TYPE_FILE;
                break;
            case Constants::TYPE_NONE:
                $typeText = 'Invalid Tpe Text';
                break;
        }
        $ret['type_text']   = $typeText;
        $ret['name']        = $this->getVar('item_name');
        $ret['text']        = $this->getVar('item_text', 'e');
        $editorMaxchar = $helper->getConfig('editor_maxchar');
        $ret['text_short']  = $utility::truncateHtml($ret['text'], $editorMaxchar);
        $ret['file']        = $this->getVar('item_file');
        $ret['file_check']  = '';
        $ret['func']        = $this->getVar('item_func');
        $ret['func_check']  = '';
        $ret['weight']      = $this->getVar('item_weight');
        $ret['status']      = $this->getVar('item_status');
        $ret['datecreated'] = \formatTimestamp($this->getVar('item_datecreated'), 'm');
        $ret['submitter']   = \XoopsUser::getUnameFromId($this->getVar('item_submitter'));
        $ret['usedBlocks']  = '';
        return $ret;
    }

    /**
     * Returns an array representation of the object
     *
     * @return array
     */
    public function toArrayItems()
    {
        $ret = [];
        $vars = $this->getVars();
        foreach (\array_keys($vars) as $var) {
            $ret[$var] = $this->getVar($var);
        }
        return $ret;
    }
}
