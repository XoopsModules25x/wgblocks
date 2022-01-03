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
\define('_AM_WGBLOCKS_STATISTICS', 'Statistiken');
// There are
\define('_AM_WGBLOCKS_THEREARE_ITEMS', "Es gibt <span class='bold'>%s</span> Einträge in der Datenbank");
// ---------------- Admin Files ----------------
// There aren't
\define('_AM_WGBLOCKS_THEREARENT_ITEMS', "Es gibt keine Einträge");
// Save/Delete
\define('_AM_WGBLOCKS_FORM_OK', 'Erfolgreich gespeichert saved');
\define('_AM_WGBLOCKS_FORM_DELETE_OK', 'Erfolgreich gelöscht');
\define('_AM_WGBLOCKS_FORM_SURE_DELETE', "Wollen Sie wirklich löschen: <b><span style='color : Red;'>%s </span></b>");
\define('_AM_WGBLOCKS_FORM_SURE_RENEW', "Wollen Sie wirklich aktualisieren: <b><span style='color : Red;'>%s </span></b>");
// Buttons
\define('_AM_WGBLOCKS_ADD_ITEM', 'Eintrag hinzufügen');
// Lists
\define('_AM_WGBLOCKS_LIST_ITEMS', 'Liste der Einträge');
// ---------------- Admin Classes ----------------
// Item add/edit
\define('_AM_WGBLOCKS_ITEM_ADD', 'Eintrag hinzufügen');
\define('_AM_WGBLOCKS_ITEM_EDIT', 'Eintrag bearbeiten');
// Elements of Item
\define('_AM_WGBLOCKS_ITEM_ID', 'Id');
\define('_AM_WGBLOCKS_ITEM_NAME', 'Name');
\define('_AM_WGBLOCKS_ITEM_TYPE', 'Typ');
\define('_AM_WGBLOCKS_ITEM_TYPE_TEXT', 'Text');
\define('_AM_WGBLOCKS_ITEM_TYPE_PHP', 'PHP-Function');
\define('_AM_WGBLOCKS_ITEM_TYPE_FILE', 'Html-File');
\define('_AM_WGBLOCKS_ITEM_TEXT', 'Text');
\define('_AM_WGBLOCKS_ITEM_FILE', 'Datei');
\define('_AM_WGBLOCKS_ITEM_FUNC', 'Funktion');
\define('_AM_WGBLOCKS_ITEM_TEXT_DESC', 'Nur erforderlich für Texteinträge');
\define('_AM_WGBLOCKS_ITEM_FILE_DESC', 'Nur erforderlich für PHP-Function- und Dateieinträge');
\define('_AM_WGBLOCKS_ITEM_FUNC_DESC', 'Nur erforderlich für PHP-Function-Einträge');
\define('_AM_WGBLOCKS_ITEM_WEIGHT', 'Reihung');
\define('_AM_WGBLOCKS_ITEM_STATUS', 'Status');
\define('_AM_WGBLOCKS_ITEM_BLOCKS', 'Verwendet in Blöcken');
\define('_AM_WGBLOCKS_ITEM_DATECREATED', 'Datum erstellt');
\define('_AM_WGBLOCKS_ITEM_SUBMITTER', 'Einsender');
// General
\define('_AM_WGBLOCKS_FORM_UPLOAD', 'Upload Datei');
\define('_AM_WGBLOCKS_FORM_UPLOAD_NEW', 'Upload neue Datei: ');
\define('_AM_WGBLOCKS_FORM_UPLOAD_SIZE', 'Maximale Dateigröße: ');
\define('_AM_WGBLOCKS_FORM_UPLOAD_SIZE_MB', 'MB');
\define('_AM_WGBLOCKS_FORM_UPLOAD_IMG_WIDTH', 'Maximale Bildbreite: ');
\define('_AM_WGBLOCKS_FORM_UPLOAD_IMG_HEIGHT', 'Maximale Bildhöhe: ');
\define('_AM_WGBLOCKS_FORM_IMAGE_PATH', 'Dateien in %s :');
\define('_AM_WGBLOCKS_FORM_ACTION', 'Aktion');
\define('_AM_WGBLOCKS_FORM_EDIT', 'Bearbeiten');
//clone
\define('_AM_WGBLOCKS_CLONE', 'Klonen');
\define('_AM_WGBLOCKS_CLONE_DSC', 'Ein Modul zu klonen war noch nie so einfach! Geben Sie einfach den Namen den Sie wollen und Knopf drücken!');
\define('_AM_WGBLOCKS_CLONE_TITLE', 'Klone %s');
\define('_AM_WGBLOCKS_CLONE_NAME', 'Wählen Sie einen Namen für das neue Modul');
\define('_AM_WGBLOCKS_CLONE_NAME_DSC', 'Verwenden Sie keine Sonderzeichen ! <br> Wählen Sie bitte kein vorhandenes Modul Modul Verzeichnisname  oder Datenbank-Tabellenname!');
\define('_AM_WGBLOCKS_CLONE_INVALIDNAME', 'FEHLER: Ungültige Modulnamen, bitte versuchen Sie einen anderen!');
\define('_AM_WGBLOCKS_CLONE_EXISTS', 'FEHLER: Modulnamen bereits benutzt, bitte versuchen Sie einen anderen!');
\define('_AM_WGBLOCKS_CLONE_CONGRAT', 'Herzliche Glückwünsche! %s wurde erfolgreich erstellt! <br /> Sie können Änderungen in Sprachdateien machen.');
\define('_AM_WGBLOCKS_CLONE_IMAGEFAIL', 'Achtung, wir haben es nicht geschafft, das neue Modul-Logo zu erstellen. Bitte beachten Sie assets / images / logo_module.png manuell zu modifizieren!');
\define('_AM_WGBLOCKS_CLONE_FAIL', "Leider konnten wir den neuen Klon nicht erstellen . Vielleicht müssen Sie die Schreibrechte von 'modules' Verzeichnis auf  (CHMOD 777) festlegen und neu versuchen.");
// ---------------- Admin Others ----------------
\define('_AM_WGBLOCKS_ABOUT_MAKE_DONATION', 'Einsenden');
\define('_AM_WGBLOCKS_SUPPORT_FORUM', 'Support Forum');
\define('_AM_WGBLOCKS_DONATION_AMOUNT', 'Spendenbetrag');
\define('_AM_WGBLOCKS_MAINTAINEDBY', ' wird unterstützt von ');
// ---------------- Status ----------------
\define('_AM_WGBLOCKS_STATUS_NONE', 'Kein Status');
\define('_AM_WGBLOCKS_STATUS_OFFLINE', 'Offline');
\define('_AM_WGBLOCKS_STATUS_ONLINE', 'Online');
// ---------------- End ----------------
