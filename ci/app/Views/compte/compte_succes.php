<?php
echo "
<div style='
    max-width: 600px;
    margin: 40px auto;
    padding: 25px 30px;
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
    text-align: center;
'>

    <h2 style='
        color: #28a745;
        margin-bottom: 15px;
        font-size: 28px;
        font-weight: bold;
    '>
        🎉 Bravo !
    </h2>

    <p style='
        color: #333;
        font-size: 18px;
        margin-bottom: 20px;
    '>
        Le formulaire a été rempli avec succès.<br>
        Le compte suivant a été ajouté :
    </p>

    <div style='
        background: #f4faff;
        border-left: 5px solid #007bff;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 18px;
        color: #0056b3;
        text-align:left;
    '>
        <strong>Compte :</strong> $le_compte
    </div>

    <div style='
        background: #e9ffe9;
        border-left: 5px solid #28a745;
        padding: 15px;
        border-radius: 10px;
        font-size: 18px;
        color: #1e7e34;
        text-align:left;
    '>
        <strong>". $le_message ."</strong> " . $le_total->total . "
    </div>

</div>
";
?>
