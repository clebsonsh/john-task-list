# John Task List

## Story

João is tired of forgetting his tasks that he need to do daily. Your goal is to create a
tool that helps João to solve his problem in a simple way.

> **The solution**: Implement a RESTful API for a task management application (to-do list).

> > API endpoints:

-   api/v1/tasks (GET): Returns the list of all tasks. [paginated]
-   api/v1/tasks (POST): Creates a new task.
-   api/v1/tasks/{id} (GET): Returns the details of a specific task.
-   api/v1/tasks/{id} (PUT): Updates the details of a specific task.
-   api/v1/tasks/{id} (DELETE): Removes a specific task.

## Stack used

-   PHP
-   Laravel
-   MySQL
-   Docker

## How to run the API locally

> **Prerequisites**:

> > :heavy_exclamation_mark: **Procedures tested on the Linux command line only**

-   [Git](https://git-scm.com/downloads)

-   [Docker](https://docs.docker.com/get-docker/) and the port 8000 free to run the API

> **Download e instalation**:

-   Clone the repository

> > `git clone https://github.com/clebsonsh/john-task-list.git`

-   Go to API folder

> > `cd john-task-list`

-   Create the _.env_ file based on _.env.example_ (in this file are already the docker database settings)

> > `cp .env.example .env`

-   Build and start all docker containers (the first time you run the command may take a while, as it will download and configure all containers used by the API)

> > `docker-compose up -d`

-   Install Composer dependencies

> > `docker-compose exec app composer install`

-   Generate a APP_KEY

> > `docker-compose exec app php artisan key:generate`

-   Run migrations and seeds

> > `docker-compose exec app php artisan migrate:fresh --seed`

-   All done, our API is up and running at http://127.0.0.1:8000

## API deploy

-   This projects has deploy at http://167.99.234.134/

## Insomnia endpoints export

-   There is a file called `endpoints.json` at the project root folder with all local and remote endpoints for testing.
