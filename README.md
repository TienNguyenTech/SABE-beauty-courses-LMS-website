# South Adelaide Beauty & Education - Course Purchasing & Learning Online

## Monash University - FIT3048 - S2 2024 - Team009 - Arasaka

### Run Sheet/Access Instructions

- **Website**: [SouthAdelaideBeautyAndEducation](https://www.southadelaidebeautyandeducation.com.au/)

### Cloning the Repository

To clone this repository to your local machine, follow these steps:

1. Open your terminal or command prompt.
2. Navigate to the directory where you want to clone the repository.
3. Run the following command:
   ```bash
   git clone https://github.com/TienNguyenTech/SABE-beauty-courses-LMS-website.git
   ```
4. Navigate into the cloned directory:
   ```bash
   cd SABE-beauty-courses-LMS-website
   ```
5. You now have a local copy of the repository.

### Admin & Staff Login Credentials (For Testing)

- **Admin Login**
  - Email: `admin@sabe.u24s1009.iedev.org`
  - Password: `Sabe1234`

- **Staff Login**
  - Email: `emmalight@sabe.u24s1009.iedev.org`
  - Password: `Student1234`

- **Test Email for Forms**: `admin@sabe.u24s1009.iedev.org`

- **Test Credit Card (Stripe Sandbox Mode)**:
  - Card Number: `4242 4242 4242 4242`
  - Expiration Date: `12/34`
  - CVC: `123`

### Technologies Used

- **Framework**: [CakePHP 5.0.1](https://book.cakephp.org/5/en/installation.html)
- **Dependency Manager**: [Composer 2.7.2](https://getcomposer.org/download/)
- **Hosting**: cPanel
- **Database**: MySQL (Managed via PHPMyAdmin)
- **Version Control**: Git & GitHub Desktop
- **Project Management**: Trello
- **Development Tools**: PHPStorm & Visual Studio Code

## About the Project

Tasty Bites Kitchen is a Nepalese food ordering web application built using CakePHP, HTML, CSS, JavaScript, and PHP. Users can browse the menu, place orders, and make payments online. The project integrates:

- **Stripe** for secure payment processing.
- **SB Admin 2 Template** for the admin dashboard UI.
- **ContentBlocks Plugin** for managing dynamic content.

## Features

✅ Browse menu items  
✅ Add items to cart & place orders online  
✅ Secure payment processing with Stripe  
✅ Admin dashboard for managing orders  
✅ Dynamic content management with ContentBlocks  

## Installation Guide

### 1. Clone the Repository

```bash
git clone https://git.infotech.monash.edu/UGIE/ugie-2024/team009/team009-app_fit3047.git
cd team009-app_fit3047
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Database Setup

- Create a MySQL database.
- Copy `config/app.default.php` to `config/app.php` and update the database credentials.
- Run migrations to create the database schema:
  ```bash
  bin/cake migrations migrate
  ```

### 4. Configure Stripe

- Sign up for a [Stripe account](https://stripe.com).
- Retrieve your API keys from the **Developers** section.
- Set the Stripe API keys in `config/app.php`.

### 5. Start the Development Server

```bash
bin/cake server
```

### 6. Access the Application

Open your web browser and go to:

🔗 [http://localhost:8765](http://localhost:8765)

## Usage Guide

### As a User:
- Browse the menu and add items to the cart.
- Checkout and securely pay using Stripe.

### As an Admin:
- Manage orders through the admin dashboard.

## Contributing

### How to Contribute

#### Using Command Line:

1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m 'Add new feature'
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Open a pull request.

#### Using GitHub Desktop:

1. Add the repository.
2. Fetch the latest changes from `main`.
3. Edit in PHPStorm or VS Code.
4. Add a commit message like `'Add new feature'`.
5. Click the **Commit** button.
6. Push to `main`.

## License

This project is licensed under the [MIT License](https://en.wikipedia.org/wiki/MIT_License).

## Acknowledgements

- [SB Admin 2 Template](https://startbootstrap.com/theme/sb-admin-2)
- [Stripe](https://stripe.com)
- [CakePHP](https://cakephp.org)

## Contact

For any inquiries, please contact the **Developer Team**.

## Copyright

© 2024 Tasty Bites Kitchen. All rights reserved.
