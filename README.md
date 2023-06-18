# Cat Shelter API

This is a RESTful API for managing cat shelters, including employees and cats. It uses Laravel framework, PHP 8.2 and MySQL database. Everything is dockerized for easy setup and execution.

## Prerequisites

Before you begin, ensure you have the following installed:

- Docker
- Docker Compose

## Getting Started

Clone the repository to your local machine:

```bash
git clone https://github.com/kamreo/CatShelterAPI.git
cd cat-shelter-api
```
Build the Docker images:

```bash
docker-compose build
```
Start the services:
```bash
docker-compose up -d
```

Now you can access API docs at http://localhost:8000/api/documentation:

![img.png](/cat-shelter-api/resources/images/img.png)
## Running tests
```bash
make app-test APP_CONTAINER_NAME=your_app_container_name
```
## Accessing the database
```bash
make db-shell DB_CONTAINER_NAME=your_db_container_name
```
