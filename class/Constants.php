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

/**
 * Interface  Constants
 */
interface Constants
{
    // Constants for tables
    public const TABLE_ITEMS = 0;

    // Constants for status
    public const STATUS_NONE    = 0;
    public const STATUS_OFFLINE = 1;
    public const STATUS_ONLINE  = 2;

    public const TYPE_NONE = 0;
    public const TYPE_TEXT = 1;
    public const TYPE_PHP  = 2;
    public const TYPE_FILE = 3;

}
