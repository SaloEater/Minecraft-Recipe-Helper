<?php

namespace common\helpers;

use common\essences\Item;
use common\essences\Machine;
use common\essences\RecipeResult;
use yii\db\ActiveRecord;

class ListHelper
{
    public static function findList(ActiveRecord $record, $fieldName, $func = null)
    {
        return array_map(function (ActiveRecord $record) use ($fieldName, $func) {
            return [
                $record->id => is_callable($func) ? call_user_func($func, $record) : $record->$fieldName
            ];
        }, $record::find()->orderBy($fieldName)->all());
    }

    public static function findItemsList()
    {
        return self::findList(new Item(), 'name');
    }

    public static function findMachineList()
    {
        return self::findList(new Machine(), 'name');
    }

    public static function findRecipeResultList()
    {
        return self::findList(new RecipeResult(), 'name', function(RecipeResult $recipeResult) {
            return $recipeResult->machine->name . ' -> ' . $recipeResult->item->name;
        });
    }


}