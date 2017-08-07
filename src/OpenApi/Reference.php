<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:55
 */
namespace OpenApi;

/**
 * Class Reference
 * @package OpenApi
 */
class Reference implements \JsonSerializable
{


    /**
     * @var string schema ref
     */
    protected $ref;

    /**
     * Reference constructor.
     * @param string $ref
     */
    public function __construct($ref)
    {
        $this->ref = $ref;
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
        return $this->ref;
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

}