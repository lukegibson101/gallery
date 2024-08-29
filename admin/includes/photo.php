<?php


class Photo extends Db_object {

    protected static $db_table = "photos";
    protected static $db_table_fields = [
        'photo_id',
        'title',
        'description',
        'filename',
        'type',
        'size'
    ];

    public $photo_id;
    public $title;
    public $descriptipn;
    public $filename;
    public $type;
    public $size;
}