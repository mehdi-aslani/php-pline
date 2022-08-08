<?php

namespace app\models\sip_users;

/**
 * This is the ActiveQuery class for [[VwSipUsers]].
 *
 * @see VwSipUsers
 */
class VwSipUsersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VwSipUsers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VwSipUsers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
