<?php

namespace app\models\sip_profile_parameters;

/**
 * This is the ActiveQuery class for [[TblSipProfileParameters]].
 *
 * @see TblSipProfileParameters
 */
class TblSipProfileParametersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TblSipProfileParameters[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TblSipProfileParameters|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
