<?php
/**
 * User: evaisse
 * Date: 12/09/2017
 * Time: 16:15
 */
namespace OpenApi;

/**
 * Class RequestBodiesCollection
 * @package OpenApi
 */
class RequestBodiesCollection implements \JsonSerializable
{


    /**
     * @var Example[]|Reference[]
     */
    protected $items = [];


    /**
     * @param Example|Reference $definitionOrReference
     * @return self
     */
    public function set($definitionOrReference)
    {
        /** @var Example|Reference $definitionOrReference */
        $key = (string)$definitionOrReference->getName();
        $this->items[$key] = $definitionOrReference;
        return $this;
    }


    /**
     * @param string $key
     * @return Example|Reference|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }


    /**
     * @return Example[]|Reference[]
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