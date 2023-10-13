<?php
session_start();
if (!isset($_SESSION['projets'])) {
    $_SESSION['projets'] =  [
        [
            'nom_projet' => "Projet Alpha",
            'description' => "Un projet pilote pour tester de nouvelles technologies",
            'partenaire' => ["Mariam", "7em du nom"],
            'activites' => [
                [
                    'nom' => "Activité de lancement",
                    'descriptionA' => "Préparation et lancement du projet",
                    'date' => "2023-05-10"
                ],
                [
                    'nom' => "Analyse des données",
                    'descriptionA' => "Collecte et analyse des données initiales",
                    'date' => "2023-05-20"
                ]
            ],
        ],
        [
            'nom_projet' => "Projet Beta",
            'description' => "Expansion d'une application existante",
            'partenaire' => ["Ntandou", "Camara"],
            'activites' => [
                [
                    'nom' => "Réunion de planification",
                    'descriptionA' => "Discussion des objectifs du projet",
                    'date' => "2023-04-15"
                ],
                [
                    'nom' => "Conception de l'interface utilisateur",
                    'descriptionA' => "Création de maquettes et prototypes",
                    'date' => "2023-04-30"
                ],
                [
                    'nom' => "Intégration de la base de données",
                    'descriptionA' => "Configuration de la base de données",
                    'date' => "2023-05-15"
                ],
                [
                    'nom' => "Programmation",
                    'descriptionA' => "Développement de l'application",
                    'date' => "2023-07-15"
                ]
            ],
        ],
        [
            'nom_projet' => "Projet Charlie",
            'description' => "Projet de recherche scientifique en biologie marine",
            'partenaire' => ["Moussa", "Korse"],
            'activites' => [
                [
                    'nom' => "Collecte d'échantillons",
                    'descriptionA' => "Prélèvement d'échantillons en mer",
                    'date' => "2023-07-10"
                ],
            ],
        ],
        [
            'nom_projet' => "Projet Delta",
            'description' => "Projet de développement d'une application mobile",
            'partenaire' => ["Aicha", "Dokhe"],
            'activites' => [
                [
                    'nom' => "Réunion de planification",
                    'descriptionA' => "Discussion des objectifs du projet",
                    'date' => "2023-04-15"
                ],
                [
                    'nom' => "Conception de l'interface",
                    'descriptionA' => "Création des maquettes d'interface",
                    'date' => "2023-06-20"
                ],
                [
                    'nom' => "Programmation",
                    'descriptionA' => "Développement de l'application",
                    'date' => "2023-07-15"
                ],
                [
                    'nom' => "Tests et débogage",
                    'descriptionA' => "Vérification et correction des erreurs",
                    'date' => "2023-08-05"
                ],
                [
                    'nom' => "Deploiement",
                    'descriptionA' => "Déployer l'application",
                    'date' => "2023-09-05"
                ],
            ],
        ],
        [
            'nom_projet' => "Projet Echo",
            'description' => "Projet humanitaire pour la construction d'écoles",
            'partenaire' => ["Faye", "Adama"],
            'activites' => [
                [
                    'nom' => "Réunion de planification",
                    'descriptionA' => "Discussion des objectifs du projet",
                    'date' => "2023-04-15"
                ],
                [
                    'nom' => "Évaluation des besoins",
                    'descriptionA' => "Évaluation des besoins éducatifs locaux",
                    'date' => "2023-05-25"
                ],
                [
                    'nom' => "Construction des écoles",
                    'descriptionA' => "Construction des infrastructures scolaires",
                    'date' => "2023-08-20"
                ],
            ],
        ],
    ];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ajouter'])) {
    $projet_select = intval($_POST['select']);
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $nouvelle_activite = [
        "nom" => $nom,
        "descriptionA" => $description,
        "date" => $date,
    ];
    $_SESSION['projets'][$projet_select]['activites'][] = $nouvelle_activite;
}
echo "<h1>Liste des Projets</h1>";

if (isset($_SESSION['projets'])) {
    $projets = $_SESSION['projets'];
    foreach ($projets as $cle => $projet) {
        $tableau_serialise =json_encode($projet);
        echo "<h2>Nom du projet : " . $projet['nom_projet'] . "</h2>";
        echo '<form action="details_projet.php" method="GET">';
        echo '<input type="hidden" name="index_projet" value="' . $cle . '">';
        echo '<input type="submit" name="voir_plus" value="Voir plus">';
         echo '</form>';
        echo "<br><br>";
        echo "<h2>Description du projet : " . $projet['description'] . "<h2>";
        echo "<h2>Le nombre d'activités de ce projet est de : " . count($projet['activites']) . "</h2>";

        echo "<table>";
        echo "<tr>
                <th>Nom de l'activité</th>
                <th>Description de l'activité</th>
                <th>Date d'exécution</th>
            </tr>";

        foreach ($projet['activites'] as $activite) {
            echo "<tr>";
            echo "<td>" . $activite['nom'] . "</td>";
            echo "<td>" . $activite['descriptionA'] . "</td>";
            echo "<td>" . $activite['date'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><br>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <form method="POST">
        <h2>AJOUTER UNE ACTIVITÉ</h2>
        <select name="select" class="select">
            <?php
            if (isset($_SESSION['projets'])) {
                $projets = $_SESSION['projets'];
                foreach ($projets as $cle => $Projet) {
                    echo '<option value="' . $cle . '">' . $Projet['nom_projet'] . '</option>';
                }
            }
            ?>
        </select>
        <input type="text" name="nom" autocomplete="off" placeholder="Entrer le nom de l'activité" class="texte" required>
        <input type="text" name="description" autocomplete="off" placeholder="Entrer la description de l'activité" class="texte" required>
        <b><input type="date" name="date" class="texte" required></b>
        <input type="submit" name="ajouter" value="AJOUTER">
    </form>
</body>
</html>