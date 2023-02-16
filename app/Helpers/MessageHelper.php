<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Session;

class MessageHelper
{
    public $type;
    public $msg;

    public const MESSAGE_TYPE_SUCCESS = 'success';
    public const MESSAGE_TYPE_ERROR = 'error';

    public const SAVED_SUCCESSFULLY_TEXT = 'Data saved successfully!';
    public const ERROR_ON_SAVING_TEXT = 'Data could not be saved!';
    public const RECORD_NOT_FOUND = 'Record not found';
    public const DELETED_SUCCESSFULLY = 'Data deleted successfully!';

    public const NOT_FOUND_TEXT = 'User not found';
    public const NOT_FOUND_CODE = 404;

    public function __construct(string $type, string $text)
    {
        $this->type = $type;
        $this->msg = $text;
    }

    public static function generate(string $type, string $text): self
    {
        return new self($type, $text);
    }

    public static function flash(string $type, string $text): void
    {
        $flashMsg = self::generate($type, $text);
        Session::flash($flashMsg->type, $flashMsg->msg);
    }

    public static function deleted()
    {
        return back()->with(self::MESSAGE_TYPE_SUCCESS, self::DELETED_SUCCESSFULLY);
    }

    public static function recordNotFound()
    {
        return back()->with(self::MESSAGE_TYPE_ERROR, self::RECORD_NOT_FOUND);
    }

    public static function saved()
    {
        return back()->with(self::MESSAGE_TYPE_SUCCESS, self::SAVED_SUCCESSFULLY_TEXT);
    }
}
