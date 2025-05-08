function expandActionPlanMilestonesContent(itemindex) {

  //change arrow icon
  const icon = document.getElementById('arrow-icon-' + itemindex);
  if (icon.classList.contains('toggle-visible')) {
    icon.classList.remove('toggle-visible');
    icon.classList.add('toggle-hidden');
  }
  else {
    icon.classList.remove('toggle-hidden');
    icon.classList.add('toggle-visible');
  }

  const el = document.getElementById('action-plan-milestones-' + itemindex);
  const isOpen = el.style.height !== '0px';
  
  if (isOpen) {
    // Collapse
    el.style.height = el.scrollHeight + 'px'; // Set to current height first to enable transition
    requestAnimationFrame(() => {
      el.style.height = '0px';
    });
  } else {
    // Expand
    el.style.height = el.scrollHeight + 'px';
    // Remove the fixed height after transition to allow content changes
    el.addEventListener('transitionend', function handler() {
      el.style.height = 'auto';
      el.removeEventListener('transitionend', handler);
    });
  }
  // Reset height to auto after transition ends for responsiveness
  //  actionPlanMilestoneDiv.addEventListener('transitionend', () => {
  //   if (actionPlanMilestoneDiv.style.height !== '0px') {
  //     actionPlanMilestoneDiv.style.height = 'auto';
  //   }
  // }, { once: true });
}

function expandActionPlanResultsContent(itemindex) {

  //change arrow icon
  const icon = document.getElementById('arrow-icon-results-' + itemindex);
  if (icon.classList.contains('toggle-visible')) {
    icon.classList.remove('toggle-visible');
    icon.classList.add('toggle-hidden');
  }
  else {
    icon.classList.remove('toggle-hidden');
    icon.classList.add('toggle-visible');
  }

  const actionPlanMilestoneResultsDiv = document.getElementById('action-plan-milestone-results-' + itemindex);
  const isOpen = actionPlanMilestoneResultsDiv.style.height !== '0px';

  if (isOpen) {

    actionPlanMilestoneResultsDiv.style.height = actionPlanMilestoneResultsDiv.scrollHeight + 'px';
    // Set to current height first to enable transition
    requestAnimationFrame(() => {
      el.style.height = '0px';
    });
  }
  else {
    // Expand
    actionPlanMilestoneResultsDiv.style.height = el.scrollHeight + 'px';
    // Remove the fixed height after transition to allow content changes
    actionPlanMilestoneResultsDiv.addEventListener('transitionend', function handler() {
      actionPlanMilestoneResultsDiv.style.height = 'auto';
      actionPlanMilestoneResultsDiv.removeEventListener('transitionend', handler);
    });
  }

  // Reset height to auto after transition ends for responsiveness
  //  actionPlanMilestoneDiv.addEventListener('transitionend', () => {
  //   if (actionPlanMilestoneDiv.style.height !== '0px') {
  //     actionPlanMilestoneDiv.style.height = 'auto';
  //   }
  // }, { once: true });
}