// Function to get URL parameter by name
function getUrlParameter(name) {
    name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

// Get the predefined data from URL
var predefinedData = getUrlParameter('predefinedData');

// Display the predefined data in the textbox
document.getElementById('predefinedDataTextbox').value = predefinedData;