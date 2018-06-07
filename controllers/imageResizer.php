<?php
class imageResizer {

    protected $image;
    protected $image_type;

    public function load($filename) {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG){
            $this->image = imagecreatefromjpeg($filename);
        }elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
        }elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    public function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 100) {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        }elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
        }elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }
    }

    protected function getWidth() {
        return imagesx($this->image);
    }

    protected function getHeight() {
        return imagesy($this->image);
    }

    public function resizeToHeight($height) {
        $ratio = $height/$this->getHeight();
        $width = $this->getWidth()*$ratio;
        $this->resize($width, $height);
    }

    public function resizeToWidth($width) {
        $ratio = $width/$this->getWidth();
        $height = $this->getHeight()*$ratio;
        $this->resize($width, $height);
    }

    public function scale($scale) {
        $width = $this->getWidth()*$scale/100;
        $height = $this->getHeight()*$scale/100;
        $this->resize($width, $height);
    }

    public function resize($width, $height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image,0,0,0,0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }

    public function cut($x, $y, $width, $height) {
        $new_image = imagecreatetruecolor($width, $height);

            imagecolortransparent($new_image, imagecolorallocate($new_image, 0, 0, 0));
            imagealphablending($new_image, false);
            imagesavealpha($new_image, true);

            imagecopy($new_image, $this->image, 0, 0, $x, $y, $width, $height);

            $this->image = $new_image;
    }

    public function cutFromCenter($width, $height) {
        if ($width < $this->getWidth() && $width > $height) {
            $this->resizeToWidth($width);
        }
        if ($height < $this->getHeight() && $width < $height) {
            $this->resizeToHeight($height);
        }

        $x = ($this->getWidth() / 2) - ($width / 2);
        $y = ($this->getHeight() / 2) - ($height / 2);

        return $this->cut($x, $y, $width, $height);
    }

    public function noChange() {
        $width = $this->getWidth();
        $height = $this->getHeight();
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }

    public function maxArea($width, $height = NULL) {
        $height = $height ? $height : $width;
        if($this->getWidth() > $width) {
            $this->resizeToWidth($width);
        }
        if($this->getHeight() < $height) {
            $this->resizeToHeight($height);
        }
    }

    public function maxAreaFill($width, $height, $red = 255, $green = 255, $blue = 255) {
        $this->maxArea($width, $height);
        $new_image = imagecreatetruecolor($width, $height);
        $color_fill = imagecolorallocate($new_image, $red, $green, $blue);
        imagefill($new_image, 0, 0, $color_fill);
        imagecopyresampled($new_image,
                                        $this->image,
                                        floor(($width - $this->getWidth())/2),
                                        floor(($height - $this->getHeight())/2),
                                        0, 0,
                                        $this->getWidth(),
                                        $this->getHeight(),
                                        $this->getWidth(),
                                        $this->getHeight()
                            );
        $this->image = $new_image;
    }

    public function cutOrFill($width, $height, $red = 255, $green = 255, $blue = 255){
        if($this->getWidth() < $width OR $this->getHeight() < $height) {
            $this->maxAreaFill($width, $height, $red, $green, $blue);
        } else {
            $this->cutFromCenter($width, $height);
        }
    }

}