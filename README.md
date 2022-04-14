# Learn how to integrate PlanetScale with a sample PHP application

This sample application demonstrates how to connect to a PlanetScale MySQL database from a PHP application

![Sample app homepage](https://docs.planetscale.com/img/docs/php-sample-app-homepage.png)

For the full tutorial, see the [PHP PlanetScale documentation](https://docs.planetscale.com/tutorials/connect-php-app).

## Prerequisites

- [PHP](https://www.php.net/manual/en/install.php) &mdash; This tutorial uses `v8.1`
- [Composer](https://getcomposer.org/)
- A [free PlanetScale account](https://auth.planetscale.com/sign-up)

## Set up the PHP app

1. Clone the starter application using the command below:

```bash
git clone https://github.com/yemiwebby/php-quickstart.git
```

2. Navigate into the folder and install the dependencies:

```bash
cd php-quickstart
composer install
```

3. Copy the `.env.example` file into `.env`:

```bash
cp .env.example .env
```

4. Start the application:

```bash
php -S localhost:8000
```

View the application at [http://localhost:8000](http://localhost:8000).

## Connect to the PHP app

Make sure you have your PlanetScale database set up. You can find detailed instructions on setting up in the [PlanetScale PHP documentation](https://docs.planetscale.com/tutorials/connect-php-app).

### Connect with username and password

1. In the PlanetScale dashboard, click on the the branch you want to connect to (we're using `main`).
2. Click "**Connect**", and select "**PHP**" from the language dropdown.
3. Copy the credentials.
4. Open the `.env` file in your app and replace the placeholders with the values you copied:

```
HOST=<ACCESS_HOST_URL>
DATABASE=<DATABASE_NAME>
USERNAME=<USERNAME>
PASSWORD=<PASSWORD>
MYSQL_ATTR_SSL_CA=
```

5. For `MYSQL_ATTR_SSL_CA`, use our [CA root configuration doc](/concepts/secure-connections#ca-root-configuration) to find the correct value for your system. For example, if you're on MacOS, it would be:

```
MYSQL_ATTR_SSL_CA=/etc/ssl/cert.pem
```

## Adding the schema and data

1. Go to your [PlanetScale dashboard](https://app.planetscale.com) and select your PHP database.
2. Click on the "**Branches** and select the `main` branch (or whatever development branch you used).
3. Click on "**Console**"
4. Create the `categories` table:

```sql
CREATE TABLE categories (
id INT AUTO_INCREMENT NOT NULL,
name VARCHAR(255) NOT NULL,
description VARCHAR(255) NOT NULL,
PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
```

5. Create the `products` table:

```sql
CREATE TABLE products (
id INT AUTO_INCREMENT NOT NULL,
name VARCHAR(255) NOT NULL,
description VARCHAR(255) NOT NULL,
image VARCHAR(255) NOT NULL,
category_id INT NOT NULL,
PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
```

6. Add data to the `products` table with:

```sql
INSERT INTO `products` (name, description, image, category_id) VALUES
('Shoes', 'Description for Shoes', 'https://via.placeholder.com/150.png', '1'),
('Hat', 'Description for Hats', 'https://via.placeholder.com/150.png', '1'),
('Bicycle', 'Description for Bicycle', 'https://via.placeholder.com/150.png', '4');
```

7. Add data to the `categories` table with:

```sql
INSERT INTO `categories` (name, description) VALUES
('Clothing', 'Description for Clothing'),
('Electronics', 'Description for Electronics'),
('Appliances', 'Description for Appliances'),
('Health', 'Description for Health');
```

8. You can confirm that it was added by running:

```sql
SELECT * FROM products;
SELECT * FROM categories;
```

You can now refresh the [PHP homepage](http://localhost:8000) to see the new record.

## Need help?

If you need further assistance, you can reach out to [PlanetScale's support team](https://www.planetscale.com/support), or join our [GitHub Discussion board](https://github.com/planetscale/beta/discussions) to see how others are using PlanetScale.
