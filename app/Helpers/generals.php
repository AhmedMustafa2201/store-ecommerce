<?php

    // define('PAGINATE_COUNT',15);
    function getFolder(){
        return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
    }

    function getDefualtLang(){
        return app()->getLocale() == "ar" ? "rtl" : "ltr";
    }

    // function uploadImage($folder,$image){
    //     $image->store('/', $folder);
    //     $filename = $image->hashName();
    //     return  $filename;
    //  }

    /* "psr-4": {
    //     "App\\": "app/",
    //     "Database\\Factories\\": "database/factories/",
    //     "Database\\Seeders\\": "database/seeders/"
        }*/
?>
