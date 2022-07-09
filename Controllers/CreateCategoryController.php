<?php


namespace Controllers;
use \Models\CreateCategoryModel;

class CreateCategoryController extends CreateCategoryModel implements RulesForControllers
{

    function ActionView()
    {
        include __DIR__ . "/../Views/create-category.php";
    }
    public function CreateCategory($name)
    {
        if (!empty($name) && $name != false){
            $name = htmlspecialchars($name);
            $result = new CreateCategoryModel();
            print_r($name);
            try {
                $result->Insert($name);
            }catch (\Exception $e){
                echo "<h4>" .  $e->getMessage() ."</h4>";
            }


        }else{
            return false;
        }
    }
}