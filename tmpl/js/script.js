function expandActionPlanMilestonesContent(itemindex) {
  const icon = document.getElementById('arrow-icon-' + itemindex);
  const el = document.getElementById('action-plan-milestones-' + itemindex);  

  var isOpen = false;
  if (icon.classList.contains('toggle-visible')) {
    icon.classList.remove('toggle-visible');
    icon.classList.add('toggle-hidden');
    isOpen = false;
  }
  else {
    icon.classList.remove('toggle-hidden');
    icon.classList.add('toggle-visible');
    isOpen = true;
  }  

  collapseOrExpandElement(el, isOpen);
}

function expandActionPlanResultsContent(itemindex) {
  const icon = document.getElementById('arrow-icon-results-' + itemindex);
  const el = document.getElementById('action-plan-milestone-results-' + itemindex);


  var isOpen = false;
  if (icon.classList.contains('toggle-visible')) {
    icon.classList.remove('toggle-visible');
    icon.classList.add('toggle-hidden');
    isOpen = false;
  }
  else {
    icon.classList.remove('toggle-hidden');
    icon.classList.add('toggle-visible');
    isOpen = true;
  }

  collapseOrExpandElement(el, isOpen);
}

function collapseOrExpandElement(el, isOpen) {
  if (isOpen) {
    // Collapse
    el.style.height = el.scrollHeight + 'px';
    requestAnimationFrame(() => {
      el.style.height = '0px';
    });

    el.addEventListener('transitionend', function handler() {
      el.dataset.lock = "false";
      el.removeEventListener('transitionend', handler);
    }, { once: true });

  } else {
    // Expand
    el.style.height = el.scrollHeight + 'px';
    el.removeEventListener('transitionend', el._transitionHandler);
    el._transitionHandler = function handler() {
      el.style.height = 'auto';
      el.dataset.lock = "false";
      el.removeEventListener('transitionend', handler);
    };
    el.addEventListener('transitionend', el._transitionHandler, { once: true });
  }
}