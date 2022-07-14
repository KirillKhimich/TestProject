<?php


namespace Models;

use Core\Db;

class ViewMaterialModel extends Db
{
    private $db;
    public function __construct()
    {
        try {
            $this -> db = Db::getInstance();;
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }
    protected function ViewMaterial($id){
        $result = $this->db->DbQuery("SELECT materials.id,materials.title,materials.author,materials.description,categories.categoryTitle,types.typeTitle FROM materials LEFT JOIN categories ON materials.categoryId=categories.id LEFT JOIN types ON materials.typeId = types.id WHERE materials.id = '$id'");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке категорий");
        }else return $result;
    }
    protected function ViewAllTags(){
        $result =  $this->db->DbQuery("SELECT * FROM `tags`");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке тегов");
        }else return $result;
    }
    protected function ViewMaterialTags($id)
    {
        $result = $this->db->DbQuery("SELECT tags.id, tags.tagsTitle FROM cloudtags LEFT JOIN tags ON cloudtags.tagId = tags.id  LEFT JOIN materials ON cloudtags.materialId = materials.id WHERE materials.id = '$id'");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке тегов в материале");
        }else return $result;
    }
    protected function ViewAllLinks($id){
        $result =  $this->db->DbQuery("SELECT links.id,links.title,links.link FROM links LEFT JOIN materials ON links.materialId = materials.id WHERE materials.id = '$id' ");
        $result = Db::arrayEnumeration($result);
        if ($result === false){
            throw new \Exception("Произошла ошибка при выборке ссылок в материале");
        }else return $result;
    }
    protected function DeleteMaterialLinks($id){
        $result = $this->db->DbQuery("DELETE FROM links WHERE id = '$id'");
        if ($result === false){
            throw new \Exception("Произошла ошибка при удалении ссылки");
        }
    }
    protected function DeleteMaterialTags($id){
        $result = $this->db->DbQuery("DELETE FROM cloudtags WHERE tagId = '$id'");
        if ($result === false){
            throw new \Exception("Произошла ошибка при удалении тега");
        }
    }
    protected function InsertMaterialTag($tagId,$materialId){
        $result = $this->db->DbQuery("INSERT INTO cloudtags(materialId, tagId) VALUES ('$materialId','$tagId')");
        if ($result === false){
            throw new \Exception("Произошла ошибка при добавлении тега");
        }
    }
    protected function InsertMaterialLink($materialId,$linkTitle,$linkLink){
        $result = $this->db->DbQuery("INSERT INTO links(id, materialId, title, link) VALUES (NULL,'$materialId','$linkTitle','$linkLink')");
        if ($result === false){
            throw new \Exception("Произошла ошибка при добавлении ссылки");
        }
    }
    protected function UpdateMaterialLink($linkTitle,$linkLink,$linkId){
        $result = $this->db->DbQuery("UPDATE `links` SET `title`='$linkTitle',`link`= '$linkLink' WHERE id = '$linkId'");
        if ($result === false){
            throw new \Exception("Произошла ошибка при обновлении ссылки");
        }
    }
}