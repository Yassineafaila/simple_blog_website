# Simple Blog Website

Simple Blog Website is a web application built with Laravel and Tailwind CSS. It provides a platform for users to create, manage, and interact with blog posts.

## Features

-   User Authentication: Register, Login, Logout
-   User Profile Management: Update Profile Information
-   Post Management: Create, Read, Update, Delete
-   Comment System: Users can read and leave comments on posts
-   Like and Save Posts: Users can like and save posts for later reference

## Technologies Used

-   Laravel
-   Tailwind CSS
-   jQuery
-   Select2
-   MySQL Database

## Prerequisites

-   PHP
-   Composer
-   Node.js (for managing frontend assets)
-   MySQL Database

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yassine-afaila/simpleBlogWebsite.git
```

2.Install PHP dependencies :

```bash
composer install
```

3. Install Node.js dependencies:

```bash
npm install

```

4. Copy `.env.example` to `.env ` and configure your database settings.
5. Run database migrations:

```bash
php artisan migrate

```

6. Compile frontend assets:

```bash
npm run dev

```

7. Serve the application:

```bash
php artisan serve

```

## Usage

-- Register or login to access the main features
-- Explore existing posts, leave comments, and interact with other users.
-- Create your own posts and manage them through the user dashboard.
-- Like and save posts for quick access.

## Acknowledgments

Thanks to the Laravel and Tailwind CSS communities for providing excellent documentation and support.
Special thanks to Select2 for the interactive dropdown functionality.
