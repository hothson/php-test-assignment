# PHP Developer Test Assignment

This is a sample project built with Laravel framework.
It implements basic authentication and index/store operations for one entity type.

## Installation

- Clone the project
- Copy `.env.example` to `.env`
- Install dependencies with `composer install` and `npm install`
- Run `php artisan key:generate` to populate encryption key
- Launch MySQL server or create `database/database.sqlite` file
- For MySQL put credentials in `.env` file. For `sqlite` change `DB_CONNECTION`
  to `sqlite` and remove other `DB_*` parameters.
- Run `php artisan migrate` to setup tables structure.
- Run `php artisan db:seed` to populate default user account.
- Run `npm run dev` to generate frontend assets
- Run `php artisan serve` to launch local server or use other web server to run the project.

## Airtable base

- Sign up at https://airtable.com
- Open [shared base](https://airtable.com/shrLiiNKVYqXVVHhf) and click "Copy base" in top right corner
- Open Airtable [account settings](https://airtable.com/account) to generate access key
- Check [API docs](https://airtable.com/api) to complete task groups 2 and 3

## Assignment

You need to implement features below.

There are 3 groups of tasks. You can submit any number of tasks that you can complete in designated time.

For each task, please, create one Pull Request.

### Group 1:

**1. Implement administrator level access**

- Add `role` field to `users` table with allowed values `user` and `admin`
- Provide seed for default administrator account
- Modify SitesController@index endpoint to display all sites to admin.

**2. Implement SiteController@show endpoint**

- The endpoint should output information on a site, stored in database.
- You need to create a basic view, controller method
- Implement access restriction based on task 1 - admins can see all sites, users can only see their own sites

**3. Implement CSV export of sites**

- Create endpoints and button in UI that takes data from `sites` table and
  generates CSV file to download.
- CSV file should include name and email of user whom a `site` belongs to

### Group 2:

**4. Implement 3rd-party output for a Site**

The Airtable base contains 4 tables for models, models relations, drawings and services.
For this task you only need `models` and `model_model` tables.

- Add fields to `site` entity to store access key and base ID
- Implement a form to submit API credentials for a site.
- Implement a Controller/View that fetches data from `models` table in Airtable and outputs
  models in a tree-like structure. References in `children` and `parent` are stored in `model_model` pivot.

UI is irrelevant. Feel free to use any 3rd-party library or output data with simple indentation.
 
 ### Group 3:
 
 **5. Implement synchronization cron-job with 3rd-party API**

For this task you need to transform structure from Airtable base to project database.

API Credentials can be either taken from `site` or from environment variables. 

- Create tables to store models, drawings and services structure
- Implement a script to gather data from API and store it to created tables.
- Add a cron-job to run synchronization on daily basis.
- [Optional] The logic should account for possible deleted records.
- [Optional] Dispatch HTTP requests (for example to a bin https://requestbin.com/)
  with synchronization results: site ID and number of records created/modified/deleted.

## Submitting results

DO NOT create pull requests to assignment repository. You can submit results in a new repository, or as a zip file.

Zip files should be sent to `roman@makini.io`. Repositories should be accessible to Github/Gitlab account `rkgrep`
