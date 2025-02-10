<?php
/**
 * Этот файл является частью виджета информационной панели (Dashboard).
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Dashboard\Version\Model;

use Gm\Panel\Data\Model\WidgetOptionsModel;

/**
 * Модель настроек параметров виджета.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Dashboard\Version\Model
 * @since 1.0
 */
class Options extends WidgetOptionsModel
{
    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            'showAppVersion'     => 'showAppVersion', // показать раздел "веб-приложение"
            'showEditionVersion' => 'showEditionVersion', // показать раздел "редация"
            'showPanelVersion'   => 'showPanelVersion', // показать раздел "панель управления"
            'showFwVersion'      => 'showFwVersion', // показать раздел "фреймворк"
            'showVersions'       => 'showVersions', // показать пункт раздела "номер версии"
            'showReleaseDate'    => 'showReleaseDate', // показать пункт раздела "дата выпуска"
            'showDetails'        => 'showDetails' // показать пункт раздела "подробнее"
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function formatterRules(): array
    {
        return [
            [
                ['showAppVersion', 'showEditionVersion', 'showPanelVersion', 'showFwVersion',
                 'showVersions', 'showReleaseDate', 'showDetails'], 'logic' => [true, false]
            ]
        ];
    }
}