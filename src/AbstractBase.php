<?php

namespace Oci8;

abstract class AbstractBase
{
    protected static $errorHandler;
    protected $resource;

    public function getError()
    {
        set_error_handler($this->getErrorHandler());
        $error = oci_error($this->resource);
        restore_error_handler();
        return $error;
    }

    /**
     * @return callable
     */
    protected static function getErrorHandler()
    {
        if (!static::$errorHandler) {
            static::$errorHandler = function ($severity, $message, $file = '', $line = 0) {
                restore_error_handler();
                $code = 0;

                $patterns = array('/ORA-(\d+)/', '/OCI-(\d+)/');
                foreach ($patterns as $pattern) {
                    preg_match($pattern, $message, $matches);
                    if (is_array($matches) && array_key_exists(1, $matches)) {
                        $code = (int) $matches[1];
                    }
                }

                throw new Exception($message, $code, $severity, $file, $line);
            };
        }

        return static::$errorHandler;
    }
}
