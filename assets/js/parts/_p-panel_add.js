/**
 * Part : Panel Add VHost
*
*/


const setupPanelToggles = () => {
  const toggles = [
    { inputId: 'p-inp-ctms', panelId: 'p-pnl-ctms', inverse: true },
    { inputId: 'p-inp-adv', panelId: 'p-pnl-adv', inverse: false },
    { inputId: 'p-inp-mod-adv', panelId: 'p-pnl-mod-adv', inverse: false }
  ];

  toggles.forEach(({ inputId, panelId, inverse }) => {
    const $input = document.getElementById(inputId);
    const $panel = document.getElementById(panelId);

    if ($input && $panel) {
      const updatePanel = () => {
        const shouldShow = inverse ? !$input.checked : $input.checked;
        $panel.classList.toggle('e-on', shouldShow);
        $panel.classList.toggle('e-hde', !shouldShow);
      };

      // Init + listener
      updatePanel();
      $input.addEventListener('change', updatePanel);
    }
  });
};
setupPanelToggles();
