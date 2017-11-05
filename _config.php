<?php
# ***** BEGIN LICENSE BLOCK *****
#
#  	Time Flies
#  	Theme by David Yim
#   Contributor : Pierre Van Glabeke
#   License : http://creativecommons.org/licenses/by-sa/2.0/fr/
#
# ***** END LICENSE BLOCK *****

if (!defined('DC_CONTEXT_ADMIN')) { return; }

global $core;

//PARAMS

# Translations
l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/main');

# Default values
$default_menu = 'simplemenu';
$default_width = 'large';

# Settings
$my_menu = $core->blog->settings->themes->timeflies_menu;
$my_width = $core->blog->settings->themes->timeflies_width;

# Menu type
$timeflies_menu_combo = array(
	__('SimpleMenu') => 'simplemenu',
	__('None') => 'nomenu'
);

# Width type
$timeflies_width_combo = array(
	__('Tight') => 'tight',
	__('Large') => 'large'
);


// POST ACTIONS

if (!empty($_POST))
{
	try
	{
		$core->blog->settings->addNamespace('themes');

		# Menu type
		if (!empty($_POST['timeflies_menu']) && in_array($_POST['timeflies_menu'],$timeflies_menu_combo))
		{
			$my_menu = $_POST['timeflies_menu'];

		} elseif (empty($_POST['timeflies_menu']))
		{
			$my_menu = $default_menu;

		}
		$core->blog->settings->themes->put('timeflies_menu',$my_menu,'string','Menu to display',true);

		# Width type
		if (!empty($_POST['timeflies_width']) && in_array($_POST['timeflies_width'],$timeflies_width_combo))
		{
			$my_width = $_POST['timeflies_width'];

		} elseif (empty($_POST['timeflies_width']))
		{
			$my_width = $default_width;

		}
		$core->blog->settings->themes->put('timeflies_width',$my_width,'string','Width to display',true);

		// Blog refresh
		$core->blog->triggerBlog();

		// Template cache reset
		$core->emptyTemplatesCache();

		dcPage::success(__('Theme configuration has been successfully updated.'),true,true);
	}
	catch (Exception $e)
	{
		$core->error->add($e->getMessage());
	}
}

// DISPLAY

# Menu type
echo
'<div class="fieldset"><h4>'.__('Customizations').'</h4>'.
'<p class="field"><label>'.__('Menu to display:').'</label>'.
form::combo('timeflies_menu',$timeflies_menu_combo,$my_menu).
'</p>';

# Width type
echo
'<p class="field"><label>'.__('Display width:').'</label>'.
form::combo('timeflies_width',$timeflies_width_combo,$my_width).
'</p>'.
'</div>';