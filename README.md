# PHP client for the Swiftype Site Search API


#### Clients methods

Method name |Parameters| Description
------------|----------|------------
`listEngines` |  | Retrieves all engines with optional pagination support.<br />[Endpoint Documentation](https://swiftype.com/documentation/app-search/api/engines#list)


## Contributions

To contribute code, please fork the repository and submit a pull request.

### Developers

Code for the endpoints are generated automatically using a custom version of [OpenAPI Generator](https://github.com/openapitools/openapi-generator).

The easier way to regenerate endpoints is to use the docker laucher packaged in `vendor/bin`:

```bash
./vendor/bin/swiftype-codegen.sh
```

The custom generator will be build and launched using the following the `resources/api/api-spec.yml` file.

You can then commit and PR your endpoint code and modified api-spec files.
The client class may be changed in some case. Do not forget to include it in your commit.
