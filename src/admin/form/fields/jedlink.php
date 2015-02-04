<?php
/**
 * @package   AllediaFreeDefaultFiles
 * @contact   www.alledia.com, hello@alledia.com
 * @copyright 2015 Alledia.com, All rights reserved
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die('Restricted access');

/**
 * Form field to show an advertisement for the pro version
 */
class JFormFieldJEDLink extends JFormField
{
    public $fromInstaller = false;

    protected $class = '';

    protected $media;

    protected function getInput()
    {
        $html = '';

        if (version_compare(JVERSION, '3.0', 'ge')) {
            $classJoomlaVersion = 'ost-joomla-3';
        } else {
            $classJoomlaVersion = 'ost-joomla-2';
        }

        $mediaURI  = JURI::root() . 'media/' . $this->element['media'];
        $mediaPath = JPATH_SITE . '/media/' . $this->element['media'];

        $cssPath = $mediaPath . '/css/style_jedlink_field.css';
        if (file_exists($cssPath)) {
            $style = file_get_contents($cssPath);
            $html .= '<style>' . $style . '</style>';
        }

        $html .= '<div class="ost-jedlink ' . $this->class . ' ' . $classJoomlaVersion . ' ' . ($this->fromInstaller ? 'no_offset':'') . '">
            Like this extension? <a href="' . $this->url . '" class="" target="_blank">
                Leave a review on the JED
            </a>
            <i class="icon-star"></i>
            <i class="icon-star"></i>
            <i class="icon-star"></i>
            <i class="icon-star"></i>
            <i class="icon-star"></i>
        </div>';

        return $html;
    }

    protected function getLabel()
    {
        return '';
    }

    public function getInputCustomElement($element)
    {
        $this->element = $element;

        return $this->getInput();
    }
}
