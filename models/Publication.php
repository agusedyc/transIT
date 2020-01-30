<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "publication".
 *
 * @property int $id
 * @property int $vol
 * @property int $no
 * @property int $month_pub
 * @property int $years__pub
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Article[] $articles
 */
class Publication extends \yii\db\ActiveRecord
{
    public $list_month = [
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'May',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Agt',
        9 => 'Sep',
        10 => 'Okt',
        11 => 'Nop',
        12 => 'Dec',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publication';
    }

    public function behaviors()
    {
       return [
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            // 'sluggable' => [
            //     'class' => SluggableBehavior::className(),
            //     'attribute' => 'name',
            //     'slugAttribute' => 'slug',
            // ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vol', 'no', 'month_pub', 'years_pub', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['file_cover'],'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vol' => Yii::t('app', 'Vol'),
            'no' => Yii::t('app', 'No'),
            'month_pub' => Yii::t('app', 'Month Publication'),
            'years_pub' => Yii::t('app', 'Years Publication'),
            'file_cover' => Yii::t('app', 'Cover'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['pub_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
