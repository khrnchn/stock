

<div align="center">
    <h3 align="center">Stock Management System</h3>
</div>

## Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Usage](#usage)
- [Contributing](../CONTRIBUTING.md)

## About <a name = "about"></a>

A Stock Management System (from Filament demo) by our group for subject Software Quality Assurance. Developed using the Laravel framework.

## Getting Started <a name = "getting_started"></a>

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites

Have PHP, Composer, and node installed on your local machine. 

### Installing

1. Clone the repo.

2. Composer install.
```
composer install
```

3. Install node package manager.
```
npm install
```

4. Generate and configure .env file.
```
cp .env.example .env
php artisan key:generate
```

5. Populate the database.
```
php artisan migrate --seed
```

6. Run the project locally.
```
php artisan serve
```

## Usage <a name = "usage"></a>

1. Login as admin.
2. Create product, track sales.
3. Manage other relevant information like company and brand.

## ✍️ Authors <a name = "authors"></a>

- [@ejjat0909](https://github.com/ejjat0909) - Sharvin
- [@khrnchn](https://github.com/khrnchn) - Khairin
- [@AHisyam-coder](https://github.com/khrnchn) - Deve
- [@CCCCheeee](https://github.com/khrnchn) - Haziq
- [@CCCCheeee](https://github.com/khrnchn) - Zhi Kang
