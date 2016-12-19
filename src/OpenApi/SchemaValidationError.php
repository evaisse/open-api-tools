<?php
/**
 * User: evaisse
 * Date: 14/12/2016
 * Time: 16:11
 */
namespace OpenApi;

use League\JsonGuard\ValidationError;

/**
 * Class SchemaValidationError
 * @package OpenApi
 */
class SchemaValidationError extends \Exception
{
    /**
     * @param object            $schema
     * @param ValidationError[] $errors
     * @param \Exception|null   $previous
     */
    public function __construct($schema, array $errors = [], \Exception $previous = null)
    {
        $errors = array_map(function (ValidationError $e) {
            return json_encode($e->toArray());
        }, $errors);

        parent::__construct("Invalid schema given : " . json_encode($schema) . "\n with following errors\n - " . join("\n - ", $errors), 0, $previous);
    }

}