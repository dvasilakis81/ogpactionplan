<?php
// Prevent direct access
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_action_plan/tmpl/style/style.css');
$document->addStyleSheet('modules/mod_action_plan/tmpl/style/milestone_style.css');
$document->addStyleSheet('modules/mod_action_plan/tmpl/style/milestone_status.css');
$document->addScript('modules/mod_action_plan//tmpl/js/script.js');
?>

<?php if (!empty($actionPlanItems)): ?>
  <?php foreach ($actionPlanItems as $actionplanitemindex => $item): ?>
    <?php $number_of_milestones = count((array) $item->action_plan_items_fields->milestone_fields); ?>
    <div class="action-plan-column" style="padding-bottom:30px">
      <div class="action-plan-row">
        <div style="display: flex; flex: 9">
          <div class="action-plan-subject">
            <?php if ($item->action_plan_items_fields->subject_url) { ?>
              <a href="<?php echo $item->action_plan_items_fields->subject_url; ?>">
                <?php echo $item->action_plan_items_fields->subject; ?>
              </a>
             <?php } else 
              echo $item->action_plan_items_fields->subject;
             ?>
            ?>
            <span class="action-plan-milestone-number-label">
              <?php echo "(" .  $number_of_milestones . " Ορόσημα)" ?>
            </span>
          </div>
        </div>
        <div style="display: flex; flex: 1">
          <a id="<?php echo 'arrow-icon-' . $actionplanitemindex ?>" class="toggle-details toggle-visible" onClick='expandActionPlanMilestonesContent("<?php echo $actionplanitemindex ?>")'></a>
        </div>
      </div>
      <?php include 'code/milestones/milestones_progress_bar.php'; ?>
    </div>
    <?php include 'code/milestones/milestones_info.php'; ?>
  <?php endforeach; ?>

<?php else: ?>
  <p>No items found. Please configure the module settings.</p>
<?php endif; ?>

<?php
// $array = (array) $obj;

// for ($i = 0; $i < count($array); $i++) {
//     $keys = array_keys($array);
//     echo $keys[$i] . ": " . $array[$keys[$i]] . "\n";
// }
?>