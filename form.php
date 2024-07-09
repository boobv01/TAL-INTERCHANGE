<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Suivi des Primes</title>
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
                Formulaire de Suivi des Primes
            </div>
            <div class="card-body">
                <form id="primeForm">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" required>
                    </div>
                    <div class="form-group">
                        <label for="immatriculation">Immatriculation</label>
                        <select class="form-control" id="immatriculation" required>
                            <!-- Options dynamisées via JavaScript -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="chauffeur">Chauffeur</label>
                        <select class="form-control" id="chauffeur" required>
                            <!-- Options dynamisées via JavaScript -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nbr_20">Nombre de 20'</label>
                        <input type="number" class="form-control" id="nbr_20" required>
                    </div>
                    <div class="form-group">
                        <label for="nbr_40">Nombre de 40'</label>
                        <input type="number" class="form-control" id="nbr_40" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
        <div class="card mt-4" style="display: none;">
            <div class="card-header">
                Enregistrements du jour
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
                    <tbody id="enregistrementsDuJour">
                        <!-- Enregistrements dynamisés via JavaScript -->
                    </tbody>
                </table>
                <button id="soumettreTout" class="btn btn-success">Soumettre Tout</button>
            </div>
        </div>
    </div>

    <script>
        // Exemple de données dynamiques pour les sélecteurs
        const camions = [
            { id: 1, immat: 'AB-123-CD' },
            { id: 2, immat: 'EF-456-GH' }
        ];
        const chauffeurs = [
            { id: 1, nom: 'Dupont', prenom: 'Jean', ancien: true },
            { id: 2, nom: 'Martin', prenom: 'Paul', ancien: false }
        ];

        // Fonction pour remplir les options des sélecteurs
        function remplirOptions() {
            const immatSelect = document.getElementById('immatriculation');
            camions.forEach(camion => {
                const option = document.createElement('option');
                option.value = camion.id;
                option.textContent = camion.immat;
                immatSelect.appendChild(option);
            });

            const chauffeurSelect = document.getElementById('chauffeur');
            chauffeurs.forEach(chauffeur => {
                const option = document.createElement('option');
                option.value = chauffeur.id;
                option.textContent = `${chauffeur.prenom} ${chauffeur.nom}`;
                chauffeurSelect.appendChild(option);
            });
        }

        document.addEventListener('DOMContentLoaded', remplirOptions);

        // Gérer la soumission du formulaire
        document.getElementById('primeForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const date = document.getElementById('date').value;
            const immatriculation = document.getElementById('immatriculation').value;
            const chauffeur = document.getElementById('chauffeur').value;
            const nbr_20 = document.getElementById('nbr_20').value;
            const nbr_40 = document.getElementById('nbr_40').value;

            // Calcul des rotations et du montant
            const chauffeurData = chauffeurs.find(c => c.id == chauffeur);
            const rotations = Math.ceil(nbr_20 / 2) + parseInt(nbr_40);
            const montant = rotations * (chauffeurData.ancien ? 1000 : 2000);

            const enregistrement = {
                date,
                immatriculation,
                chauffeur,
                nbr_20,
                nbr_40,
                rotations,
                montant
            };

            // Ajouter l'enregistrement à la liste
            ajouterEnregistrement(enregistrement);

            // Cacher le formulaire après soumission
            document.getElementById('primeForm').style.display = 'none';
        });

        function ajouterEnregistrement(enregistrement) {
            const tbody = document.getElementById('enregistrementsDuJour');
            const tr = document.createElement('tr');

            tr.innerHTML = `
                <td>${enregistrement.date}</td>
                <td>${camions.find(c => c.id == enregistrement.immatriculation).immat}</td>
                <td>${chauffeurs.find(c => c.id == enregistrement.chauffeur).prenom} ${chauffeurs.find(c => c.id == enregistrement.chauffeur).nom}</td>
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
        }

        function modifierEnregistrement(button) {
            // Logique de modification
        }

        function supprimerEnregistrement(button) {
            button.closest('tr').remove();
        }

        // Lorsque le responsable transfert soumet, afficher la liste pour le jour
        function afficherListeSoumise() {
            document.querySelector('.card.mt-4').style.display = 'block'; // Afficher la liste soumise
        }

        // Simuler la soumission du responsable transfert
        setTimeout(() => {
            afficherListeSoumise(); // Appel de la fonction pour simuler le comportement
        }, 3000); // Délai de 3 secondes pour simuler une soumission

        document.getElementById('soumettreTout').addEventListener('click', function() {
            const enregistrements = [];
            document.querySelectorAll('#enregistrementsDuJour tr').forEach(row => {
                const cells = row.querySelectorAll('td');
                enregistrements.push({
                    date: cells[0].textContent,
                    immatriculation: cells[1].textContent,
                    chauffeur: cells[2].textContent,
                    nbr_20: cells[3].textContent,
                    nbr_40: cells[4].textContent,
                    rotations: cells[5].textContent,
                    montant: cells[6].textContent
                });
            });

            // Soumettre les enregistrements au serveur
            console.log('Enregistrements soumis:', enregistrements);
        });
    </script>
</body>
</html>
