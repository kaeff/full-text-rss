# Use a separate build stage for site-config related tasks
FROM alpine/git:latest as builder

# Set the working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

# Perform all site-config related tasks
RUN rm -rf /var/www/html/site_config/standard && \
    git clone https://github.com/fivefilters/ftr-site-config.git /var/www/html/site_config/standard/

# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

# Copy the site-config from the builder stage
COPY --from=builder /var/www/html/site_config/standard/ /var/www/html/site_config/standard/

# Make sure the cache folder is writable
RUN chmod -R 777 cache
