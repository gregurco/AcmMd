<?
class LanguageSwitcherWidget extends CWidget
{
    public function run()
    {
        $currentUrl = ltrim(Yii::app()->request->url, '/');
        $links = array();
        foreach (DMultilangHelper::suffixList() as $suffix => $name){
            $url = '/' . ($suffix ? trim($suffix, '_') . '/' : '') . $currentUrl;
            $links[] = CHtml::link(CHtml::image('/images/'.$name.'.gif', $name, array('height' => 20, 'width' => 32, 'style' =>'margin-right: 5px;')), $url);
        }

        echo implode("", $links);
    }
}