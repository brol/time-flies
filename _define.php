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
if (!defined('DC_RC_PATH')) {
    return;
}
$this->registerModule(
    'Time Flies',
    'Minimal Theme',
    'David Yim, Pierre Van Glabeke',
    '1.7.2',
    [
        'requires' => [['core', '2.26']],
        'type'     => 'theme',
        'tplset'   => 'mustek',
    ]
);
