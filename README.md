# Billing System for Organizations

This billing system is a web-based application developed in PHP, HTML, CSS, and JavaScript, designed to facilitate billing and invoicing for organizations. It provides an intuitive user interface for billing administrators to manage invoices, track payments, and generate reports.

## Features

- **User Authentication**: Secure login and authentication system for billing administrators.
- **Organization Management**: Easily add, edit, and delete organizations in the system.
- **Invoice Generation**: Create invoices with details such as invoice number, date, due date, and itemized charges.
- **Payment Tracking**: Record and track payments against each invoice.
- **Reports**: Generate reports to analyze billing data, track outstanding payments, and view payment history.
- **Responsive Design**: A user-friendly interface accessible from various devices.

## Technologies Used

- **PHP**: Backend server-side scripting language.
- **HTML/CSS**: Frontend markup and styling.
- **JavaScript**: Enhances user interactivity and handles client-side validations.
- **MySQL**: Database management for storing organization and billing data.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/wilfrednyaribo/billing-system.git
    ```

2. Import the database schema from `database/billings1.sql` into your MySQL database.

3. Configure database connection settings in `config/config.php`.

4. Deploy the application on a PHP-enabled server.

5. Access the application through your web browser.

## Usage

1. Login with your administrator credentials.
2. Add organizations and their details.
3. Create invoices for organizations, specifying charges and due dates.
4. Track payments received and mark invoices as paid.
5. Generate reports to analyze billing data.

## Contributing

Contributions are welcome! If you have ideas for features or improvements, please create an issue or submit a pull request.

## License

This billing system is open-source software licensed under the [MIT License](LICENSE).
