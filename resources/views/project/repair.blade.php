<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset('frontend/repair.css')}}>

    <title>Repairs</title>
</head>
<body>

  <!-- Repair Options -->
  <div id="repairOptions" class="container">
    <span class="close" onclick="openModal()">×</span>
    <h2>What do you need repaired?</h2>

    <div class="option"><input type="radio" name="repair" id="engine" /><label for="engine">Engine</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="brakes" /><label for="brakes">Brakes</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="BatteryElectric" /><label for="BatteryElectric">Battery and electric system</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="HeatingAC" /><label for="HeatingAC">Heating and air conditioning system</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="SteeringSuspension" /><label for="SteeringSuspension">Steering and suspension</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="Transmission" /><label for="Transmission">Transmission</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="Exhaust" /><label for="Exhaust">Exhaust system</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="WheelsTires" /><label for="WheelsTires">Wheels and tires</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="WindowsMirrors" /><label for="WindowsMirrors">Windows and mirrors</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="Lights" /><label for="Lights">Lights</label></div><hr>
    <div class="option"><input type="radio" name="repair" id="NotSure" /><label for="NotSure">Not sure</label></div>

    <div class="buttons">
      <button onclick="goBackToMainPage()">Back</button>
      <button onclick="goToSelectedRepair()" style="background-color: red;">Next</button>
    </div>
  </div>

  <!-- Brake Repair Page -->
  <div id="brakeRepairPage" class="container hidden">
    <span class="close" onclick="closeBrakeRepair()">×</span>
    <h2>What part of your brakes needs repair?</h2>
    <form id="brakeForm">
      <div class="option"><input type="radio" name="brake" value="abs"> ABS control module</div><hr>
      <div class="option"><input type="radio" name="brake" value="line"> Brake line</div><hr>
      <div class="option"><input type="radio" name="brake" value="master"> Brake master cylinder</div><hr>
      <div class="option"><input type="radio" name="brake" value="pads"> Brake pads</div><hr>
      <div class="option"><input type="radio" name="brake" value="drum"> Drum and rotor</div><hr>
      <div class="option"><input type="radio" name="brake" value="not_sure"> Not sure</div><hr>
      <div class="option">
        <input type="radio" name="brake" value="other" id="brakeOther" onclick="toggleOtherInput('brake')">
        <label for="brakeOther">Other</label>
        <input type="text" id="otherBrakeText" class="hidden" placeholder="Please specify" />
      </div>
    </form>
    <div class="buttons">
      <button onclick="closeBrakeRepair()">Back</button>
      <button class="skip" onclick="submitSkip()">Skip</button>
    </div>
  </div>

  <!-- Engine Repair Page -->
  <div id="engineRepairPage" class="container hidden">
    <span class="close" onclick="closeEngineRepair()">×</span>
    <h2>What type of engine needs repair?</h2>
    <div class="option"><input type="radio" id="diesel" name="engine"><label for="diesel">Diesel engine</label></div><hr>
    <div class="option"><input type="radio" id="electric" name="engine"><label for="electric">Electric engine</label></div><hr>
    <div class="option"><input type="radio" id="gas" name="engine"><label for="gas">Gas-powered engine</label></div><hr>
    <div class="option"><input type="radio" id="hybrid" name="engine"><label for="hybrid">Hybrid engine</label></div><hr>
    <div class="option"><input type="radio" id="notsure_engine" name="engine"><label for="notsure_engine">Not sure</label></div><hr>
    <div class="option">
      <input type="radio" id="other_engine" name="engine" onclick="toggleOtherInput('engine')">
      <label for="other_engine">Other</label>
      <input type="text" id="otherEngineText" class="hidden" placeholder="Please specify" />
    </div>
    <div class="buttons">
      <button onclick="closeEngineRepair()">Back</button>
      <button class="skip" onclick="submitSkip()">Skip</button>
    </div>
  </div>

  <!-- Battery and Electric System Page -->
  <div id="batteryandelectricsystem" class="container hidden">
    <span class="close" onclick="closeBatteryElectric()">×</span>
    <h2>What part of your battery and electric system needs repairs?</h2>
    <div class="option"><input type="radio" id="alternator" name="batteryElectric"><label for="alternator">Alternator</label></div><hr>
    <div class="option"><input type="radio" id="battery" name="batteryElectric"><label for="battery">Battery</label></div><hr>
    <div class="option"><input type="radio" id="batteryCable" name="batteryElectric"><label for="batteryCable">Battery cable</label></div><hr>
    <div class="option"><input type="radio" id="ignitionSwitch" name="batteryElectric"><label for="ignitionSwitch">Ignition switch</label></div><hr>
    <div class="option"><input type="radio" id="notSureBattery" name="batteryElectric"><label for="notSureBattery">Not sure</label></div><hr>
    <div class="option">
      <input type="radio" id="other_battery" name="batteryElectric" onclick="toggleOtherInput('battery')">
      <label for="other_battery">Other</label>
      <input type="text" id="otherBatteryText" class="hidden" placeholder="Please specify" />
    </div>
    <div class="buttons">
      <button onclick="closeBatteryElectric()">Back</button>
      <button class="skip" onclick="submitSkip()">Skip</button>
    </div>
  </div>

  <!-- AC Service Page for Heating and AC -->
  <div id="acservice" class="container hidden">
    <span class="close" onclick="closeACService()">×</span>
    <h2>What part of your heating and air conditioning system needs repair?</h2>
    <div class="option"><input type="radio" id="ac_compressor" name="acservice"><label for="ac_compressor">AC Compressor</label></div><hr>
    <div class="option"><input type="radio" id="heater_core" name="acservice"><label for="heater_core">Heater Core</label></div><hr>
    <div class="option"><input type="radio" id="blower_motor" name="acservice"><label for="blower_motor">Blower Motor</label></div><hr>
    <div class="option"><input type="radio" id="thermostat" name="acservice"><label for="thermostat">Thermostat</label></div><hr>
    <div class="option"><input type="radio" id="not_sure_ac" name="acservice"><label for="not_sure_ac">Not sure</label></div><hr>
    <div class="option">
      <input type="radio" id="other_ac" name="acservice" onclick="toggleOtherInput('ac')">
      <label for="other_ac">Other</label>
      <input type="text" id="otherACText" class="hidden" placeholder="Please specify" />
    </div>
    <div class="buttons">
      <button onclick="closeACService()">Back</button>
      <button class="skip" onclick="submitSkip()">Skip</button>
    </div>
  </div>

  <!-- Modal for Continue / Discard -->
  <div id="exitModal" class="modal">
    <div class="modal-content">
      <p>Do you want to continue editing or discard your changes?</p>
      <div class="modal-buttons">
        <button onclick="continueEditing()">Continue request</button>
        <button onclick="discardRequest()">Discard</button>

      </div>
    </div>
  </div>

  <script>
    // Modal functions
    function goBackToMainPage() {
  window.location.href = '{{route('repair')}}';
}
function discardRequest() {
  window.location.href = '{{route('repair')}}';
}


    function openModal() {
      document.getElementById('exitModal').style.display = 'flex';
    }
    function closeModal() {
      document.getElementById('exitModal').style.display = 'none';
    }
    function discardChanges() {
      closeModal();
      alert("Changes discarded. Exiting or resetting.");
      resetAll();
    }
    function continueEditing() {
      closeModal();
    }

    // Navigation and UI logic
    function goBack() {
      alert('Back button clicked'); // Implement your back logic here
    }

    function goToSelectedRepair() {
      const repairRadios = document.getElementsByName('repair');
      let selected = null;
      for (const radio of repairRadios) {
        if (radio.checked) {
          selected = radio.id;
          break;
        }
      }
      if (!selected) {
        alert('Please select a repair option before continuing.');
        return;
      }
      document.getElementById('repairOptions').classList.add('hidden');
      // Hide all detail pages first
      hideAllDetailPages();

      if (selected === 'brakes') {
        document.getElementById('brakeRepairPage').classList.remove('hidden');
      } else if (selected === 'engine') {
        document.getElementById('engineRepairPage').classList.remove('hidden');
      } else if (selected === 'BatteryElectric') {
        document.getElementById('batteryandelectricsystem').classList.remove('hidden');
      } else if (selected === 'HeatingAC') {
        document.getElementById('acservice').classList.remove('hidden');
      } else {
        alert('Selected repair page is not implemented yet.');
        document.getElementById('repairOptions').classList.remove('hidden');
      }
    }

    function hideAllDetailPages() {
      document.getElementById('brakeRepairPage').classList.add('hidden');
      document.getElementById('engineRepairPage').classList.add('hidden');
      document.getElementById('batteryandelectricsystem').classList.add('hidden');
      document.getElementById('acservice').classList.add('hidden');
    }

    // Close repair sub-pages and return to main
    function closeBrakeRepair() {
      document.getElementById('brakeRepairPage').classList.add('hidden');
      document.getElementById('repairOptions').classList.remove('hidden');
      resetBrakeForm();
    }
    function closeEngineRepair() {
      document.getElementById('engineRepairPage').classList.add('hidden');
      document.getElementById('repairOptions').classList.remove('hidden');
      resetEngineForm();
    }
    function closeBatteryElectric() {
      document.getElementById('batteryandelectricsystem').classList.add('hidden');
      document.getElementById('repairOptions').classList.remove('hidden');
      resetBatteryForm();
    }
    function closeACService() {
      document.getElementById('acservice').classList.add('hidden');
      document.getElementById('repairOptions').classList.remove('hidden');
      resetACForm();
    }

    // Reset forms and inputs
    function resetBrakeForm() {
      const brakeRadios = document.getElementsByName('brake');
      for (const radio of brakeRadios) {
        radio.checked = false;
      }
      document.getElementById('otherBrakeText').value = '';
      document.getElementById('otherBrakeText').classList.add('hidden');
    }
    function resetEngineForm() {
      const engineRadios = document.getElementsByName('engine');
      for (const radio of engineRadios) {
        radio.checked = false;
      }
      document.getElementById('otherEngineText').value = '';
      document.getElementById('otherEngineText').classList.add('hidden');
    }
    function resetBatteryForm() {
      const batteryRadios = document.getElementsByName('batteryElectric');
      for (const radio of batteryRadios) {
        radio.checked = false;
      }
      document.getElementById('otherBatteryText').value = '';
      document.getElementById('otherBatteryText').classList.add('hidden');
    }
    function resetACForm() {
      const acRadios = document.getElementsByName('acservice');
      for (const radio of acRadios) {
        radio.checked = false;
      }
      document.getElementById('otherACText').value = '';
      document.getElementById('otherACText').classList.add('hidden');
    }

    // Reset all, for discard
    function resetAll() {
      document.getElementById('repairOptions').classList.remove('hidden');
      hideAllDetailPages();
      resetBrakeForm();
      resetEngineForm();
      resetBatteryForm();
      resetACForm();
      // Uncheck main repair options:
      const repairRadios = document.getElementsByName('repair');
      for (const radio of repairRadios) {
        radio.checked = false;
      }
    }

    // Show/hide "Other" text inputs on radio click
    function toggleOtherInput(category) {
      if (category === 'brake') {
        const otherInput = document.getElementById('otherBrakeText');
        const otherRadio = document.getElementById('brakeOther');
        otherInput.classList.toggle('hidden', !otherRadio.checked);
        if (!otherRadio.checked) otherInput.value = '';
      } else if (category === 'engine') {
        const otherInput = document.getElementById('otherEngineText');
        const otherRadio = document.getElementById('other_engine');
        otherInput.classList.toggle('hidden', !otherRadio.checked);
        if (!otherRadio.checked) otherInput.value = '';
      } else if (category === 'battery') {
        const otherInput = document.getElementById('otherBatteryText');
        const otherRadio = document.getElementById('other_battery');
        otherInput.classList.toggle('hidden', !otherRadio.checked);
        if (!otherRadio.checked) otherInput.value = '';
      } else if (category === 'ac') {
        const otherInput = document.getElementById('otherACText');
        const otherRadio = document.getElementById('other_ac');
        otherInput.classList.toggle('hidden', !otherRadio.checked);
        if (!otherRadio.checked) otherInput.value = '';
      }
    }

    // Skip button handler - just go back to main form for demo
    function submitSkip() {
      alert('Skipped this step. Returning to main repair options.');
      resetAll();
    }
  </script>
</body>
</html>