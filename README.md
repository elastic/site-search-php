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

Method      | Description | Documentation
------------|-------------|--------------
**`asyncBulkCreateOrUpdateDocuments`**| Async bulk creation or update of documents in an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$documents` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_indexing)
**`bulkCreateDocuments`**| Bulk creation of documents in an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$documents` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_create)
**`bulkCreateOrUpdateDocuments`**| Bulk creation or update of documents in an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$documents` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_create_or_update_verbose)
**`bulkDeleteDocuments`**| Bulk delete of documents in an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$documents` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_destroy)
**`bulkUpdateDocuments`**| Bulk update of documents in an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$documents` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_update)
**`createDocument`**| Create a new document in an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$documentExternalId` (required) <br />   - `$documentFields` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#add-document)
**`createDocumentType`**| Create a new document type in an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeName` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#add-documenttype)
**`createEngine`**| Create a new API based engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$engineLanguage`<br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/engines#create)
**`createOrUpdateDocument`**| Create or update a document in an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$documentExternalId` (required) <br />   - `$documentFields` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#add-document)
**`deleteDocument`**| Delete a document from the engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$externalId` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#delete-external-id)
**`deleteDocumentType`**| Delete a document type by id.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#documenttypes-delete)
**`deleteEngine`**| Delete an engine by name.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/engines#destroy)
**`getAutoselectsCountAnalytics`**| Retrieve number of autoselects (number of clicked results in the autocomplete) per day over a period.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$startDate`<br />   - `$endDate`<br/>
**`getClicksCountAnalytics`**| Retrieve number of clicks per day over a period.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$startDate`<br />   - `$endDate`<br/>
**`getDocument`**| Retrieve a document from the engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$externalId` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#document-single)
**`getDocumentReceipts`**| Check the status of document receipts issued by aync bulk indexing.<br/> <br/> **Parameters :** <br />  - `$receiptIds` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#bulk_create_or_update_verbose)
**`getDocumentType`**| Get a document type by id.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#documenttypes-single)
**`getEngine`**| Retrieves an engine by name.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/engines#one-engine)
**`getSearchCountAnalytics`**| Get the number of searches per day for an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$startDate`<br />   - `$endDate`<br/>
**`getTopNoResultQueriesAnalytics`**| Retrieve top queries with no result and usage count over a period.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$startDate`<br />   - `$endDate`<br />   - `$currentPage`<br />   - `$pageSize`<br/>
**`getTopQueriesAnalytics`**| Retrieve top queries and usage count over a period.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$startDate`<br />   - `$endDate`<br />   - `$currentPage`<br />   - `$pageSize`<br/>
**`listDocumentTypes`**| List all document types for an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#documenttypes-all)
**`listDocuments`**| List all documents in an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#document-all)
**`listEngines`**| Retrieves all engines with optional pagination support.<br/> <br/> **Parameters :** <br />  - `$currentPage`<br />   - `$pageSize`<br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/engines#list)
**`logClickthrough`**| Record a clickthrough for a particular result.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$documentId` (required) <br />   - `$queryText` (required) <br/>
**`search`**| Run a search request accross an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$queryText` (required) <br />   - `$searchRequestParams`<br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/searching)
**`suggest`**| Run an autocomplete search request accross an engine.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$queryText` (required) <br />   - `$searchRequestParams`<br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/autocomplete)
**`updateDocumentFields`**| Update fields of a document.<br/> <br/> **Parameters :** <br />  - `$engineName` (required) <br />   - `$documentTypeId` (required) <br />   - `$externalId` (required) <br />   - `$fields` (required) <br/>|[Endpoint Documentation](https://swiftype.com/documentation/site-search/indexing#updating_fields)

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

