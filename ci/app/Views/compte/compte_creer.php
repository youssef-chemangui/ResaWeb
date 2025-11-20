
<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #eceffc;
    margin: 0;
    }

    .login-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 50px 40px;
    color: white;
    background: rgba(0, 0, 0, 0.8);
    border-radius: 10px;
    box-shadow: 0 0.4px 0.4px rgba(128, 128, 128, 0.109),
                0 1px 1px rgba(128, 128, 128, 0.155),
                0 2.1px 2.1px rgba(128, 128, 128, 0.195),
                0 4.4px 4.4px rgba(128, 128, 128, 0.241),
                0 12px 12px rgba(128, 128, 128, 0.35);
    }

    .login-form h1 {
    margin: 0 0 24px 0;
    }

    .login-form .form-input-material {
    margin: 12px 0;
    }

    .login-form .btn {
    width: 100%;
    margin: 18px 0 9px 0;
    padding: 8px 20px;
    border-radius: 0;
    position: relative;
    overflow: hidden;
    background: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    transition: box-shadow 0.6s;
    }

    .login-form .btn::before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(120deg, transparent, #007bff, transparent);
    transform: translateX(-100%);
    transition: transform 0.6s;
    }

    .login-form .btn:hover {
    background: transparent;
    box-shadow: 0 0 20px 10px hsla(204, 70%, 53%, 0.5);
    }

    .login-form .btn:hover::before {
    transform: translateX(100%);
    }

</style>

<div class="login-form">
    <h1><?php echo $titre; ?></h1>
    <?php echo form_open('/compte/creer'); ?>
        <?= csrf_field() ?>
        <div class="form-input-material">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo">
        </div>
        <div class="form-input-material">
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp">
        </div>
        <input type="submit" class="btn" name="submit" value="Créer un nouveau compte">
    </form>
</div>
