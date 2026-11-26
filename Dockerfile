
# Base image
FROM php:8.2-cli

# Working directory
WORKDIR /app

# Copy project files
COPY . .

# Display application files
CMD ["ls", "-la"]
