[![Build Status](https://scrutinizer-ci.com/g/gplcart/summernote/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gplcart/summernote/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gplcart/summernote/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gplcart/summernote/?branch=master)

Summernote is a [GPL Cart](https://github.com/gplcart/gplcart) module that adds [Summernote WYSIWYG editor](http://summernote.org) to textareas in admin section

Features:

- Configurable CSS selectors
- Configurable global settings
- Per-input settings to override global settings

**Installation**

This module requires 3-d party library which should be downloaded separately. You have to use [Composer](https://getcomposer.org) to download all the dependencies.

1. From your web root directory: `composer require gplcart/summernote`. If the module was downloaded and placed into `system/modules` manually, run `composer update` to make sure that all 3-d party files are presented in the `vendor` directory.
2. Go to `admin/module/list` end enable the module
3. Adjust settings on `admin/module/settings/summernote`

