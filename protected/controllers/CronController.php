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
                $compile_result = $this->console->exec('cd '.$dir.'; fpc '.$dir.$solution->file_name);
            }elseif($solution->compiler == 'GCC'){
                $this->console->exec('cd '.$dir.'; gcc '.$dir.$solution->file_name.' -o '.$dir.'1 2> '.$dir.'log.txt');
                $compile_result = file_get_contents($dir.'log.txt');
                $compile_result = nl2br($compile_result);
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
            $problem = Problem::model()->findByPk($solution->p_id);
            $tests = $tests_text = array();
            $dir_input = realpath('.').'/files/private/answers/'.$solution->p_id.'/input';
            $dir_output = realpath('.').'/files/private/answers/'.$solution->p_id.'/output';
            $dir_to = realpath('.').'/files/private/received/'.date("Y.m.d", $solution->time_send).'/'.$solution->id;

            for ($i=1; $i<=$problem->tests; $i++){
                $tests[$i] = false;

                copy($dir_input."/".$i.'.txt', $dir_to."/input.txt");

                $execite_result = $this->execute_shell(
                    "cd ".$dir_to."; ulimit -v ".(1024*$problem->limit_memory)."; time sudo time -v -o './log_time.txt' timeout ".$problem->limit_time." ./1;",
                    $dir_to
                );

                if ($execite_result[0] == 'time'){
                    $tests_text[$i] = array('time', $execite_result[1]);
                }elseif($execite_result[0] == 'memory'){
                    $tests_text[$i] = array('memory', $execite_result[1]);
                }elseif(!file_exists($dir_to.'/output.txt')){
                    $tests_text[$i] = array('outputDoesntExist', $execite_result[1]);
                }else{
                    $file1 = file($dir_to.'/output.txt');
                    $hendle = opendir($dir_output.'/'.$i);
                    while ($file = readdir($hendle)) {
                        if (($file!=".") && ($file!="..") && !$tests[$i]) {
                            $file2 = file($dir_output.'/'.$i.'/'.$file);
                            $result = array_diff($file1, $file2);
                            if(empty($result)){
                                $tests[$i] = true;
                                $tests_text[$i] = array('ok', $execite_result[1]);
                            }
                        }
                    }

                    if (!$tests[$i]){
                        $tests_text[$i] = array('wrongAnswer', $execite_result[1]);
                    }
                }


                unlink($dir_to."/input.txt");
                unlink($dir_to."/output.txt");
                unlink($dir_to."/log_time.txt");
            }
            print_r($tests_text);
            Solution::model()->updateByPk($solution->id, array('status' => 5, 'tests' => json_encode($tests_text)));
        }
    }

    private function execute_shell($cmd, $adr_to){
        ## Connect
        $connection = ssh2_connect('localhost', 22);
        ssh2_auth_password($connection, 'root', '023153994');

        $stream = ssh2_exec($connection, $cmd);

        $errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
        stream_set_blocking($errorStream, true);
        stream_set_blocking($stream, true);

        $output = stream_get_contents($stream);
        $error = stream_get_contents($errorStream);

        preg_match_all('/0m(.*)s/i', $error, $arr);

        fclose($errorStream);
        fclose($stream);

        $log_time = file_get_contents($adr_to.'/log_time.txt');

        if (substr_count($log_time, 'status 124')){
            return array('time', $arr[1][0]);
        }elseif (substr_count($log_time, 'status 137')){
            return array('memory', $arr[1][0]);
        }else{
            return array('ok', $arr[1][0]);
        }
    }
	// Uncomment the following methods and override them if needed
	/*
    private function copy_files($source, $res){
        $hendle = opendir($source);
        while ($file = readdir($hendle)) {
            if (($file!=".")&&($file!="..")) {
                copy($source."/".$file, $res."/".$file);
            }
        }
        closedir($hendle);
    }

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