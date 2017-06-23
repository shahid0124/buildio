# Buildio Programming Challenge

The purpose of this application is to provide the necessary scaffolding so that people can focus on the core of
the programming challenge. It also means that everybody starts at the same point and only has to create the same
couple of classes, which makes it easier to do an apples-to-apples comparison of solutions.

## Setup

To get the basic setup working you will need to:

* Fork this project
* Clone it to your dev environment
* Create a new MySQL database called "buildio"
* Run `composer install`
* Run `php artisan migrate:install`
* Run `php artisan migrate --seed`
* Run `phpunit` and watch two tests pass and one test fail

Note: I have removed the default test that attempts to access the home page of the application, so there is no need
to configure the web side of things. The whole thing is command line only.

The project contains a database migration that adds a `manager_user_id` field to the Users table. It also contains
a database seeder that populates the `users` table with 500 records and sets the `manager_user_id` attribute for each
user to a known value.

## The Challenge

Imagine that users are added to the database very infrequently (say, once or twice each week), but the hierarchy needs
to be queried *every time* a user does something. In this scenario, we need a way to query the hierarchy that is much
more performant than recursively iterating through `SELECT` statements. One solution is the
[Nested Set Model](https://en.wikipedia.org/wiki/Nested_set_model). Although the Nested Set approach *does* require an
explicit operation to rebuild the *entire* hierarchy every time a user is added, the performance hit is pretty mild
(and linear). However, querying the hierarchy is lightning fast, which is why it makes a good solution in our situation.

Therefore, the objective of the challenge is to implement the `updateHierarchy()` and `getTeam()` methods in the
`TeamRepository` class. You will also need to modify the `users` table.

Although they are by no means exhaustive in nature, the unit tests provide a quick and easy indication of whether or
not the implementation is working correctly. You will know you have successfully completed the challenge when all the
tests pass.

## Submitting Your Solution

Once you have implemented a working solution, simply check your code back into your repo and send me a link.