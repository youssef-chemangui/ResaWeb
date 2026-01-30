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
        $resultat = $this->db->query("SELECT * FROM t_compte_cpt JOIN t_profil_pfl USING(cpt_id);;");
        //$resultat = $this->db->query("SELECT cpt_pseudo FROM `t_profil_pfl");
        return $resultat->getResultArray();
    }
    public function get_all_profil()
    {
        $resultat = $this->db->query("SELECT * FROM v_all_profil;");
        return $resultat->getResultArray();
    }

    public function get_all_profil_membre()
    {
        $resultat = $this->db->query("SELECT * FROM t_compte_cpt JOIN t_profil_pfl USING(cpt_id);");
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
        $requete4 = "SELECT * FROM t_message_msg LEFT JOIN t_compte_cpt USING(cpt_id) WHERE msg_code='" . $code . "';";
        $resultat4 = $this->db->query($requete4);
        return $resultat4->getRow();
    }
    public function get_membre()
    {
        $query = $this->db->query("SELECT get_total_membres() AS total;");
        return $query->getRow();
    }




    public function set_compte($saisie)
    {
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
    public function connect_compte($u, $p)
    {
        $u = addslashes($u);  
        $sql = "SELECT cpt_id, cpt_pseudo, cpt_mdp
                FROM t_compte_cpt
                WHERE cpt_pseudo = '".$u."'";

        $query = $this->db->query($sql);

        if ($query->getNumRows() == 0) {
            return false;
        }

        $user = $query->getRow();
        $stored = $user->cpt_mdp;

        $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";
        $sha256 = hash('sha256', $salt . $p);
        $md5 = md5($p);

        if ($stored === $sha256) {
            return $user;
        }
        if ($stored === $md5) {

            $new_hash = $sha256;

            $update_sql = "UPDATE t_compte_cpt
                        SET cpt_mdp = '".$new_hash."'
                        WHERE cpt_id = ".$user->cpt_id;
            $this->db->query($update_sql);

            return $user;
        }
        return false;
    }



    public function get_profil($u)
    {
        $sql = "SELECT *
                FROM t_profil_pfl
                JOIN t_compte_cpt USING(cpt_id)
                WHERE cpt_pseudo = '".$u."';";

        $query = $this->db->query($sql);

        if ($query->getNumRows() > 0) {
            return $query->getRowArray(); 
        }

        return false;
    }
    public function get_id_by_pseudo($pseudo)
    {
        $sql = "SELECT cpt_id FROM t_compte_cpt WHERE cpt_pseudo = ?";
        $query = $this->db->query($sql, [$pseudo]);
        return $query->getRowArray();
    }
    
    public function get_role_by_pseudo($pseudo)
    {
        $sql = "SELECT *
                FROM t_profil_pfl 
                JOIN t_compte_cpt USING (cpt_id)
                WHERE cpt_pseudo = '".$pseudo."'";
        $query = $this->db->query($sql);
        return $query->getRowArray();
    }
    public function get_profil_by_pseudo($pseudo)
    {
        $sql = "SELECT *
                FROM t_compte_cpt 
                LEFT JOIN t_profil_pfl USING (cpt_id)
                WHERE cpt_pseudo = '".$pseudo."'";

        $query = $this->db->query($sql);
        return $query->getRowArray();
    }



    public function get_all_msg()
    {
        $resultat_message = $this->db->query("SELECT * FROM t_message_msg LEFT JOIN t_compte_cpt USING(cpt_id) ORDER BY 
        CASE 
        WHEN msg_response = 'Demande en cours de traitement' THEN 0 
        ELSE 1 
    END,
    msg_date DESC;");
        return $resultat_message->getResultArray();
    }
    public function get_rsv($id)
    {
        $reservations = $this->db->query("SELECT * FROM t_reservation_rsv 
            JOIN t_participation_par USING (rsv_id)
            LEFT JOIN t_ressource_res USING(res_id)
            WHERE cpt_id = ".$id."
        ")->getResultArray();
        foreach ($reservations as &$r) {
            $r['participants'] = $this->get_participants_by_rsv($r['rsv_id']);
        }

        return $reservations;
        
    }
    public function get_num_rsv($id)
    {
            $requete2 = "SELECT COUNT(*) AS total FROM t_reservation_rsv 
                        JOIN t_participation_par p USING (rsv_id)
                        WHERE cpt_id = ".$id." AND rsv_date_reservation >= CURDATE();";
                        
            $resultat2 = $this->db->query($requete2);
            return $resultat2->getRow();
    }

    public function get_profils_num()
    {
            $requete2 = "SELECT COUNT(*) AS total_profil FROM t_profil_pfl;";
                        
            $resultat2 = $this->db->query($requete2);
            return $resultat2->getRow();
    }

    public function get_rsv_date($id)
    {
        $reservations = $this->db->query("SELECT * FROM t_reservation_rsv 
            JOIN t_participation_par p USING (rsv_id)
            LEFT JOIN t_ressource_res USING(res_id)
            WHERE cpt_id = ".$id." AND rsv_date_reservation >= CURDATE()
        ")->getResultArray();
        foreach ($reservations as &$r) {
            $r['participants'] = $this->get_participants_by_rsv($r['rsv_id']);
        }

        return $reservations;
    }
    public function get_rsv_by_date($id, $date)
    {
        $reservations = $this->db->query("
            SELECT * FROM t_reservation_rsv
            JOIN t_participation_par p USING (rsv_id)
            WHERE cpt_id = ".$id."
            AND rsv_date_reservation = '".$date."'
        ")->getResultArray();

        foreach ($reservations as &$r) {
            $r['participants'] = $this->get_participants_by_rsv($r['rsv_id']);
        }

        return $reservations;
    }
    public function get_rsv_by_date_admin($date)
    {
        $reservations = $this->db->query("
            SELECT * FROM t_reservation_rsv
            JOIN t_participation_par p USING (rsv_id)
            WHERE rsv_date_reservation = '".$date."'
        ")->getResultArray();

        foreach ($reservations as &$r) {
            $r['participants'] = $this->get_participants_by_rsv($r['rsv_id']);
        }

        return $reservations;
    }



    public function get_participants_by_rsv($rsv_id)
    {
        $query = $this->db->query("CALL get_participants_by_rsv_proc(".$rsv_id.")");
        return $query->getResultArray();
    }


    public function get_invites()
    {
        $sql = "SELECT * 
                FROM t_compte_cpt 
                WHERE cpt_id NOT IN (SELECT cpt_id FROM t_profil_pfl)";
        return $this->db->query($sql)->getResultArray();
    }
    public function set_invite($saisie)
    {
        $login = htmlspecialchars(addslashes($saisie['pseudo']));
        $mot_de_passe = htmlspecialchars(addslashes($saisie['mdp']));

        $salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

        $hash = hash('sha256', $salt . $mot_de_passe);
        $sql = "INSERT INTO t_compte_cpt (cpt_pseudo, cpt_mdp)
                VALUES ('".$login."', '".$hash."');";

        return $this->db->query($sql);
    }
    public function update_message($msg_id, $response, $cpt_id)
    {
        $response = addslashes(htmlspecialchars($response));

        $sql = "UPDATE t_message_msg
                SET msg_response = '".$response."', 
                    cpt_id = ".$cpt_id."
                WHERE msg_id = ".$msg_id;

        return $this->db->query($sql);
    }




    public function get_all_res()
    {
        $ressource = $this->db->query("SELECT * FROM t_ressource_res;");
        return $ressource->getResultArray();
    }

    public function supprimer_res($id)
    {
        $this->db->query(" UPDATE `t_reservation_rsv` SET `res_id` = NULL WHERE res_id = $id;");
        return $this->db->query("DELETE FROM t_ressource_res WHERE res_id = $id");
    }

    public function set_ressource($saisie)
    {
        $nom        = htmlspecialchars(addslashes($saisie['res_nom']));
        $desc       = htmlspecialchars(addslashes($saisie['res_descriptif']));
        $materiel   = htmlspecialchars(addslashes($saisie['res_materiel']));
        $max        = htmlspecialchars(addslashes($saisie['res_jauge_max']));
        $min        = htmlspecialchars(addslashes($saisie['res_jauge_min']));

        $etat  = 'D';
        $photo = ""; 



        $sql = "INSERT INTO t_ressource_res 
                (res_nom, res_photo, res_descriptif, res_etat, res_materiel, res_jauge_max, res_jauge_min)
                VALUES 
                ('".$nom."', '".$photo."', '".$desc."', '".$etat."', '".$materiel."', ".$max.", ".$min.");";

        return $this->db->query($sql);
    }
        


    }


?>
