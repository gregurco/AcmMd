<?php

class ProfileController extends Controller
{

    public $layout='/layouts/column2';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/profile/pages'
			// They can be accessed via: index.php?r=profile/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('register','login','captcha'),
                'users'=>array('?'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('logout','settings','index','changePassword'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
                'message'=>'Access Denied.',
            ),
        );
    }

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actionRegister()
    {
        $model=new User('register');

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
                if($model->validate())
                {
                    $model->save();
                    Yii::app()->user->setFlash('register',"Вы можете авторизоваться как: $model->login.");
                }
        }

        $this->render('register',array(
            'model'=>$model,
        ));
    }

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
/*
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
*/
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->homeUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}


	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionIndex()
    {
        $model=new User();
        $this->render('index',array(
            'model'=>$model,
        ));
    }

    public function actionChangePassword()
    {
        $model=$this->loadModel(Yii::app()->user->id);
        $model->setScenario('changePassword');

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            if($model->save())
                Yii::app()->user->setFlash('password',"Пароль был изменен.");
        }

        $model->password = $model->password_repeat = '';

        $this->render('changePassword', array('model' => $model));
    }

    public function loadModel($id)
    {
        $model=User::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}