<script>
    fetch('/FixFlow/Model/MIndex.php?annee=' + annee)
        .then(res => res.json())
        .then(data => {
            const labels = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

            const datasets = Object.entries(data.datasets).map(([type, values]) => ({
                label: type,
                data: values,
                backgroundColor: getColorForType(type), // tu peux définir cette fonction
                borderWidth: 1
            }));

            new Chart(document.getElementById('barChartDemandes').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Demandes par mois (par type)'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    },
                    scales: {
                        x: { stacked: true },
                        y: { stacked: true, beginAtZero: true }
                    }
                }
            });
        });

    function getColorForType(type) {
        const colors = {
            'Bug': '#f94144',
            'Demande': '#277da1',
            'Maintenance': '#f9c74f'
        };
        return colors[type] || '#ccc';
    }

</script>