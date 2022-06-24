<?php

namespace app\models\sip_profiles;

/**
 * This is the ActiveQuery class for [[TblSipProfiles]].
 *
 * @see TblSipProfiles
 */
class TblSipProfilesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TblSipProfiles[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TblSipProfiles|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
