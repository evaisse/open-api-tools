<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 12:42
 */
namespace OpenApi;

/**
 * Class BodyParameter
 * @package OpenApi
 */
class BodyParameter extends Parameter
{

    /**
     * {@inheritDoc}
     */
    protected $in = "body";


    /**
     * @var SchemaDefinition
     */
    protected $schema;

    /**
     * @param string           $name
     * @param SchemaDefinition $schema
     */
    function __construct($name, SchemaDefinition $schema)
    {
        parent::__construct($name, []); // TODO: Change the autogenerated stub
        $this->schema = $schema;
    }


    /**
     * @param boolean $required
     * @return Parameter
     */
    public function setRequired($required)
    {
        $this->required = !!$required;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $set = parent::jsonSerialize(); // TODO: Change the autogenerated stub

        foreach ($set as $k => $v) { // filter json output
            if (!in_array($k, ['description', 'name', 'in', 'required', 'schema'])) unset($set[$k]);
        }

        return $set;
    }


}