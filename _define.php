<?php
# ***** BEGIN LICENSE BLOCK *****
#
#  	Time Flies
#  	Theme by David Yim
#   Contributor : Pierre Van Glabeke
#   License : http://creativecommons.org/licenses/by-sa/2.0/fr/
#
# ***** END LICENSE BLOCK *****
if (!defined('DC_RC_PATH')) {
    return;
}
$this->registerModule(
    'Time Flies',
    'Minimal Theme',
    'David Yim, Pierre Van Glabeke',
    '1.7',
    [
        'requires' => [['core', '2.24']],
        'type'     => 'theme',
        'tplset'   => 'mustek',
    ]
);
