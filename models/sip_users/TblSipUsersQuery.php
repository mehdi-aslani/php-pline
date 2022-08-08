<?php

namespace app\models\sip_users;

/**
 * This is the ActiveQuery class for [[TblSipUsers]].
 *
 * @see TblSipUsers
 */
class TblSipUsersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TblSipUsers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TblSipUsers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
