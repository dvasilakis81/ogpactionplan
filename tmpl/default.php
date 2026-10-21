<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;

// Subform data arrives as a stdClass of objects; normalise it.
$items = (is_array($actionPlanItems) || is_object($actionPlanItems)) ? (array) $actionPlanItems : [];

if (!count($items)) {
    return;
}

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->registerAndUseStyle('mod_action_plan.style', 'modules/mod_action_plan/tmpl/style/style.css');
$wa->registerAndUseStyle('mod_action_plan.milestones', 'modules/mod_action_plan/tmpl/style/milestone_style.css');
$wa->registerAndUseStyle('mod_action_plan.status', 'modules/mod_action_plan/tmpl/style/milestone_status.css');
$wa->registerAndUseScript('mod_action_plan.script', 'modules/mod_action_plan/tmpl/js/script.js', [], ['defer' => true]);
?>
<div class="mod-action-plan" id="mod-action-plan-<?php echo $moduleId; ?>">
<?php foreach ($items as $itemKey => $item) : ?>
  <?php
  if (!is_object($item) || !isset($item->action_plan_items_fields) || !is_object($item->action_plan_items_fields)) {
      continue;
  }

  $fields     = $item->action_plan_items_fields;
  $milestones = (isset($fields->milestone_fields) && (is_array($fields->milestone_fields) || is_object($fields->milestone_fields)))
      ? (array) $fields->milestone_fields
      : [];
  $number_of_milestones = count($milestones);
  $subject    = isset($fields->subject) ? (string) $fields->subject : '';
  $subjectUrl = isset($fields->subject_url) ? trim((string) $fields->subject_url) : '';

  // Unique per module instance, so several instances can share a page.
  $itemId = 'ap-' . $moduleId . '-' . preg_replace('/[^A-Za-z0-9_-]/', '', (string) $itemKey);
  ?>
  <div class="action-plan-column" style="padding-bottom:30px">
    <div class="action-plan-row">
      <div style="display: flex; flex: 9">
        <div class="action-plan-subject">
          <?php if ($subjectUrl !== '') : ?>
            <a href="<?php echo htmlspecialchars($subjectUrl, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'); ?></a>
          <?php else : ?>
            <?php echo htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'); ?>
          <?php endif; ?>
          <span class="action-plan-milestone-number-label">
            <?php echo Text::plural('MOD_ACTION_PLAN_N_MILESTONES', $number_of_milestones); ?>
          </span>
        </div>
      </div>
      <div style="display: flex; flex: 1">
        <?php if ($number_of_milestones) : ?>
          <button type="button" class="toggle-details toggle-visible" data-ap-toggle
            aria-expanded="false" aria-controls="<?php echo $itemId; ?>-milestones">
            <span class="ap-visually-hidden"><?php echo Text::_('MOD_ACTION_PLAN_TOGGLE_MILESTONES'); ?></span>
          </button>
        <?php endif; ?>
      </div>
    </div>
    <?php require ModuleHelper::getLayoutPath('mod_action_plan', 'default_progress'); ?>
  </div>
  <?php if ($number_of_milestones) : ?>
    <?php require ModuleHelper::getLayoutPath('mod_action_plan', 'default_milestones'); ?>
  <?php endif; ?>
<?php endforeach; ?>
</div>
