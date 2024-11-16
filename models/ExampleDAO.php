<!--  EXEMPLE D'UN DAO QUI CONCERNE LA TABLE "PRODUCT" DE LA BDD -->



<?php
require_once(PATH_MODELS . 'DAO.php');
require_once(PATH_ENTITY . 'Example.php'); // LA IL FAUDRA APPELE L'ENTITE "PRODUCT"

/**
 * Ce DAO permet l'interaction avec les produits
 */
class ProductDAO extends DAO {

    /**
     * Permet de convertir les requêtes PHP retournant plusieurs résultats en un tableau d'Objets (ici Product)
     * @param array $result Le tableau des résultats fournis par les requêtes SQL via le PHP
     * @return array La liste des objets
     */
    public function resultToProductsArray(array $result){
        $list = [];
        foreach($result as $product){
            array_push($list, resultToProduct($product));
        }
        return $list;
    }

    /**
     * Permet de convertir un resultat SQL en objet PHP (ici Product)
     * @param array $result Le resultat fourni par la requête SQL en PHP
     * @return Product Retourne un objet produit
     */
    public function resultToProduct(array $result){
        return new Product(
            $result['idprod'],
            $result['idcollection'] == null ? 'NULL' : $result['idcollection'],
            $result['nameprod'],
            $result['descriptionprod'],
            $result['priceprod']
        );
    }

    /**
     * Retourne la liste de tout les produits
     * @return array Retourne une liste de dictionnaires
     */
    public function getProducts() : array
    {
        $result = $this->queryAll("SELECT * FROM product WHERE envente = 1");
        return $result;
    }

    /**
     * Retourne la liste de tout les produits associés à une collection
     * @param int $id Représente l'id de la collection
     * @return array Retourne une liste de dictionnaires
     */
    public function getProductsByCollectionId(int $id) : array
    {
        $result = $this->queryAll("SELECT * FROM product WHERE envente = 1 and idcollection = ?",array($id));
        return $result;
    }

    /**
     * Retourne la liste de tout les produits associés à un nom recherché
     * @param string $name Le nom associé aux produits recherchés
     * @return array Retourne une liste de dictionnaires
     */
    public function getProductsByName(string $name) : array
    {
        $result = $this->queryAll("SELECT * FROM product WHERE envente = 1 AND nameprod LIKE ?",array('%' . $name . '%'));
        return $result;
    }

    /**
     * Retourne la liste de tout les produits associés grâce à son identifiant
     * @param int $id L'identifiant du produit en question
     * @return mixed Retourne false si aucun produit n'est trouvé sinon un dictionnaire
     */
    public function getProductByID(int $id) // : mixed
    {
        $product = $this->queryRow("SELECT * FROM product WHERE idprod = ?",array($id));
        return $product == false ? false : $product;
    }

    /**
     * Retourne la liste de toutes les images associées à un produits grâce à son identifiant
     * @param int $id L'identifiant du produit
     * @return array Retourne une liste de dictionnaires
     */
    public function getProductImages(int $id) : array
    {
        $result = $this->queryAll("SELECT pathpicture, altpicture FROM picture WHERE idprod = ?",array($id));
        return $result;
    }

    /**
     * Permet de savoir si un produit est en stock ou non grâce à son identifiant
     * @param int $id L'identifiant du produit
     * @return bool Retourne si le produit est en stock ou non
     */
    public function getStockStatus(int $id) : bool
    {
        $stock = $this->queryAll("SELECT count(*) FROM product NATURAL JOIN stocked WHERE idprod = ?",array($id));
        if ($stock["count(*)"]>0){
            return true;
        }
        else{return false;}
    }

    /**
     * Permet de suppimer un produit depuis son id
     * @param int $id L'identifiant du produit
     * @return bool True si l'opération a réussie sinon False
     */
    public function deleteProduct(int $id) : bool
    {
        $result = $this->queryBdd("DELETE FROM PRODUCT WHERE idprod = ?", array($id));
        return $result;
    }
    
}