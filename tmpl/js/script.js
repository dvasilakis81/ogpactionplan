

function expandActionPlanMilestonesContent_1(itemindex) {
  const icon = document.getElementById('arrow-icon-' + itemindex);
  const el = document.getElementById('action-plan-milestones-' + itemindex);

  // If it's currently transitioning, ignore additional clicks
  if (el.classList.contains('transitioning')) return;

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

  // Mark as transitioning to prevent rapid clicks
  el.classList.add('transitioning');
  console.log('isOpen: '  + isOpen);
  if (isOpen === true) {    
    // Collapse
    el.style.height = el.scrollHeight + 'px';    
    console.log('Collapse: ' + el.style.height);
    requestAnimationFrame(() => {
      //console.log('requestAnimationFrame');
      el.style.height = '0px';
    });
  } else {
    // Expand
    el.style.height = el.scrollHeight + 'px';
    console.log('Expand: ' + el.style.height)
    el.addEventListener('transitionend', function handler() {
      console.log('transitionend: auto');
      el.style.height = 'auto';
      el.classList.remove('transitioning'); // Allow next clicks
      el.removeEventListener('transitionend', handler);
    }, { once: true });
  }
  
  // Ensure transition state is cleared after animation
  setTimeout(() => {
    el.classList.remove('transitioning');
  }, 300); // Adjust based on CSS transition duration
}

function expandActionPlanMilestonesContent(itemindex) {
  const icon = document.getElementById('arrow-icon-' + itemindex);
  const el = document.getElementById('action-plan-milestones-' + itemindex);

  if (el.dataset.lock === "true") return;

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
  el.dataset.lock = "true";  
  //icon.classList.toggle('toggle-visible', !isOpen);
  //icon.classList.toggle('toggle-hidden', isOpen);

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


function expandActionPlanResultsContent(itemindex) {

  const el = document.getElementById('action-plan-milestone-results-' + itemindex);
  if (el.classList.contains('transitioning')) return;
  el.classList.add('transitioning');

  const icon = document.getElementById('arrow-icon-results-' + itemindex);
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
  
  if (isOpen === true) {
    
    el.style.height = el.scrollHeight + 'px';    
    requestAnimationFrame(() => {
      el.style.height = '0px';
    });
  }
  else {    
    el.style.height = el.scrollHeight + 'px';    
    el.addEventListener('transitionend', function handler() {
      el.style.height = 'auto';
      el.removeEventListener('transitionend', handler);
    }, { once: true });
  }

   setTimeout(() => {
    el.classList.remove('transitioning');
  }, 300);
}