<?php

/**
 * SpoutBreeze open source platfrom - https://www.spoutbreeze.io/
 *
 * Copyright (c) 2021 Frictionless Solutions Inc., RIADVICE SUARL and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * SpoutBreeze is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with SpoutBreeze; if not, see <http://www.gnu.org/licenses/>.
 */

namespace Helpers;

use Helpers\Base as BaseHelper;
use Template;
use Base;
use Registry;

/**
 * Template extensions Helper Class.
 */
class HTML extends BaseHelper
{
    public function __construct()
    {
        parent::__construct();

        $this->f3      = Base::instance();
        $this->session = Registry::get('session');

        Template::instance()->extend('csrf', '\helpers\HTML::renderCsrf');
        Template::instance()->extend('form_error', '\helpers\HTML::renderFromError');
        Template::instance()->extend('tooltip', '\helpers\HTML::renderToolTip');
        Template::instance()->extend('css', '\helpers\Assets::renderCss');
        Template::instance()->extend('theme', '\helpers\Assets::renderCssTheme');
        Template::instance()->extend('js', '\helpers\Assets::renderJs');
        Template::instance()->extend('pagebrowser', '\util\Pagination::renderTag');
    }

    /**
     * Renders the CSRF hidden input for the form.
     *
     * @param $node
     * @return String HTML-Output of the rendering process.
     */
    public static function renderCsrf($node)
    {
        return '<input type="hidden" name="csrf_token" value="<?php echo \Registry::get(\'session\')->generateToken(); ?>" />';
    }

    public static function renderFromError($node)
    {
        $name = $node['@attrib']['name'];
        unset($node);

        return '<?php if (isset($form_errors[\'' . $name . '\'])) echo "<div style=\"color:red\" class=\"help-block has-error\">  $form_errors[' . $name . ']</div>"; ?>';
    }

    public static function renderToolTip($node)
    {
        $title    = $node['@attrib']['title'];
        $jsLocale = $node['@attrib']['data-i18n-title'];
        unset($node);
        $title    = Template::instance()->token($title);
        $jsLocale = Template::instance()->token($jsLocale);

        return "<span data-toggle=\"tooltip\" class=\"icon-info-sign icon-large\" data-i18n-title=\"<?php echo '$jsLocale'; ?>\" title=\"<?php echo $title; ?>\"></span>";
    }
}
