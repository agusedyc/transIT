<?php
namespace app\models;

use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use Yii;

class RegistrationForm extends BaseRegistrationForm
{
    /**
     * @var string User NIM
     */
    public $nim;
    
    /**
     * @var string User Full Name
     */
    public $full_name;

    /**
     * @var string User email address
     */
    public $email;

    /**
     * @var string Username
     */
    public $username;

  
    public $password;

    public $item_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $user = $this->module->modelMap['User'];

        return [
        	[['item_name'],'string'],
            // nim rules
            // 'nimTrim'     => ['nim', 'trim'],
            // 'nimLength'   => ['nim', 'string', 'min' => 13, 'max' => 13],
            // 'nimPattern'  => ['nim', 'match', 'pattern' => '/^[G].[0-9][0-9][0-9].[0-9][0-9].[0-9][0-9][0-9][0-9]$/m'],
            'nimRequired' => ['nim', 'required'],
            'nimUnique'   => [
                'nim',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This nim has already been taken'),
            ],
            // full_name rules
            'full_nameTrim'     => ['full_name', 'trim'],
            'full_nameRequired' => ['full_name', 'required'],

            // username rules
            'usernameTrim'     => ['username', 'trim'],
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernamePattern'  => ['username', 'match', 'pattern' => $user::$usernameRegexp],
            'usernameRequired' => ['username', 'required'],
            'usernameUnique'   => [
                'username',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This username has already been taken'),
            ],
            // email rules
            'emailTrim'     => ['email', 'trim'],
            'emailRequired' => ['email', 'required'],
            'emailPattern'  => ['email', 'email'],
            'emailUnique'   => [
                'email',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This email address has already been taken'),
            ],
            // password rules
            'passwordRequired' => ['password', 'required', 'skipOnEmpty' => $this->module->enableGeneratingPassword],
            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 72],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name'=> Yii::t('user', 'Roles'),
            'nim'      => Yii::t('user', 'NIM'),
            'full_name'=> Yii::t('user', 'Full Name'),
            'email'    => Yii::t('user', 'Email'),
            'username' => Yii::t('user', 'Username'),
            'password' => Yii::t('user', 'Password'),
        ];
    }

    public function afterSave($isNew, $old)
    {
    	if ($isNew){
	    	$model = $this->findModel($this->user->id);
	        $authAssignment = new AuthAssignment([
	            'user_id' => $model->id,
	        ]);

	        $authAssignment->load(Yii::$app->request->post());
	        // delete all role
	        AuthAssignment::deleteAll(['user_id' => $model->id]);
	        if (is_array($authAssignment->item_name)) {
	            foreach ($authAssignment->item_name as $item) {
	                if (!in_array($item, $authAssignments)) {
	                    $authAssignment2 = new AuthAssignment([
	                        'user_id' => $model->id,
	                    ]);
	                    $authAssignment2->item_name = $item;
	                    $authAssignment2->created_at = time();
	                    $authAssignment2->save();

	                    $authAssignments = AuthAssignment::find()->where([
	                        'user_id' => $model->id,
	                    ])->column();
	                }
	            }
	        }
	    }
	}

}