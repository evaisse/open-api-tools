<?php
/**
 * User: evaisse
 * Date: 12/09/2017
 * Time: 16:51
 */
namespace OpenApi;

/**
 * Class HeadersCollection
 * @package OpenApi
 */
class HeadersCollection implements \JsonSerializable
{

    /**
     * @var Header[]|Reference[]
     */
    protected $items = [];


    /**
     * @param Header|Reference $definitionOrReference
     * @return self
     */
    public function set($definitionOrReference)
    {
        /** @var Header|Reference $definitionOrReference */
        $key = (string)$definitionOrReference->getName();
        $this->items[$key] = $definitionOrReference;
        return $this;
    }


    /**
     * @param string $key
     * @return Header|Reference|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }


    /**
     * @return Header[]|Reference[]
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