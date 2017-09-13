<?php
/**
 * User: evaisse
 * Date: 12/09/2017
 * Time: 16:04
 */
namespace OpenApi;

/**
 * Class SchemasCollection
 * @package OpenApi
 */
class SchemasCollection implements \JsonSerializable
{


    /**
     * @var SchemaDefinition[]|Reference[]
     */
    protected $items;


    /**
     * @param SchemaDefinition|Reference $definitionOrReference
     * @return self
     */
    public function set($definitionOrReference)
    {
        /** @var SchemaDefinition|Reference $definitionOrReference */
        $key = (string)$definitionOrReference->getName();
        $this->items[$key] = $definitionOrReference;
        return $this;
    }


    /**
     * @param string $key
     * @return SchemaDefinition|Reference|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }


    /**
     * @return SchemaDefinition[]|Reference[]
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return empty($this->items) ? (object)$this->items : $this->items;
    }
}