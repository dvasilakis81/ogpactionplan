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