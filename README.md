# API in the right way

This project is a small example of a API, built on good development practices.

## Features

* REST endpoints;
* [GraphQL](https://graphql.org/learn/)
* Implements Resources and Transformers with [Fractal](https://fractal.thephpleague.com/)
* [Coming soon] Query string language to filter, paginate and sort the returned collections.
* [API Documentation](https://app.swaggerhub.com/apis-docs/api-right-way/API-RIGHT-WAY/1.0.0) with [Swager](https://swagger.io/docs/).
* [Domain Driven Design (DDD)](https://en.wikipedia.org/wiki/Domain-driven_design)
* [Single action Controllers](https://laravel.com/docs/5.7/controllers#single-action-controllers)
* Code coverage by tests with [PHPUnit](https://phpunit.de/) - [See the code coverage HTML report](https://cichondev.github.io/api-right-way/code-coverage)
* Docker for dev environment with [Ambientum](https://github.com/codecasts/ambientum)


## Installation

Use the package manager [composer](https://getcomposer.org) to install it.

```bash
# At the root of the project.
composer install
```

## Usage

You can run this project easily on your machine with [Docker](https://docs.docker.com/), you will also need the [Docker Compose](https://docs.docker.com/compose/).

```bash
# At the root of the project.
./bin up -d # Ready! The API is already available at http://localhost :)
./bin down  # Drop containers.
./bin composer update # Use the composer package manager.
./bin artisan # Use the Laravel command line.
./bin phpunit # PHPUnit tests
# OR
./bin ls -l # Run any command inside the container.
```

> All this was very easy thanks to the beautiful work done in this project [codecasts/ambientum](https://github.com/codecasts/ambientum)


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
Please make sure to update tests as appropriate.

## Authors
* [Edilson Cichon](https://github.com/cichondev)

## License
[MIT](https://choosealicense.com/licenses/mit/)
