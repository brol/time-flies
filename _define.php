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

$this->registerModule(
	/* Name */			    "Time Flies",
	/* Description*/		"Minimal Theme",
	/* Author */			  "David Yim, Pierre Van Glabeke",
	/* Version */			  '1.5',
	array(
		'type' =>			'theme',
		'tplset' => 'mustek',
		'dc_min' => '2.8'
	)
);