<?php

require("db_connect_2.php");
function liste_pfe($filiere){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
	$req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE filiere = :filiere AND valide=\'1\' ORDER BY groupe ');
	$req->execute(array(
	':filiere' => trim($filiere)
));
    return $req;
}

function is_username_existe($username){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT username FROM ensas_pfe WHERE username = :username ');
    $req->execute(array(
        ':username' => trim($username)
    ));
    if($req->fetch()){
        return "<img src='ressources/img/erreur.png'> Nom Utilisateur déjà utilisé !";
    }
    else return "<img src='ressources/img/ok.png'>";
}

function is_user_existe($nom,$prenom){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE nom1 = :nom1 AND prenom1=:prenom1 ');
    $req->execute(array(
        ':nom1' => trim($nom),
        ':prenom1' => trim($prenom)
    ));
    if($req->fetch()){
        return "<img src='ressources/img/erreur.png'> Vous êtes déjà inscrit  !";
    }
    else return "<img src='ressources/img/ok.png'>";
}

function is_email_existe($email){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE email1 = :email1 ');
    $req->execute(array(
        ':email1' => trim($email)
    ));
    if($req->fetch()){
        return "<img src='ressources/img/erreur.png'> &nbsp;Email déjà inscrit !";
    }
    else return "<img src='ressources/img/ok.png'>";
}


function is_email_existe_2($email){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE email1 = :email1 ');
    $req->execute(array(
        ':email1' => trim($email)
    ));
    if($req->fetch()){
        return "<img src='ressources/img/ok.png'>";
    }
    else return "<img src='ressources/img/erreur.png'>&nbsp;Email n'existe pas  !";
}

function is_email_existe_3($email){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE email1 = :email1 ');
    $req->execute(array(
        ':email1' => trim($email)
    ));
    if($req->fetch()){
        return true;
    }
    else return false;
}
function verify_prof($login,$passe){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT * FROM ensas_pfe_profs WHERE login = :login AND passe = :passe ');
    $req->execute(array(
        ':login' => htmlspecialchars(trim($login)),':passe' => htmlspecialchars(trim($passe))
    ));
    return $req;
}

function get_email($login){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT email FROM ensas_pfe_profs WHERE login = :login  ');
    $req->execute(array(
        ':login' => htmlspecialchars(trim($login))
    ));
    $email =$req->fetch();
    return $email['email'];
}


function update_encadrant($groupe,$encadrant){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();

    $req = $bdd->prepare('SELECT email FROM ensas_pfe_profs WHERE nom = :nom  ');
    $req->execute(array(
        ':nom' => htmlspecialchars(trim($encadrant))
    ));
    $email_prof =$req->fetch();

    $req2 = $bdd->prepare('UPDATE ensas_pfe SET encadrant= :encadrant,email_encadrant=:email_encadrant  WHERE groupe = :groupe');
    $req2->execute(array(
        ':groupe' => $groupe,
        ':encadrant' => $encadrant,
        ':email_encadrant' => $email_prof['email']
        ));
}

function recover_password_from_email($email){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();

    $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE email1 = :email1 ');
    $req->execute(array(
        ':email1' => htmlspecialchars(trim($email))
    ));
    $data= $req->fetch();
    $emails2 = $data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3']  ;
    $username = $data['username'];
    $req2 = $bdd->prepare('SELECT password FROM ensas_pfe WHERE email1 = :email1 ');
    $req2->execute(array(
        ':email1' => htmlspecialchars(trim($email))
    ));
    $password =$req2->fetch();
    $password=$password['password'];
    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: ENSAS - IRT <ensas.admin@gmail.com>\n";
    $to =$emails2;
    $subject="Récupération du mot de passe";
    $message="
<html>
<body>
<p>Vous avez demandé la récupération du mot de passe de votre compte PFE | Ensa Safi  ! <br>
Votre Username est : <strong>$username</strong><br>
 Votre mot de passe est : <strong>$password</strong> </p>
<p>ENSA Safi (C) 2016</p>
</body>
</html> "
    ;
   mail($to,$subject,$message,$headers);
}

function verify_token($token){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();

    $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE token = :token ');
    $req->execute(array(
        ':token' => htmlspecialchars(trim($token))
    ));
    return $req;
}

function validate_account($token){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req2 = $bdd->prepare('UPDATE ensas_pfe SET valide= :valide  WHERE token = :token');
    $req2->execute(array(
        ':token' => $token,
        ':valide' => 1
    ));
}

function is_attribution_activated(){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->query("SELECT valeur FROM ensas_pfe_options WHERE label = 'prof_attrib_valide' ");
    $req=$req->fetch();
    return $req['valeur'];

}

function get_groupes_by_prof($encadrant){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE encadrant = :encadrant AND valide=\'1\' ');
    $req->execute(array(
        ':encadrant' => htmlspecialchars(trim($encadrant))
    ));
    return $req;
}

function get_emails_of_groupe($groupe){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT email1,email2,email3 FROM ensas_pfe WHERE groupe = :groupe AND valide=\'1\' ');
    $req->execute(array(
        ':groupe' => htmlspecialchars(trim($groupe))
    ));
    $req=$req->fetch();
    return $req;
}

function get_emails_by_params($param){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $emails="";
    switch ($param) {
        case 1:
            $req = $bdd->query("SELECT email1,email2,email3 FROM ensas_pfe WHERE valide='1'");
            while($data=$req->fetch()){
                $emails.=$data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3'].', '  ;
            }
            break;
        case 2:
            $req = $bdd->query("SELECT email1,email2,email3 FROM ensas_pfe WHERE filiere='F' AND valide='1'");
            while($data=$req->fetch()){
                $emails.=$data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3'].', '  ;
            }
            break;
        case 3:
            $req = $bdd->query("SELECT email1,email2,email3 FROM ensas_pfe WHERE filiere='T' AND valide='1' ");
            while($data=$req->fetch()){
                $emails.=$data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3'].', '  ;
            }
            break;
        case 4:
            $req = $bdd->query("SELECT email FROM ensas_pfe_profs ");
            while($data=$req->fetch()){
                $emails.=$data['email'] . ', '   ;
            }
            break;
    }

    return $emails;
}

function get_option_value($option_label){
    $dataBase = new DataBase();
    $bdd=$dataBase->connexionBdd();
    $req = $bdd->prepare('SELECT valeur FROM ensas_pfe_options WHERE label = :label ');
    $req->execute(array(
        ':label' => htmlspecialchars(trim($option_label))
    ));
    $req=$req->fetch();
    return $req['valeur'];
}

?>

