<?php
# ***** BEGIN LICENSE BLOCK *****
#
#  	Time Flies
#  	Theme by David Yim
#   Contributor : Pierre Van Glabeke
#   License : http://creativecommons.org/licenses/by-sa/2.0/fr/
#
# ***** END LICENSE BLOCK *****

if (!defined('DC_RC_PATH')) { return; }

l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/public');

$core->addBehavior('publicHeadContent','timefliesPublicHeadContent');

function timefliesPublicHeadContent($core)
{
    # appel css menu
	$style = $core->blog->settings->themes->timeflies_menu;
	if (!preg_match('/^simplemenu|nomenu$/',$style)) {
		$style = 'nomenu';
	}

	$theme_url = $core->blog->settings->system->themes_url.'/'.$core->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$theme_url."/css/".$style.".css\" />\n";

    # appel css menu
	$style = $core->blog->settings->themes->timeflies_width;
	if (!preg_match('/^tight|large$/',$style)) {
		$style = 'tight';
	}

	$theme_url = $core->blog->settings->system->themes_url.'/'.$core->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$theme_url."/css/".$style.".css\" />\n";
}