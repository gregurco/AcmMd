<?php

class SolutionController extends Controller
{
    public $layout='//layouts/column2';

	public function actionIndex($pid = NULL)
	{
        $model=new Solution('search');
        $model->unsetAttributes();  // clear any default values

        $model->u_id = Yii::app()->user->id;
        if ($pid)
            $model->p_id = $pid;

        if(isset($_GET['Solution']))
            $model->attributes=$_GET['Solution'];

        $this->render('index',array(
            'model'=>$model,
        ));
	}

	public function actionView($id)
	{
        $model = $this->loadModel($id);

        $this->render('view', array(
            'model'=>$model,
        ));
	}

    public function loadModel($id)
    {
        $model=Solution::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}