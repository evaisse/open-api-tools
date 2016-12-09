<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:47
 */
namespace OpenApi;

/**
 * Class Tag
 * @package OpenApi
 */
class Tag implements \JsonSerializable
{
    function jsonSerialize()
    {
        return $this;
    }


}