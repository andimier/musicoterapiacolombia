<?php
    class ImageCrop {
        public static $srcImagePath = '';
        public static $imageProps = [];
        public static $squaredSizes = [300, 400, 500];

        private static function createResourceFromPath() {
            return imagecreatefromjpeg(self::$imageProps['srcImagePath']);
        }

        private static function createDestinationResource($props) {
            $dst_image = imagecreatetruecolor($props['dst_width'], $props['dst_height']);  //  esta funcion crea un rec negro con los parametros dados

            imagealphablending($dst_image, false);
            imagesavealpha($dst_image, true);
            $trans_colour = imagecolorallocatealpha($dst_image, 0, 0, 0, 127);
            imagefill($dst_image, 0, 0, $trans_colour);

            return $dst_image;
        }

        private static function createResampledImageCopy($prop) {
            $src_image = static::createResourceFromPath();
            $dst_image = static::createDestinationResource($prop);

            $dst_x = 0;
            $dst_y = 0;

            $src_x = $prop['src_x'];
            $src_y = $prop['src_y'];;

            $dst_width = $prop['dst_width'];
            $dst_height = $prop['dst_height'];

            $src_w = $prop['src_width'];
            $src_h = $prop['src_height'];

            imagecopyresampled(
                $dst_image,
                $src_image,
                $dst_x,
                $dst_y,
                $src_x,
                $src_y,
                $dst_width,
                $dst_height,
                $src_w,
                $src_h
            );

            return $dst_image;
        }

        private static function getSquaredImageProps() {
            $width = self::$imageProps['width'];
            $height = self::$imageProps['height'];
            $sizes = self::$squaredSizes;

            $p = [];
            $src_x = 0;
            $src_y = 0;

            if ($width > $height) {
                $src_x = ($width / 2) - ($height / 2);
                $src_width = $height;
                $src_height = $height;
            }

            if ($height > $width) {
                $src_y = ($height / 2) - ($width / 2);
                $src_width = $width;
                $src_height = $width;
            }

            array_push($sizes, $src_width);

            for ($i = 0; $i < count($sizes); $i++) {
                array_push($p, [
                    'src_x' => $src_x,
                    'src_y' => $src_y,
                    'src_width' => $src_width,
                    'src_height' => $src_height,
                    "dst_x" => 0,
                    "dst_y" => 0,
                    "dst_width" => $sizes[$i],
                    "dst_height" => $sizes[$i]
                ]);
            }

            return $p;
        }

        private static function getRectangularprops() {
            $scale_ratio = $w_orig / $h_orig;
            $w = 500;
            $h = 500 / $scale_ratio;
        }

        private static function getDestinationUrl($prop) {
            $e = explode('.', static::$imageProps['imageName']);
            $ext = end($e);
            $folder = self::$imageProps['folder'];

            return "{$folder}{$e[0]}_{$prop['dst_width']}_x_{$prop['dst_height']}.{$ext}";
        }

        private static function createSquaredImagesSet() {
            $props = static::getSquaredImageProps();

            for ($i = 0; $i < count($props); $i++) {
                $new_img_resource = static::createResampledImageCopy($props[$i]);
                $destination = self::getDestinationUrl($props[$i]);

                imagejpeg($new_img_resource, $destination, 100);
            }
        }

        private static function setImageProps($srcImagePath) {
            $p = getimagesize($srcImagePath);

            $props['srcImagePath'] = $srcImagePath;
            $props['folder'] = '../images/';
            $props['width'] = $p[0];
            $props['height'] = $p[1];
            $props['isSquaredImage'] = ($p[0] == $p[1]);

            $ext_arr = explode('/', $p['mime']);
            $props['extension'] = end($ext_arr);

            $e = explode('/', $srcImagePath);
            $props['imageName'] = end($e);

            self::$imageProps = $props;
        }

        public static function createNewImagesSet($srcImagePath) {
            self::setImageProps($srcImagePath);

            if (self::$imageProps{'isSquaredImage'}) {
                $props = [
                    "src_x" => 0,
                    "src_y" => 0,
                    "src_width" => $width,
                    "src_height" => $heigh
                ];

                static::createSquaredImagesSet();
            } else {
                // build squared image
                $baseSquaredImage = static::createSquaredImagesSet();
            }
        }
    }

    ImageCrop::createNewImagesSet('../images/small/img1.jpg');
?>