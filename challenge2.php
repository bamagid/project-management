<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Liste des Projets</h1>
    <?php
$projets = [
    'projetA' => [
        'nom' => "Projet Alpha",
        'description' => "Un projet pilote pour tester de nouvelles technologies",
        'activites' => [
            "act1" => [
                'nom' => "Activité de lancement",
                "descriptionA" => "Préparation et lancement du projet",
                "date" => "2023-05-10"
            ],
            "act2" => [
                "nom" => "Analyse des données",
                "descriptionA" => "Collecte et analyse des données initiales",
                "date" => "2023-05-20"
            ],
        ],
    ],
    'projetB' => [
        'nom' => "Projet Beta",
        'description' => "Expansion d'une application existante",
        'activites' => [
            "act1" => [
                'nom' => "Réunion de planification",
                "descriptionA" => "Discussion des objectifs du projet",
                "date" => "2023-04-15"
            ],
            "act2" => [
                "nom" => "Conception de l'interface utilisateur",
                "descriptionA" => "Création de maquettes et prototypes",
                "date" => "2023-04-30"
            ],
            "act3" => [
                "nom" => "Intégration de la base de données",
                "descriptionA" => "Configuration de la base de données",
                "date" => "2023-05-15"
            ],
            "act4" => [
                "nom" => "Programmation",
                "descriptionA" => "Développement de l'application",
                "date" => "2023-07-15"
            ]
        ],
    ],
    'projetC' => [
        'nom' => "Projet Charlie",
        'description' => "Projet de recherche scientifique en biologie marine",
        'activites' => [
            "act1" => [
                'nom' => "Collecte d'échantillons",
                "descriptionA" => "Prélèvement d'échantillons en mer",
                "date" => "2023-07-10"
            ],
        ],
    ],
    'projetD' => [
        'nom' => "Projet Delta",
        'description' => "Projet de développement d'une application mobile",
        'activites' => [
            "act1" => [
                'nom' => "Réunion de planification",
                "descriptionA" => "Discussion des objectifs du projet",
                "date" => "2023-04-15"
            ],
            "act2" => [
                'nom' => "Conception de l'interface",
                "descriptionA" => "Création des maquettes d'interface",
                "date" => "2023-06-20"
            ],
            "act3" => [
                "nom" => "Programmation",
                "descriptionA" => "Développement de l'application",
                "date" => "2023-07-15"
            ],
            "act4" => [
                "nom" => "Tests et débogage",
                "descriptionA" => "Vérification et correction des erreurs",
                "date" => "2023-08-05"
            ],
            "act5" => [
                "nom" => "Deploiement",
                "descriptionA" => "Deployer l'application",
                "date" => "2023-09-05"
            ],
        ],
    ],
    'projetE' => [
        'nom' => "Projet Echo",
        'description' => "Projet humanitaire pour la construction d'écoles",
        'activites' => [
            "act1" => [
                'nom' => "Réunion de planification",
                "descriptionA" => "Discussion des objectifs du projet",
                "date" => "2023-04-15"
            ],
            "act2" => [
                'nom' => "Évaluation des besoins",
                "descriptionA" => "Évaluation des besoins éducatifs locaux",
                "date" => "2023-05-25"
            ],
            "act3" => [
                "nom" => "Construction des écoles",
                "descriptionA" => "Construction des infrastructures scolaires",
                "date" => "2023-08-20"
            ],
        ],
    ],
];
    $projetsTri = $projets;
    $projetsTriKeys = array_keys($projetsTri);
    for ($i = 0; $i < count($projetsTriKeys) - 1; $i++) {
        for ($j = $i + 1; $j < count($projetsTriKeys); $j++) {
            $nombreA1 = count($projetsTri[$projetsTriKeys[$i]]['activites']);
            $nombreA2 = count($projetsTri[$projetsTriKeys[$j]]['activites']);
            if ($nombreA2 < $nombreA1) {
                $temp = $projetsTri[$projetsTriKeys[$i]];
                $projetsTri[$projetsTriKeys[$i]] = $projetsTri[$projetsTriKeys[$j]];
                $projetsTri[$projetsTriKeys[$j]] = $temp;
            }
        }
    }


    foreach ($projetsTri as $cle_projet => $detailsProjet) {
        echo "<h2>Nom du projet : " . $detailsProjet['nom'] . "</h2>";
        echo "<h2>Description du projet : " . $detailsProjet['description'] . "<h2>";
        $nombreActivites = count($detailsProjet['activites']);
        echo "<h2>Le nombre d'activités de ce projet est de : " . $nombreActivites . "</h2>";
        echo "<table>";
        echo "<tr>
        <th>Nom de l'activité</th>
        <th>Description de l'activité</th>
        <th>Date d'exécution</th>
        </tr>";
        foreach ($detailsProjet['activites'] as $cle_activite => $details_activite) {
            echo "<tr>";
            echo "<td>" . $details_activite['nom'] . "</td>";
            echo "<td>" . $details_activite['descriptionA'] . "</td>";
            echo "<td>" . $details_activite['date'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><br>";
    }
    ?>
</body>
</html>
