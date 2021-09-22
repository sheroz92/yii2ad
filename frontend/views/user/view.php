<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'id',
                'label' => 'Image',
                'value' => function ($model) {
                    $path = Yii::getAlias('@frontend/web');
                    $file = '/images/' . $model->id . '.jpg';
                    if (is_file($path . $file)) {
                        return $file;
                    }
                    return '';
                },
                'format' => ['image', ['width' => '100']],
            ],
            'username',
            'name',
            'last_name',
            'middle_name',
            'about:ntext',
            'birthday',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
