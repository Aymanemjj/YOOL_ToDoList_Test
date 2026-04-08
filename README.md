# Task Manager

A simple task management application built with Laravel and Tailwind CSS.

## Features

- Create, edit, and delete tasks
- Filter tasks by status (To Do, In Progress, Done)
- Search tasks by title
- Mark tasks as done with one click
- Pagination
- Authentication

## Tech Stack

- Laravel 11
- MySQL / MariaDB
- Tailwind CSS
- Alpine.js

## Installation

```bash
git clone https://github.com/your-username/task-manager.git
cd task-manager
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configure your database in `.env` then run:

```bash
php artisan migrate --seed
npm run dev
php artisan serve
```

## Usage

Register an account, log in, and start managing your tasks.
