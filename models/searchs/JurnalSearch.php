<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jurnal;

/**
 * JurnalSearch represents the model behind the search form of `app\models\Jurnal`.
 */
class JurnalSearch extends Jurnal
{
    public $name;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'upload_ke', 'pembimbing_1', 'pembimbing_2', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name','user_id','judul', 'jurnal', 'abstrak', 'tgl_upload', 'nourutjurnal', 'nojurnal', 'vol', 'tgl_jurnal'], 'safe'],
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
        $query = Jurnal::find();

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

        $query->joinWith('user','profile');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'name' => $this->name,
            'user_id' => $this->user_id,
            'upload_ke' => $this->upload_ke,
            'tgl_upload' => $this->tgl_upload,
            'pembimbing_1' => $this->pembimbing_1,
            'pembimbing_2' => $this->pembimbing_2,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->orFilterWhere(['like', 'user.username', $this->user_id])
            // ->orFilterWhere(['like', 'profile.name', $this->name])
            ->andFilterWhere(['like', 'jurnal', $this->jurnal])
            ->andFilterWhere(['like', 'abstrak', $this->abstrak])
            ->andFilterWhere(['like', 'nourutjurnal', $this->nourutjurnal])
            ->andFilterWhere(['like', 'nojurnal', $this->nojurnal])
            ->andFilterWhere(['like', 'vol', $this->vol])
            ->andFilterWhere(['like', 'tgl_jurnal', $this->tgl_jurnal]);

        return $dataProvider;
    }
}
