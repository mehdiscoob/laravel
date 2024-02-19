# Sample Laravel Project

This is a Laravel project that includes a Docker setup for easy development and deployment.

## Installation

### Prerequisites

Make sure you have the following installed on your system:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/install/)

### Steps

1. **Build and start the Docker containers:**

   ```bash
   docker compose up -d
   ```
This command sets up MySQL, PHP, and Nginx in Docker containers, and it also runs Migrate and Seeder plus Unit Test:
- **MySQL:** Stores application data; configure it in your Laravel app.
- **PHP:** Handles Laravel requests using PHP-FPM.
- **Nginx:** Acts as a reverse proxy, directing HTTP requests to the PHP container.

Access your Laravel app at http://localhost:9000. Code changes reflect in real-time.

### Helpers

- **Sapmle Data:**
    - **User:** `{username:"admin@gmail.com",password:"123456789"}`
    - **Client:** `{username:"client@gmail.com",password:"123456789"}`

- **Refresh Database:**
    - **Command:** `docker exec -it laravel-app-1 php artisan refresh-db-command`
    - **Description:** You can refresh the database using this Artisan command. Execute this command in the Laravel project directory to reset and reseed the database, ensuring a clean and updated state for your application.

Feel free to utilize these helper endpoints and commands for managing orders, trips, and database refresh operations in your Laravel application!

### Testing

This Laravel project includes unit tests for the `OrderService` class. These tests validate the functionality and statuses of the main APIs.

To run the tests, execute the following command in your terminal within the project directory:

```bash
docker exec -it laravel-app-1 php artisan test
```






