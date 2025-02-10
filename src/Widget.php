<?php
/**
 * Виджет информационной панели (Dashboard).
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Dashboard\Version;

use Gm;
use Gm\Panel\Version\Version;

/**
 * Виджет информационной панели "Версия системы".
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Dashboard\Version
 * @since 1.0
 */
class Widget extends \Gm\Panel\Widget\DashboardWidget
{
    /**
     * Показать раздел "веб-приложение".
     * 
     * Параметр виджета.
     * 
     * @var bool
     */
    public bool $showAppVersion = true;

    /**
     * Показать раздел "редация".
     * 
     * Параметр виджета.
     * 
     * @var bool
     */
    public bool $showEditionVersion = true;

    /**
     * Показать раздел "панель управления".
     * 
     * Параметр виджета.
     * 
     * @var bool
     */
    public bool $showPanelVersion = true;

    /**
     * Показать раздел "фреймворк".
     * 
     * Параметр виджета.
     * 
     * @var bool
     */
    public bool $showFwVersion = true;

    /**
     * Показать пункт раздела "номер версии".
     * 
     * Параметр виджета.
     * 
     * @var bool
     */
    public bool $showVersions = true;

    /**
     * Показать пункт раздела "дата выпуска".
     * 
     * Параметр виджета.
     * 
     * @var bool
     */
    public bool $showReleaseDate = true;

    /**
     * Показать пункт раздела "подробнее".
     * 
     * Параметр виджета.
     * 
     * @var bool
     */
    public bool $showDetails = true;

    /**
     * {@inheritdoc}
     */
    public bool $useToolRefresh = false;

    /**
     * {@inheritdoc}
     */
    public bool $useToolSettings = true;

    /**
     * {@inheritdoc}
     */
    public array $css = ['/widget.css'];

    /**
     * {@inheritdoc}
     */
    protected string $id = 'gm.ds.version';

    /**
     * {@inheritdoc}
     */
    protected string $contentType = 'html';

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this->title = '';
        $this->color = 'white';
        $this->headerNoColor = true;
        $this->minHeight = 200;
        $this->cls = 'g-widget-version';
        $this->padding = '0 0 10px 0';
    }

    /**
     * {@inheritdoc}
     */
    public function getContent(): string
    {
        $tpl = [];
        $unknown = $this->t('[unknown]');
        /** @var bool $isRu Текущий язык Русский */
        $isRu = Gm::$app->language->isRu();
        // версия веб-приложения
        if ($this->showAppVersion) {
            $app = Gm::$app->version;
            $name = $isRu ? $app->originalName : $app->name;
            $tpl[] = '<div class="row-fluid">';
            $tpl[] = '<div class="col-md-12"><h2>'. $this->t('Web application') . ' &laquo;' . ($name ?: $unknown) . '&raquo;</h2>';
            $tpl[] = '<p><label>' . $this->t('Short name') . ':</label> ' . $app->code . '</p>';
            if ($this->showVersions) {
                $tpl[] = '<p><label>' . $this->t('Version') . ':</label> ' . ($app->number ?: $unknown) . '</p>';
            }
            if ($this->showReleaseDate) {
                $tpl[] = '<p><label>' . $this->t('Release date') . ':</label> ' . ($app->date ?: $unknown) . '</p>';
            }
            if ($this->showDetails && $app->resource) {
                $tpl[] = '<p><label>' . $this->t('Details') . ':</label> <a href="' . $app->resource . '" target="_blank">' . $app->resource . '</a></p>';
            }
            $tpl[] = '</div>';
        }

        // версия редакции
        if ($this->showEditionVersion) {
            /** @var \Gm\Version\Edition $edition */
            $edition = Gm::$app->version->getEdition();
            $name = $isRu ? $edition->originalName : $edition->name;
            $tpl[] = '<div class="row-fluid">';
            $tpl[] = '<div class="col-md-12"><h2>'. $this->t('Edition') . ' &laquo;' . ($name ?: $unknown) . '&raquo;</h2>';
            $tpl[] = '<p><label>' . $this->t('Short name') . ':</label> ' . $edition->code . '</p>';
            if ($this->showVersions) {
                $tpl[] = '<p><label>' . $this->t('Version') . ':</label> ' . ($edition->number ?: $unknown) . '</p>';
            }
            if ($this->showReleaseDate) {
                $tpl[] = '<p><label>' . $this->t('Release date') . ':</label> ' . ($edition->date ?: $unknown) . '</p>';
            }
            if ($this->showDetails && $edition->resource) {
                $tpl[] = '<p><label>' . $this->t('Details') . ':</label> <a href="' . $edition->resource . '" target="_blank">' . $edition->resource . '</a></p>';
            }
            $tpl[] = '</div>';
        }

        // версия панели управления
        if ($this->showPanelVersion) {
            $panel = new Version();
            $tpl[] = '<div class="row-fluid">';
            $tpl[] = '<div class="col-md-12"><h2>'. $this->t('Control Panel') . ' &laquo;' . ($panel->name ?: $unknown) . '&raquo;</h2>';
            if ($this->showVersions) {
                $tpl[] = '<p><label>' . $this->t('Version') . ':</label> ' . ($panel->number ?: $unknown) . '</p>';
            }
            if ($this->showReleaseDate) {
                $tpl[] = '<p><label>' . $this->t('Release date') . ':</label> ' . ($panel->date ?: $unknown) . '</p>';
            }
            if ($this->showDetails && $panel->resource) {
                $tpl[] = '<p><label>' . $this->t('Details') . ':</label> <a href="' . $panel->resource . '" target="_blank">' . $panel->resource . '</a></p>';
            }
            $tpl[] = '</div>';
        }
    
        // версия фреймоврка
        if ($this->showFwVersion) {
            $tpl[] = '<div class="row-fluid">';
            $tpl[] = '<div class="col-md-12"><h2>'.  $this->t('Framework') . ' &laquo;' . Gm::getName() . '&raquo;</h2>';
            if ($this->showVersions) {
                $tpl[] = '<p><label>' . $this->t('Version') . ':</label> ' . Gm::getVersion() . '</p>';
            }
            if ($this->showDetails) {
                $tpl[] = '<p><label>' . $this->t('Details') . ':</label> <a href="https://gearmagic.ru/framework/" target="_blank">https://gearmagic.ru/framework/</a></p>';
            }
            $tpl[] = '</div>';
        }
        return implode('', $tpl);
    }
}