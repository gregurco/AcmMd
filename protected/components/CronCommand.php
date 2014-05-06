<?
set_time_limit(0);

class CronCommand extends CConsoleCommand
{
    public $dbConnection = '';

    public function run() {
        while($this->checkProcessing())
            sleep(5);
    }

    private function checkProcessing(){
        $criteria=new CDbCriteria;
        $criteria->compare('status','5',true);
        $criteria->compare('status','10',true, 'OR');

        $model = Processing::model()->findAll($criteria);
        foreach($model as $processing){
            Solution::model()->updateByPk($processing->id, array(
                'status' => $processing->status,
                'result' => $processing->result,
                'tests' => $processing->tests,
                'log_compile' => $processing->log_compile,
            ));

            Processing::model()->deleteByPk($processing->id);
        }

        unset($criteria);
        unset($model);
        unset($processing);
        gc_collect_cycles();
        return true;
    }
}