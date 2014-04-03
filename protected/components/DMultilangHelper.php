<?
/**
 * @author ElisDN <mail@elisdn.ru>
 * @link http://www.elisdn.ru
 */
class DMultilangHelper
{
    public static function enabled()
    {
        return count(Yii::app()->params['translatedLanguages']) > 1;
    }

    public static function suffixList()
    {
        $list = array();
        $enabled = self::enabled();

        foreach (Yii::app()->params['translatedLanguages'] as $lang => $name)
        {
            //if ($lang === Yii::app()->params['defaultLanguage']) {
            //    $suffix = '';
            //    $list[$suffix] = $enabled ? $name : '';
            //} else {
                $suffix = '_' . $lang;
                $list[$suffix] = $name;
            //}
        }

        return $list;
    }

    public static function processLangInUrl($url)
    {
        if (self::enabled())
        {

            if (!isset(Yii::app()->session['language'])){
                self::selectLanguage(Yii::app()->params['defaultLanguage']);
            }

            $domains = explode('/', ltrim($url, '/'));

            $isLangExists = in_array($domains[0], array_keys(Yii::app()->params['translatedLanguages']));
            $isDefaultLang = $domains[0] == Yii::app()->params['defaultLanguage'];

            if ($isLangExists)
            {
                $lang = array_shift($domains);
                Yii::app()->setLanguage($lang);

                self::selectLanguage($lang);

                $url = '/' . implode('/', $domains);
                CController::redirect($url);
            }

            Yii::app()->sourceLanguage = Yii::app()->session['language'];


            $url = '/' . implode('/', $domains);
        }

        return $url;
    }

    public function selectLanguage($lang){
        Yii::app()->session['language'] = $lang;
        if (isset(Yii::app()->session['language'])){
            Yii::app()->language = Yii::app()->session['language'];
        }
    }
    /*
    public static function addLangToUrl($url)
    {
        if (self::enabled())
        {
            $domains = explode('/', ltrim($url, '/'));
            $isHasLang = in_array($domains[0], array_keys(Yii::app()->params['translatedLanguages']));
            $isDefaultLang = Yii::app()->getLanguage() == Yii::app()->params['defaultLanguage'];

            if ($isHasLang && $isDefaultLang)
                array_shift($domains);

            if (!$isHasLang && !$isDefaultLang)
                array_unshift($domains, Yii::app()->getLanguage());

            $url = '/' . implode('/', $domains);
        }

        return $url;
    }
    */
}