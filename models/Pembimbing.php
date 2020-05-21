<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pembimbing".
 *
 * @property int $id
 * @property string $pembimbing
 * @property int $status_active
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Pembimbing extends \yii\db\ActiveRecord
{
    const status_aktif = 10;
    const status_tidak_aktif = 0;

    public $status_list = [
        self::status_aktif => 'Aktif',
        self::status_tidak_aktif => 'Tidak Aktif',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembimbing';
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
            [['status_active', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['pembimbing','jabatan','tlp'], 'string', 'max' => 255],
            [['foto'], 'file','skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            ['status_active', 'default', 'value' => self::status_aktif],
            ['status_active', 'in', 'range' => [self::status_aktif, self::status_tidak_aktif]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pembimbing' => Yii::t('app', 'Pembimbing'),
            'foto' => Yii::t('app', 'Foto'),
            'jabatan' => Yii::t('app', 'Jabatan'),
            'tlp' => Yii::t('app', 'Telepon'),
            'status_active' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function getStatus($status)
    {
        return $this->status_list[$status];
    }

    public function getUserCreate()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
