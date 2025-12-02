
<?php if (!empty($res) && is_array($res)): ?>

<div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px; font-family:Arial, sans-serif; margin-top:20px;">

<?php foreach ($res as $r): ?>

    <div style="
        width:280px;
        background:white;
        border-radius:10px;
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
        overflow:hidden;
        display:flex;
        flex-direction:column;
        text-align:center;
    ">
        <!-- Image -->
        <div style="height:180px; overflow:hidden;">
            <img src="<?= base_url('documents/' . $r['res_photo']) ?>" 
                 alt="Image"
                 style="width:100%; height:100%; object-fit:cover;">
        </div>

        <!-- Contenu -->
        <div style="padding:15px;">
            <h3 style="margin:0; font-size:20px; color:#333;"><?= $r['res_nom']; ?></h3>
            <p style="color:#666; margin:10px 0;">
                <?= $r['res_descriptif']; ?>
            </p>

            <p style="margin:5px 0; font-size:14px;">
                <strong>Jauge min :</strong> <?= $r['res_jauge_min']; ?><br>
                <strong>Jauge max :</strong> <?= $r['res_jauge_max']; ?>
            </p>

            <!-- Bouton supprimer -->
            <form method="get" action="<?= base_url('index.php/reservation/supprimer/' . $r['res_id']) ?>">
                <button type="submit" 
                    style="
                        margin-top:10px;
                        background:#d9534f;
                        color:white;
                        border:none;
                        padding:10px 15px;
                        border-radius:6px;
                        cursor:pointer;
                        font-size:14px;
                        transition:0.2s;
                    "
                    onmouseover="this.style.background='#c9302c'"
                    onmouseout="this.style.background='#d9534f'"
                >
                    Supprimer
                </button>
            </form>
        </div>
    </div>

<?php endforeach; ?>

</div>

<?php else: ?>
    <p style="text-align:center;">Aucune ressource trouvée.</p>
<?php endif; ?>


<h2 style="text-align:center; color:#333; margin:30px 0 20px 0;">Ajouter une ressource</h2>

<form action="<?= base_url('index.php/reservation/insert'); ?>" method="post" 
      style="
          max-width:600px;
          margin:0 auto 40px auto;
          padding:30px;
          background:white;
          border-radius:12px;
          box-shadow:0 4px 15px rgba(0,0,0,0.1);
          font-family:Arial, sans-serif;
      ">

    <!-- Affichage erreurs validation -->
    <?php if (isset($validation)) : ?>
        <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:6px; margin-bottom:20px;">
            <?= $validation->listErrors(); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error)) : ?>
        <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:6px; margin-bottom:20px;">
            <?= $error ?>
        </div>
    <?php endif; ?>



    <div style="margin-bottom:20px;">
        <label style="display:block; margin-bottom:8px; font-weight:bold; color:#333; font-size:14px;">Nom :</label>
        <input type="text" name="res_nom" 
               style="width:100%; padding:12px; border:2px solid #e1e1e1; border-radius:8px; font-size:14px;"
        >
    </div>

    <div style="margin-bottom:20px;">
        <label style="display:block; margin-bottom:8px; font-weight:bold; color:#333; font-size:14px;">Descriptif :</label>
        <textarea name="res_descriptif" 
                  style="width:100%; padding:12px; border:2px solid #e1e1e1; border-radius:8px; min-height:100px;"
        ></textarea>
    </div>

    <div style="margin-bottom:20px;">
        <label style="display:block; margin-bottom:8px; font-weight:bold; color:#333; font-size:14px;">Matériel :</label>
        <input type="text" name="res_materiel" 
               style="width:100%; padding:12px; border:2px solid #e1e1e1; border-radius:8px; font-size:14px;"
        >
    </div>

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
        <div>
            <label style="display:block; margin-bottom:8px; font-weight:bold; color:#333; font-size:14px;">Jauge min :</label>
            <input type="number" name="res_jauge_min" 
                   style="width:100%; padding:12px; border:2px solid #e1e1e1; border-radius:8px;"
            >
        </div>

        <div>
            <label style="display:block; margin-bottom:8px; font-weight:bold; color:#333; font-size:14px;">Jauge max :</label>
            <input type="number" name="res_jauge_max" 
                   style="width:100%; padding:12px; border:2px solid #e1e1e1; border-radius:8px;"
            >
        </div>
    </div>

    <input type="hidden" name="res_etat" value="D">
    <input type="hidden" name="res_photo" value="">

    <button type="submit" 
            style="
                width:100%;
                background:#28a745;
                color:white;
                border:none;
                padding:14px;
                border-radius:8px;
                font-size:16px;
                font-weight:bold;
                cursor:pointer;
            ">
        Ajouter la ressource
    </button>

</form>
