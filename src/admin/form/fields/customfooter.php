<?php
/**
 * @package   ShackDefaultFiles
 * @contact   www.joomlashack.com, help@joomlashack.com
 * @copyright 2015-2021 Joomlashack.com. All rights reserved
 * @license   https://www.gnu.org/licenses/gpl.html GNU/GPL
 *
 * This file is part of ShackDefaultFiles.
 *
 * ShackDefaultFiles is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * ShackDefaultFiles is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ShackDefaultFiles.  If not, see <https://www.gnu.org/licenses/>.
 */

use Joomla\CMS\Form\FormField;

defined('_JEXEC') or die();

require_once __DIR__ . '/base.php';

class JFormFieldCustomFooter extends ShackFormFieldBase
{
    /**
     * @inheritdoc
     */
    protected $layout = 'alledia.customfooter';

    /**
     * @inheritDoc
     */
    protected function getInput()
    {
        return $this->getRenderer($this->layout)->render($this->getLayoutData());
    }

    /**
     * @inheritDoc
     */
    protected function getRenderer($layoutId = 'default')
    {
        $renderer = parent::getRenderer($layoutId);

        if ($layoutId == $this->layout) {
            $renderer->addIncludePath(__DIR__ . '/layouts');
        }

        return $renderer;
    }

    /**
     * @inheritDoc
     */
    protected function getLayoutData()
    {
        $displayData = parent::getLayoutData();

        $requiredClasses = [
            'joomlashack-footer',
            'row-fluid'
        ];
        if ($this->fromInstaller) {
            $requiredClasses[] = 'installer';
        }

        $classes = array_unique(
            array_filter(
                array_merge(
                    preg_split('/\s/', $displayData['class']),
                    $requiredClasses
                )
            )
        );

        $goProUrl    = (string)$this->element['showgoproad'] ?: '0';
        $showGoProAd = !($goProUrl == '0' || $goProUrl == 'false');
        if ($showGoProAd && !filter_var($goProUrl, FILTER_VALIDATE_URL)) {
            $goProUrl = 'https://www.joomlashack.com/plans';
        }

        return array_merge(
            $displayData,
            [
                'class'         => join(' ', $classes),
                'media'         => $this->element['media'],
                'jslogo'        => (string)$this->element['jslogo'] ?: 'joomlashack-logo.png',
                'jshome'        => (string)$this->element['jshome'] ?: 'https://www.joomlashack.com',
                'jedurl'        => (string)$this->element['jedurl'],
                'fromInstaller' => $this->fromInstaller,
                'showGoProAd'   => $showGoProAd,
                'goProUrl'      => $goProUrl
            ]
        );
    }
}
