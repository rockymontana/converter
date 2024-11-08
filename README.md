# XML CLI Converter

## Prerequisite
You need to be able to run PHP applications.
If you don't have PHP and Composer installed on your local machine, you can easily install it with the help of https://php.new - just select your environment and follow the instructions and you'll be ready in a heart beat.

## Install

Start by cloning the repository:
```
git clone https://github.com/rockymontana/converter.git
```

Secondly you will need to install the dependencies with composer:

```
composer install
```

That's all!
Now you're ready to start using it.

## Usage

To run the application you open a terminal and from the cloned project directory you run:
```
php xml-converter convert <path-to-csv-file>
```

The shared example CSV is stored in [input.csv](input.csv) and can be used for this demo.
Tests are availe in [XMLConverterTest.php](tests/Feature/XMLConverterTest.php).
