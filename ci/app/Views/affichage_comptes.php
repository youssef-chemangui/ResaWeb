
<?php
if (! empty($logins) && is_array($logins))
{
    echo "<table style='border-collapse: collapse; width: 50%; margin: 20px auto; font-family: Arial, sans-serif;'>";
    echo "<tr style='background-color:rgb(255, 166, 0); color: white;'>
            <th> $titre $membre->total </th><th> statut</th>
          </tr>";
    
    foreach ($logins as $pseudos)
    {
        echo "<tr style='background-color: #f9f9f9; text-align: center; border-bottom: 1px solid #ddd;'>";
        echo "<td style='padding: 10px;'>" . htmlspecialchars($pseudos["cpt_pseudo"]) . "</td>";
        echo "<td style='padding: 10px;'>" . htmlspecialchars($pseudos["cpt_statut"]) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
}
else {
    echo("<h3>Aucun compte pour le moment</h3>");
}
?>



