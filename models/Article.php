<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $pub_id
 * @property string $title
 * @property string $slug
 * @property string $author
 * @property string $abstract
 * @property string $keywords
 * @property string $document
 * @property string $issn
 * @property string $doi
 * @property int $viewed
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Publication $pub
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
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
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pub_id', 'viewed', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['abstract'], 'string'],
            [['title', 'slug'], 'string', 'max' => 765],
            [['author', 'keywords'], 'string', 'max' => 255],
            [['document'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
            [['issn', 'doi','pages'], 'string', 'max' => 50],
            [['pub_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publication::className(), 'targetAttribute' => ['pub_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pub_id' => Yii::t('app', 'Pub ID'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'author' => Yii::t('app', 'Author'),
            'abstract' => Yii::t('app', 'Abstract'),
            'keywords' => Yii::t('app', 'Keywords'),
            'document' => Yii::t('app', 'Document'),
            'issn' => Yii::t('app', 'Issn'),
            'doi' => Yii::t('app', 'Doi'),
            'pages' => Yii::t('app', 'Pages'),
            'viewed' => Yii::t('app', 'Viewed'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPub()
    {
        return $this->hasOne(Publication::className(), ['id' => 'pub_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
