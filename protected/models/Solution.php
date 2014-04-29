<?php

/**
 * This is the model class for table "{{solution}}".
 *
 * The followings are the available columns in table '{{solution}}':
 * @property integer $id
 * @property string $u_id
 * @property string $p_id
 * @property integer $time_send
 * @property string $result
 * @property string $tests
 * @property string $log_compile
 * @property integer $status
 * @property string $compiler
 * @property string $file_name
 * @property string $file_text
 */
class Solution extends CActiveRecord
{
    public $problemName;
    public $userLogin;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{solution}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('time_send, status', 'numerical', 'integerOnly'=>true),
			array('u_id, p_id, result', 'length', 'max'=>10),
			array('tests, log_compile, compiler, file_text', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, u_id, p_id, time_send, result, tests, log_compile, status, compiler, problemName, userLogin', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'user'=>array(self::BELONGS_TO, 'User', 'u_id'),
            'problem'=>array(self::BELONGS_TO, 'Problem', 'p_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'u_id' => 'U',
			'p_id' => 'P',
			'time_send' => 'Time Send',
			'result' => 'Result',
			'tests' => 'Tests',
			'log_compile' => 'Log Compile',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('u_id',$this->u_id,true);
		$criteria->compare('p_id',$this->p_id,true);
		$criteria->compare('time_send',$this->time_send);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('tests',$this->tests,true);
		$criteria->compare('log_compile',$this->log_compile,true);
		$criteria->compare('status',$this->status);
        $criteria->compare('compiler',$this->compiler);
        $criteria->compare('problem.name',$this->problemName);
        $criteria->compare('user.login',$this->userLogin);
        $criteria->with = array('problem', 'user');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>array(
                    'id'=>"DESC"
                )
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solution the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave(){
        if(parent::beforeSave())
        {
            if ($this->isNewRecord){
                $this->time_send = time();
            }
            return true;
        }
        return false;
    }

    /*
     * Method that handle sended solutions
     */
    public function createNewSolution($file_name, $p_id, $compiler){
        $post = new Solution;
        $post->u_id = Yii::app()->user->id;
        $post->p_id = $p_id;
        $post->file_name = Solution::filename($compiler);
        $post->compiler = $compiler;
        $post->file_text = iconv('windows-1251', 'utf-8', file_get_contents($_FILES[$file_name]['tmp_name']));
        $post->save();

        $problem = Problem::model()->findByPk($p_id);

        $processing = new Processing;
        $processing->id = $post->id;
        $processing->compiler = $compiler;
        $processing->file_text = iconv('windows-1251', 'utf-8', file_get_contents($_FILES[$file_name]['tmp_name']));
        $processing->p_id = $p_id;
        $processing->limit_time = $problem->limit_time;
        $processing->limit_memory = $problem->limit_memory;
        $processing->save();

        return true;
    }

    static function filename($compiler){
        switch($compiler){
            case 'FPC':
                return '1.pas';
                break;
            case 'GCC':
                return '1.c';
                break;
        }
    }

    public function getStatusName($num){
        switch($num){
            case 1:
                return "Ожидание";
                break;
            case 2:
                return "Компилирование";
                break;
            case 3:
                return "Ожидание тестирования";
                break;
            case 4:
                return "Тестирование";
                break;
            case 5:
                return "Завершено";
                break;

            case 10:
                return "Ошибка компиляции";
                break;
            default:
                return "";
        }
    }

    protected function afterFind(){
        $this->tests = json_decode($this->tests, true);

        return parent::afterFind();
    }

    public static function finishedProblem($u_id, $link = true){
        $criteria = new CDbCriteria;
        $criteria->compare('u_id', $u_id);
        $criteria->compare('result', 100);
        $criteria->group = 'p_id';
        $criteria->select = 'p_id';

        $model = Solution::model()->findAll($criteria);

        $result = array();

        foreach($model as $one){
            if ($link)
                $result[] = CHtml::link($one->p_id, array('/problem/view', 'id' => $one->p_id));
            else
                $result[] = $one->p_id;
        }
        return $result;
    }
    public static function unFinishedProblem($u_id, $link = true){
        $criteria = new CDbCriteria;
        $criteria->compare('u_id', $u_id);
        $criteria->group = 'p_id';
        $criteria->select = 'p_id';
        $criteria->addNotInCondition("p_id", Solution::finishedProblem($u_id, false));

        $model = Solution::model()->findAll($criteria);

        $result = array();

        foreach($model as $one){
            if ($link)
                $result[] = CHtml::link($one->p_id, array('/problem/view', 'id' => $one->p_id));
            else
                $result[] = $one->p_id;
        }
        return $result;
    }

    public static function userScore($u_id)
    {
        $sql='SELECT SUM(c.rslt) score FROM (SELECT MAX(s.result) rslt FROM a_solution s WHERE s.u_id=:u_id group by s.p_id) c';
        $rawData = Yii::app()->db->createCommand($sql);
        $rawData->bindParam('u_id', $u_id, PDO::PARAM_INT);
        $raw = $rawData->queryRow();
        return $raw['score'];
    }

}
