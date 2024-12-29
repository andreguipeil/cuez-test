# Test - Transaction Structure

**name:** André Guimarães</br>
**contact:** andreguipeil@gmail.com

## 1. _Description_
### _Context & info_
_The main business unit of our application is the concept of “Episode”. An episode is composed by a nested structure of:_

- Episode
    - Parts
        - Items
            - Blocks
                - Block Fields
                - Media

_As a User, I am not imposed any limits on the number of children of each of these elements, all of them have a One-to-Many relation between a child level and its parent (one Episode can have zero or many Parts, one Part can have zero or many Items, and so on…), which makes Episodes potentially infinite in size._

### _Assignment_
_Naturally there are some actions we allow our users such as Duplicating an Episode, which include duplicating all the instances and models inside. Focusing in this specific flow, explain how you would better approach its implementation._

_Please refer to any Laravel patterns/tools or AWS services that could help you define your solution. Use text code/pseudo-code snippets, diagrams, or whatever other artefacts that can help you explain solution._

_We’ll be paying special attention to:_

- _Interaction with the database and its efficiency_
    - _namely transaction usage and control during the process_
- _How well the solution is explained, and its support material_
- _Scalability and observability of the solution_
- _How the solution would potentially affect other users in the platform during the process_
- _Solution resiliency and failure reaction_

## 2. Technical Instructions
Docker env for php applications 

Welcome to the mini structure for laravel/symfony/postgres/nginx applications DOPPN(DOcker, Php, Postgresql, Nginx).
This project contains the docker structure to create new project in laravel/symfony.


### About the project:
- This application will handle the action to duplicate a collection of objects, which means that if we start with node 1, all trees below him will be duplicated.

- To solve the problem I used an inspiration into the algorithm of breath first search and using asynchronous jobs from Laravel to handle with de problem.


### Installation
**PS:** make sure that you have docker and docker-compose installed into your machine.

#### step 1
```
git clone 
cp .env.dist .env
```

#### step 2
To start the containers
````bash
docker-compose up -d --build
````

To stop
```bash
docker-compose down -v
```

What this project contains:
- php 8.4
- laravel application
- composer
- postgres
- nginx

### Access
Accessing the link below should open the php info or laravel home project

http://localhost:8000/

#### Database infos
````
database:
name: doppn
user: doppn
pass: doppn
````

## 3. Running the application
After completing the installation please, follow the steps bellow:
- access the application via terminal
- go to the root of the application

#### 1. to access the container
```bash
docker-compose exec application bash
```

#### 2. inside the container run the commands:
```bash
php artisan migrate && php artisan db:seed
```

#### 3. before to run the application please activate the workers into another terminal:

````bash
php artisan queue:work
````

#### 4. to run the main action of the application:  
**PS:** Where `1` is the node id.
```bash
php artisan app:duplicate 1 
```
**PS:** The migration is including fixtures to create a test case with some data to handle with the duplication.

**To reset migrations:**
````
php artisan db:wipe
php artisan migrate && php artisan db:seed
````

**To access the logs:**
```
storage/logs/duplication.log
```

# 4. Diagrams

### Database Model
![plot](/docs/er-model-diagram.png)

### workflow application
![plot](/docs/workflow-application.png)

### infrastructure diagram
![plot](/docs/infra-diagram.png)
