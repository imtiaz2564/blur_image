<?php

    function pdf_to_image($directory) {

        if (!is_dir($directory)) {
            exit('Invalid diretory path');
        }

        $image = new Imagick();
        $files = glob($directory."*.pdf");
        foreach ($files as $file) {
            $image->readimage($file);
            $image->setImageFormat('jpg');
            $image->writeImage(chop($file,".pdf").'.jpg');
            $image->clear();
            $image->destroy();
        }
    }

    function blur_image($directory) {

        if (!is_dir($directory)) {
            exit('Invalid diretory path');
        }

        $files = glob("$directory*.{jpg,JPG}", GLOB_BRACE);
        foreach ($files as $file) {
            $image = new Imagick($file);
            $image->blurImage(10,8);
            $image->writeImage($file);
            $image->clear();
            $image->destroy();
        }
    }
    $directory = "C:/xampp/htdocs/ventus_imtiaz/blur_images_and_pdfs/";
    pdf_to_image($directory);
    blur_image($directory);

?>