<?php

namespace app\models\sip_trunks;

/**
 * This is the ActiveQuery class for [[TblSipTrunks]].
 *
 * @see TblSipTrunks
 */
class TblSipTrunksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TblSipTrunks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TblSipTrunks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
