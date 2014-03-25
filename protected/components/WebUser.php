<?
class WebUser extends CWebUser{
    private $_model;

    public function loadUser()
    {
        if($this->_model === NULL) {
            if(!Yii::app()->user->isGuest)
                $this->_model = User::model()->findByPk(Yii::app()->user->getId());
        }

        return $this->_model;
    }

}