<?php
if (isset($suivi)) {

    echo "
    <div style='
        max-width: 600px;
        margin: 40px auto;
        padding: 20px 30px;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
        line-height: 1.6;
        text-align: center;
    '>

        <h2 style='color:#4a86ff; margin-bottom:15px;'>
            $titre
        </h2>

        <p style=\"
            color:#333;
            background:#ffecec;
            padding:12px;
            border-radius:10px;
            margin-bottom:20px;
            font-size:18px;
            border-left:5px solid red;
        \">
            <strong style='color:red;'>Objet :</strong> $suivi->msg_contenu
        </p>

        <p style=\"
            background:#eef4ff;
            padding:12px;
            border-radius:10px;
            font-size:18px;
            border-left:5px solid #4a86ff;
        \">
            <strong style='color:blue;'>Réponse :</strong> $suivi->msg_response
        </p>
    ";
    if ($suivi->cpt_id === null) {

        echo "
        <p style=\"
            background:#eef4ff;
            padding:12px;
            border-radius:10px;
            font-size:18px;
            border-left:5px solid #4a86ff;
        \">
            <span style='color:red;'>Aucun administrateur n'a encore répondu.</span>
        </p>
        ";

    } else {

        echo "
        <p style=\"
            background:#eef4ff;
            padding:12px;
            border-radius:10px;
            font-size:18px;
            border-left:5px solid #4a86ff;
        \">
            <strong style='color:blue;'>L'admin qui a répondu :</strong> $suivi->cpt_pseudo
        </p>
        ";
    }

    echo "</div>";

} else {

    echo "
    <p style='
        color:white;
        background:red;
        padding:15px;
        text-align:center;
        font-size:18px;
        border-radius:10px;
        max-width:400px;
        margin:40px auto;
        font-family:Arial, sans-serif;
    '>
        Le code n'existe pas ❌
    </p>
    ";
}
?>
