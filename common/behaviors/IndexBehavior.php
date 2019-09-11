<?php

namespace common\behaviors;

use common\essences\Item;
use yii\base\Behavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

class IndexBehavior extends Behavior
{
    public function events()
    {
        return [

        ];
    }

    public function beforeInsert($event)
    {

    }
}