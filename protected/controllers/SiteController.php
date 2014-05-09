<?php

class SiteController extends Controller
{
    public $layout='//layouts/column1';

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    public function actionFAQ()
    {
        if(Yii::app()->session['language'] == 'ru')
        {
            $this->render('view_faq_ru');
        }
        elseif(Yii::app()->session['language'] == 'ro')
        {
            $this->render('view_faq_ro');
        }


    }

}