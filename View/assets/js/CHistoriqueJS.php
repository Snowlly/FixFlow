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


</script>
