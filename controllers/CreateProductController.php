<?php
namespace c006\products\controllers;

use c006\alerts\Alerts;
use c006\core\assets\CoreHelper;
use c006\products\assets\AssetTabs;
use c006\products\assets\FormHelper;
use c006\products\assets\ImageHelper;
use c006\products\assets\ModelHelper;
use c006\products\assets\ProdHelpers;
use c006\products\models\Product;
use c006\products\models\ProductType;
use Yii;
use yii\web\Controller;

/**
 * Class IndexController
 *
 * @package c006\products\controllers
 */
class CreateProductController extends Controller
{


    function init()
    {
        //$this->layout = '@c006/products/views/layouts/main';
        if (CoreHelper::isGuest()) {
            return $this->redirect('/user');
        }

        parent::init();
        AssetTabs::register($this->getView());


    }

    /**
     * @inheritdoc
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
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }


    /**
     *
     */
    public function actionIndex()
    {
        $model = new Product();
        if (isset($_POST['Product'])) {
            $model->product_type_id = $_POST['Product']['product_type_id'];
            $model_product_type     = ProductType::find()
                ->where(['id' => $model->product_type_id])
                ->asArray()
                ->one();
            $model_form_class       = FormHelper::createModelName($model_product_type['name']);
            if (isset($_POST[ $model_form_class ])) {
                $model_product = [
                    'store_id'        => 0,
                    'product_type_id' => $model_product_type['id'],
                ];
                $model_product = ModelHelper::saveModelForm('c006\products\models\Product', $model_product);

                /* Images */
                if (isset($_FILES)
                    && isset($_FILES['ComponentImage']['name']['imageSet'])
                    && !empty($_FILES['ComponentImage']['name']['imageSet'])
                ) {
                    $image = new ImageHelper(FALSE);
                    $image->imageSet($model_product->id, $_FILES['ComponentImage']);
                }
                /* Categories */
                if (isset($_POST['Category'])) {
                    foreach ($_POST['Category'] as $category_id) {
                        ProdHelpers::saveProductCategories($model_product->id, $category_id);
                    }
                }
                /* Tags */
                if (isset($_POST['Tags'])) {
                    foreach ($_POST['Tags'] as $pos => $_array) {
                        foreach ($_array as $null => $tag_id) {
                            ProdHelpers::saveProductTags($model_product->id, $tag_id, $pos);
                        }
                    }
                }
                /* Auto Ship */
                if (isset($_POST['AutoShip'])) {
                    ProdHelpers::saveProductAutoShip($model_product->id, $_POST['AutoShip']['id']);
                }

                /* Price Tier */
                if (isset($_POST['PriceTier'])) {
                    ProdHelpers::saveProductPriceTier($model_product->id, $_POST['PriceTier']['id']);
                }
                /* Product Url */
                if (isset($_POST['ComponentProductUrl'])) {
                    ProdHelpers::saveProductUrl($model_product->id, $_POST['ComponentProductUrl']['product_url']);
                }
                /* Packaging */
                if (isset($_POST['Packaging'])) {
                    foreach ($_POST['Packaging'] as $pos => $_array) {
                        foreach ($_array as $null => $tag_id) {
                            ProdHelpers::saveProductTags($model_product->id, $tag_id, $pos);
                        }
                    }
                }



                if (ProdHelpers::saveProductAttr($model_product->id, $_POST[ $model_form_class ])) {
                    Alerts::setAlertType(Alerts::ALERT_SUCCESS);
                    Alerts::setMessage('SUCCESS, product update complete');
                    Alerts::setCountdown(5);
                } else {
                    Alerts::setAlertType(Alerts::ALERT_DANGER);
                    Alerts::setMessage('Error, something happened saving the product');
                    Alerts::setCountdown(10);
                }

                return $this->redirect(['index']);
            }
            $model_form_class = 'c006\products\models\form\\' . $model_form_class;
            $model_form       = new $model_form_class();

            return $this->render('choose-type-attr',
                [
                    'product_id'         => 0,
                    'model'              => $model,
                    'model_form'         => $model_form,
                    'model_product_type' => $model_product_type,
                ]);
        }

        return $this->render('choose-type', ['model' => $model]);

    }


}
