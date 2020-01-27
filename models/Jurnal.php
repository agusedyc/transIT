<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "jurnal".
 *
 * @property int $id
 * @property int $user_id
 * @property string $judul
 * @property string $jurnal
 * @property string $abstrak
 * @property int $upload_ke
 * @property string $tgl_upload
 * @property int $pembimbing_1
 * @property int $pembimbing_2
 * @property string $nourutjurnal
 * @property string $nojurnal
 * @property string $vol
 * @property string $tgl_jurnal
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 */
class Jurnal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurnal';
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
            // [['pembimbing_1', 'id', 'judul', 'jurnal', 'abstrak', 'tgl_upload', 'nojurnal', 'vol', 'tgl_jurnal', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['id', 'user_id', 'upload_ke', 'pembimbing_1', 'pembimbing_2', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            // ['pembimbing_1', 'compare','compareAttribute'=>'pembimbing_2','operator'=> '!=='],
            [['abstrak'], 'string'],
            [['tgl_upload'], 'safe'],
            [['judul'], 'string', 'max' => 255],
            // [['jurnal'], 'string', 'max' => 255],
            [['jurnal'], 'file'],
            [['nourutjurnal', 'nojurnal', 'vol'], 'string', 'max' => 8],
            [['tgl_jurnal'], 'string', 'max' => 50],
            [['id','user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'judul' => Yii::t('app', 'Judul'),
            'jurnal' => Yii::t('app', 'Jurnal'),
            'abstrak' => Yii::t('app', 'Abstrak'),
            'upload_ke' => Yii::t('app', 'Upload Ke'),
            'tgl_upload' => Yii::t('app', 'Tgl Upload'),
            'pembimbing_1' => Yii::t('app', 'Pembimbing 1'),
            'pembimbing_2' => Yii::t('app', 'Pembimbing 2'),
            'nourutjurnal' => Yii::t('app', 'Nourutjurnal'),
            'nojurnal' => Yii::t('app', 'Nojurnal'),
            'vol' => Yii::t('app', 'Vol'),
            'tgl_jurnal' => Yii::t('app', 'Tgl Jurnal'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getPembimbingOne()
    {
        return $this->hasOne(Pembimbing::className(), ['id' => 'pembimbing_1']);
    }

    public function getPembimbingTwo()
    {
        return $this->hasOne(Pembimbing::className(), ['id' => 'pembimbing_2']);
    }
}
