# Contains PHP.
FROM php:8.2-alpine

# Take HOST UID and GID.
ARG HOST_UID
ARG HOST_GID

# Create non-root user.
RUN addgroup --system --gid ${HOST_GID} php && \
    adduser --system --ingroup php --uid ${HOST_UID} php

# Set application directory.
WORKDIR /var/www/html/app

# Copy application files and change owner to non-root user.
COPY --chown=php:php . .

USER php

EXPOSE 80

# Serve application using the PHP built-in webserver.
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html/app"]