<h1 align="center">
  <a href="https://www.slimframework.com/"><img src="/public/images/slim-logo.jpg" alt="Pic of the Slim logo" width="600px"></a>
</h1>

<h4 align="center">
A blog whose main page will list blog entry titles with a title and date/time created. Each blog entry title will link to a detail page that displays the blog entry title, date, body, and comments, along with a comment form that allows anonymous users to post comments. Comments will have a name and a body. Each blog entry will be editable.
</h4>

<p align="center">
  <a href="https://opensource.org/licenses/MIT">
    <img src="https://img.shields.io/badge/License-MIT-green.svg?style=popout"
    alt="MIT-license-badge">
  </a>
  <img src="https://img.shields.io/github/languages/code-size/callmedw/php-blogging-with-slim.svg?style=popout"
  alt="code-size-badge">
  <a href="https://GitHub.com/callmedw/php-blogging-with-slim/issues/">
    <img src="https://img.shields.io/github/issues/callmedw/php-blogging-with-slim.svg?style=popout"
    alt="github-issues-badge">
  </a>
</p>

<p align="center">
  <!-- <a href="#preview">Screenshot</a> • -->
  <a href="#features">Features</a> •
  <a href="#required-technologies">Requirements</a> •
  <a href="#how-to-use">How To Use</a> •
  <a href="#browser-support">Browser Support</a> •
  <a href="#known-bugs">Bug Report</a> •
  <a href="#contact">Contact</a> •
  <a href="#license">License</a>
</p>
<br>

<!-- ## Preview -->

## Features

To pass this code review with a Meets Expectations the following criteria are required:

- [x] Index page shows 3 blog entries with titles, date/time created.
- [x] Detail page shows
  - [x] Title
  - [x] Date
  - [x] Body
  - [x] Comments
- [x] Add/Edit page enables the user to post new entries or edit existing entries.
- [x] Anonymous user is able to post comment.
- [x] Models designed correctly;
  - [x] Blog has list of entries
  - [x] Comments has list of comments
- [x] PDO interfaces with the database, allowing you to add and retrieve blog entries.
- [x] Styling implemented with separate CSS file.
- [x] Fonts have colors and faces.
- [x] Header fonts are larger than body fonts.
- [x] All routes are mapped correctly and use correct HTTP methods:
  - [x] Index page mapped as “/”, “/blogs”, or something similar
  - [x] Detail page mapped as “/blog/{id}”, “/entries/{name}” or similar

## Required Technologies

* [Git](https://git-scm.com)
* [CSS](https://www.w3.org/TR/CSS/)
* [HTML](https://www.w3.org/TR/html5/)
* [PHP](https://php.net)
* [Slim](https://www.slimframework.com/)
* [Twig](https://twig.symfony.com/)
* [MAMP](https://www.mamp.info/en/) or [Apache](https://httpd.apache.org/)

## Suggested Technologies

* [Atom](https://atom.io/)
* [Composer](https://getcomposer.org/)

## How To Use

To clone and run this application, you'll need [Git](https://git-scm.com) installed on your computer. To edit this project you may want a text-editor like [Atom](https://atom.io/). To install Slim you will want a dependency manager like [Composer](https://getcomposer.org/). To view this application in a browser you'll need a web server like [Apache](https://httpd.apache.org/) or the Apache and MySQL bundled stack, [MAMP](https://www.mamp.info/en/). From your command line:

```bash
# Clone this repository
$ git clone https://github.com/callmedw/php-blogging-with-slim.git

# Open in atom
$ atom php-blogging-with-slim

# Go to project directory root
$ $ cd php-blogging-with-slim

# Use composer to install packages
$ composer install

# Start MAMP localhost
$ php -S localhost:8080 -t public public/index.php

```

##  Browser Support
| <img src="https://user-images.githubusercontent.com/1215767/34348387-a2e64588-ea4d-11e7-8267-a43365103afe.png" alt="Chrome" width="16px" height="16px" /> | <img src="https://user-images.githubusercontent.com/1215767/34348590-250b3ca2-ea4f-11e7-9efb-da953359321f.png" alt="IE" width="16px" height="16px" />  | <img src="https://user-images.githubusercontent.com/1215767/34348380-93e77ae8-ea4d-11e7-8696-9a989ddbbbf5.png" alt="Edge" width="16px" height="16px" />  | <img src="https://user-images.githubusercontent.com/1215767/34348394-a981f892-ea4d-11e7-9156-d128d58386b9.png" alt="Safari" width="16px" height="16px" />  | <img src="https://user-images.githubusercontent.com/1215767/34348383-9e7ed492-ea4d-11e7-910c-03b39d52f496.png" alt="Firefox" width="16px" height="16px" />  |
| :---------: | :---------: | :---------: | :---------: | :---------: |
| Yes | No | Stop | Yes | Yes |

## Known Bugs

🐞

## Contact

_Contact: hello@mynameisdanaweiss.com_

## Contributors

<!-- prettier-ignore -->
| [<img src="https://avatars2.githubusercontent.com/u/21694548?s=460&v=4" width="100px;"/><br /><sub><b>Dana Weiss</b></sub>](https://github.com/callmedw)<br /> |
| :---: |

## License

MIT License

Copyright (c) 2019 Dana Weiss
