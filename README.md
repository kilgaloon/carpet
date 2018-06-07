# Carpet

Carpet is a tool that helps you map database columns and migrate them to another database.
Carpet is using Eloquent so you can do everything Eloquent lets you to do.

## Getting Started

#### 1. Configuration

##### 1.1 Database
`default` database should be always present, it represents your database you want to use to move data from. You can add other connection settings and name them as you like, but be carefull, you will use these names in models later.

##### 1.2 Map
This configurations is used to map tables from `default` database to new database models, for sake of documentation we will use some dummy names. ex:

    return [
        "recipes" => Models\Recipes::class
    ];
    
#### 2. Models
All models should be models directory, they are preset in autoloader but you can change that, or add another directories, it's on you.

All models should extend `Carpet\Database\Model`.

`Model` class will provide you with `abstract protected function map() : array`, which you will use to map your columns. ex: 

    return [
        "id" => "id",
        "title" => "name"
    ];
    
This package use `Eloquent` so you can use everything Eloquent allows you to do. If you never worked with `Eloquent`, most important thing you will need here are [mutators](https://laravel.com/docs/5.6/eloquent-mutators#defining-a-mutator).