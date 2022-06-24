<?php

namespace app\models\variables;

/**
 * This is the ActiveQuery class for [[\app\models\variables\TblVariables]].
 *
 * @see \app\models\variables\TblVariables
 */
class TblVariablesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\variables\TblVariables[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\variables\TblVariables|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
