<?php
/**
 * Этот файл является частью виджета информационной панели (Dashboard).
 * 
 * Файл конфигурации установки виджета.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    'use'         => BACKEND,
    'id'          => 'gm.ds.version',
    'category'    => 'dashboard',
    'name'        => 'Version',
    'description' => 'System version information',
    'namespace'   => 'Gm\Dashboard\Version',
    'path'        => '/gm/gm.ds.version',
    'locales'     => ['ru_RU', 'en_GB'],
    'events'      => [],
    'required'    => [
        ['php', 'version' => '8.2'],
        ['app', 'code' => 'GM MS'],
        ['app', 'code' => 'GM CMS'],
        ['app', 'code' => 'GM CRM'],
        ['module', 'id' => 'gm.be.dashboard']
    ]
];
