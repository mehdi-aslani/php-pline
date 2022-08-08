<?php

namespace app\models\sip_trunks;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\sip_trunks\TblSipTrunks;

/**
 * TblSipTrunksSearch represents the model behind the search form of `app\models\sip_trunks\TblSipTrunks`.
 */
class TblSipTrunksSearch extends TblSipTrunks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'expire_seconds', 'retry_second', 'ping', 'profile_id'], 'integer'],
            [[
                'name', 'username', 'realm', 'from_user', 'from_domain', 'password', 'extension', 'proxy',
                'outbound_proxy', 'register_proxy', 'register_transport', 'contact_params', 'desc'
            ], 'safe'],
            [['register', 'caller_id_in_from', 'enable'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblSipTrunks::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'register' => $this->register,
            'expire_seconds' => $this->expire_seconds,
            'retry_second' => $this->retry_second,
            'caller_id_in_from' => $this->caller_id_in_from,
            'ping' => $this->ping,
            'profile_id' => $this->profile_id,
            'enable' => $this->enable,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'realm', $this->realm])
            ->andFilterWhere(['like', 'from_user', $this->from_user])
            ->andFilterWhere(['like', 'from_domain', $this->from_domain])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'extension', $this->extension])
            ->andFilterWhere(['like', 'proxy', $this->proxy])
            ->andFilterWhere(['like', 'outbound_proxy', $this->outbound_proxy])
            ->andFilterWhere(['like', 'register_proxy', $this->register_proxy])
            ->andFilterWhere(['like', 'register_transport', $this->register_transport])
            ->andFilterWhere(['like', 'contact_params', $this->contact_params])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}
