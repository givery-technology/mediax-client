# How to contribute

Welcome your contribution.
* Create a ticket

Guidelines

## Getting Started

* Make sure you have a [GitHub account](https://github.com/signup/free)
* Submit a ticket for your issue, assuming one does not already exist.
  * Clearly describe the issue including steps to reproduce when it is a bug.
  * Make sure you fill in the earliest version that you know has the issue.
* Fork the repository on GitHub.

## Making Changes

* Create a topic branch from where you want to base your work.
  * This is usually the master branch
* Make commits of logical units.

## Which branch to base the work

* Bugfix branches will be based on master.
* New features that are backwards compatible will be based on next minor release branch.
* New features or other non-BC changes will go in the next major release branch.

## Submitting Changes

* Push your changes to a topic branch in your fork of the repository.
* Submit a pull request to the repository in the cakephp organization, with the correct target branch.

## Testcases and codesniffer

Tests requires [PHPUnit](http://www.phpunit.de/manual/current/en/installation.html)
3.5 or higher. To run the testcases locally use the following command:

    ./lib/Cake/Console/cake test core AllTests --stderr

To run the sniffs for CakePHP coding standards

    phpcs -p --extensions=php --standard=CakePHP ./lib/Cake

Check the [cakephp-codesniffer](https://github.com/cakephp/cakephp-codesniffer)
repository to setup the CakePHP standard. The README contains installation info
for the sniff and phpcs.


# Additional Resources

* [CakePHP coding standards](http://book.cakephp.org/2.0/en/contributing/cakephp-coding-conventions.html)
* [Bug tracker](https://cakephp.lighthouseapp.com/projects/42648-cakephp)
* [General GitHub documentation](https://help.github.com/)
* [GitHub pull request documentation](https://help.github.com/send-pull-requests/)
