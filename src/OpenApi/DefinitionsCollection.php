<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:49
 */
namespace OpenApi;

/**
 * Class DefinitionsCollection
 * @package OpenApi
 */
class DefinitionsCollection extends ArrayList
{

    /**
     * @var SchemaDefinition[]
     */
    protected $items = [];

    /**
     * @param SchemaDefinition $definition
     * @return DefinitionsCollection
     */
    public function set(SchemaDefinition $definition)
    {
        $key = (string)$definition->getName();
        if (empty($key) || !$definition) {
            throw new \InvalidArgumentException('Invalid key or definition');
        }
        $this->items[$key] = $definition;
        return $this;
    }


    /**
     * @param string $key
     * @return SchemaDefinition|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }


    /**
     * @return SchemaDefinition[]
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
        return $this->items;
    }

}
