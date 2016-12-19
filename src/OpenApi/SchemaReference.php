<?php
/**
 * User: evaisse
 * Date: 13/12/2016
 * Time: 17:30
 */
namespace OpenApi;

/**
 * Class SchemaReference
 * @package OpenApi
 */
class SchemaReference implements \JsonSerializable, SchemaInterface, Referenceable
{

    /**
     * @var SchemaDefinition
     */
    protected $schema;

    /**
     * @var string schema ref
     */
    protected $ref;

    /**
     * @param string|SchemaDefinition $nameOrSchemaDefinition
     */
    function __construct($nameOrSchemaDefinition)
    {
        if ($nameOrSchemaDefinition instanceof SchemaDefinition) {
            $this->schema = $nameOrSchemaDefinition;
            $this->ref = $nameOrSchemaDefinition->getName();
        } else {
            $this->ref = $nameOrSchemaDefinition;
        }

        if (empty($this->ref) || !is_string($this->ref)) {
            throw new \InvalidArgumentException('Invalid reference length, '.$this->ref);
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            '$ref' => $this->getLink()
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->ref;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return "#/definitions/".$this->ref;
    }

}