<?php

namespace simaland\pgstatstatements\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AggregatePgStatStatementsSearch represents the model behind the search form of `\simaland\pgstatstatements\models\AggregatePgStatStatements`.
 */
class AggregatePgStatStatementsSearch extends AggregatePgStatStatements
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'dbid', 'queryid', 'calls', 'rows', 'shared_blks_hit', 'shared_blks_read', 'shared_blks_dirtied', 'shared_blks_written', 'local_blks_hit', 'local_blks_read', 'local_blks_dirtied', 'local_blks_written', 'temp_blks_read', 'temp_blks_written'], 'integer'],
            [['created_at', 'server', 'query'], 'safe'],
            [['total_time', 'min_time', 'max_time', 'mean_time', 'stddev_time', 'blk_read_time', 'blk_write_time'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = AggregatePgStatStatements::find();

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
            'created_at' => $this->created_at,
            'userid' => $this->userid,
            'dbid' => $this->dbid,
            'queryid' => $this->queryid,
            'calls' => $this->calls,
            'total_time' => $this->total_time,
            'min_time' => $this->min_time,
            'max_time' => $this->max_time,
            'mean_time' => $this->mean_time,
            'stddev_time' => $this->stddev_time,
            'rows' => $this->rows,
            'shared_blks_hit' => $this->shared_blks_hit,
            'shared_blks_read' => $this->shared_blks_read,
            'shared_blks_dirtied' => $this->shared_blks_dirtied,
            'shared_blks_written' => $this->shared_blks_written,
            'local_blks_hit' => $this->local_blks_hit,
            'local_blks_read' => $this->local_blks_read,
            'local_blks_dirtied' => $this->local_blks_dirtied,
            'local_blks_written' => $this->local_blks_written,
            'temp_blks_read' => $this->temp_blks_read,
            'temp_blks_written' => $this->temp_blks_written,
            'blk_read_time' => $this->blk_read_time,
            'blk_write_time' => $this->blk_write_time,
        ]);

        $query->andFilterWhere(['like', 'server', $this->server])
            ->andFilterWhere(['like', 'query', $this->query]);

        return $dataProvider;
    }
}
