# 📝 Laravel 13 TodoList API

[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.5-777BB4?style=for-the-badge&logo=php)](https://www.php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

> 🎓 **Educational Pet Project**  
> This repository is a project created to demonstrate modern API development practices using **Laravel 13**. It serves
> as a sandbox for exploring RESTful architecture, authentication, database migrations, form validation, package the app
> via Docker.

## ✨ Features

- **RESTful API Design**: Clean, resourceful routing for managing Tasks.
- **Authentication**: Secure token-based authentication using **Laravel Sanctum**.
- **Modern PHP**: Built with PHP 8.5 utilizing typed properties, attributes, and modern syntax.
- **Data Transformation**: Uses **API Resources** to ensure consistent and secure JSON responses.
- **Robust Validation**: Custom **Form Requests** to handle input validation and authorization.
- **Database**: Data is stored in relational MySQL database
- **Testing**: **Bruno** collections included for manual testing.
- **Packaging**: Dev (local development) and production (optimised for performances) Docker containers.

## 🛠️ Tech Stack

- **Framework**: Laravel 13
- **Language**: PHP 8.5
- **Database**: MySQL
- **Authentication**: Laravel Sanctum
- **Testing**: Collection for Bruno Api client
- **Containers**: Both dev and prod Docker containers.

---

## 🚀 Getting Started

Follow these instructions to get a local copy of the project up and running.

### Prerequisites

Make sure you have the following installed on your machine:

- Linux OS (Ubuntu/Fedora etc.) recommended
- [Docker](https://www.docker.com)

### Installation

1. **Clone the repository**

```bash
git clone https://github.com/userlond/laravel-13-todolist-api.git
cd laravel-13-todolist-api
```

2. **Start the container**

```bash
docker compose -f compose.prod.yaml up -d --build
```

# API Specification

---

## 🔐 Auth

### `POST` `/api/login`

**Summary:** Login  
**Content-Type:** `application/json`

**Request Body:**

| Field      | Type   | Required | Example            |
|------------|--------|----------|--------------------|
| `email`    | string | Yes      | `test@example.com` |
| `password` | string | Yes      | `password`         |

---

### `POST` `/api/register`

**Summary:** Register  
**Content-Type:** `application/json`

**Request Body:**

| Field      | Type   | Required | Example        |
|------------|--------|----------|----------------|
| `name`     | string | Yes      | `John Doe`     |
| `email`    | string | Yes      | `john@doe.com` |
| `password` | string | Yes      | `password`     |

---

## 👤 User

### `GET` `/api/user`

**Summary:** User Info

---

## 📋 Task

### `GET` `/api/tasks`

**Summary:** Index (List tasks)

**Query Parameters:**

| Parameter         | Type            | Required | Example           | Description                                                                        |
|-------------------|-----------------|----------|-------------------|------------------------------------------------------------------------------------|
| `filter[<field>]` | integer (int32) | No       | `filter[is_done]` | Filter by task param: is_done, title, description, created_between                 |
| `sort`            | string          | No       | `-title`          | Sort order (use`-` for descending), allowed fields: id, title, created_at, is_done |

---

### `POST` `/api/tasks`

**Summary:** Store (Create a new task)  
**Content-Type:** `application/json`

**Request Body:**

| Field         | Type    | Required | Example         |
|---------------|---------|----------|-----------------|
| `title`       | string  | Yes      | `Task 2`        |
| `description` | string  | No       | `Description 2` |
| `is_done`     | boolean | No       | `true`          |

**Responses:**

- `200 OK`

---

### `GET` `/api/tasks/{id}`

**Summary:** Show (Get a specific task)

---

### `PUT` `/api/tasks/{id}`

**Summary:** Update (Modify an existing task)  
**Content-Type:** `application/json`

**Request Body:**

| Field         | Type    | Required | Example                 |
|---------------|---------|----------|-------------------------|
| `title`       | string  | Yes      | `Task 1 edit`           |
| `description` | string  | No       | `Task description edit` |
| `is_done`     | boolean | No       | `true`                  |

---

### `DELETE` `/api/tasks/{id}`

**Summary:** Destroy (Delete a task)
