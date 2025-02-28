# South Adelaide Beauty & Education - Course Purchasing & Learning Online

## Monash University - FIT3048 - S2 2024 - Team009 - Arasaka

**Website**: [SouthAdelaideBeautyAndEducation](https://www.southadelaidebeautyandeducation.com.au/)

## About the Business

**South Adelaide Beauty and Education** is a beauty academy offering high-quality courses and certifications to students pursuing careers in the beauty industry. The academy is focused on empowering women by providing industry-standard education and training. The business also operates a beauty salon, **Beauty by South Adelaide**, which provides a range of beauty services.

Currently, the academy’s website is in its early stages and needs significant improvement to build customer trust. This project aims to develop a professional, visually appealing website that meets industry standards and offers easy access to courses, certifications, and other business services. The website will integrate with social media and streamline administrative tasks.

## The Project

This project will transform the academy's online presence by creating a visually stunning, user-friendly website that integrates with social media and automates scheduling, payments, and communication. The solution will enhance customer trust, increase course accessibility, improve customer inquiries handling, and free up time for the team to focus on their mission of empowering women through beauty education. The project integrates:

- **Stripe** for secure payment processing.
- **Fruitkha – Free Bootstrap 4 Responsive Food Business Template** for the admin dashboard UI.
- **ContentBlocks Plugin** for managing dynamic content.

## Features

✅ Browse courses  
✅ Add courses to cart & pay online 
✅ Sign up & complete courses in LMS system to receive certificate
✅ Secure payment processing with Stripe  
✅ Admin dashboard for managing courses, course content & students' progress 
✅ Dynamic content management with ContentBlocks  

### Technologies Used

- **Framework**: [CakePHP 5.0.1](https://book.cakephp.org/5/en/installation.html)
- **Dependency Manager**: [Composer 2.7.2](https://getcomposer.org/download/)
- **Hosting**: cPanel & VentralIP
- **Database**: MySQL (Managed via PHPMyAdmin)
- **Version Control**: Git & GitHub Desktop
- **Project Management**: Trello
- **Development Tools**: PHPStorm & Visual Studio Code

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

### Installation Guide

### 1. Cloning the Repository

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

### 2. Install Dependencies

```bash
composer install
```

```bash
composer update
```
- Note: Sometimes the website got 'Failed to open stream: No such file or directory' error. You must run `composer update` again.

### 3. Database Setup

- Create a MySQL database including name, username and password. 
- Import the schema `fit3048_project` into the database.
- Update the `Datasourse` in your `config/app_local.php` with your database name, username and password.

### 4. Configure Stripe

- Sign up for a [Stripe account](https://stripe.com).
- Retrieve your API keys from the **Developers** section.
- Set the Stripe API keys in `config/app.php`.

### 5. Start the Development Server

```bash
bin/cake server
```
- Use 'CTRL-C' to exit.

### 6. Access the Application

Open your web browser and go to:

🔗 [http://localhost:8765](http://localhost:8765)

## Usage Guide

### As a User:
- Browse the course list and add courses to the cart.
- Checkout and securely pay using Stripe.
- Access the course via LMS system after paid.

### As an Admin:
- Manage courses & courses' content (multiple-choice, short questions, videos, pdfs, quizzes, etc) through the admin dashboard.
- Manage students' access & progress.

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

- [Fruitkha – Free Bootstrap 4 Responsive Food Business Template](https://themewagon.com/themes/fruitkha-free-bootstrap-4-responsive-food-business-template/)
- [Stripe](https://stripe.com)
- [CakePHP](https://cakephp.org)

## Copyright

© 2024 South Adelaide Beauty and Education. All rights reserved.
