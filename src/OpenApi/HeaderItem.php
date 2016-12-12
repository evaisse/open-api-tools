<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 10:54
 */
namespace OpenApi;

/**
 * Class HeaderItem
 * @package OpenApi
 */
class HeaderItem extends ItemObject
{

    /**
     * @var	string	A short description of the header.
     */
    protected $description;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return HeaderItem
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }



}