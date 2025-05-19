<div class="milestone-info-progress-status">
  <div class="action-plan-row-2 action-plan-row-space-between">
    <div class="action-plan-milestone-start-date">Ημερομηνία εκκίνησης</div>
    <div class="action-plan-milestone-end-date">Καταληκτική Ημερομηνία</div>
  </div>
  <div class="action-plan-row-2 action-plan-row-space-between">
    <div class="action-plan-milestone-start-date"><?php echo $milestone_item->milestone_fields->milestone_start_date ?></div>
    <div class="action-plan-milestone-end-date"><?php echo $milestone_item->milestone_fields->milestone_end_date ?></div>
  </div>
  <div>
    <div class="action-plan-milestone-started"></div>
    <div class="action-plan-milestone-started"></div>
  </div>
  <div style="padding-top: 30px">
    <div class="action-plan-radio-line-container">
      <div class="action-plan-status-radio-wrapper">
        <input type="radio" checked <?php echo ($milestone_item->milestone_fields->list_milestone_status == 'start') ? 'class="action-plan-status-radio-started"' : ''; ?> />
      </div>
      <div class="action-plan-status-radio-wrapper">
        <input type="radio" checked <?php echo ($milestone_item->milestone_fields->list_milestone_status == 'in_progress') ? 'class="action-plan-status-radio-inprogress"' : ''; ?>/>
      </div>
      <div class="action-plan-status-radio-wrapper">        
        <input type="radio" checked <?php echo ($milestone_item->milestone_fields->list_milestone_status == 'canceled') ? 'class="action-plan-status-radio-cancelled"' : ''; ?> />
      </div>
      <div class="action-plan-status-radio-wrapper">
        <input type="radio" checked <?php echo ($milestone_item->milestone_fields->list_milestone_status == 'completed') ? 'class="action-plan-status-radio-completed"' : ''; ?> />
      </div>
      <div class="action-plan-status-radio-wrapper">
        <input type="radio" checked <?php echo ($milestone_item->milestone_fields->list_milestone_status == 'Incomplete') ? 'class="action-plan-status-radio-incomplete"' : ''; ?> />
      </div>
    </div>
    <div class="action-plan-radio-text-container">
      <div class="action-plan-status-radio-wrapper">
        <label class="action-plan-status-label">Άρχισε</label>
      </div>
      <div class="action-plan-status-radio-wrapper">
        <label class="action-plan-status-label">Σε εξέλιξη</label>
      </div>
      <div class="action-plan-status-radio-wrapper">
        <label class="action-plan-status-label">Ακυρώθηκε</label>
      </div>
      <div class="action-plan-status-radio-wrapper">
        <label class="action-plan-status-label">Ολοκληρώθηκε</label>
      </div>
      <div class="action-plan-status-radio-wrapper">
        <label class="action-plan-status-label">Ανολοκλήρωτο</label>
      </div>
    </div>
  </div>
</div>