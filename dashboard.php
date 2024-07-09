<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard RAF</title>
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
                Dashboard RAF
            </div>
            <div class="card-body">
                <h5>Liste des Paiements Effectués</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Chauffeur</th>
                            <th>Montant Payé (FCFA)</th>
                            <th>Date de Paiement</th>
                        </tr>
                    </thead>
                    <tbody id="listePaiements">
                        <!-- Lignes dynamiques via JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                Suivi Mensuel
            </div>
            <div class="card-body">
                <canvas id="suiviMensuelChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        // Exemple de données pour la liste des paiements effectués
        const paiements = [
            { chauffeur: 'Jean Dupont', montant: 3000, date: '2024-04-30' },
            { chauffeur: 'Paul Martin', montant: 2000, date: '2024-04-30' }
        ];

        // Remplir la liste des paiements effectués
        function remplirListePaiements() {
            const tbody = document.getElementById('listePaiements');
            paiements.forEach(paiement => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${paiement.chauffeur}</td>
                    <td>${paiement.montant}</td>
                    <td>${paiement.date}</td>
                `;
                tbody.appendChild(tr);
            });
        }

        document.addEventListener('DOMContentLoaded', remplirListePaiements);

        // Graphique de suivi mensuel
        const suiviMensuelChart = document.getElementById('suiviMensuelChart').getContext('2d');
        const labels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Montant Total des Paiements (FCFA)',
                data: [5000, 6000, 4000, 7000, 8000, 9000],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const myChart = new Chart(suiviMensuelChart, config);
    </script>
</body>
</html>
