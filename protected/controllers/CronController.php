<?php

class CronController extends Controller
{
    private $console;
    private $filename = '1';

    public function CronController(){
        $this->console = new CConsole();
    }

	public function actionIndex()
	{
        /* Компилируем программы */
        $this->compile();


	}

    private function compile(){
        $model = Solution::model()->findAllByAttributes(array('status' => 1));
        foreach($model as $solution){
            Solution::model()->updateByPk($solution->id, array('status' => 2));

            $filename = '1.pas';
            $dir = realpath('.').'/files/private/received/'.date("Y.m.d", $solution->time_send).'/'.$solution->id.'/';

            $compile_result = $this->console->exec('/usr/lib/fpc/2.4.4/ppc386 '.$dir.$filename);
            $compile_result = str_replace($dir, '', $compile_result);

            if (file_exists($dir.'1')){
                /* Успешная компиляция */
                Solution::model()->updateByPk($solution->id, array('status' => 3,  'log_compile' => $compile_result));
            }else{
                /* Ошибка: Ошибка компиляции */
                Solution::model()->updateByPk($solution->id, array('status' => 10, 'log_compile' => $compile_result));
            }
        }
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