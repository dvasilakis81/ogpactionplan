function expandActionPlanMilestonesContent(itemindex) {

  //change arrow icon
  const icon = document.getElementById('arrow-icon');
  if (icon.classList.contains('toggle-visible')) {    
    icon.classList.remove('toggle-visible');
    icon.classList.add('toggle-hidden');
  }
  else {    
    icon.classList.remove('toggle-hidden');
    icon.classList.add('toggle-visible');
  }

  const actionPlanMilestoneDiv = document.getElementById('action-plan-milestones-' + itemindex);
  if (actionPlanMilestoneDiv.classList.contains('action-plan-milestones-content-visible')) {

    actionPlanMilestoneDiv.style.height = actionPlanMilestoneDiv.scrollHeight + 'px'; // Set height to current scrollHeight
    // Force reflow to allow transition to start
    void actionPlanMilestoneDiv.offsetHeight;
    actionPlanMilestoneDiv.style.height = '0px';
    actionPlanMilestoneDiv.classList.remove('action-plan-milestones-content-visible');  
  }
  else {    
    actionPlanMilestoneDiv.style.height = actionPlanMilestoneDiv.scrollHeight + 'px';
    actionPlanMilestoneDiv.classList.add('action-plan-milestones-content-visible');
  }

   // Reset height to auto after transition ends for responsiveness
  //  actionPlanMilestoneDiv.addEventListener('transitionend', () => {
  //   if (actionPlanMilestoneDiv.style.height !== '0px') {
  //     actionPlanMilestoneDiv.style.height = 'auto';
  //   }
  // }, { once: true });
}