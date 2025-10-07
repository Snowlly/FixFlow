<script>

    const module1 = document.querySelector('.module1');
    const module2 = document.querySelector('.module2');
    const module3 = document.querySelector('.module3');

    const view1 = document.querySelectorAll('.container-view-module1');
    const view2 = document.querySelectorAll('.container-view-module2');
    const view3 = document.querySelectorAll('.container-view-module3');



    function showView(viewToShow, ...viewsToHide) {
        viewToShow.forEach(view => view.style.display = "initial");
        viewsToHide.forEach(group =>
            group.forEach(view => view.style.display = "none")
        );
    }

    module1.addEventListener("click", function (e) {
        showView(view1, view2, view3);
    });

    module2.addEventListener("click", function (e) {
        showView(view2, view1, view3);
    });

    module3.addEventListener("click", function (e) {
        showView(view3, view1, view2);
        initCharts();
    });


    document.addEventListener("DOMContentLoaded", function () {
        const pastilles = document.querySelectorAll('.pastilleNiveau');

        pastilles.forEach(pastille => {
            const niveau = pastille.textContent.trim();
            if (niveau === "Élevé") {
                pastille.style.backgroundColor = "#DF4949FF";
            }
            if (niveau === "Peut attendre 24/48h") {
                pastille.style.backgroundColor = "coral";
            }
            if (niveau === "Semaine prochaine") {
                pastille.style.backgroundColor = "#678075";
            }
            if (niveau === "Après Clôture") {
                pastille.style.backgroundColor = "#9de3c5";
            }
        });
        showView(view1, view2, view3);
    });

    const moisSelect = document.getElementById('mois');
    const anneeSelect = document.getElementById('annee');

    document.getElementById('btnFiltrer').addEventListener('click', updateCharts);


    function updateCharts() {
        const mois = moisSelect.value;
        const annee = anneeSelect.value;
        const bouton = document.getElementById('btnFiltrer');

        bouton.disabled = true;
        bouton.textContent = "Chargement...";

        fetch('/FixFlow/Model/DIndex.php?ajax=1&mois=' + mois + '&annee=' + annee)
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    return;
                }

                // 1. MAJ graphique par type
                chartTypes.data.labels = data.parType.map(item => item.Type);
                chartTypes.data.datasets[0].data = data.parType.map(item => item.total);
                chartTypes.update();

                // 2. MAJ graphique utilisateur
                chartUtilisateur.data.labels = data.parUtilisateur.map(item => item.Type);
                chartUtilisateur.data.datasets[0].data = data.parUtilisateur.map(item => item.total);
                chartUtilisateur.update();

                // 3. MAJ H2 : "Ce mois-ci : X demandes"
                const totalDemandes = data.parType.reduce((sum, item) => sum + parseInt(item.total), 0);

                const moisNom = moisSelect.options[moisSelect.selectedIndex].text;
                document.getElementById('titre1').textContent = `${totalDemandes} demande(s) sur le mois`;
            })
            .catch(err => {
                console.error('Erreur AJAX :', err);
                alert("Une erreur est survenue lors du chargement.");
            })
            .finally(() => {
                bouton.disabled = false;
                bouton.textContent = "Appliquer";
            });
    }


    let chartTypes = null;
    let chartUtilisateur = null;

    function initCharts() {
        // Évite la recréation si les graphiques existent déjà
        if (chartTypes || chartUtilisateur) return;

        const ctxTypes = document.getElementById('camembertTypes').getContext('2d');
        chartTypes = new Chart(ctxTypes, {
            type: 'pie',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Répartition des types de demandes (Zone: <?= $zone ?>)',
                    data: <?= json_encode($values) ?>,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Répartition des demandes par type - Mois en cours'
                    }
                }
            }
        });

        const ctxUtilisateur = document.getElementById('camembertUtilisateur').getContext('2d');
        chartUtilisateur = new Chart(ctxUtilisateur, {
            type: 'pie',
            data: {
                labels: <?= json_encode($labelsUser) ?>,
                datasets: [{
                    label: 'Demandes traitées par vous',
                    data: <?= json_encode($valuesUser) ?>,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Répartition des demandes que vous avez traitées - Mois en cours'
                    }
                }
            }
        });
        updateCharts();
    }
</script>

