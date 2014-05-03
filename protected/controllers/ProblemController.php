<?php

class ProblemController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
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
				'actions'=>array('index','view'),
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

        if (isset($_POST['send']) && Yii::app()->config->get('SEND.SOLUTION')){
            Solution::createNewSolution('file', $model->id, $_POST['compiler']);
            $this->redirect(array('solution/index','pid'=>$model->id));
        }

        if (!Yii::app()->config->get('SEND.SOLUTION'))
            Yii::app()->user->setFlash('sendSolution',"Отправка решений временно недоступна.");
        elseif (Yii::app()->user->isGuest)
            Yii::app()->user->setFlash('sendSolution',"Для отправки решения, вы должны авторизироваться.");

		$this->render('view',array(
			'model'=> $model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Problem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Problem']))
			$model->attributes=$_GET['Problem'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Problem the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Problem::model()->findByAttributes(array('id' => $id, 'hide' => 0));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Problem $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='problem-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
