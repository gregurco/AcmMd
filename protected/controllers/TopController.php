<?php

class TopController extends Controller
{
    public $layout='//layouts/column2';

    public function actionIndex()
    {
        //$model = new User('searchTop');
        $sql='SELECT a.*, b.login, b.name, b.surname FROM (SELECT c.u_id id,SUM(c.rslt) score FROM (SELECT s.u_id, s.p_id, MAX(s.result) rslt FROM a_solution s group by s.u_id, s.p_id) c GROUP BY c.u_id) a RIGHT JOIN (SELECT * from a_user) b ON a.id = b.id';
        $rawData = Yii::app()->db->createCommand($sql);
        $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar(); //the count

        $dataProvider=new CSqlDataProvider($rawData, array(
            'keyField' => 'id',
            'totalItemCount'=>$count,
            'sort' => array(
                'attributes' => array(
                    'score'
                ),
                'defaultOrder' => array(
                    'score' => CSort::SORT_DESC, //default sort value
                ),
            ),
           'pagination'=>array(
                'pageSize'=>100,
            ),
        ));

        $this->render('index',array(
            'model'=>$dataProvider,
        ));
    }

    public function loadModel($id)
    {
        $model=User::model()->findByPk($id);
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