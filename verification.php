<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification des Enregistrements</title>
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
                Vérification des Enregistrements
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Immatriculation</th>
                            <th>Chauffeur</th>
                            <th>Nombre de 20'</th>
                            <th>Nombre de 40'</th>
                            <th>Rotations</th>
                            <th>Montant</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="enregistrementsAValider">
                        <!-- Enregistrements dynamisés via JavaScript -->
                    </tbody>
                </table>
                <button id="soumettreValidation" class="btn btn-success">Soumettre à la Validation</button>
            </div>
        </div>
    </div>

    <script>
        // Exemple de données dynamiques pour les enregistrements à valider
        const enregistrements = [
            {
                date: '2024-07-05',
                immatriculation: 'AB-123-CD',
                chauffeur: 'Jean Dupont',
                nbr_20: 4,
                nbr_40: 1,
                rotations: 3,
                montant: 3000
            },
            {
                date: '2024-07-05',
                immatriculation: 'EF-456-GH',
                chauffeur: 'Paul Martin',
                nbr_20: 2,
                nbr_40: 0,
                rotations: 1,
                montant: 1000
            }
        ];

        // Fonction pour remplir la table avec les enregistrements à valider
        function remplirTableau() {
            const tbody = document.getElementById('enregistrementsAValider');
            enregistrements.forEach(enregistrement => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${enregistrement.date}</td>
                    <td>${enregistrement.immatriculation}</td>
                    <td>${enregistrement.chauffeur}</td>
                    <td>${enregistrement.nbr_20}</td>
                    <td>${enregistrement.nbr_40}</td>
                    <td>${enregistrement.rotations}</td>
                    <td>${enregistrement.montant}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="modifierEnregistrement(this)">Modifier</button>
                        <button class="btn btn-danger btn-sm" onclick="supprimerEnregistrement(this)">Supprimer</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        document.addEventListener('DOMContentLoaded', remplirTableau);

        function modifierEnregistrement(button) {
            // Logique de modification
        }

        function supprimerEnregistrement(button) {
            button.closest('tr').remove();
        }

        // Soumettre les enregistrements à la validation
        document.getElementById('soumettreValidation').addEventListener('click', function() {
            const enregistrementsValides = [];
            document.querySelectorAll('#enregistrementsAValider tr').forEach(row => {
                const cells = row.querySelectorAll('td');
                enregistrementsValides.push({
                    date: cells[0].textContent,
                    immatriculation: cells[1].textContent,
                    chauffeur: cells[2].textContent,
                    nbr_20: cells[3].textContent,
                    nbr_40: cells[4].textContent,
                    rotations: cells[5].textContent,
                    montant: cells[6].textContent
                });
            });

            // Soumettre les enregistrements validés au serveur
            console.log('Enregistrements validés soumis:', enregistrementsValides);
        });
    </script>
</body>
</html>
