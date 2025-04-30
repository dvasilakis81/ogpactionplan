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
            <?php echo $item->action_plan_items_fields->subject; ?>
            <span class="action-plan-milestone-number-label">
              <?php echo "(" .  $number_of_milestones . " Ορόσημα)" ?>
            </span>
          </div>
        </div>
        <div style="display: flex; flex: 1">
          <a id="arrow-icon" class="toggle-details toggle-visible" onClick='changeClassProperty("<?php echo $actionplanitemindex ?>")'></a>
        </div>
      </div>
      <div class="action-plan-row">
        <div style="display: flex; flex: 9" class="action-plan-container">
          <?php
          $index_of_item = 0;
          foreach ($item->action_plan_items_fields->milestone_fields as $index => $milestone_item):
            $index_of_item++;
          ?>
            <div class="<?php
                        $ret = 'action-plan-milestone-item';
                        if ($number_of_milestones == 1)
                          $ret .= ' action-plan-first-milestone-item action-plan-last-milestone-item';
                        else {
                          if ($index_of_item == 1)
                            $ret .= ' action-plan-first-milestone-item';
                          else {
                            if ($number_of_milestones == $index_of_item)
                              $ret .= ' action-plan-last-milestone-item';
                          }
                        }
                        $milestone_status = $milestone_item->milestone_fields->list_milestone_status;
                        if ($milestone_status == 'started')
                          $ret .= ' .action-plan-milestone-item-started';
                        else if ($milestone_status == 'in_progress')
                          $ret .= ' action-plan-milestone-item-inprogress';
                        else if ($milestone_status == 'canceled')
                          $ret .= ' action-plan-milestone-item-cancelled';
                        else if ($milestone_status == 'completed')
                          $ret .= ' action-plan-milestone-item-completed';
                        else if ($milestone_status == 'incomplete')
                          $ret .= ' action-plan-milestone-item-incomplete';

                        echo $ret;
                        ?>">
              <?php echo $index_of_item; ?>
            </div>
          <?php endforeach; ?>
        </div>
        <div style="display: flex; flex: 1"></div>
      </div>
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