const data2 = [21, 15, 11, 18, 16, 19];
const labels2 = ['IT 24%' + ' ' + '.', 'Finance 16%'  + ' ' + '.', 'HR 11%'  + ' ' + '.', 'Marketing 14%'  + ' ' + '.', 'Operation 18%'  + ' ' + '.', 'Business 17%'  + ' ' + '.'];
const colors2 = ['#39a2db', '#5390d6', '#717bc9', '#8a64b3', '#9c4b95', '#d62ad0'];
const ctx2 = document.getElementById('myPieChart2').getContext('2d');

new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: labels2,
        datasets: [{
            data: data2,
            backgroundColor: colors2,
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Job Description',
        }
    }
});

const data3 = [26, 16, 16, 10, 18, 19];
const labels3 = ['IT 24%' + ' ' + '.', 'Finance 16%'  + ' ' + '.', 'HR 11%'  + ' ' + '.', 'Marketing 14%'  + ' ' + '.', 'Operation 18%'  + ' ' + '.', 'Business 17%'  + ' ' + '.'];
const colors3 = ['#39a2db', '#5390d6', '#717bc9', '#8a64b3', '#9c4b95', '#d62ad0'];

const ctx3 = document.getElementById('myPieChart3').getContext('2d');

new Chart(ctx3, {
    type: 'pie',
    data: {
        labels: labels3,
        datasets: [{
            data: data3,
            backgroundColor: colors3,
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Job Description',
        }
    }
});
