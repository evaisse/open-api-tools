<?php
/**
 * User: evaisse
 * Date: 14/12/2016
 * Time: 16:53
 */
namespace OpenApi;

use League\JsonGuard\Dereferencer;
use League\JsonGuard\Validator;

/**
 * Class SchemaValidation
 * @package OpenApi
 */
class SchemaValidation
{


    /**
     * @var \stdclass[]
     */
    protected static $compiled = [];


    /**
     * @param mixed $api
     * @throws SchemaValidationError
     */
    public static function validateOpenApi($api)
    {
        self::validateAgainstSchema($api, 'file://'.__DIR__.'/../../schemas/open-api.json');
    }

    /**
     * @param mixed $schema
     * @throws SchemaValidationError
     */
    public static function validateJsonSchema($schema)
    {
        self::validateAgainstSchema($schema, 'file://'.__DIR__.'/../../schemas/json-schema.draft4.json');
    }

    /**
     * @param mixed         $value
     * @param string|object $schema schema definition of path to a schema.json file://foo/bar/schema.json or http://foo.bar/schema.json
     * @throws SchemaValidationError
     * @return boolean
     */
    protected static function validateAgainstSchema($value, $schema)
    {
        $value = json_decode(json_encode($value));
        $validator = new Validator($value, self::getSchema($schema));
        if ($validator->fails()) {
            throw new SchemaValidationError($value, $validator->errors());
        }
        return true;
    }

    /**
     * @param object| $srcOrSchema
     * @return \stdclass
     */
    protected static function getSchema($srcOrSchema)
    {
        $src = md5(serialize($srcOrSchema));
        if (empty(self::$compiled[$src])) {
            $deref = new Dereferencer(json_encode($srcOrSchema));
            self::$compiled[$src] = $deref->dereference($srcOrSchema);
        }
        return self::$compiled[$src];

    }
}