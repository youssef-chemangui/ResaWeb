<?php
    namespace App\Controllers;
    use App\Models\Db_model;
    use CodeIgniter\Exceptions\PageNotFoundException;
    class Accueil extends BaseController
    {
        public function afficher()
        {
            $model = model(Db_model::class);
            $data['titre'] = "Liste des actualités";
            $data['actualites'] = $model->get_all_act();
    
            return view('menu_visiteur')
                 . view('templates/haut', $data)
                 . view('affichage_accueil')
                 . view('templates/bas');
        }

    }
?>

