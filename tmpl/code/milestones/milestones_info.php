<div id='<?php echo "action-plan-milestones-" . $actionplanitemindex ?>' class="action-plan-milestone-container">

  <?php
  $index_of_milestone = 0;
  foreach ($item->action_plan_items_fields->milestone_fields as $index => $milestone_item):
    $index_of_milestone++;
  ?>
    <div class="action-plan-milestone-column">
      <div class="action-plan-milestone-row">
        <div class="action-plan-milestone-column">
          <div class="action-plan-milestone-items-row">
            <div class="milestone-info-index">
              <?php echo $index_of_milestone ?>
            </div>
            <div class="action-plan-milestone-subject-result-link">
              <div class="milestone-info-subject">
                <?php echo $milestone_item->milestone_fields->milestone_subject ?>
              </div>
              <div class="action-plan-milestone-row">
                <a onClick='expandActionPlanMilestonesContent("<?php echo $actionplanitemindex . '-' . $index_of_milestone ?>")'>Αποτελέσματα</a>
                <div style="margin: 10px"></div>
                <a id="<?php echo 'arrow-icon-results-' . $actionplanitemindex . '-' . $index_of_milestone ?>"
                  class="toggle-details toggle-visible"
                  onClick='expandActionPlanResultsContent("<?php echo $actionplanitemindex . '-' . $index_of_milestone ?>")'>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="action-plan-milestone-column">
          <?php include 'milestone_info_status.php' ?>
        </div>
      </div>
      <div id="<?php echo 'action-plan-milestone-results-' . $actionplanitemindex . '-' . $index_of_milestone ?>" class="action-plan-milestone-results-container">
        <?php echo $milestone_item->milestone_fields->milestone_results ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>