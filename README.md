# Composer PThreads

A simple library to demonstrate how to use [PThreads](https://github.com/krakjoe/pthreads) in conjunction with the [Composer AutoLoader](https://getcomposer.org/doc/01-basic-usage.md#autoloading).

![Composer PThreads](https://github.com/iainconnor/composer-pthreads/raw/master/pthreads.png)

## Installation

From composer, `composer require iainconnor/composer-pthreads`.

## Usage

Just use or extend the provided `AutoloadWorker` Class in place of your normal `\Worker`.

See [ComposerWorkerTest.php](/tests/ComposerPthreads/ComposerWorkerTest.php) for a full example.