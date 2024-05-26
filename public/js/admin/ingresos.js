
        // Datos de ejemplo para ganancias diarias
        const dailyLabels = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
        const dailyData = [200, 300, 250, 400, 500, 450, 350];

        // Datos de ejemplo para ganancias mensuales
        const monthlyLabels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        const monthlyData = [5000, 6000, 7000, 8000, 7500, 8500, 9000, 9500, 10000, 10500, 11000, 11500];

        // Gráfico de Barras para Ganancias Diarias
        const ctxDaily = document.getElementById('dailyEarningsChart').getContext('2d');
        new Chart(ctxDaily, {
            type: 'bar',
            data: {
                labels: dailyLabels,
                datasets: [{
                    label: 'Ganancias Diarias (USD)',
                    data: dailyData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de Líneas para Ganancias Mensuales
        const ctxMonthly = document.getElementById('monthlyEarningsChart').getContext('2d');
        new Chart(ctxMonthly, {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Ganancias Mensuales (USD)',
                    data: monthlyData,
                    fill: false,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
