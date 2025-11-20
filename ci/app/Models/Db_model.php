<?php
namespace App\Models;
use CodeIgniter\Model;
class Db_model extends Model
{
    protected $db;
    public function __construct()
    {
    $this->db = db_connect(); //charger la base de données
    // ou
    // $this->db = \Config\Database::connect();
    }
    
    public function get_all_compte()
    {
        $resultat = $this->db->query("SELECT * FROM t_compte_cpt;");
        //$resultat = $this->db->query("SELECT cpt_pseudo FROM `t_profil_pfl");
        return $resultat->getResultArray();
    }
    public function get_all_act()
    {
        $resultat3 = $this->db->query("SELECT act_titre , act_description,cpt_pseudo,act_date_pub FROM t_actualite_act JOIN t_compte_cpt 
        USING(cpt_id) WHERE act_etat = 'A' ORDER BY act_date_pub LIMIT 5 ;");
        return $resultat3->getResultArray();
    }
    
    public function get_actualite($numero)
    {
        $requete="SELECT * FROM t_actualite_act WHERE act_id=".$numero.";";
        $resultat1 = $this->db->query($requete);
        return $resultat1->getRow();
    }
    public function get_code($code)
    {
        $requete4 = "SELECT * FROM t_message_msg JOIN t_compte_cpt USING(cpt_id) WHERE msg_code='" . $code . "';";
        $resultat4 = $this->db->query($requete4);
        return $resultat4->getRow();
    }
    public function get_membre()
    {
        $requete2="SELECT COUNT(*) AS total FROM t_compte_cpt;";
        $resultat2 = $this->db->query($requete2);
        return $resultat2->getRow();
    }

    public function set_compte($saisie)
    {
        //Récuparation (+ traitement si nécessaire) des données du formulaire
        $login=htmlspecialchars(addslashes($saisie['pseudo']));
        $mot_de_passe=htmlspecialchars(addslashes($saisie['mdp']));
        $sql="INSERT INTO t_compte_cpt (cpt_pseudo,cpt_mdp,cpt_statut) VALUES('".$login."','".$mot_de_passe."','A');";
        return $this->db->query($sql);
    }
    public function set_message($saisie)
    {      
        $email   = htmlspecialchars(addslashes($saisie['email']));
        $objet   = htmlspecialchars(addslashes($saisie['objet']));
        $contenu = htmlspecialchars(addslashes($saisie['contenu']));
        $code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 20);
        $sql = "INSERT INTO t_message_msg (msg_email, msg_objet, msg_contenu, msg_date, msg_code, msg_response, cpt_id) 
                VALUES ('$email', '$objet', '$contenu', CURDATE(), '$code', 'Demande en cours de traitement', NULL)";
        $this->db->query($sql);
        return $code;
    }
    public function connect_compte($u,$p)
    {
        $sql="SELECT cpt_pseudo,cpt_mdp
        FROM t_compte_cpt
        WHERE cpt_pseudo='".$u."'
        AND cpt_mdp='".$p."';";
        $resultat=$this->db->query($sql);
        if($resultat->getNumRows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    }


?>
