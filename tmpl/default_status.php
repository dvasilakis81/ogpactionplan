<?php
/**
 * @package     mod_action_plan
 * @copyright   (C) 2026 Rinenweb
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$statuses = [
    'started'     => ['class' => 'started',    'label' => 'MOD_MILESTONE_STATUS_STARTED'],
    'in_progress' => ['class' => 'inprogress', 'label' => 'MOD_MILESTONE_STATUS_IN_PROGRESS'],
    'cancelled'   => ['class' => 'cancelled',  'label' => 'MOD_MILESTONE_STATUS_CANCELLED'],
    'completed'   => ['class' => 'completed',  'label' => 'MOD_MILESTONE_STATUS_COMPLETED'],
    'incomplete'  => ['class' => 'incomplete', 'label' => 'MOD_MILESTONE_STATUS_INCOMPLETE'],
];

$currentStatus = isset($ms->list_milestone_status) ? (string) $ms->list_milestone_status : '';

// Format the stored dates for display; no timezone shift, as they are plain dates.
$dates = [];

foreach (['start' => 'milestone_start_date', 'end' => 'milestone_end_date'] as $key => $prop) {
    $raw = isset($ms->$prop) ? trim((string) $ms->$prop) : '';
    $dates[$key] = '';

    if ($raw === '' || strpos($raw, '0000-00-00') === 0) {
        continue;
    }

    try {
        $dates[$key] = HTMLHelper::_('date', $raw, Text::_('DATE_FORMAT_LC4'), null);
    } catch (\Exception $e) {
        $dates[$key] = $raw;
    }
}
?>
<div class="milestone-info-progress-status">
  <div class="action-plan-row-2 action-plan-row-space-between">
    <div class="action-plan-milestone-start-date"><?php echo Text::_('MOD_ACTION_PLAN_START_DATE'); ?></div>
    <div class="action-plan-milestone-end-date"><?php echo Text::_('MOD_ACTION_PLAN_END_DATE'); ?></div>
  </div>
  <div class="action-plan-row-2 action-plan-row-space-between">
    <div class="action-plan-milestone-start-date"><?php echo htmlspecialchars($dates['start'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="action-plan-milestone-end-date"><?php echo htmlspecialchars($dates['end'], ENT_QUOTES, 'UTF-8'); ?></div>
  </div>
  <div style="padding-top: 30px">
    <?php if (isset($statuses[$currentStatus])) : ?>
      <p class="ap-visually-hidden"><?php echo Text::sprintf('MOD_ACTION_PLAN_STATUS_SR', Text::_($statuses[$currentStatus]['label'])); ?></p>
    <?php endif; ?>
    <div class="action-plan-radio-line-container" aria-hidden="true">
      <?php foreach ($statuses as $value => $status) : ?>
        <div class="action-plan-status-radio-wrapper">
          <span class="action-plan-status-dot<?php echo $value === $currentStatus ? ' action-plan-status-dot-' . $status['class'] : ''; ?>"></span>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="action-plan-radio-text-container" aria-hidden="true">
      <?php foreach ($statuses as $status) : ?>
        <div class="action-plan-status-radio-wrapper">
          <span class="action-plan-status-label"><?php echo Text::_($status['label']); ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
