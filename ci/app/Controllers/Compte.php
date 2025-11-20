<?php
namespace App\Controllers;
use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;
class Compte extends BaseController
{
    public function __construct()
    {
        helper('form');
        $model = model(Db_model::class);
    //...
    }
    public function lister()
    {
        $model = model(Db_model::class);
        $data['titre']="Liste de tous les comptes";
        $data['logins'] = $model->get_all_compte();
        $data['membre'] = $model->get_membre();
        return view('menu_visiteur')
        . view('templates/haut', $data)
        . view('affichage_comptes')
        . view('templates/bas');
    }
    public function creer()
    {

        // L’utilisateur a validé le formulaire en cliquant sur le bouton
        if ($this->request->getMethod()=="POST")
        {
        if (! $this->validate([
            'pseudo' => 'required|max_length[255]|min_length[2]',
            'mdp' => 'required|max_length[255]|min_length[8]'
        ]))
        {
        // La validation du formulaire a échoué, retour au formulaire !
        return view('menu_visiteur')
        . view('templates/haut', ['titre' => ' veuillez remplir tout les champs correctements'])
        . view('compte/compte_creer')
        . view('templates/bas');
        }
        // La validation du formulaire a réussi, traitement du formulaire
        $recuperation = $this->validator->getValidated();
        $model->set_compte($recuperation);
        $data['le_compte']=$recuperation['pseudo'];
        $data['le_message']="Nouveau nombre de comptes : ";
        //Appel de la fonction créée dans le précédent tutoriel :
        $data['le_total']=$model->get_membre();
        return view('menu_visiteur')
        . view('templates/haut', $data)
        . view('compte/compte_succes')
        . view('templates/bas');
        }
        // L’utilisateur veut afficher le formulaire pour créer un compte
            return view('menu_visiteur')
            . view('templates/haut', ['titre' => 'Créer un compte'])
            . view('compte/compte_creer',)
            . view('templates/bas');
        }

        public function connecter()
        {
        $model = model(Db_model::class);
        helper('form');

        // L’utilisateur a validé le formulaire en cliquant sur le bouton
        if ($this->request->getMethod()=="POST"){
        if (! $this->validate([
        'pseudo' => 'required',
        'mdp' => 'required'
        ]))
        { // La validation du formulaire a échoué, retour au formulaire !
            return view('templates/haut', ['titre' => 'Se connecter'])
            . view('connexion/compte_connecter')
            . view('templates/bas');
        }
        // La validation du formulaire a réussi, traitement du formulaire
        $username=$this->request->getVar('pseudo');
        $password=$this->request->getVar('mdp');
        if ($model->connect_compte($username,$password)==true)
        {
            $session=session();
            $session->set('user',$username);
            return view('templates/haut2')
            . view('menu_administrateur')
            . view('connexion/compte_accueil')
            . view('templates/bas2');
        }
        else
            { return view('templates/haut', ['titre' => 'Se connecter'])
            . view('connexion/compte_connecter')
            . view('templates/bas');
        }
        }
            return view('templates/haut', ['titre' => 'Se connecter'])
                . view('connexion/compte_connecter')
                . view('templates/bas');
        }
        public function afficher_profil()
        {
        $session=session();
        if ($session->has('user'))
        {
                $data['le_message']="Affichage des données du profil ici !!!";
                // A COMPLETER...
                return view('templates/haut2',$data)
                . view('connexion/compte_profil')
                . view('templates/bas2');
            }
            else
            {
                return view('templates/haut', ['titre' => 'Se connecter'])
                . view('connexion/compte_connecter')
                . view('templates/bas');
        }
        }
        public function deconnecter()
        {
            $session=session();
            $session->destroy();
                return view('templates/haut', ['titre' => 'Se connecter'])
                . view('connexion/compte_connecter')
                . view('templates/bas');
        }

}

    