# URL Shortener RESTful API

A versioned URL Shortener service built with Laravel, allowing users to register, login (via Sanctum), shorten URLs, view their registered URLs, and redirect from short URLs. The service supports multiple API versions.

## Features

### Version 1 (v1)

-   **User Registration & Login** (API key issued via Laravel Sanctum).
-   **Shorten URLs**: Generate unique short URLs for long URLs.
-   **Reusability**: Return the same short URL for identical long URLs.
-   **URL Redirection**: Short URLs redirect to the original long URLs.
-   **List Registered URLs**: Users can view the URLs they have shortened.

### Version 2 (v2)

-   **Visit Counting**: Keep track of how many times each short URL is visited.
-   All features from v1.

## API Documentation

Auto-generated API documentation for each version is available. You can access both UI and JSON specifications:

-   **v1 Docs**: [docs/v1](http://localhost:your-port/docs/v1)
-   **v2 Docs**: [docs/v2](http://localhost:your-port/docs/v2)
-   **v1 JSON Spec**: [docs/v1.json](http://localhost:your-port/docs/v1.json)
-   **v2 JSON Spec**: [docs/v2.json](http://localhost:your-port/docs/v2.json)

## Getting Started

Follow these instructions to set up the project.

### Installation

1. **Clone the repository:**

    ```shell
    git clone "git@github.com:Fabdoc27/Url-Shortener_Rest-Api.git"
    ```

2. **Navigate to the project directory:**

    ```shell
    cd "Url-Shortener_Rest-Api"
    ```

3. **Install PHP dependencies:**

    ```shell
    composer install
    ```

4. **Create the environment file:**

    ```shell
    cp .env.example .env
    ```

5. **Generate the application key:**

    ```shell
    php artisan key:generate
    ```

6. **Run database migrations:**

    ```shell
    php artisan migrate
    ```

7. **Start the local development server:**

    ```shell
    php artisan serve
    ```
