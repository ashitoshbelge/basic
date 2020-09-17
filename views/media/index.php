<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\web\UploadedFile;

$this->title = "Media Gallery";
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?php echo Html::a('Upload File', ['upload'],['class' => 'btn btn-primary'] )  ?>

</p>
<div class="container">
    <div class="row">
        <?php foreach ($medias as $media) {
        ?>
            <div class="col-md-3">
            <div class="card">
                <img src="<?php echo Yii::getAlias('@web').'/'.$media->filepath; ?>" alt="" class="card-mg-top" width="100%">
                <div class="card-body">
                    <h5 class="card-title" style="word-wrap: break-word;"><?php echo $media->filename; ?></h5>
                    <div class="text-right" style="margin-bottom: 10px;">
                        <?php
                        echo Html::a('Download', ['download', 'id'=>$media->id], ['class'=>'btn btn-primary']);
                        echo "&nbsp;";
                        echo Html::a('Delete', ['delete', 'id' => $media->id], ['class' => 'btn btn-danger']);

                        ?>
                    </div>
                </div>
            </div>

            </div>
        <?php }?>
    </div>
</div>