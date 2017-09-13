<?php
/**
 * @see https://github.com/Azure/api-management-samples/blob/master/apis/httpbin.swagger.json
 */
include __DIR__ . '/../vendor/autoload.php';


$spec = new \OpenApi\Specification();
$spec->getInfo()
    ->setTitle('Swagger Petstore')
    ->setDescription("A sample API that uses a petstore as an example to demonstrate features in the swagger-2.0 specification")
    ->setVersion("1.0.0")
    ->setTermsOfService("http://swagger.io/terms/")
    ->setLicense(new \OpenApi\MetaData\License("MIT", "http://github.com/gruntjs/grunt/blob/master/LICENSE-MIT"))
    ->setContact(new \OpenApi\MetaData\Contact("Swagger API Team", "foo@example.net", "http://madskristensen.net"));

$server = new \OpenApi\Server("http://petstore.swagger.io/api");
$spec->addServer($server);


$emptyEntity = new \OpenApi\SchemaDefinition('EmptyEntity', [
    'type' => 'object',
    'properties' => new stdClass(),
]);

$spec->getComponents()->getSchemas()
    ->set($emptyEntity)
    ->set(new \OpenApi\SchemaDefinition('DefaultErrorResponseEntity', [
        'type' => 'object',
        'properties' => new stdClass(),
    ]));

/*
 * Create default responses
 */
$ref = $spec->getComponents()->getSchemas();

$spec->getComponents()->getResponses()
    ->set(new \OpenApi\ResponseDefinition(200,
        "Success response",
        $emptyEntity))
    ->set(new \OpenApi\ResponseDefinition(401,
        "Security Exception, you need a valid OAuth Token",
        $emptyEntity))
    ->set(new \OpenApi\ResponseDefinition(403,
        "This action is forbidden for current scope or user level",
        $emptyEntity))
    ->set(new \OpenApi\ResponseDefinition(404,
        "No Resources match your criterias",
        $emptyEntity))
    ->set(new \OpenApi\ResponseDefinition(406,
        "Invalid input parameters",
        $emptyEntity))
    ->set(new \OpenApi\ResponseDefinition(500,
        "Internal BRS api error",
        $emptyEntity))
    ->set(new \OpenApi\ResponseDefinition(503,
        "Infrastructure or partners are not available right now. Retry later",
        $emptyEntity))
;


$spec->getComponents()->getParameters()
    ->set(new \OpenApi\PathParameter('userHash', [
        "description" => "Unique user hash",
        "type"        => "string",
    ]));

$spec->getComponents()->getHeaders()
    ->set(new \OpenApi\Header("X-Custom-Header", [
        "type"        => "string",
        "description" => 'example custom header id',
        "pattern"     => "^([a-z0-9\\_]{1,32})\\.([a-z0-9\\_]{1,256})\\.([a-z0-9\\_]{1,32})$",
        "required"    => false,
    ]));



print json_encode($spec, JSON_PRETTY_PRINT);