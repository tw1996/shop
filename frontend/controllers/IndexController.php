<?php
namespace frontend\controllers;

//use Yii;
use yii\web\Controller;

class IndexController extends Controller
{
     
     public function actionIndex()
     {
          return $this->renderPartial('index');
     }
     public function actionError()
     {
          return $this->renderPartial('error');
     }
}