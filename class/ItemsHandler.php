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
 * @since        1.0
 * @min_xoops    2.5.11 Beta1
 * @author       Goffy - Wedega.com - Email:webmaster@wedega.com - Website:https://xoops.wedega.com
 */

use XoopsModules\Wgblocks;


/**
 * Class Object Handler Items
 */
class ItemsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgblocks_items', Items::class, 'item_id', 'item_name');
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function create($isNew = true)
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field
     *
     * @param int $i field id
     * @param null fields
     * @return \XoopsObject|null reference to the {@link Get} object
     */
    public function get($i = null, $fields = null)
    {
        return parent::get($i, $fields);
    }

    /**
     * get inserted id
     *
     * @param null
     * @return int reference to the {@link Get} object
     */
    public function getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Count Items in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountItems($start = 0, $limit = 0, $sort = 'item_id ASC, item_name', $order = 'ASC')
    {
        $crCountItems = new \CriteriaCompo();
        $crCountItems = $this->getItemsCriteria($crCountItems, $start, $limit, $sort, $order);
        return $this->getCount($crCountItems);
    }

    /**
     * Get All Items in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllItems($start = 0, $limit = 0, $sort = 'item_id ASC, item_name', $order = 'ASC')
    {
        $crAllItems = new \CriteriaCompo();
        $crAllItems = $this->getItemsCriteria($crAllItems, $start, $limit, $sort, $order);
        return $this->getAll($crAllItems);
    }

    /**
     * Get Criteria Items
     * @param        $crItems
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getItemsCriteria($crItems, $start, $limit, $sort, $order)
    {
        $crItems->setStart($start);
        $crItems->setLimit($limit);
        $crItems->setSort($sort);
        $crItems->setOrder($order);
        return $crItems;
    }
}
