<?php
/**
 * @package   AllediaFreeDefaultFiles
 * @contact   www.joomlashack.com, help@joomlashack.com
 * @copyright Copyright (C) Open Sources Training, LLC, All rights reserved
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

use Joomla\CMS\Form\FormField;

defined('_JEXEC') or die('Restricted access');

/**
 * Form field to show an advertisement for the pro version
 */
class JFormFieldBase extends FormField
{
    /**
     * @var bool
     */
    protected $fromInstaller = false;

    public function __set($property, $value = null)
    {
        switch ($property) {
            case 'fromInstaller':
                $this->fromInstaller = (bool)$value;
                break;

            default:
                parent::__set($property, $value);
        }
    }

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
