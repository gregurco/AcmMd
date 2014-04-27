<ul class="clearfix port-det port-thumb">
    <h2>
        <?=$data->title ?>
    </h2>
    <div id="yw0" class="list-view">
        <div class="items">
            <?php
            foreach ($data->article as $article){
                echo '<li class="..." data-id="web print">';
                echo CHtml::link($article->title, array("view", "id" => $article->id));
                echo '</li>';
            }
            ?>
        </div>
    </div>
</ul>