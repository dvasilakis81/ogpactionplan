<?php
/**
 * @package     mod_action_plan
 * @copyright   (C) 2026 Rinenweb
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
?>
<div id="<?php echo $itemId; ?>-milestones" class="action-plan-milestone-container">
  <?php $index_of_milestone = 0; ?>
  <?php foreach ($milestones as $milestone_item) : ?>
    <?php
    $index_of_milestone++;
    $ms          = (is_object($milestone_item) && isset($milestone_item->milestone_fields)) ? $milestone_item->milestone_fields : new stdClass();
    $milestoneId = $itemId . '-' . $index_of_milestone;
    $resultsId   = $milestoneId . '-results';
    $msSubject   = isset($ms->milestone_subject) ? (string) $ms->milestone_subject : '';
    $msResults   = isset($ms->milestone_results) ? (string) $ms->milestone_results : '';
    $hasResults  = trim(strip_tags($msResults, '<img><iframe><video><audio><object><embed>')) !== '';
    ?>
    <div class="action-plan-milestone-column">
      <div class="action-plan-milestone-row">
        <div class="action-plan-milestone-column">
          <div class="action-plan-milestone-items-row">
            <div class="milestone-info-index"><?php echo $index_of_milestone; ?></div>
            <div class="action-plan-milestone-subject-result-link">
              <div class="milestone-info-subject">
                <?php echo htmlspecialchars($msSubject, ENT_QUOTES, 'UTF-8'); ?>
                <?php if ($hasResults) : ?>
                  <div class="action-plan-milestone-row">
                    <button type="button" class="action-plan-milestone-result-link" data-ap-toggle
                      aria-expanded="false" aria-controls="<?php echo $resultsId; ?>">
                      <?php echo Text::_('MOD_ACTION_PLAN_RESULTS'); ?>
                    </button>
                    <div style="margin-left: 10px"></div>
                    <button type="button" class="toggle-details toggle-visible" data-ap-toggle
                      aria-expanded="false" aria-controls="<?php echo $resultsId; ?>" tabindex="-1">
                      <span class="ap-visually-hidden"><?php echo Text::_('MOD_ACTION_PLAN_TOGGLE_RESULTS'); ?></span>
                    </button>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="action-plan-milestone-column">
          <?php require ModuleHelper::getLayoutPath('mod_action_plan', 'default_status'); ?>
        </div>
      </div>
      <?php if ($hasResults) : ?>
        <div id="<?php echo $resultsId; ?>" class="action-plan-milestone-results-container">
          <?php echo $msResults; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>
