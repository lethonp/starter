<Todo : personalize readme>

# Pre-built base for new app development on Laravel 6

| Develop | Master |
|---|---|
| `<build-status-badge>` | `<build-status-badge>` |
| `<coverage-report-badge>` | `<coverage-report-badge>` |

## Team

* Lead dev : [Okipa](https://github.com/Okipa)
* Quality : [Okipa](https://github.com/Okipa)
* Management : [Okipa](https://github.com/Okipa)
* Devs : https://github.com/Okipa/starter/graphs/contributors

## Table of Contents

* [Installation](#installation)
  * [Requirements](#requirements)
  * [Import](#import)
  * [DNS setup](#dns-setup)
  * [Project configuration and dependencies installation](#project-configuration-and-dependencies-installation)
* [Docker](#docker)
  * [Setup](#setup)
  * [Commands](#commands)
* [Git submodules](#git-submodules)
* [Database](#database)
* [Building resources](#building-resources)
* [Testing](#testing)
* [Debugging](#debugging)
* [Changelog](#changelog)

## Installation

### Requirements

* Git installed.
* Docker Community Edition installed : https://docs.docker.com/install.
* Node last LTS version installed (important to avoid errors).
* Yarn last stable version installed.

### Import

Clone the project `<project-repository>`.

### DNS setup

Set your project domain resolution in your virtualhost : `sudo vim /etc/hosts`

```sh
    # add these lines in your /etc/hosts file
    <project-local-ip>   <project-local-dns>
```

### Project configuration and dependencies installation

First, execute the following commands on your host machine :
* `git submodule update --init --recursive --remote --force`
* `cp .docker/env-example .docker/.env`. Then set the environment variable according to your project needs.
* `cp .env.example .env`. Then set the environment variable according to your project needs.
* `.utils/docker/up.sh --build` 
* `.utils/docker/workspace.sh` 

Once you are connected into your docker workspace (previous command), execute the following commands :
* `composer update`
* `php artisan key:generate`
* `php artisan storage:link`
* `php artisan migrate:refresh --seed`

Finally, back on your host machine, execute the following commands :
* `yarn install`
* `yarn upgrade`
* `yarn dev` or `yarn watch`

## Docker

This project uses the following docker submodule : `<project-docker-repository>`.

### Setup

* In your `.docker` directory, copy the `env-example` to `.env` in the same directory.
* Customize the needed values if needed (containers ports, for example).

## Git submodules

To update the project submodules, just execute this command : `./.utils/git/submodules/update.sh` (or `git submodule update --init --recursive --remote --force` when it is the first sync).

## Database

* Execute a database reset from your docker `workspace` with the command : `php artisan migrate:refresh --seed` : this will execute all your migrations and seeds.

## Building resources

Compile all your project resources (mainly sass and javascript) by executing the following commands.
You can run these commands from your docker workspace, Node and Yarn are installed. However, running them from your host machine will be quicker.
* `yarn dev` (does merge but does not minify resources).
* `yarn prod` (does merge **and** minify).
* `yarn watch` (recompile automatically when a change is detected in a resource file).

## Testing

* To launch the project test, run the following command : `composer test`.

## Debugging

Laravel Telescope and Laravel Horizon are pre-installed :
* To open the `telescope` dashboard,  go to `http://your-project.url/telescope`.
* To open the `horizon` dashboard,  go to `http://your-project.url/horizon`.

## Changelog

See [CHANGELOG](CHANGELOG.md) for more information on what has been pushed in production.
