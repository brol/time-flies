<?php
/**
 * @brief time-flies, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Theme
 *
 * @author David Yim
 *
 * @contributeur Pierre Van Glabeke
 * @copyright http://creativecommons.org/licenses/by-sa/2.0/fr/
 */

if (!defined('DC_RC_PATH')) { return; }

l10n::set(dirname(__FILE__) . '/locales/' . dcCore::app()->lang. '/public');

dcCore::app()->addBehavior('publicHeadContent','timefliesPublicHeadContent');

function timefliesPublicHeadContent()
{
    # appel css menu
	$style = dcCore::app()->blog->settings->themes->timeflies_menu;
	if (!preg_match('/^simplemenu|nomenu$/', (string) $style)) {
		$style = 'nomenu';
	}

	$theme_url = dcCore::app()->blog->settings->system->themes_url.'/'.dcCore::app()->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$theme_url."/css/".$style.".css\" />\n";

    # appel css menu
	$style = dcCore::app()->blog->settings->themes->timeflies_width;
	if (!preg_match('/^480|760|1000$/', (string) $style)) {
		$style = '760';
	}

	$theme_url = dcCore::app()->blog->settings->system->themes_url.'/'.dcCore::app()->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$theme_url."/css/".$style.".css\" />\n";
}
