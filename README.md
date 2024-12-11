# Service Pattern

## Overview
The Service Pattern is a design pattern that encapsulates business logic into dedicated service classes. This pattern helps maintain separation of concerns and improves code organization by isolating business operations from other layers of the application.

## Purpose
- Separate business logic from controllers and models
- Promote code reusability
- Make testing easier by isolating business operations
- Reduce controller complexity
- Improve maintainability

## Structure
- Service classes are typically located in the `app/Services` directory.
- Each service class is named after the feature it encapsulates, using camelCase notation.
- Services are responsible for handling business logic related to a specific feature or module.
- Services can be used by controllers or other components that need to perform specific operations.

## Usage
- Create a new service class in the `app/Services` directory.
- Implement the business logic in the service class.
- Use the service class in controllers or other components that need to perform specific operations.

## Installation
- Run `composer require rez1pro/service-create-command`
- Run `php artisan make:service <service-name>` to create a new service class.

## Register Service Provider
in `bootstrap/providers.php`
```php
Rez1pro\ServicePattern\ServicePatternServiceProvider::class,
```


## Example
- Run `php artisan make:service SendMessageService` to create a new service class.
