<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\forms\SearchFilms;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchForm = new SearchFilms();
        if($searchForm->load(Yii::$app->request->get())) {
            if($searchForm->validate()) {
                // todo: filter here
            }
        }
        return $this->render('index', [
            'searchFilmsForm' => $searchForm,
        ]);
    }
}
