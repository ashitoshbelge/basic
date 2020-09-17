<?php

namespace app\controllers;

use Yii;
use app\models\Media;
use yii\web\UploadedFile;

class MediaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $data = Media::find()->all();
        return $this->render('index',['medias'=>$data]);
    }
    public function actionDownload($id)
    {
        $data = Media::findOne($id);
        header('Content-Type:'.pathinfo($data->filepath, PATHINFO_EXTENSION));
        header('Content-Disposition: attachment; filename='.$data->filename);
        return readfile($data->filepath);
    }

    public function actionDelete($id)
    {
        $data = Media::findOne($id);
        unlink($data->filepath);
        $data->delete();
        return $this->redirect(['index']);
    }

    public function actionUpload()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['index']);
        }else{
        $model = new Media();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                $names = UploadedFile::getInstances($model, 'filename');

                foreach ($names as $name) {
                    $path = 'uploads/' . md5($name->basename) . '.' . $name->extension;
                    if($name->saveAs($path)){
                        $filename = $name->baseName. '.' .$name->extension;
                        $filepath = $path;
                        Yii::$app->db->createCommand()->insert('media', ['filename'=>$filename, 'filepath'=>$filepath])
                        ->execute();
                    }
                }
                return $this->redirect(['index']);

            }
        }


        return $this->render('upload', [
            'model' => $model,
        ]);
        }
    }

}
?>
