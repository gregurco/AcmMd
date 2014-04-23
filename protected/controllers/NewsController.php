<?php

class NewsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
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

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','captcha'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $model = $this->loadModel($id);
        $newsComment = new NewsComment('create');

        if(isset($_POST['NewsComment']))
        {
            if(Yii::app()->user->isGuest)
                $newsComment->name=$_POST['NewsComment']['name'];
            $newsComment->text=$_POST['text'];
            $newsComment->verifyCode=$_POST['NewsComment']['verifyCode'];
            $newsComment->n_id = $id;

            if($newsComment->validate())
            {
                if($newsComment->save()){
                    $newsComment->unsetAttributes();
                    Yii::app()->user->setFlash('addComment',"Комментарий был успешно добавлен.");
                }
            }

        }

        $newsComment->verifyCode = '';

		$this->render('view',array(
			'model'=>$model,
            'newsComment'=>$newsComment,
            'form'=> '',
		));
	}

    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('News', array(
            'criteria'=>array(
                'condition'=>'`hide`=0',
                'order'=>'`create` DESC',
            ),
            'pagination' => array(
                'pageSize' => 10,
            )
        ));
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

	/**
	 * Manages all models.
	 */


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return News the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param News $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
