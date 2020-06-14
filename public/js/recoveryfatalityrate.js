function fatality() {

    const percent = 20;
    const color = '#c63a12';
    const canvas = 'chartCanvas1';
    const container = 'chartContainer1';

    const percentValue = percent; // Sets the single percentage value
    const colorGreen = color, // Sets the chart color
        animationTime = '1400'; // Sets speed/duration of the animation

    const chartCanvas = document.getElementById(canvas), // Sets canvas element by ID
        chartContainer = document.getElementById(container), // Sets container element ID
        divElement = document.createElement('div'), // Create element to hold and show percentage value in the center on the chart
        domString = '<div class="chart__value" style="color: red"><p>' + percentValue + '%</p></div>'; // String holding markup for above created element

// Create a new Chart object
    const doughnutChart = new Chart(chartCanvas, {
        type: 'doughnut',
        data: {
            datasets: [
                {
                    data: [percentValue, 100 - percentValue], // Set the value shown in the chart as a percentage (out of 100)
                    backgroundColor: [color], // The background color of the filled chart
                    borderWidth: 0 // Width of border around the chart
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            responsive: false, // Set the chart to not be responsive
            tooltips: {
                enabled: false // Hide tooltips
            }
        }
    });

    Chart.defaults.global.animation.duration = animationTime; // Set the animation duration

    divElement.innerHTML = domString; // Parse the HTML set in the domString to the innerHTML of the divElement
    chartContainer.appendChild(divElement.firstChild); // Append the divElement within the chartContainer as it's child
}
function recovery(rate) {

    const percent = rate;
    const color = '#50afbc';
    const canvas = 'chartCanvas';
    const container = 'chartContainer';

    const percentValue = percent; // Sets the single percentage value
    const colorGreen = color, // Sets the chart color
        animationTime = '1400'; // Sets speed/duration of the animation

    const chartCanvas = document.getElementById(canvas), // Sets canvas element by ID
        chartContainer = document.getElementById(container), // Sets container element ID
        divElement = document.createElement('div'), // Create element to hold and show percentage value in the center on the chart
        domString = '<div class="chart__value" style="color: #49bf26"><p>' + percentValue + '%</p></div>'; // String holding markup for above created element

// Create a new Chart object
    const doughnutChart = new Chart(chartCanvas, {
        type: 'doughnut',
        data: {
            datasets: [
                {
                    data: [percentValue, 100 - percentValue], // Set the value shown in the chart as a percentage (out of 100)
                    backgroundColor: [color], // The background color of the filled chart
                    borderWidth: 0 // Width of border around the chart
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            responsive: false, // Set the chart to not be responsive
            tooltips: {
                enabled: false // Hide tooltips
            }
        }
    });

    Chart.defaults.global.animation.duration = animationTime; // Set the animation duration

    divElement.innerHTML = domString; // Parse the HTML set in the domString to the innerHTML of the divElement
    chartContainer.appendChild(divElement.firstChild); // Append the divElement within the chartContainer as it's child
}
