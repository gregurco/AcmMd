<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="Олимпиады по информатике. Новости, задачи, решения. Автоматическая система проверки.">
    <meta name="keywords" content="программирование, задачи по программированию, разбор задач, проверяющая система, acm, асм">
    <meta name='yandex-verification' content='5588bb78e7752088' />
    <meta name="google-site-verification" content="xih-VBQbOWHyRsJQHEWFn1PpWaYMASeuVBphIpY96xU" />
    <meta name="keywords" content="" />
    <meta name="description" content="Pascal Guide" />

    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js" type="text/javascript"></script>

    <script>var now = new Date(<?=date("Y, n-1, j, H ,i, s")?>);</script>
    <script language="javascript" type="text/javascript">
        function clearText(field){
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }

        function ShowTime(){
            now.setTime(now.getTime());
            timer.innerHTML =now.toLocaleString()+"&nbsp;";
            window.setTimeout('ShowTime()',1000);
        }
    </script>

    <!-- Рейтинг майл -->
        <script type="text/javascript">//<![CDATA[
            var _tmr = _tmr || [];
            _tmr.push({id: "2428636",  type: "pageView", start: (new Date()).getTime()});
            (function (d, w) {
                var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true;
                ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
                var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
                if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
            })(document, window);

            //]]>
        </script>
        <noscript>
            <div style="position:absolute;left:-10000px;">
                <img src="//top-fwz1.mail.ru/counter?id=2428636;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
            </div>
        </noscript>
    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
</head>

<body onload="ShowTime();">
    <div id="templatemo_body_wrapper">
        <div id="templatemo_wrapper">
            <div id="templatemo_header">
                <div style="position: absolute; ">
                    <? $this->widget('LanguageSwitcherWidget');?>
                </div>

                <div id="site_title">
                    <?=CHtml::link("Algoritmica", array('/'.Yii::app()->defaultController.'/index'))?>
                </div>

                <div id="search_box">
                    <div id="timer" style="color: white;"></div>
                </div>
                <!--
                <div id="search_box">
                    <form action="#" method="get">
                        <input type="text" value="Введите искомое..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                      <input type="submit" name="Search" value="Поиск" id="searchbutton" title="Search" />
                    </form>
                </div>
                -->
                <div class="cleaner"></div>
            </div>

            <div style="text-align: -webkit-center;">
                <?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=>'Стартовая', 'url'=>array('/'.Yii::app()->defaultController.'/index')),
                        array('label'=>'Новости', 'url'=>array('news/')),
                        array('label'=>'Пользователи', 'url'=>array('user/')),
                        array('label'=>'Задачи', 'url'=>array('')),
                        array('label'=>'Настройки', 'url'=>array('')),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                    'activateParents'=>true,
                    'id' => 'menu',
                    //'itemTemplate' => '{menu}',
                )); ?>
                <!--
                <ul id="menu">
                    <li><a href="#">Стартовая</a></li>
                    <li>
                        <a href="#">Пользователи</a>
                        <ul>
                            <li><a href="#">Все пользователи</a></li>
                            <li><a href="#">Создать пользователя</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Задачи</a>
                        <ul>
                            <li>
                                <a href="#">Work 1</a>
                                <ul>
                                    <li>
                                        <a href="#">Work 11</a>
                                        <ul>
                                            <li>
                                                <a href="#">Work 111</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 112</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 113</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Work 12</a>
                                        <ul>
                                            <li>
                                                <a href="#">Work 121</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 122</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 123</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Work 13</a>
                                        <ul>
                                            <li>
                                                <a href="#">Work 131</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 132</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 133</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Work 2</a>
                                <ul>
                                    <li>
                                        <a href="#">Work 21</a>
                                        <ul>
                                            <li>
                                                <a href="#">Work 211</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 212</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 213</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Work 22</a>
                                        <ul>
                                            <li>
                                                <a href="#">Work 221</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 222</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 223</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Work 23</a>
                                        <ul>
                                            <li>
                                                <a href="#">Work 231</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 232</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 233</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Work 3</a>
                                <ul>
                                    <li>
                                        <a href="#">Work 31</a>
                                        <ul>
                                            <li>
                                                <a href="#">Work 311</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 312</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 313</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Work 32</a>
                                        <ul>
                                            <li>
                                                <a href="#">Work 321</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 322</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 323</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Work 33</a>
                                        <ul>
                                            <li>
                                                <a href="#">Work 331</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 332</a>
                                            </li>
                                            <li>
                                                <a href="#">Work 333</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Настройки</a>
                    </li>
                </ul>
                -->
            </div>

            <div id="templatemo_main">
                <table style="width: 100%;">
                    <tr>
                        <p style="color: GREEN;">language: <?=Yii::app()->session['language']?></p>

                        <td style="width: 70%;" valign=top>
                            <?php echo $content; ?>
                        </td>
                    </tr>
                </table>
                <div class="cleaner"></div>
            </div>

        </div>
        <div class="cleaner"></div>
    </div>


    <div id="templatemo_footer_wrapper">
        <div id="templatemo_footer">
            <div class="footer_box col_w300">
                <h4>Читаемые статьи:</h4>
                <ul class="footer_menu">

                </ul>
            </div>

            <div class="footer_box col_w300">
                <h4>Популярные темы:</h4>
                <ul class="footer_menu">

                </ul>
            </div>

            <div class="footer_box col_w160">
                <h4>Ссылки:</h4>
                <ul class="footer_menu">
                    <!--<li>ссылки</li>-->
                </ul>
            </div>

            <div class="footer_box col_w300" style="max-width: 300px;">
                <h4>Активные сегодня:</h4>
            </div>

            <div class="footer_box col_w300 fb_last">
                <h4>Рейтинг:</h4>

                <a target="_blank" href="http://top.mail.ru/jump?from=2428636">
                    <img src="//top-fwz1.mail.ru/counter?id=2428636;t=341;l=1"
                         border="0" height="18" width="88" alt="Рейтинг@Mail.ru"></a>

                <br>

                <script id="oa-script" type="text/javascript">
                    var _oaq = _oaq || [];
                    _oaq.push(['setSiteId', 'MD-3090.74561-1']);
                    _oaq.push(['trackPageView']);
                    _oaq.push(['enableLinkTracking']);
                    (function () {
                        var d=document;var oa=d.createElement('script'); oa.type='text/javascript';
                        oa.async=true; oa.src=d.location.protocol+'//www.ournet-analytics.com/top20md.js';
                        var s=d.getElementsByTagName('script')[0]; s.parentNode.insertBefore(oa, s);})();
                </script>
                <noscript><p><a href="http://www.top20.md">Top20.md</a></p></noscript>
            </div>
            <div class="cleaner"></div>
        </div>
    </div>

    <div class="clear"></div>

    <div id="templatemo_copyright" style="height: 75px; text-align: center;">
        Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div>

</body>
</html>
