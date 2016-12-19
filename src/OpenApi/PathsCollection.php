<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:49
 */
namespace OpenApi;

/**
 * Class PathsCollection
 * @package OpenApi
 */
class PathsCollection implements \JsonSerializable
{

    /**
     * @var PathItem[]
     */
    protected $items = [];


    /**
     * @param PathItem $item
     * @return self
     */
    public function set(PathItem $item)
    {
        $key = (string)$item->getPath();
        $this->items[$key] = $item;
        return $this;
    }


    /**
     * @param string $key
     * @return PathItem|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }


    /**
     * @return PathItem[]
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