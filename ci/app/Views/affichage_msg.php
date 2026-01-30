    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        
        .table-container {
            max-width: 1200px;
            margin: 30px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        
        .table-header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 1.8rem;
        }
        
        .table-summary {
            background-color: #f8f9fa;
            padding: 15px 20px;
            border-bottom: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .total-count {
            background-color: #667eea;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #4a5568;
            color: white;
        }
        
        th {
            padding: 16px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        tbody tr {
            border-bottom: 1px solid #eaeaea;
            transition: background-color 0.2s ease;
        }
        
        tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }
        
        tbody tr:nth-child(even):hover {
            background-color: #f1f3f4;
        }
        
        td {
            padding: 14px 12px;
            color: #4a5568;
        }
        
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-active {
            background-color: #e6fffa;
            color: #234e52;
            border: 1px solid #81e6d9;
        }
        
        .status-inactive {
            background-color: #fed7d7;
            color: #742a2a;
            border: 1px solid #fc8181;
        }
        
        .role-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .role-admin {
            background-color: #e6e6ff;
            color: #434190;
            border: 1px solid #9f7aea;
        }
        
        .role-member {
            background-color: #f0fff4;
            color: #22543d;
            border: 1px solid #68d391;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #718096;
        }
        
        .empty-state h3 {
            font-weight: 500;
            margin-bottom: 10px;
        }
        
        @media (max-width: 768px) {
            .table-container {
                border-radius: 8px;
                margin: 15px;
            }
            
            .table-header h2 {
                font-size: 1.4rem;
            }
            
            .table-summary {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
            
            th, td {
                padding: 12px 8px;
                font-size: 0.9rem;
            }
        }
    </style>
<h1><?= $titre ?></h1>

<?php if (!empty($news)): ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Objet</th>
                <th>Contenu</th>
                <th>Code pour la suivi</th>
                <th>Date</th>
                <th>Réponse actuelle</th>
                <th>Répondeur</th>
                <th>Nouvelle réponse</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($news as $msg): ?>
                <tr>
                    <td><?= $msg['msg_id'] ?></td>
                    <td><?= $msg['msg_email'] ?></td>
                    <td><?= $msg['msg_objet'] ?></td>
                    <td><?= $msg['msg_contenu'] ?></td>
                    <td><?= $msg['msg_code'] ?></td>
                    <td><?= $msg['msg_date'] ?></td>
                    <td><?= $msg['msg_response'] ?></td>
                    <td><?= $msg['cpt_pseudo'] ?></td>
                    <td>
                        <?php if ($msg['msg_response'] != 'Demande en cours de traitement'): ?>
                            <span style="color:green; font-weight:bold;">Réponse envoyée</span>
                        <?php else: ?>
                            <form method="post" action="<?= base_url('index.php/message/repondre/'.$msg['msg_id']) ?>">
                                <input type="text" name="msg_response" style="width:200px">
                                <button type="submit">Envoyer</button>
                            </form>
                        <?php endif; ?>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Pas de message pour le moment</p>
<?php endif; ?>
