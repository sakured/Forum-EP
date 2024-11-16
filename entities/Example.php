<!--  EXEMPLE D'UNE ENTITE, ICI APPELEE "USER" 
UNE ENTITE EST UNE CLASSE QUI EST UNE SORTE DE MIRROIR D'UNE TABLE DE LA BDD AFIN DE POUVOIR TRAVAILLER AVEC CES CLASSES
ICI, LA CLASSE USER REPREND TOUS LES ATTIBUTS DE LA TABLE USER
ON ECRIT AUSSI DANS CETTE CLASSE LES METHODES DE USER (GETTERS, SETTER...) -->



<?php
/*
Représentation objet d'un utilisateur du site web
*/
class User{
    // Propriétés d'un utilisateur
    private string $_first_name;
    private string $_last_name;
    private string $_email;
    private int $_id;

    // Je pense faire d'autres classes pour :
    // Commands
    // Favorites

    /**
     * Constructeur de la classe User
     * @param string $first_name Le prénom de l'utilisateur
     * @param string $last_name Le nom de famille de l'utilisateur
     * @param string $email L'adresse email de l'utilisateur
     * @param int L'identifiant de l'utilisateur
     */
    function __construct(string $first_name, string $last_name, string $email,int $id){
        $this -> _first_name = $first_name;
        $this -> _last_name = $last_name;
        $this -> _email = $email;
        $this -> _id = $id;
    }

    /*============ Getters ============*/

    /**
     * Retourne le prénom de l'utilisateur
     * @return string Le prénom de l'utilisateur
     */
    public function getFirstName() : string {
        return $this->_first_name;
    }

    /**
     * Retourne le nom de famille de l'utilisateur
     * @return string Le nom de famille de l'utilisateur
     */
    public function getLastName() : string {
        return $this->_last_name;
    }
    
    /**
     * Retourne l'adresse email de l'utilisateur
     * @return string L'adresse email de l'utilisateur
     */
    public function getEmail() : string {
        return $this->_email;
    }

    /**
     * Retourne l'identifiant de l'utilisateur
     * @return string L'identifiant de l'utilisateur
     */
    public function getIdUser() : int {
        return $this->_id;
    }

    /*============ Setters ============*/

    /**
     * Change le prénom de l'utilisateur
     * @param string $first_name prenom de l'utilisateur
     */
    public function setFirstName($first_name){
        $this -> _first_name = $first_name;
    }

    /**
     * Change le nom de famille de l'utilisateur
     * @param string $last_name nom de famille de l'utilisateur
     */
    public function setLastName($last_name){
        $this -> _last_name = $last_name;
    }
    
    /**
     * Change l'adresse email de l'utilisateur
     * @param string $email l'adresse mail de l'utilisateur
     */
    public function setEmail($email){
        $this -> _email = $email;
    }
}