/**
 * mod_action_plan – expand/collapse for milestones and results.
 * Uses event delegation (no inline handlers), so it works with any number
 * of module instances and with a Content Security Policy.
 */
(function () {
  'use strict';

  function setControls(panelId, open) {
    document.querySelectorAll('[data-ap-toggle][aria-controls="' + panelId + '"]').forEach(function (btn) {
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');

      if (btn.classList.contains('toggle-details')) {
        btn.classList.toggle('toggle-hidden', open);
        btn.classList.toggle('toggle-visible', !open);
      }
    });
  }

  function expand(panel) {
    panel.style.height = panel.scrollHeight + 'px';

    panel.addEventListener('transitionend', function done(e) {
      // Ignore transitions bubbling up from nested panels.
      if (e.target !== panel) {
        return;
      }
      if (panel.getAttribute('data-ap-open') === 'true') {
        panel.style.height = 'auto';
      }
      panel.removeEventListener('transitionend', done);
    });
  }

  function collapse(panel) {
    panel.style.height = panel.scrollHeight + 'px';
    // Force a reflow so the browser registers the start height and animates.
    void panel.offsetHeight;
    panel.style.height = '0px';
  }

  document.addEventListener('click', function (e) {
    var btn = e.target.closest ? e.target.closest('[data-ap-toggle]') : null;

    if (!btn) {
      return;
    }

    var panel = document.getElementById(btn.getAttribute('aria-controls'));

    if (!panel) {
      return;
    }

    var open = btn.getAttribute('aria-expanded') !== 'true';

    panel.setAttribute('data-ap-open', open ? 'true' : 'false');
    setControls(panel.id, open);

    if (open) {
      expand(panel);
    } else {
      collapse(panel);
    }
  });
})();
