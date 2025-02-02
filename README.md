# Mini Project Tech Neurobase

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About the Project

This project consists of two main components:
- **Back-End**: Built with Laravel.
- **Front-End**: Built with React.

### Laravel Back-End
The Laravel back-end handles the API requests and serves the content for the front-end. The back-end includes various features such as:
- User authentication (login page).
- Product management (create, edit, view products).
- Product category management.

### React Front-End
The React front-end interacts with the Laravel API to display data and provide functionality such as:
- A product grid table.
- Forms for creating and editing products.
- User login and registration pages.

## Project Structure

The project is organized as follows:

- **Back-End (Laravel)**:
  - Located in the `resources` folder:
    - `css`: Contains styles for the project.
    - `scss`: Contains Sass files.
    - `js`: Contains JavaScript files.
    - `views`: Contains Blade views.
      - `backend`: Folder for back-end views (layouts, dashboard, etc.).
      - `frontend`: Folder for front-end views (product management, etc.).

- **Back-End (Laravel)**:
  - In the `backend` folder, you'll find the following layouts:
    - `app.blade.php`: Main layout file.
    - `slider.blade.php` and `header.blade.php`: Header and slider components.
  - In the `product` folder, the following files are included:
    - `index.blade.php`: Displays a list of products.
    - `create.blade.php`: Form to create a new product.
    - `edit.blade.php`: Form to edit an existing product.
  - In the `product category` folder, similar files are created.

- **Front-End (React)**:
  - Pull the front-end code from: [https://github.com/OthmaneCHEMLAL/Tech_Neurobase_react](https://github.com/OthmaneCHEMLAL/Tech_Neurobase_react).
  - Configure `API_BASE_URL` in `src/services/api.js` to:  
    ```javascript
    const API_BASE_URL = 'http://127.0.0.1:8000/api';
    ```

## Steps to Run the Project

### 1. Set Up the Back-End (Laravel)
- Import the database from the provided `neurobase.sql` file using phpMyAdmin.
- Configure your `.env` file with the correct database credentials.
- Run the following command to build the project:
  ```bash
  npm run build
  ```
- Start the Laravel server with:
  ```bash
  php artisan serve
  ```
- The back-end will now be running at [http://127.0.0.1:8000](http://127.0.0.1:8000).

### 2. Login Page
Once the back-end is set up, go to the login page:
[http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)

Use the following credentials for testing:
- **Username**: `otmanechemlal13@gmail.com`
- **Password**: `otmanechemlal123`

You can also create a new user via the registration page.

### 3. Set Up the Front-End (React)
- Pull the code from: [https://github.com/OthmaneCHEMLAL/Tech_Neurobase_react](https://github.com/OthmaneCHEMLAL/Tech_Neurobase_react).
- Change the `API_BASE_URL` in `src/services/api.js` as mentioned above.
- Run the following command to start the React development server:
  ```bash
  npm start
  ```

Now your React app will be connected to the Laravel back-end API and you can start managing products and categories.

---

Well done!

