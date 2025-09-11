<!-- Color Picker Widget -->
<div id="colorPicker" class="color-picker-widget">
  <div class="color-picker-toggle" onclick="toggleColorPicker()">
    <i class="fas fa-palette"></i>
  </div>
  
  <div class="color-picker-panel" id="colorPickerPanel">
    <h6>Choose Theme Color</h6>
    <div class="color-options">
      <div class="color-option" data-color="#025add" style="background: linear-gradient(45deg, #025add, #0147a3);" title="Default Blue"></div>
      <div class="color-option" data-color="#f093fb" style="background: linear-gradient(45deg, #f093fb, #f5576c);" title="Pink"></div>
      <div class="color-option" data-color="#4facfe" style="background: linear-gradient(45deg, #4facfe, #00f2fe);" title="Cyan"></div>
      <div class="color-option" data-color="#43e97b" style="background: linear-gradient(45deg, #43e97b, #38f9d7);" title="Green"></div>
      <div class="color-option" data-color="#fa709a" style="background: linear-gradient(45deg, #fa709a, #fee140);" title="Orange"></div>
      <div class="color-option" data-color="#a8edea" style="background: linear-gradient(45deg, #a8edea, #fed6e3);" title="Mint"></div>
    </div>
    <input type="color" id="customColor" class="custom-color-input" onchange="applyCustomColor(this.value)">
    <label for="customColor" class="custom-color-label">Custom Color</label>
    <button class="reset-btn" onclick="resetTheme()">Reset to Default</button>
  </div>
</div>

<style>
.color-picker-widget {
  position: fixed;
  top: 50%;
  right: -200px;
  transform: translateY(-50%);
  z-index: 9999;
  transition: right 0.3s ease;
}

.color-picker-widget.active {
  right: 0;
}

.color-picker-toggle {
  position: absolute;
  left: -50px;
  top: 50%;
  transform: translateY(-50%);
  width: 50px;
  height: 50px;
  background: linear-gradient(45deg, #667eea, #764ba2);
  border-radius: 50% 0 0 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: white;
  font-size: 18px;
  box-shadow: -2px 0 10px rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}

.color-picker-toggle:hover {
  transform: translateY(-50%) scale(1.1);
}

.color-picker-panel {
  width: 200px;
  background: white;
  border-radius: 10px 0 0 10px;
  padding: 20px;
  box-shadow: -5px 0 20px rgba(0,0,0,0.1);
  border: 1px solid #eee;
}

.color-picker-panel h6 {
  margin-bottom: 15px;
  color: #333;
  font-weight: 600;
  text-align: center;
}

.color-options {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  margin-bottom: 15px;
}

.color-option {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  cursor: pointer;
  border: 3px solid transparent;
  transition: all 0.3s ease;
  position: relative;
}

.color-option:hover {
  transform: scale(1.1);
  border-color: #333;
}

.color-option.active {
  border-color: #333;
  transform: scale(1.1);
}

.custom-color-input {
  width: 100%;
  height: 40px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-bottom: 5px;
}

.custom-color-label {
  font-size: 12px;
  color: #666;
  text-align: center;
  display: block;
}

.reset-btn {
  width: 100%;
  padding: 8px;
  margin-top: 10px;
  background: #f8f9fa;
  border: 1px solid #ddd;
  border-radius: 5px;
  cursor: pointer;
  font-size: 12px;
  color: #666;
  transition: all 0.3s ease;
}

.reset-btn:hover {
  background: #e9ecef;
  color: #333;
}

/* Dynamic theme styles */
:root {
  --primary-color: #025add;
  --secondary-color: #0147a3;
}

.btn-primary,
.btn-get-started,
.service-card .btn,
.btn,
button[type="submit"],
.cta-btn,
.btn-popular,
.pricing .card a {
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)) !important;
  border: none !important;
}

.color-picker-toggle {
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)) !important;
}

.icon-wrapper {
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)) !important;
}

.section-header h2 {
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
</style>

<script>
function toggleColorPicker() {
  const widget = document.getElementById('colorPicker');
  widget.classList.toggle('active');
}

function applyThemeColor(primaryColor, secondaryColor = null) {
  if (!secondaryColor) {
    // Generate a darker shade for secondary color
    const hex = primaryColor.replace('#', '');
    const r = parseInt(hex.substr(0, 2), 16);
    const g = parseInt(hex.substr(2, 2), 16);
    const b = parseInt(hex.substr(4, 2), 16);
    
    // Darken by 20%
    const darkenedR = Math.max(0, Math.floor(r * 0.8));
    const darkenedG = Math.max(0, Math.floor(g * 0.8));
    const darkenedB = Math.max(0, Math.floor(b * 0.8));
    
    secondaryColor = `#${darkenedR.toString(16).padStart(2, '0')}${darkenedG.toString(16).padStart(2, '0')}${darkenedB.toString(16).padStart(2, '0')}`;
  }
  
  document.documentElement.style.setProperty('--primary-color', primaryColor);
  document.documentElement.style.setProperty('--secondary-color', secondaryColor);
  
  // Save to localStorage
  localStorage.setItem('themeColor', JSON.stringify({primary: primaryColor, secondary: secondaryColor}));
  
  // Update active state
  document.querySelectorAll('.color-option').forEach(option => {
    option.classList.remove('active');
  });
  
  const activeOption = document.querySelector(`[data-color="${primaryColor}"]`);
  if (activeOption) {
    activeOption.classList.add('active');
  }
}

function applyCustomColor(color) {
  applyThemeColor(color);
}

function resetTheme() {
  const defaultPrimary = '#025add';
  const defaultSecondary = '#0147a3';
  applyThemeColor(defaultPrimary, defaultSecondary);
  document.getElementById('customColor').value = defaultPrimary;
}

// Initialize color options
document.addEventListener('DOMContentLoaded', function() {
  // Load saved theme
  const savedTheme = localStorage.getItem('themeColor');
  if (savedTheme) {
    const theme = JSON.parse(savedTheme);
    applyThemeColor(theme.primary, theme.secondary);
  }
  
  // Add click handlers to color options
  document.querySelectorAll('.color-option').forEach(option => {
    option.addEventListener('click', function() {
      const color = this.getAttribute('data-color');
      applyThemeColor(color);
    });
  });
  
  // Close color picker when clicking outside
  document.addEventListener('click', function(e) {
    const widget = document.getElementById('colorPicker');
    if (!widget.contains(e.target)) {
      widget.classList.remove('active');
    }
  });
});
</script>