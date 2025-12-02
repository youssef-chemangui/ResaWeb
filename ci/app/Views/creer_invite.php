

<div style="
    max-width:500px;
    margin:0 auto 50px auto;
    padding:40px;
    background:white;
    border-radius:12px;
    box-shadow:0 4px 20px rgba(0,0,0,0.1);
    font-family:Arial, sans-serif;
">
    <h1 style="
        text-align:center;
        color:#333;
        margin-bottom:30px;
        font-size:28px;
        font-weight:600;
    ">Créer un invité</h1>

    <?php echo form_open('/compte/creer_invite', ['style' => 'display:flex; flex-direction:column; gap:25px;']); ?>
        <?= csrf_field() ?>

        <div style="display:flex; flex-direction:column; gap:8px;">
            <label for="pseudo" style="
                font-weight:600;
                color:#333;
                font-size:14px;
                margin-bottom:5px;
            ">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" 
                   style="
                       width:100%;
                       padding:14px;
                       border:2px solid #e1e5e9;
                       border-radius:8px;
                       font-size:15px;
                       transition:all 0.3s ease;
                       box-sizing:border-box;
                       background:#f8f9fa;
                   "
                   onfocus="this.style.borderColor='rgb(255,166,0)'; this.style.background='white'; this.style.outline='none'; this.style.boxShadow='0 0 0 3px rgba(255,166,0,0.1)'"
                   onblur="this.style.borderColor='#e1e5e9'; this.style.background='#f8f9fa'; this.style.boxShadow='none'"
                   placeholder="Entrez le pseudo">
        </div>
        <?= validation_show_error('pseudo') ?>
        

        <div style="display:flex; flex-direction:column; gap:8px;">
            <label for="mdp" style="
                font-weight:600;
                color:#333;
                font-size:14px;
                margin-bottom:5px;
            ">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" 
                   style="
                       width:100%;
                       padding:14px;
                       border:2px solid #e1e5e9;
                       border-radius:8px;
                       font-size:15px;
                       transition:all 0.3s ease;
                       box-sizing:border-box;
                       background:#f8f9fa;
                   "
                   onfocus="this.style.borderColor='rgb(255,166,0)'; this.style.background='white'; this.style.outline='none'; this.style.boxShadow='0 0 0 3px rgba(255,166,0,0.1)'"
                   onblur="this.style.borderColor='#e1e5e9'; this.style.background='#f8f9fa'; this.style.boxShadow='none'"
                   placeholder="Entrez le mot de passe">
        </div>
        <?= validation_show_error('mdp') ?>

        <input type="submit" 
               value="Créer l'invité" 
               style="
                   background:rgb(255,166,0);
                   color:white;
                   border:none;
                   padding:16px;
                   border-radius:8px;
                   font-size:16px;
                   font-weight:600;
                   cursor:pointer;
                   transition:all 0.3s ease;
                   margin-top:10px;
               "
               onmouseover="this.style.background='rgb(230,149,0)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(255,166,0,0.3)'"
               onmouseout="this.style.background='rgb(255,166,0)'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
    </form>
</div>