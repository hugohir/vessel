/ Add the following code after the existing JavaScript code

// Function to open the modal window
function openModal() {
  var modal = document.getElementById("portsModal");
  modal.style.display = "block";
}

// Function to close the modal window
function closeModal() {
  var modal = document.getElementById("portsModal");
  modal.style.display = "none";
}

// Event listener for the menu option
var showPortsLink = document.getElementById("showPortsLink");
showPortsLink.addEventListener("click", openModal);

// Event listener for the close button in the modal window
var closeBtn = document.getElementsByClassName("close")[0];
closeBtn.addEventListener("click", closeModal);

// Event listener for the "Save" button in the modal window
var saveBtn = document.getElementById("savePortsBtn");
saveBtn.addEventListener("click", savePorts);

// Function to handle the "Save" button click
function savePorts() {
  var checkedPorts = [];

  // Loop through checkboxes and get the checked ports
  var checkboxes = document.querySelectorAll("#portsContainer input[type='checkbox']");
  checkboxes.forEach(function(checkbox) {
    if (checkbox.checked) {
      checkedPorts.push(checkbox.value);
    }
  });

  // Do something with the selected ports
  console.log("Selected ports:", checkedPorts);

  // Close the modal window
  closeModal();
}

// Function to populate the modal window with port checkboxes
function populatePorts() {
  var portsContainer = document.getElementById("portsContainer");
  portsContainer.innerHTML = "";

  for (var i = 0; i < arrayp.length; i++) {
    var checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.name = "ports";
    checkbox.value = portCallName[i] + " " + portCountry[i] + " " + portName[i];

    var label = document.createElement("label");
    label.appendChild(checkbox);
    label.appendChild(document.createTextNode(portCallName[i] + " " + portCountry[i] + " " + portName[i]));

    portsContainer.appendChild(label);
    portsContainer.appendChild(document.createElement("br"));
  }
}

// Call the `populatePorts` function to populate the modal window with port checkboxes
populatePorts();
