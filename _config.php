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

dcCore::app();

//PARAMS

# Translations
l10n::set(__DIR__ . '/locales/' . dcCore::app()->lang . '/main');

# Default values
$default_menu = 'simplemenu';
$default_width = '760';

# Settings
$my_menu = dcCore::app()->blog->settings->themes->timeflies_menu;
$my_width = dcCore::app()->blog->settings->themes->timeflies_width;

# Menu type
$timeflies_menu_combo = array(
	__('SimpleMenu') => 'simplemenu',
	__('None') => 'nomenu'
);

# Width type
$timeflies_width_combo = array(
	__('480') => '480',
	__('760') => '760',
	__('1000') => '1000'
);


// POST ACTIONS

if (!empty($_POST))
{
	try
	{
		dcCore::app()->blog->settings->addNamespace('themes');

		# Menu type
		if (!empty($_POST['timeflies_menu']) && in_array($_POST['timeflies_menu'],$timeflies_menu_combo))
		{
			$my_menu = $_POST['timeflies_menu'];

		} elseif (empty($_POST['timeflies_menu']))
		{
			$my_menu = $default_menu;

		}
		dcCore::app()->blog->settings->themes->put('timeflies_menu',$my_menu,'string','Menu to display',true);

		# Width type
		if (!empty($_POST['timeflies_width']) && in_array($_POST['timeflies_width'],$timeflies_width_combo))
		{
			$my_width = $_POST['timeflies_width'];

		} elseif (empty($_POST['timeflies_width']))
		{
			$my_width = $default_width;

		}
		dcCore::app()->blog->settings->themes->put('timeflies_width',$my_width,'string','Width to display',true);

		// Blog refresh
		dcCore::app()->blog->triggerBlog();

		// Template cache reset
		dcCore::app()->emptyTemplatesCache();

		dcPage::success(__('Theme configuration has been successfully updated.'),true,true);
	}
	catch (Exception $e)
	{
		dcCore::app()->error->add($e->getMessage());
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