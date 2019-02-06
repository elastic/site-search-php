<p align="center"><img src="https://github.com/swiftype/swiftype-site-search-php/blob/master/logo-site-search.png?raw=true" alt="Elastic Site Search Logo"></p>

<p align="center"><a href="https://circleci.com/gh/swiftype/swiftype-site-search-php"><img src="https://circleci.com/gh/swiftype/swiftype-site-search-php.svg?style=svg&circle-token=9a11fb27c1d6961bb8887b684b0c7707b3b4eb6e" alt="CircleCI build"></a></p>

> A first-party PHP client for the [Elastic Site Search API](https://swiftype.com/documentation/site-search/overview).

## Contents

- [Getting started](#getting-started-)
- [Usage](#usage)
- [Development](#development)
- [FAQ](#faq-)
- [Contribute](#contribute-)
- [License](#license-)

***

## Getting started 🐣

You can install the client in your project by using composer:

```bash
composer require swiftype/swiftype-site-search-php
```

## Usage

### Clients methods

Method name |Parameters| Description
------------|----------|------------
`asyncBulkCreateOrUpdateDocuments` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$documents` (required)  | Async bulk creation or update of documents in an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_indexing)
`bulkCreateDocuments` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$documents` (required)  | Bulk creation of documents in an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_create)
`bulkCreateOrUpdateDocuments` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$documents` (required)  | Bulk creation or update of documents in an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_create_or_update_verbose)
`bulkDeleteDocuments` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$documents` (required)  | Bulk delete of documents in an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_destroy)
`bulkUpdateDocuments` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$documents` (required)  | Bulk update of documents in an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_update)
`createDocument` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$documentExternalId` (required) <br /> - `$documentFields` (required)  | Create a new document in an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#add-document)
`createDocumentType` | - `$engineName` (required) <br /> - `$documentTypeName` (required)  | Create a new document type in an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#add-documenttype)
`createEngine` | - `$engineName` (required) <br /> - `$engineLanguage` | Create a new API based engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/engines#create)
`createOrUpdateDocument` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$documentExternalId` (required) <br /> - `$documentFields` (required)  | Create or update a document in an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#add-document)
`deleteDocument` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$externalId` (required)  | Delete a document from the engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#delete-external-id)
`deleteDocumentType` | - `$engineName` (required) <br /> - `$documentTypeId` (required)  | Delete a document type by id.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#documenttypes-delete)
`deleteEngine` | - `$engineName` (required)  | Delete an engine by name.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/engines#destroy)
`getDocument` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$externalId` (required)  | Retrieve a document from the engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#document-single)
`getDocumentReceipts` | - `$receiptIds` (required)  | Check the status of document receipts issued by aync bulk indexing.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_create_or_update_verbose)
`getDocumentType` | - `$engineName` (required) <br /> - `$documentTypeId` (required)  | Get a document type by id.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#documenttypes-single)
`getEngine` | - `$engineName` (required)  | Retrieves an engine by name.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/engines#one-engine)
`listDocumentTypes` | - `$engineName` (required)  | List all document types for an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#documenttypes-all)
`listDocuments` | - `$engineName` (required) <br /> - `$documentTypeId` (required)  | List all documents in an engine.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#document-all)
`listEngines` | - `$currentPage`<br /> - `$pageSize` | Retrieves all engines with optional pagination support.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/engines#list)
`updateDocumentFields` | - `$engineName` (required) <br /> - `$documentTypeId` (required) <br /> - `$externalId` (required) <br /> - `$fields` (required)  | Update fields of a document.<br />[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#updating_fields)

## Development

Code for the endpoints are generated automatically using a custom version of [OpenAPI Generator](https://github.com/openapitools/openapi-generator).

The easier way to regenerate endpoints is to use the docker laucher packaged in `vendor/bin`:

```bash
./vendor/bin/swiftype-codegen.sh
```

The custom generator will be build and launched using the following Open API spec file : `resources/api/api-spec.yml`.

You can then commit and PR your endpoint code and modified api-spec files.

The client class may be changed in some case. Do not forget to include it in your commit.

## FAQ 🔮

### Where do I report issues with the client?

If something is not working as expected, please open an [issue](https://github.com/swiftype/swiftype-site-search-php/issues/new).

### Where can I find the full API documentation ?

Your best bet is to read the [documentation](https://swiftype.com/documentation/site-search).

### Where else can I go to get help?

You can checkout the [Elastic community discuss forums](https://discuss.elastic.co/c/site-search).

## Contribute 🚀

We welcome contributors to the project. Before you begin, a couple notes...

+ Before opening a pull request, please create an issue to [discuss the scope of your proposal](https://github.com/swiftype/swiftype-site-search-php/issues).
+ Please write simple code and concise documentation, when appropriate.

## License 📗

[Apache 2.0](https://github.com/swiftype/swiftype-site-search-php/blob/master/LICENSE) © [Elastic](https://github.com/elastic)

Thank you to all the [contributors](https://github.com/swiftype/swiftype-site-search-php/graphs/contributors)!

