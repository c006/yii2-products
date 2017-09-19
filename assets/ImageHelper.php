<?php

namespace c006\products\assets;

use c006\products\models\ProductImage;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;

class ImageHelper
{
    private $base_path = '';
    private $imagine;
    private $image     = [];
    private $sizes     = [
        'sml' => 200,
        'med' => 400,
        'lrg' => 800,
    ];

    function __construct($base_path = FALSE)
    {
        $this->base_path = ($base_path) ? $base_path : \Yii::getAlias('@frontend') . '/web/images/products';
        $this->imagine   = new Imagine();
    }

    /**
     * @param     $product_id
     * @param     $array_file
     */
    public function imageSet($product_id, $array_file)
    {
        $this->image = [
            'image' => $array_file['tmp_name']['imageSet'],
            'size'  => getimagesize($array_file['tmp_name']['imageSet']),
        ];

        self::deleteProductImages($product_id);

        $pos  = 1;
        $time = time();
        foreach ($this->sizes as $k => $size) {
            $size  = self::getNewImageSize($k);
            $file  = $product_id . '-' . $time++ . '.jpg';
            $image = $this->imagine->open($this->image['image']);
            $image->resize(new Box($size['w'], $size['h']));
            $image->save($this->base_path . '/' . $file, ['quality' => 90]);
            ModelHelper::saveModelForm('c006\products\models\ProductImage', ['product_id' => $product_id, 'size' => $k, 'file' => $file, 'position' => $pos++]);
        }
    }

    /**
     * @param     $product_id
     * @param     $array_file
     * @param int $id
     */
    public function imageExtra($product_id, $array_file, $id = 0)
    {
        $this->image = [
            'image' => $array_file['tmp_name']['imageExtra'],
            'size'  => getimagesize($array_file['tmp_name']['imageExtra']),
        ];

        $pos = self::getPositionCount($product_id) + 1;
        foreach ($this->sizes as $k => $size) {
            if ($k != 'lrg') {
                continue;
            }
            $size  = self::getNewImageSize($k);
            $file  = $product_id . '-' . time() . '.jpg';
            $image = $this->imagine->open($this->image['image']);
            $image->resize(new Box($size['w'], $size['h']));
            $image->save($this->base_path . '/' . $file, ['quality' => 90]);
            $id = self::getImageId($file);
            ModelHelper::saveModelForm('c006\products\models\ProductImage', ['id' => $id, 'product_id' => $product_id, 'size' => $k, 'file' => $file, 'position' => $pos]);
        }
    }

    /**
     * @param           $size
     * @param bool|TRUE $keep_ratio
     *
     * @return array
     */
    private function getNewImageSize($size, $keep_ratio = TRUE)
    {

        $nw = $nh = $this->sizes[ $size ];

        if ($keep_ratio) {
            /* W > H */
            if ($this->image['size'][0] > $this->image['size'][1]) {
                $ratio = $this->image['size'][1] / $this->image['size'][0];
                $nh    = $nw * $ratio;
            } else {
                /* H > W */
                $ratio = $this->image['size'][0] / $this->image['size'][1];
                $nh    = $nh * $ratio;
            }
        }

        return ['w' => $nw, 'h' => $nh];
    }


    public function getPositionCount($product_id)
    {
        if ($product_id) {
            $model = ProductImage::find()
                ->where(['product_id' => $product_id])
                ->orderBy('position DESC')
                ->asArray()
                ->one();
            if (sizeof($model)) {
                return $model['position'];
            }
        }

        return 0;
    }

    /**
     * @param $file
     * @return int|mixed
     */
    public function getImageId($file)
    {
        if ($file) {
            $model = ProductImage::find()
                ->where(['file' => $file])
                ->asArray()
                ->one();
            if (sizeof($model)) {
                return $model['id'];
            }
        }

        return 0;
    }

    /**
     * @param $product_id
     * @throws \Exception
     */
    public function deleteProductImages($product_id)
    {
        $model = ProductImage::find()
            ->where(['product_id' => $product_id])
            ->asArray()
            ->all();
        foreach ($model as $item) {
            if (file_exists($this->base_path . '/' . $item['file'])) {
                unlink($this->base_path . '/' . $item['file']);
            }
            ProductImage::findOne($item['id'])->delete();
        }
    }

    /**
     * @param $image_id
     * @throws \Exception
     */
    public function imageDelete($image_id)
    {
        $model = ProductImage::find()
            ->where(['id' => $image_id])
            ->asArray()
            ->all();
        foreach ($model as $item) {
            if (file_exists($this->base_path . '/' . $item['file'])) {
                unlink($this->base_path . '/' . $item['file']);
            }
            ProductImage::findOne($item['id'])->delete();
        }
    }

    public function imageReplace($image_id, $array_file)
    {
        $model = ProductImage::find()
            ->where(['id' => $image_id])
            ->asArray()
            ->one();

        $this->image = [
            'image' => $array_file['tmp_name']['imageReplace'][ $image_id ],
            'size'  => getimagesize($array_file['tmp_name']['imageReplace'][ $image_id ]),
        ];

        $size  = self::getNewImageSize($model['size']);
        $image = $this->imagine->open($this->image['image']);
        $image->resize(new Box($size['w'], $size['h']));
        $image->save($this->base_path . '/' . $model['file'], ['quality' => 90]);
    }


}