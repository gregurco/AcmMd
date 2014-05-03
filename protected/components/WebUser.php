<?
class WebUser extends CWebUser{
    private $_model;

    public function loadUser()
    {
        if($this->_model === NULL) {
            if(!Yii::app()->user->isGuest)
                $this->_model = User::model()->findByPk(Yii::app()->user->getId());
                User::model()->updateBypk($this->_model->id, array('time_last_active' => time()));
        }

        return $this->_model;
    }

    public function userIsAdmin(){
        if (!Yii::app()->user->isGuest && $this->loadUser()->admin){
            return true;
        }else{
            return false;
        }
    }
}