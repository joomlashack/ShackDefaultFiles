<?php
/**
 * @package   AllediaFreeDefaultFiles
 * @contact   www.joomlashack.com, help@joomlashack.com
 * @copyright Copyright (C) Open Sources Training, LLC, All rights reserved
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

use Joomla\CMS\Form\FormHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die();

FormHelper::loadFieldClass('Spacer');

class JFormFieldSubtitle extends JFormFieldSpacer
{
    /**
     * @inheritDoc
     */
    protected function getLabel()
    {
        $html  = [];
        $class = $this->class ? '' : ' class="' . $this->class . '"';
        $tag   = $this->element['tag'] ? (string)$this->element['tag'] : 'h4';

        $html[] = '<span class="spacer">';
        $html[] = '<span class="before"></span>';
        $html[] = '<span' . $class . '>';

        if ((string)$this->element['hr'] == 'true') {
            $html[] = '<hr' . $class . ' />';
        } else {
            $label = '';

            // Get the label text from the XML element, defaulting to the element name.
            $text = $this->element['label'] ? (string)$this->element['label'] : (string)$this->element['name'];
            $text = $this->translateLabel ? Text::_($text) : $text;

            // Build the class for the label.
            $class = !empty($this->description) ? 'hasTooltip' : '';
            $class = $this->required == true ? $class . ' required' : $class;

            // Add the opening label tag and main attributes attributes.
            $label .= '<' . $tag . ' id="' . $this->id . '-lbl" class="' . $class . '"';

            // If a description is specified, use it to build a tooltip.
            if (!empty($this->description)) {
                HTMLHelper::_('bootstrap.tooltip');
                $label .= ' title="' . HTMLHelper::tooltipText(trim($text, ':'), Text::_($this->description), 0) . '"';
            }

            // Add the label text and closing tag.
            $label  .= '>' . $text . '</' . $tag . '>';
            $html[] = $label;
        }

        $html[] = '</span>';
        $html[] = '<span class="after"></span>';
        $html[] = '</span>';

        return implode('', $html);
    }
}
