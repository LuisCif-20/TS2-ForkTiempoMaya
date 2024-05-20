function getTimeOfDay(hour, minute) {
    if (hour >= 6 && hour < 12) {
        return 'dia';
    } else if (hour >= 12 && hour < 18) {
        return 'tarde';
    } else if (hour >= 18 && hour < 24) {
        return 'noche';
    } else {
        return 'alba';
    }
}

function updateBackground() {
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var timeOfDay = getTimeOfDay(hour, minute);

    var div = document.getElementById('fondoHora');
    div.className = timeOfDay;
}

document.addEventListener("DOMContentLoaded", function() {
    updateBackground(); // Set the initial background
    setInterval(updateBackground, 2000); // Check every minute
});