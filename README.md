# PetConnect Local Installation Guide

Welcome to the local installation guide for **PetConnect**. Follow these steps to set up the PetConnect website on your local machine using XAMPP.

## Prerequisites

- XAMPP: Ensure you have XAMPP installed on your machine. If not, download and install it.
## Installation Steps

### Step 1: Cloning the Repository
1. Clone the PetConnect repository to your local machine.
2. Ensure you pull the latest changes regularly to stay up-to-date.

### Step 2: Setting Up XAMPP
1. Open the XAMPP Control Panel.
2. Start both the Apache and MySQL servers.

### Step 3: Configuring the Project
1. Navigate to the `htdocs` directory in your XAMPP installation folder.
2. Copy the PetConnect project files into this directory.

### Step 4: Database Configuration
1. Open your web browser and go to `http://localhost/phpmyadmin`.
2. Create a new database named `social`.
3. Import the provided SQL file into this database.

### Step 5: Running the Website
1. Open your web browser.
2. Navigate to `http://localhost/PetConnect/index.php` (Replace `PetConnect` with your project folder name if different).

## Post-Installation

After completing these steps, the PetConnect website should be running on your local server. You can now browse and test the site's functionality.

## Troubleshooting

If you encounter issues:
- Check if XAMPP servers are running correctly.
- Ensure the database name matches the name in the project's configuration.
- Verify that the project files are correctly placed in XAMPP's `htdocs` folder.

## Support

For additional help or to report issues, please contact our support team at:
- Email: bupetconnect@gmail.com

---

Thank you for setting up PetConnect locally. Your participation and feedback are invaluable to our community's growth.

