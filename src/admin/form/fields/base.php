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

/**
 * Class ShackFormFieldBase
 *
 * @property bool $fromInstaller
 */
class ShackFormFieldBase extends FormField
{
    /**
     * @var bool
     */
    protected $fromInstaller = false;

    public function __set($name, $value = null)
    {
        switch ($name) {
            case 'fromInstaller':
                $this->fromInstaller = (bool)$value;
                break;

            default:
                parent::__set($name, $value);
        }
    }

    /**
     * @inheritDoc
     */
    protected function getInput()
    {
        return '';
    }

    /**
     * @param ?string $path
     *
     * @return string
     */
    protected function getStyle(?string $path): string
    {
        if ($path && is_file($path)) {
            return '<style>' . file_get_contents($path) . '</style>';
        }

        return '';
    }

    /**
     * @inheritDoc
     */
    protected function getLabel()
    {
        return '';
    }

    /**
     * @param SimpleXMLElement $element
     *
     * @return ?string
     */
    public function getInputUsingCustomElement(SimpleXMLElement $element): ?string
    {
        $this->element = $element;
        $this->setup($element, null);

        return $this->getInput();
    }
}
