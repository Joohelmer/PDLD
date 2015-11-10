<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public $globalVar = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
    }

    public function espace_pro()
    {
        $data = array();
        $data['menu'] = '';
            
        $this->load->view('espace_pro.php', $data);
    }

    public function mdp_oublie()
    {
        $data = array();
        $data['menu'] = '';

        if($this->input->post())
        {
            $mail = $this->input->post('mail', TRUE);
            $user = $this->db->query('SELECT * FROM users WHERE email = "'.$mail.'"')->row();

            if($user)
            {
               //$mdp = $this->random(8);
            	$mdp = 0;
                $this->db->query('UPDATE users SET password = "'.sha1($mdp).'" WHERE id = '.(int)$user->id);

                $from = 'joo.heler@gmail.com';
                $to = $mail;
                $objet = '[Pays de la Drôme] Demande de nouveau mot de passe';

                $contenu = '';
                $contenu .= 'Bonjour,<br/>';
                $contenu .= 'Vous avez effectué une demande de nouveau mot de passe sur le site <a href="#">www.paysdeladrome.com</a>.<br/><br/>';
                $contenu .= 'Voici vos nouveaux identifiants de connexion:<br/>';
                $contenu .= '- Email: <b>'.$mail.'</b><br/>';
                $contenu .= '- Mot de passe: <b>'.$mdp.'</b><br/>';
                $contenu .= '<br/>Vous pouvez modifier ce mot de passe via votre espace personnel sur le site <a href="#">www.paysdeladrome.com</a> : <u>Mon Compte</u>, rubrique <u>Mes Infos Personnelles</u>.';

                //$this->mail_action($to, $from, $objet, $contenu);
				set_alert('success', 'Un email vous a été envoyé avec votre nouveau mot de passe.');
            }
            else{
                set_alert('danger', 'Aucun compte n\'est associé à cette adresse email.');
            }

            redirect( current_url() );
        }
         
        $this->load->view('mot_de_passe_oublie.php', $data);
    }

    public function inscription(){
    	$data = array();
        $data['menu'] = '';

    	if($this->input->post())
        {
            $nom = $this->input->post('nom', TRUE);
            $prenom = $this->input->post('prenom', TRUE);
            $tel = $this->input->post('telephone', TRUE);
            $mail = $this->input->post('mail', TRUE);
            $mdp = $this->input->post('password', TRUE);
            $mdp_re = $this->input->post('repassword', TRUE);
            $rcs = $this->input->post('rcs', TRUE);
            $role = $this->input->post('type', TRUE);


            if($mdp == $mdp_re)
            {
                $user = $this->db->query("SELECT * FROM users WHERE email = " . $this->db->escape($mail))->row();

                if(!$user)
                {
                    $this->db->query('
                        INSERT INTO users(nom, prenom, telephone, email,rcs,role, password) VALUES(
                            ' . $this->db->escape($nom) . ', 
                            ' . $this->db->escape($prenom) . ', 
                            ' . $this->db->escape($tel) . ', 
                            ' . $this->db->escape($mail) . ', 
                            ' . $this->db->escape($rcs) . ', 
                            ' . $this->db->escape($type) . ', 
                            ' . $this->db->escape(sha1($mdp)) . ' )'                       
                    );

                    $from = 'joo.heler@gmail.com';
	                $to = $mail;
	                $objet = '[Pays de la Drôme] Demande de nouveau mot de passe';

	                $contenu = '';
	                $contenu .= 'Bonjour,<br/>';
	                $contenu .= 'Vous avez effectué une demande de nouveau mot de passe sur le site <a href="#">www.paysdeladrome.com</a>.<br/><br/>';
	                $contenu .= 'Voici vos nouveaux identifiants de connexion:<br/>';
	                $contenu .= '- Email: <b>'.$mail.'</b><br/>';
	                $contenu .= '- Mot de passe: <b>'.$mdp.'</b><br/>';
	                $contenu .= '<br/>Vous pouvez modifier ce mot de passe via votre espace personnel sur le site <a href="#">www.paysdeladrome.com</a> : <u>Mon Compte</u>, rubrique <u>Mes Infos Personnelles</u>.';

	                //$this->mail_action($to, $from, $objet, $contenu);
                    
                    set_alert('success', 'Un email vous a été envoyé avec un récapitulatif de vos informations.');

                }
                else
                {
                	set_alert('danger', 'Le compte existe déjà.');
                }
            }
            else
            {
            	set_alert('danger', 'Les mots de passe ne sont pas identiques.');
            }
         
         	redirect( current_url() );      
        }   

        $this->load->view('inscription.php', $data);
    }

}