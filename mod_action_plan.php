<?php
// Prevent direct access
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

$moduleId        = (int) $module->id;
$actionPlanItems = $params->get('action_plan_items', []);

require ModuleHelper::getLayoutPath('mod_action_plan', $params->get('layout', 'default'));
