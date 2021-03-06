<?php

class ArticleController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';


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
                'actions'=>array('index','view',),
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
        $this->render('view',array(
            'model'=>$model,
        ));

    }


    public function actionIndex()
    {
        if (!Yii::app()->config->get('ARTICLE.ALLOW')){
            throw new CHttpException(404,'Статьи временно недоступны.');
        }
        else{
            $dataProvider=new CActiveDataProvider('GroupArticle', array(
                    'criteria'=>array(
                        'condition'=>'`hide`=0',
                    ),
                )
            );

            $this->render('index',array(
                'dataProvider'=>$dataProvider,
            ));
        }
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
        $model=Article::model()->findByAttributes(array('id' => $id, 'hide' => 0));
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
