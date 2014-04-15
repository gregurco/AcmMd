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
 */
class Solution extends CActiveRecord
{
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
			array('tests, log_compile', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, u_id, p_id, time_send, result, tests, log_compile, status', 'safe', 'on'=>'search'),
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
    public function createNewSolution($file_name, $p_id){
        $post = new Solution;
        $post->u_id = Yii::app()->user->id;
        $post->p_id = $p_id;
        $post->save();

        $dir = realpath('.').'/files/private/received/'.date("Y.m.d").'/'.$post->id.'/';
        mkdir($dir);

        $uploaded = Yii::app()->file->set($file_name);
        $uploaded->copy($dir . $uploaded->basename);
        return true;
    }
}
