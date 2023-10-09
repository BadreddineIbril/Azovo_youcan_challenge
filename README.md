# Azovo Store (Youcan Challenge)

Azovo App is a web application built using Laravel (for the API) and Vue.js (for the front-end). It allows users to manage products and categories. Here are the details of the project:

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/)

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/store-app.git

2. Install Laravel dependencies:

   ```bash
   cd server
   composer install

3. Set up your environment variables by copying the .env.example file to .env:

   ```bash
   cp .env.example .env

4. Generate an application key:

   ```bash
   php artisan key:generate

5. Migrate the database:

   ```bash
   php artisan migrate

6. Start the server (API):

   ```bash
    php artisan serve

7. Install Vue.js dependencies:

   ```bash
   cd client
   cd npm install
8. Start the server (UI):

   ```bash
    npm run dev

## Laravel (API)

### Product Routes
- Add Product: `POST /api/products`
- List Products: `GET /api/products`
- Get Product Details: `GET /api/products/{id}`
- Update Product: `PUT /api/products/{id}`
- Delete Product: `DELETE /api/products/{id}`

### Category Routes
- Add Category: `POST /api/products`
- List Categories: `GET /api/products`
- Get Category Details: `GET /api/products/{id}`
- Update Category: `PUT /api/products/{id}`
- Delete Category: `DELETE /api/products/{id}`


### Create Product Using Command 

- To create a new product in our application, you can use the following command:

    ```bash
    php artisan product:create

### Test Product

- Product creation is covered by automated tests. To run the tests, execute the following command:

    ```bash
    php artisan test

## Vue.js (Front-End)

### Fetching Data from the API

- To fetch data from the Laravel API, you can use Axios or another HTTP client in your Vue.js components.


![alt text](https://imageupload.io/ib/H8G8ltXarxaeacR_1696848833.png)

### Home Page UI
- Home page UI to display a list of products, including their names, prices, and images.
- Implement sorting and filtering options for products.


![alt text](https://imageupload.io/ib/M2iRnTGTMBOzFVz_1696848833.png)
![alt text](https://imageupload.io/ib/RfW8VqvCjk0LyYK_1696849421.png)

### Add Product from Vue
- Create a form for adding a new product.
- Use Axios to make a POST request to the Laravel API to add the product.


![alt text](https://imageupload.io/ib/qBLalL0WxIzCfcB_1696848833.png)

### Add Category
- Create a form for adding a new category.
- Use Axios to make a POST request to the Laravel API to add the category.


![alt text](https://imageupload.io/ib/tsInCNSXjJQFbyV_1696848833.png)

### Product Details
- A product details page to display the details of a selected product.


![alt text](https://imageupload.io/ib/gUKg7To6sntgbzy_1696849421.png)

### Custom 404 Error Page
- A custom 404 error page in your application provides a more user-friendly and visually appealing experience when a user encounters a page not found error. 


![alt text](https://imageupload.io/ib/z5fyp1unJfyxVji_1696860694.png)

### API Page
- Landing page to showcase your API routes and provide documentation for using the API.


![alt text](https://imageupload.io/ib/knkxd056t6J1w2F_1696848833.png)

### Usage



https://github.com/BadreddineIbril/Azovo_youcan_challenge/assets/121865584/a8018336-c5f0-403b-a462-1240fc0eb503





