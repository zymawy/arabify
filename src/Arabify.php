<?php
/**
 * Created by PhpStorm.
 * User: ironside
 * Date: 2/12/19
 * Time: 3:32 PM
 */
namespace Zymawy\Arabify;

class Arabify {

   public function arabify($title = null, $separator = "-")
    {
        $title = trim($title);
        $title = mb_strtolower($title, 'UTF-8');

        $title = str_replace('‌', $separator, $title);

        $title = preg_replace(
            '/[^a-z0-9_\s\-اآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوةيإأۀءهی۰۱۲۳۴۵۶۷۸۹٠١٢٣٤٥٦٧٨٩]/u',
            '',
            $title
        );

        $title = preg_replace('/[\s\-_]+/', ' ', $title);
        $title = preg_replace('/[\s_]/', $separator, $title);
        $title = trim($title, $separator);

        return $title;
    }
}