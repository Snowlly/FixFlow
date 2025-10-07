<script>
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
    });



    function filtrerTableau() {
        const input = document.getElementById("rechercheTable");
        const filtre = input.value.toLowerCase();
        const lignes = document.querySelectorAll("table tbody tr");
        let visibleCount = 0;

        lignes.forEach(ligne => {
            // Ignorer la ligne spéciale "aucun résultat"
            if (ligne.id === "noResult") return;

            const cellules = ligne.querySelectorAll("td, th");
            const contenuLigne = Array.from(cellules).map(cell => cell.textContent.toLowerCase()).join(" ");

            if (contenuLigne.includes(filtre)) {
                ligne.style.display = "";
                visibleCount++;
            } else {
                ligne.style.display = "none";
            }
        });

        // Afficher ou cacher la ligne "aucun résultat"
        const noResultRow = document.getElementById("noResult");
        if (visibleCount === 0) {
            noResultRow.style.display = "";
        } else {
            noResultRow.style.display = "none";
        }
    }

</script>
