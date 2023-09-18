# Flipptails


## Prerequisites

Before you begin, ensure you have met the following requirements:

- **PHP**: Your server should have PHP 7.4 or higher installed.
- **Composer**: You need [Composer](https://getcomposer.org/) to manage PHP dependencies.
- **Vite**: This project uses Vite as its webpack compiler

## Installation

1. Clone the repository:

   ```shell
    git clone https://github.com/benWozak/flipptails.git
    ```

2. Navigate to the project directory:

    ```shell
    cd flipptails
    ```

3. Install PHP dependencies using Composer:
    ```shell
    composer install
    ```

4. Install Node dependencies using NPM:
    ```shell
    npm install
    ```

6. Generate an application key:

    ```shell
    php artisan key:generate
    ```

## Usage

1. Start the development server:

    ```shell
    php artisan serve
    ```

2. Open a second terminal and run npm
    ```shell
    npm run dev
    ```

Your application should now be accessible at http://localhost:8000.
