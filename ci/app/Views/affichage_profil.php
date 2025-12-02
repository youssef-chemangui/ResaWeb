<style>
    :root {
        --primary: #4361ee;
        --secondary: #3a0ca3;
        --success: #4cc9f0;
        --warning: #f72585;
        --light: #f8f9fa;
        --dark: #212529;
        --gray: #6c757d;
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
        margin: 0;
        padding: 20px;
        color: var(--dark);
        min-height: 100vh;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-top: 1rem;
    }

    .header-title h1 {
        font-size: 2.2rem;
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0;
    }

    .header-title p {
        color: var(--gray);
        margin: 0.5rem 0 0 0;
        font-size: 1rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
    }

    .btn-primary i {
        font-size: 1.1rem;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.8rem;
        margin-bottom: 3rem;
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4361ee, #4cc9f0);
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        font-size: 1.8rem;
        color: white;
        flex-shrink: 0;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .stat-card:nth-child(1) .stat-icon {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .stat-card:nth-child(2) .stat-icon {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .stat-card:nth-child(3) .stat-icon {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .stat-info {
        flex: 1;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, var(--dark) 0%, var(--gray) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-label {
        color: var(--gray);
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .stat-subtext {
        font-size: 0.85rem;
        color: #adb5bd;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .stat-subtext i {
        font-size: 0.8rem;
    }

    .table-container {
        background: white;
        border-radius: 20px;
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 3rem;
    }

    .table-header {
        padding: 2rem 2rem 1rem;
        border-bottom: 1px solid #e9ecef;
    }

    .table-header h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark);
    }

    .table-summary {
        padding: 1.5rem 2rem;
        background: linear-gradient(90deg, #f8f9fa 0%, #f1f3f5 100%);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e9ecef;
    }

    .total-count {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        color: white;
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .search-filter {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .search-box {
        padding: 10px 16px;
        border: 1px solid #dee2e6;
        border-radius: 50px;
        font-size: 0.95rem;
        width: 250px;
        transition: var(--transition);
    }

    .search-box:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: linear-gradient(90deg, #495057 0%, #6c757d 100%);
    }

    th {
        padding: 1.2rem 1.5rem;
        text-align: left;
        font-weight: 600;
        font-size: 0.9rem;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    tbody tr {
        border-bottom: 1px solid #e9ecef;
        transition: var(--transition);
    }

    tbody tr:hover {
        background-color: #f8f9fa;
    }

    td {
        padding: 1.2rem 1.5rem;
        color: var(--dark);
        font-weight: 500;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .status-badge i {
        font-size: 0.7rem;
    }

    .status-active {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .status-inactive {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .role-badge {
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
    }

    .role-admin {
        background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
        color: #542c85;
    }

    .role-member {
        background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
        color: #1a5fb4;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-state i {
        font-size: 4rem;
        color: #dee2e6;
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        color: var(--gray);
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #adb5bd;
        margin-top: 0;
    }

    @media (max-width: 1024px) {
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        body {
            padding: 10px;
        }

        .header {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }

        .btn-primary {
            width: 100%;
            justify-content: center;
        }

        .stats-container {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .stat-card {
            padding: 1.5rem;
        }

        .table-summary {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }

        .search-box {
            width: 100%;
        }

        .table-container {
            border-radius: 15px;
            overflow-x: auto;
        }

        table {
            min-width: 800px;
        }
    }

    /* Ajout des styles pour les icônes */
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
</style>
</head>
<body>

<div class="container">
    <!-- En-tête -->
    <div class="header">
        <div class="header-title">
            <h1>Gestion des comptes utilisateurs</h1>
            <p>Administration complète des profils et invitations</p>
        </div>
        <a class="btn-primary" href="<?= base_url('index.php/compte/creer_invite') ?>">
            <i class="fas fa-user-plus"></i>
            Créer un invité
        </a>
    </div>

    <!-- Cartes de statistiques -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value"><?= $membre->total ?></div>
                <div class="stat-label">Comptes au total</div>
                <div class="stat-subtext">
                    <i class="fas fa-info-circle"></i>
                    Tous les comptes système
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-id-card"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value"><?= $profil_num->total_profil ?></div>
                <div class="stat-label">Profils actifs</div>
                <div class="stat-subtext">
                    <i class="fas fa-check-circle"></i>
                    Comptes avec profil complet
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-clock"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value"><?= $membre->total - $profil_num->total_profil ?></div>
                <div class="stat-label">Invités</div>
                <div class="stat-subtext">
                    <i class="fas fa-clock"></i>
                    Compte sans profil
                </div>
            </div>
        </div>
    </div>
        </div>
        
        <?php
        if (! empty($logins) && is_array($logins))
        {
            echo '<div>' . $titre . '</div>';
            echo '</div>';
            
            echo "<table>";
            echo "<thead><tr>
                    <th>Pseudo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Rôle</th>
                  </tr></thead>";
            echo "<tbody>";
            
            foreach ($logins as $pseudos)
            {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($pseudos["cpt_pseudo"]) . "</td>";
                echo "<td>" . htmlspecialchars($pseudos["pfl_nom"]) . "</td>";
                echo "<td>" . htmlspecialchars($pseudos["pfl_prenom"]) . "</td>";
                echo "<td>" . htmlspecialchars($pseudos["pfl_num"]) . "</td>";
                echo "<td>" . htmlspecialchars($pseudos["pfl_adresse"]) . " - " . htmlspecialchars($pseudos["adr_code_postal"]) . "</td>";
                echo "<td>" . htmlspecialchars($pseudos["pfl_email"]) . "</td>";
                echo "<td><span class='status-badge ";
                if ($pseudos["cpt_statut"] == 'A') {
                    echo "status-active'>Activé";
                } else {
                    echo "status-inactive'>Désactivé";
                }
                echo "</span></td>";
                echo "<td><span class='role-badge ";
                if ($pseudos["pfl_role"] == 'A') {
                    echo "role-admin'>Admin";
                } else if ($pseudos["pfl_role"] == 'M') {
                    echo "role-member'>Membre";
                }else{
                    echo "role-invité'>Invité";
                }
                echo "</span></td>";

                echo "</tr>";
            }

            
            echo "</tbody></table>";
        }
        else {
            echo "<div class='empty-state'>";
            echo "<h3>Aucun compte pour le moment</h3>";
            echo "<p>Les comptes utilisateurs apparaîtront ici une fois créés.</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>