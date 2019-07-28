<?php
    class ImageCrop {
        private static function createResourceFromPath($imagePath) {
            return imagecreatefromjpeg($imagePath);
        }

        private static function createDestinationResource() {
            $dst_image = imagecreatetruecolor(200, 200);  //  esta funcion crea un rec negro con los parametros dados

            imagealphablending($dst_image, false);
            imagesavealpha($dst_image, true);

            $trans_colour = imagecolorallocatealpha($dst_image, 0, 0, 0, 127);

            imagefill($dst_image, 0, 0, $trans_colour);

            return $dst_image;
        }

        private static function createResampledImageCopy($srcImagePath) {
            $src_image = static::createResourceFromPath($srcImagePath);
            $dst_image = static::createDestinationResource();

            $dst_x = 0;
            $dst_y = 0;

            $src_x = 0;
            $src_y = 0;

            $dst_width = 200;
            $dst_height = 200;

            $src_w = 200;
            $src_h = 200;

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
            $props = [];

            if ($width > $heigh) {
                $props['src_x'] = ($width / 2) - ($height / 2);
                $props['src_width'] = $height;
                $props['src_height'] = $height;
            }

            if ($height > $width){
                $props['src_y'] = ($height / 2) - ($width / 2);
                $props['src_width'] = $width;
                $props['src_height'] = $width;
            }

            return $props;
        }

        private static function getRectangularprops() {
            $scale_ratio = $w_orig / $h_orig;
            $w = 500;
            $h = 500 / $scale_ratio;
        }

        public static function createBaseSquaredImage() {
            $props = static::getSquaredImageProps();

            $new_img_resource = static::createResampledImageCopy($srcImagePath);
            // return imagejpeg($new_img_resource, $destination, 100);
        }

        private static function createSquaredImagesSet() {
            $sizes = [300, 400, 500];

            for ($i = 0; $i < count($sizes); $i++) {
                $props = [
                    "src_x" => 0,
                    "src_y" => 0,
                    "src_width" => $sizes[$i],
                    "src_height" => $sizes[$i]
                ];

                $new_img_resource = static::createResampledImageCopy($srcImagePath, $props);
                // return imagejpeg($new_img_resource, $destination, 100);
            }
        }

        public static function createNewImagesSet($srcImagePath) {
            // set base image
            // set isSquaredImage
            $isSquaredImage;

            if ($isSquaredImage) {
                $props = [
                    "src_x" => 0,
                    "src_y" => 0,
                    "src_width" => $width,
                    "src_height" => $heigh
                ];

                static::createSquaredImagesSet();
            } else {
                // build squared image
                $baseSquaredImage = static::createBaseSquaredImage();

                if ($baseSquaredImage) {
                    $destination = '../images/small/img3.jpg';
                    static::createSquaredImagesSet();
                }
            }
        }
    }

    ImageCrop::createNewImagesSet('../images/small/img1.jpg');
?>