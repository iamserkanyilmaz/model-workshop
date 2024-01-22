# Model Workshop
## Requirements
- PHP 8.1
- MySQL
- Composer

## Configuration
You can configure environment variables in the .env file after composer install.


## Installation

You can run the code below to install the project setup.
```sh
composer install
```

You can run the code below to database migration
```sh
php artisan migrate
```

You can run the following code to create dummy data.
```sh
php artisan db:seed
```


## Run

You can use the code below to run the server. 
Afterwards, you can reach the working version of the project.
```sh
php artisan serve
```

## Comments

```sh
- I designed the tag model based on the Entity-Attribute-Value (EAV) data model.
- Having the model structured this way will provide flexibility for adding a new video type to the project and will also facilitate optimization.
- Additionally, I made an effort to avoid the occurrence of N+1 queries.
- Due to the existence of multiple similar video types, I created a generic video type service structure.
```

## Model Schema

![Model Schema](./schema.png?raw=true "Model Schema")

 
