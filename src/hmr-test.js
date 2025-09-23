// HMR Test for Green House Template
console.log('🔥 HMR Test: Green House template loaded - VERSION 2.0');

// Test HMR by updating this message
const testMessage = 'HMR is working! Green House template ready - VERSION 2.0';
console.log(testMessage);

// Add a visible indicator on the page
if (typeof document !== 'undefined') {
  const indicator = document.createElement('div');
  indicator.id = 'hmr-test-indicator';
  indicator.style.cssText = `
    position: fixed;
    top: 10px;
    right: 10px;
    background: #4CAF50;
    color: white;
    padding: 10px;
    border-radius: 5px;
    z-index: 9999;
    font-family: Arial, sans-serif;
    font-size: 12px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  `;
  indicator.textContent = 'HMR Active - V2.0';
  document.body.appendChild(indicator);
}

// Add a visual indicator in the console
if (typeof window !== 'undefined') {
  window.greenHouseHMR = {
    status: 'active',
    port: 5174,
    timestamp: new Date().toISOString()
  };

  console.log('🏠 Green House HMR Status:', window.greenHouseHMR);
}

// Export for HMR testing
export default testMessage;
