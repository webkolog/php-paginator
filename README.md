# W-PHP Paginator

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

**Version:** 1.1 (Paginator)

**Last Updated:** 2016-03-10

**Compatibility:** PHP 5.4

**Created By:** Ali Candan ([@webkolog](https://github.com/webkolog))

**Website:** [http://webkolog.net](http://webkolog.net)

**Copyright:** (c) 2015 Ali Candan

**License:** MIT License ([http://mit-license.org](http://mit-license.org))

**W-PHP Paginator:** This is a PHP paginator class that simplifies the creation of paginator links for your web applications.

## Features

-   Easy to use and integrate.
-   Customizable URL structure.
-   Adjustable number of page links.
-   Option to show or hide "First", "Last", "Previous", and "Next" links.
-   Multi-language support.

## Installation

1.  Copy the `paginator.php` file and the `language` folder to your project directory.
2.  Ensure that the `language` folder contains the necessary language files (e.g., `en.php`, `tr.php`, `ru.php`).

## Usage

```php
<?php
include 'paginator.php';

$total_records = 100; // Total number of records
$current_page = isset($_GET['p']) ? $_GET['p'] : 1; // Current page number

$p = new Paginator('en'); // Create a new Paginator object, set language to 'en'
$p->baseURL = "?s=article&p="; // Base URL for paginator links
$p->totalRows = $total_records; // Set total records
$p->perPage = 30; // Set records per page
$p->numbers = 5; // Set number of page links to display
$p->showLflAsNum = false; // Show "First" and "Last" as numbers
$p->linksPN = true; // Show "Previous" and "Next" links
$p->linksFL = true; // Show "First" and "Last" links
$p->page = $current_page; // Set current page number

$p->createLinks(); // Generate paginator links

echo $p->links; // Output the generated links
?>
```

## Configuration
- `baseURL:` The base URL for the paginator links (e.g., `"?page="`).
- `urlPrefix:` Prefix to add before the URL.
- `urlSuffix:` Suffix to add after the URL.
- `totalRows:` Total number of records to paginate.
- `perPage:` Number of records to display per page.
- `page:` Current page number.
- `numbers:` Number of page links to display.
- `linksFL:` Boolean to show or hide "First" and "Last" links.
- `linksPN:` Boolean to show or hide "Previous" and "Next" links.
- `showLflAsNum:` Boolean to display "First" and "Last" as numbers instead of text.
- `lang:` Language code, like 'en','tr', or 'ru'.
- `language` directory must contains php files such as en.php, tr.php, ru.php, etc.

## License
This W-PHP Paginator class is open-source software licensed under the [MIT license](https://mit-license.org/).
```
MIT License

Copyright (c) 2015 Ali Candan

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

## Contributing
Contributions are welcome! If you find any bugs or have suggestions for improvements, please `feel free to open an issue or submit a pull request on the GitHub repository.`

## Support
For any questions or support regarding the W-PHP Paginator, you can refer to the project's GitHub repository or contact the author.
