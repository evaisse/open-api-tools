<?php
/**
 * User: evaisse
 * Date: 09/12/2016
 * Time: 12:49
 */
namespace OpenApi;

/**
 * Class ArrayList
 * @package OpenApi
 */
class Items extends \ArrayObject implements \JsonSerializable
{
    /**
     * @throws \InvalidArgumentException
     * @param int $index
     * @return boolean
     */
    public function offsetExists($index)
    {
        if (!is_int($index)) {
            throw new \InvalidArgumentException('Offset should be numeric');
        }
        return parent::offsetExists($index);
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return array_values($this->getArrayCopy());
    }


}