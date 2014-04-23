<?php

class CronController extends Controller
{
    private $console;

    public function CronController(){
        $this->console = new CConsole();
    }

	public function actionIndex()
	{
        /* Компилируем программы */
        $this->compile();
        $this->test();

	}

    private function compile(){
        $model = Solution::model()->findAllByAttributes(array('status' => 1));
        foreach($model as $solution){
            Solution::model()->updateByPk($solution->id, array('status' => 2));

            $dir = realpath('.').'/files/private/received/'.date("Y.m.d", $solution->time_send).'/'.$solution->id.'/';

            if ($solution->compiler == 'FPC'){
                $compile_result = $this->console->exec('fpc '.$dir.$solution->file_name);
                $compile_result = str_replace($dir, '', $compile_result);
            }elseif($solution->compiler == 'GCC'){
                $this->console->exec('gcc '.$dir.$solution->file_name.' -o '.$dir.'1 2> '.$dir.'log.txt');
                $compile_result = file_get_contents($dir.'log.txt');
                $compile_result = nl2br($compile_result);
                $compile_result = str_replace($dir, '', $compile_result);
            }

            if (file_exists($dir.'1')){
                /* Успешная компиляция */
                Solution::model()->updateByPk($solution->id, array('status' => 3,  'log_compile' => $compile_result));
            }else{
                /* Ошибка: Ошибка компиляции */
                Solution::model()->updateByPk($solution->id, array('status' => 10, 'log_compile' => $compile_result));
            }
        }
    }

    private function test(){
        $model = Solution::model()->findAllByAttributes(array('status' => 3));
        foreach($model as $solution){
            Solution::model()->updateByPk($solution->id, array('status' => 4));

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