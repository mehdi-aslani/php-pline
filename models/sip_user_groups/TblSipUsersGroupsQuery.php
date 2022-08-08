<?php

namespace app\models\sip_user_groups;

/**
 * This is the ActiveQuery class for [[TblSipUsersGroups]].
 *
 * @see TblSipUsersGroups
 */
class TblSipUsersGroupsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TblSipUsersGroups[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TblSipUsersGroups|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
