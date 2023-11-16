const data = [24, 16, 11, 14, 18, 17];
const labels = ['IT 24%' + ' ' + '.', 'Finance 16%'  + ' ' + '.', 'HR 11%'  + ' ' + '.', 'Marketing 14%'  + ' ' + '.', 'Operation 18%'  + ' ' + '.', 'Business 17%'  + ' ' + '.'];
const colors = ['#39a2db', '#5390d6', '#717bc9', '#8a64b3', '#9c4b95', '#d62ad0'];

const ctx = document.getElementById('myPieChart').getContext('2d');

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: data,
            backgroundColor: colors,
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Job Description',
        }
    }
});




