<?php
session_start();
$_SESSION['projets'];

if (isset($_GET['voir_plus']) &&isset($_GET['index_projet'])){
    $projet_id = intval($_GET['index_projet']);
    if (array_key_exists($projet_id,$_SESSION['projets'])) {
        $projet_selectionne = $_SESSION['projets'][$projet_id];
            echo "<!DOCTYPE html>
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
            
            <body>";
            echo "<h2>Nom du projet : " .$projet_selectionne['nom_projet'] . "</h2>";
            echo "<h2>Description du projet : " . $projet_selectionne['description'] . "<h2>";
            echo "<h2>Partenaires du projet : " . implode(", ",$projet_selectionne['partenaire']) . "</h2>";
            echo "<h2>Le nombre d'activités de ce projet est de : " . count($projet_selectionne['activites']) . "</h2>";
            echo "<table>";
            echo "<tr>
                    <th>Nom de l'activité</th>
                    <th>Description de l'activité</th>
                    <th>Date d'exécution</th>
                </tr>";
    
            foreach ($projet_selectionne['activites'] as $activite) {
                echo "<tr>";
                echo "<td>" . $activite['nom'] . "</td>";
                echo "<td>" . $activite['descriptionA'] . "</td>";
                echo "<td>" . $activite['date'] . "</td>";
                echo "</tr>";
            }
    
            echo "</table>";
            echo "<br><br>";
            echo"</body>
            </html>";

}else{
    echo "Projet non trouvé.";
}
}
?>