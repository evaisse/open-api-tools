<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:45
 */
namespace OpenApi;

/**
 * Class MetaData
 * @package OpenApi
 */
class MetaData
{
    /**
     * @var	string Required. The title of the application.
     */
    protected $title;
    /**
     * @var	string A short description of the application. GFM syntax can be used for rich text representation.
     */
    protected $description;
    /**
     * @var	string The Terms of Service for the API.
     */
    protected $termsOfService;
    /**
     * @var	MetaData\Contact Object	The contact information for the exposed API.
     */
    protected $contact;
    /**
     * @var	MetaData\License Object	The license information for the exposed API.
     */
    protected $license;
    /**
     * @var	string Required Provides the version of the application API (not to be confused with the specification version).
     */
    protected $version;
}