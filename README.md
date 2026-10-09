# Audit Test

![Featured image](/public/featured-image.png)

This repository was created to complete a Laravel and Tailwind programming test.

## Initial task

Develop a page for registering companies and calculating the credit percentage based on the ICMS paid and possible credits.

## Features implemented

- Validation and masks for form fields
- AJAX call to register the company
- Loading state for the AJAX request
- Report screen (/empresas/{id})
- Reports listing screen (/empresas)
- Export the report as PNG

## Available routes

1. Home (/)
2. Registration (/empresa)
3. Report (/empresas/{ID})
4. Reports (/empresas)

## Development

To start the development environment, it is necessary to install dependencies and run the following commands:

- composer install
- php artisan migrate
- npm install
- composer run dev

## Production

During the validation phase, this project was made publicly available via Railway to facilitate testing and review. The database is SQLite, so it is not persistent across new deploys.

Please note: the production application was publicly accessible during validation, but it is no longer available.
