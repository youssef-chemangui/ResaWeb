<!-- Le design complet -->
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">

<style>
    ::selection {color: #fff;background: #9FBE5A;}
    body {
        width: 100%;
        margin: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        background: linear-gradient(#f4d03f);
    }

    h1 {
        font: 400 40px 'Roboto Slab', serif;
        color: #fff;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 40px;
    }

    .form__contact {
        max-width: 600px;
        width: 100%;
        border-left: 30px solid white;
        border-image: url(data:image/svg+xml;base64,PD94bWwgdmV...) 5% 100% repeat;
        border-image-width: 0 0 0 30px;
        animation: init 1s forwards;
    }

    fieldset {
        padding: 30px 30px 40px 80px;
        background: #fff linear-gradient(rgba(0,0,0,.1) 1px, transparent 0) 0 20px / 100% 40px;
        font: 24px 'Shadows Into Light', cursive;
        border: none;
        border-radius: 0 20px 20px 0;
        position: relative;
    }

    p {margin: 0 0 40px; line-height: 40px; color: #333;}
    .line-input {
        border: none;
        border-bottom: 1px dashed #7DB665;
        background: transparent;
        outline: none;
        font: 24px 'Shadows Into Light';
        color: #7DB665;
        width: auto;
        min-width: 120px;
        display: inline-block;
    }

    .line-input::placeholder {
        color: #DDD;
    }

    textarea.line-input {
        width: 100%;
        resize: none;
    }

    button {
        margin-top: 40px;
        float: right;
        border: none;
        background: transparent;
        font: 24px 'Shadows Into Light';
        color: #E08183;
        cursor: pointer;
    }
</style>

<?= form_open('/message/creer', ['class' => 'form__contact']) ?>
<?= csrf_field() ?>

<fieldset>
    <P><?php echo $titre; ?></P>
    <?php if (!empty($erreur)) : ?>
        <p style="color:red;"><?= $erreur ?></p>
    <?php endif; ?>

    <p>
        Mon email est
        <input name="email" class="line-input">.
    </p>

    <p>
        Ma demande concerne
        <input type="text" name="objet" class="line-input" >.
    </p>

    <p>
        Ce qui est arrivé c’est que
        <textarea name="contenu" class="line-input" ></textarea>.
    </p>

    <button type="submit">Envoyer ➤</button>
</fieldset>

</form>
