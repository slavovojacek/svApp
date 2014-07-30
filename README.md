![logo220](https://cloud.githubusercontent.com/assets/4658565/2871400/26300ca4-d309-11e3-85c9-b893c24e961f.png)

A light-weight & easy-to-learn Model-View-Controller framework built to simplify and speed up the production process of your PHP applications. It takes care of the logic and helps you maintain consistency throughout your projects.

## Installation and setup

### Prerequisites

First off, please make sure that you have the latest node.js (http://nodejs.org/) installed on your machine, as to run svApp's SASS and JS compilation on save, gulp.js (http://gulpjs.com/) is required both globally:

**sudo npm install gulp -g**

and locally (in your *www root*, where *gulpfile.js* is located) with all dependencies:

**sudo npm install gulp**
**sudo npm install gulp-ruby-sass gulp-autoprefixer gulp-uglify gulp-concat**

To run svApp, you will need an Apache server with PHP 5.4.0+ running.

It is recommended that you use the **git clone** command to install svApp, thus, make sure you have git installed on your machine.

### Installation

To install, use the **git clone** command:

**git clone https://github.com/slavomirvojacek/svApp.git**

All resources should be located in the *www root* of your project. Once done, you are ready to launch svApp in your browser.

To deploy all *.sass* and *.js* assets on filechange, run

**gulp**

in your *www root* (where *gulpfile.js* is located).

## Documentation

### Creating your first svApp application

#### What is MVC?
#### What is Model?
#### What is Controller?
#### What is View?

### Deploying your application

#### Application Assets and Dependencies
