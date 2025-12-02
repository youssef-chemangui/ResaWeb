<?php
namespace App\Controllers;

use App\Models\Db_model;
use CodeIgniter\Controller;

class Reservation extends Controller
{
    public function lister_rsv()
    {
            $session = session();

            if (! $session->has('user')) {
                return redirect()->to('/connexion');
            }

            $pseudo = $session->get('user');

            $model = model(Db_model::class);

            $user = $model->get_id_by_pseudo($pseudo);
            $id = $user['cpt_id'];

            $role = $model->get_role_by_pseudo($pseudo);
            $data['titre'] = "Liste des réservations";
            $date = $this->request->getGet('date');

            if ($date) {
                if ($role && $role['pfl_role'] === 'A') {
                    $data['rsv'] = $model->get_rsv_by_date_admin($date);
                } else {
                    $data['rsv'] = $model->get_rsv_by_date($id, $date);
                }

                $data['selected_date'] = $date;

            } else {
                $data['rsv'] = [];
                $data['selected_date'] = null;
            }


            if ($role && $role['pfl_role'] === 'A') {
                $menu = 'menu_administrateur';
            } else {
                $menu = 'menu_membre';
            }

            return view('templates/haut2', $data)
                . view($menu)
                . view('affichage_rsv', $data)
                . view('templates/bas2');
        }




    public function lister_res()
    {
        $session = session();
    
        if (! $session->has('user')) {
            return redirect()->to('/connexion');
        }
    
        $pseudo = $session->get('user');
    
        $model = model(Db_model::class);
    
        $user = $model->get_id_by_pseudo($pseudo);
    
        $role = $model->get_role_by_pseudo($pseudo);
        $data['titre'] = "Liste des ressources";
        $data['res'] = $model->get_all_res();

        if ($role && $role['pfl_role'] === 'A') {
            $menu = 'menu_administrateur';
        } else {
            $menu = 'menu_membre';
        }
        
        return view('templates/haut2', $data)
            . view($menu)
            . view('affichage_ressources', $data)
            . view('templates/bas2');
    }
    
    public function supprimer($id)
    {
        $session = session();

        if (! $session->has('user')) {
            return redirect()->to('/connexion');
        }

        $model = model(Db_model::class);
        $model->supprimer_res($id);

        $data['res'] = $model->get_all_res();
        $data['titre'] = "Liste des ressources";
        return view('templates/haut2', $data)
            . view('menu_administrateur')
            . view('affichage_ressources', $data)
            . view('templates/bas2');
    }
    public function insert()
    {
        $session = session();

        if (!$session->has('user')) {
            return redirect()->to('/connexion');
        }
        

        $model = model(Db_model::class);

        if ($this->request->getMethod() === "POST") {
            $data['res'] = $model->get_all_res();
            $data['titre'] = "Liste des ressources";

        if (!$this->validate([
            'res_nom' => [
                'label' => 'Nom de la ressource',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required'   => 'Le champ {field} est obligatoire.',
                    'max_length' => 'Le champ {field} ne peut pas dépasser 255 caractères.'
                ]
            ],

            'res_jauge_min' => [
                'label' => 'Jauge minimale',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Le champ {field} est obligatoire.',
                    'integer'  => 'Le champ {field} doit être un nombre entier.'
                ]
            ],

            'res_jauge_max' => [
                'label' => 'Jauge maximale',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Le champ {field} est obligatoire.',
                    'integer'  => 'Le champ {field} doit être un nombre entier.'
                ]
            ]
        ])) {
                return view('templates/haut2', ['titre' => 'Erreur'])
                    . view('menu_administrateur',$data)
                    . view('affichage_ressources', ['validation' => $this->validator])
                    . view('templates/bas2');
            }

            $donnees = $this->request->getPost();

            if ($donnees['res_jauge_min'] > $donnees['res_jauge_max']) {
                return view('templates/haut2', ['titre' => 'Erreur'])
                    . view('menu_administrateur',$data)
                    . view('affichage_ressources', [
                        'validation' => $this->validator,
                        'error'      => "La jauge minimale doit être inférieure ou égale à la jauge maximale."
                    ])
                    . view('templates/bas2');
            }

            $model->set_ressource($donnees);

            $data['res'] = $model->get_all_res();
            $data['titre'] = "Liste des ressources";

            return view('templates/haut2', ['titre' => 'Ressources'])
                . view('menu_administrateur')
                . view('affichage_ressources', $data)
                . view('templates/bas2');
        }
    }


        


    
}
