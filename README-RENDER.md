# Render setup for Mini-Koncili

This adaptation keeps the current local Docker Compose setup and adds a dedicated production Dockerfile at the repository root.

## Render Web Service

- Language: Docker
- Branch: main
- Root Directory: leave empty
- Dockerfile Path: ./Dockerfile
- Auto-Deploy: On Commit

Render Web Services must listen on 0.0.0.0. Render's default `PORT` is 10000, and this image configures Nginx to listen on that runtime port.

## Important

The local docker-compose.yml still manages PHP-FPM, Nginx, MySQL and Redis for development. The Render Web Service runs Nginx + PHP-FPM in one container.

You still need a database service for production and must set the Laravel environment variables in Render. Do not commit `.env` or production secrets.

Recommended first test variables:

- APP_ENV=production
- APP_DEBUG=false
- APP_KEY=<your Laravel APP_KEY>
- APP_URL=<your Render URL>
- LOG_CHANNEL=stderr

For database-backed pages, configure DB_CONNECTION/DB_HOST/DB_PORT/DB_DATABASE/DB_USERNAME/DB_PASSWORD (or adapt the application to the database URL supplied by the provider).

Do not run the local MySQL/Redis data directories on Render from this image.
