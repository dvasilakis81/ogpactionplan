<?php
// Prevent direct access
defined('_JEXEC') or die;
use Joomla\Registry\Registry;

$moduleId = $module->id;
$actionPlanItems = $params->get('action_plan_items', []);

require JModuleHelper::getLayoutPath('mod_action_plan');
?>