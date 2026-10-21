<?php
/**
 * @package     mod_action_plan
 * @copyright   (C) 2026 Rinenweb
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

$statusClasses = [
    'started'     => 'action-plan-milestone-item-started',
    'in_progress' => 'action-plan-milestone-item-inprogress',
    'cancelled'   => 'action-plan-milestone-item-cancelled',
    'completed'   => 'action-plan-milestone-item-completed',
    'incomplete'  => 'action-plan-milestone-item-incomplete',
];
?>
<div class="action-plan-row">
  <div style="display: flex; flex: 9" class="action-plan-container">
    <?php $index_of_item = 0; ?>
    <?php foreach ($milestones as $milestone_item) : ?>
      <?php
      $index_of_item++;
      $ms      = (is_object($milestone_item) && isset($milestone_item->milestone_fields)) ? $milestone_item->milestone_fields : null;
      $status  = ($ms && isset($ms->list_milestone_status)) ? (string) $ms->list_milestone_status : '';
      $classes = ['action-plan-milestone-item'];

      if ($index_of_item === 1) {
          $classes[] = 'action-plan-first-milestone-item';
      }

      if ($index_of_item === $number_of_milestones) {
          $classes[] = 'action-plan-last-milestone-item';
      }

      if (isset($statusClasses[$status])) {
          $classes[] = $statusClasses[$status];
      }
      ?>
      <div class="<?php echo implode(' ', $classes); ?>"><?php echo $index_of_item; ?></div>
    <?php endforeach; ?>
  </div>
  <div style="display: flex; flex: 1"></div>
</div>
