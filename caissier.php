<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Paiements</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .container {
            margin-top: 50px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tableau des Paiements
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Chauffeur</th>
                            <th>Montant Total à Recevoir (FCFA)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableauPaiements">
                        <!-- Lignes dynamiques via JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Exemple de données dynamiques pour les paiements
        const chauffeurs = [
            { id: 1, nom: 'Dupont', prenom: 'Jean', montantTotal: 3000 },
            { id: 2, nom: 'Martin', prenom: 'Paul', montantTotal: 2000 }
        ];

        // Fonction pour remplir le tableau des paiements
        function remplirTableauPaiements() {
            const tbody = document.getElementById('tableauPaiements');
            chauffeurs.forEach(chauffeur => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${chauffeur.prenom} ${chauffeur.nom}</td>
                    <td>${chauffeur.montantTotal}</td>
                    <td>
                        <button class="btn btn-success btn-sm" onclick="marquerPaye(${chauffeur.id})">Payé</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        document.addEventListener('DOMContentLoaded', remplirTableauPaiements);

        function marquerPaye(chauffeurId) {
            // Logique pour marquer le paiement comme effectué
            const chauffeur = chauffeurs.find(c => c.id === chauffeurId);
            alert(`Le paiement pour ${chauffeur.prenom} ${chauffeur.nom} (${chauffeur.montantTotal} FCFA) a été marqué comme payé.`);
            // Supprimer la ligne de tableau après le paiement
            document.getElementById('tableauPaiements').innerHTML = '';
        }
    </script>
</body>
</html>
