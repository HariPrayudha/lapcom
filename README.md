# LapCom - Laptop Online Store

LapCom is a website designed for selling laptops online. This system includes features that make it easier for users to purchase, make payments, and manage data through an admin panel.

## Main Features
- **User**:
  - User registration and login.
  - Updateable user profile.
  - View order history and payment details.
- **Admin Panel**:
  - Manage product lists, orders, and payments.
  - Validate user-uploaded payment proof.
- **Assets and Design**:
  - Responsive design using CSS and JavaScript.
  - Includes assets like product images, fonts, and icons.

## Folder Structure
- `admin/`: Admin panel for managing products and transactions.
- `buktitf/`: Directory for storing user-uploaded payment proof.
- `config/`: Additional configuration files.
- `css/`: CSS files for the website design.
- `FILE SQL DATABASE/`: SQL file for database import.
- `fonts/`: Font assets for supporting the interface design.
- `images/`: Product images and other icons.
- `js/`: JavaScript files for dynamic features.
- `page/`: Additional pages such as the product page.

## Installation
1. Clone this repository:
   ```bash
   git clone https://github.com/HariPrayudha/lapcom.git
   ```
2. Navigate to the project directory:
   ```bash
   cd lapcom
   ```
3. Move the project folder to the web server root directory (e.g., `htdocs` for XAMPP):
   ```bash
   mv * /path/to/your/server/htdocs/lapcom
   ```
4. Import the database using the SQL file in `FILE SQL DATABASE/` into your MySQL database:
   ```bash
   mysql -u username -p database_name < "FILE SQL DATABASE/your-database-file.sql"
   ```
5. Configure the `koneksi.php` file with your database credentials.
6. Access the project in your browser:
   ```
   http://localhost/lapcom
   ```

## Contribution
Contributions are welcome! Feel free to submit a pull request or open an issue to report bugs or add new features.

## License
This project does not have a specific license. Please contact the developer if you wish to use it for particular purposes.

## Project Link
[GitHub Repository](https://github.com/HariPrayudha/lapcom)

---
**Created with ❤️ by Hari Prayudha**
