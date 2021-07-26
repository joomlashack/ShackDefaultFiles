<?php
/**
 * @package   AllediaFreeDefaultFiles
 * @contact   www.joomlashack.com, help@joomlashack.com
 * @copyright Copyright (C) Open Sources Training, LLC, All rights reserved
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

use Joomla\CMS\HTML\HTMLHelper;

defined('_JEXEC') or die('');

?>
<div class="row-fluid">
    <div id="footer" class="span12">
        <div>
            <a href="https://www.joomlashack.com">
                <?php
                echo HTMLHelper::_(
                    'image',
                    $this->option . '/joomlashack-logo.png',
                    'Joomlashack',
                    ['width' => '150']
                );
                ?>
            </a>
        </div>
        <br/>
        <div>
            Powered by&nbsp;
            <a href="https://www.joomlashack.com">Joomlashack</a>
        </div>
    </div>
</div>
