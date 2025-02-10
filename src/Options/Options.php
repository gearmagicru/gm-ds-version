<?php
/**
 * Этот файл является частью виджета информационной панели (Dashboard).
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Dashboard\Version\Options;

use Gm;
use Gm\Panel\Widget\OptionsWindow;

/**
 * Интерфейс окна настроек параметров виджета.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Dashboard\Version\Options
 * @since 1.0
 */
class Options extends OptionsWindow
{
    /**
     * {@inheritdoc}
     */
    protected function init(): void
    {
        parent::init();

        $this->width = 420;
        $this->resizable = false;
        $this->form->autoScroll = true;
        $this->form->items = [
            [
                'xtype'    => 'fieldset',
                'title'    => '#Show sections',
                'defaults' => [
                    'xtype'      => 'checkbox',
                    'ui'         => 'switch',
                    'labelWidth' => 160,
                    'labelAlign' => 'right'
                ],
                'items' => [
                    [
                        'name'       => 'showAppVersion',
                        'checked'    => $this->options['showAppVersion'] ?? true,
                        'fieldLabel' => '#Web application',
                    ],
                    [
                        'name'       => 'showEditionVersion',
                        'checked'    => $this->options['showEditionVersion'] ?? true,
                        'fieldLabel' => '#Edition',
                    ],
                    [
                        'name'       => 'showPanelVersion',
                        'checked'    => $this->options['showPanelVersion'] ?? true,
                        'fieldLabel' => '#Control Panel',
                    ],
                    [
                        'name'       => 'showFwVersion',
                        'checked'    => $this->options['showFwVersion'] ?? true,
                        'fieldLabel' => '#Framework',
                    ]
                ]
            ],
            [
                'xtype'    => 'fieldset',
                'title'    => '#Show section items',
                'defaults' => [
                    'xtype'      => 'checkbox',
                    'ui'         => 'switch',
                    'labelWidth' => 160,
                    'labelAlign' => 'right'
                ],
                'items' => [
                    [
                        'name'       => 'showVersions',
                        'checked'    => $this->options['showVersions'] ?? true,
                        'fieldLabel' => '#Version number',
                    ],
                    [
                        'name'       => 'showReleaseDate',
                        'checked'    => $this->options['showReleaseDate'] ?? true,
                        'fieldLabel' => '#Release date',
                    ],
                    [
                        'name'       => 'showDetails',
                        'checked'    => $this->options['showDetails'] ?? true,
                        'fieldLabel' => '#Details',
                    ],
                ]
            ]
        ];
    }
}