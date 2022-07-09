<?php


namespace Models;

use Core\Db;

class ViewMaterialModel extends Db
{
    private $db;
    public function __construct()
    {
        $this -> db = new Db();
    }
    protected function ViewMaterial($id){
        $materials = $this->db->DbQuery("SELECT materials.id,materials.title,materials.author,materials.description,categories.categoryTitle,types.typeTitle FROM materials LEFT JOIN categories ON materials.categoryId=categories.id LEFT JOIN types ON materials.typeId = types.id WHERE materials.id = '$id'");
        $materials = Db::arrayEnumeration($materials);
        return $materials;
    }
    protected function ViewAllTags(){
        $result =  $this->db->DbQuery("SELECT * FROM `tags`");
        $result = Db::arrayEnumeration($result);
        return $result;
    }
    protected function ViewMaterialTags($id)
    {
        $result = $this->db->DbQuery("SELECT tags.id, tags.tagsTitle FROM cloudtags LEFT JOIN tags ON cloudtags.tagId = tags.id  LEFT JOIN materials ON cloudtags.materialId = materials.id WHERE materials.id = '$id'");
        $result = Db::arrayEnumeration($result);
        return $result;
    }
    protected function ViewAllLinks($id){
        $result =  $this->db->DbQuery("SELECT links.id,links.title,links.link FROM links LEFT JOIN materials ON links.materialId = materials.id WHERE materials.id = '$id' ");
        $result = Db::arrayEnumeration($result);
        return $result;
    }
    protected function DeleteMaterialLinks($id){
        $this->db->DbQuery("DELETE FROM links WHERE id = '$id'");
    }
    protected function DeleteMaterialTags($id){
        $this->db->DbQuery("DELETE FROM `cloudtags` WHERE tagId = '$id'");
    }
}