<h1 class="titleManageur">Demandes de - <?= $annee ?></h1>

<canvas id="barChartDemandes"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('barChartDemandes').getContext('2d');
    const moisFr = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: moisFr,
            datasets: <?= json_encode($datasetsPHP) ?>
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
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
</script>
