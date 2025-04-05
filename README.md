# FoodtekDB
database build using PHP my admin 



<p align="center">
    <strong>Foodtek</strong> is a comprehensive backend API for a food delivery application, built with Laravel.
</p>

<p align="center">
    <a href="https://laravel.com"><img src="https://img.shields.io/badge/Built%20With-Laravel-red" alt="Laravel"></a>
    <a href="#"><img src="https://img.shields.io/badge/API-Ready-blue" alt="API Ready"></a>
</p>

## About Foodtek

**Foodtek** is a food delivery app developed for a single restaurant. The project includes the complete backend implementation using Laravel. It supports core features such as user authentication, order and item management, payment processing, delivery tracking, reviews, and real-time notifications.

This application was fully developed by Shahed and Ahmed, who handled all the backend development including API creation and database design. It was built as part of a capstone project, with a strong focus on clean architecture and functional backend operations.

All API endpoints were developed and tested manually using Postman to ensure reliable and efficient request handling. The application is purely backend, with no frontend interface involved.

## Key Features

- User authentication (login, signup, logout via Laravel Breeze)
- Role and permission management
- Items and categories CRUD
- Orders and order items management
- Offers and discounts
- Payments (including delivery-specific cash tracking)
- Delivery tracking
- Reviews and favourites
- Address book for users
- Notifications
- Customer support (calls & chats)
- Issue reporting (suggestions/problems)


##  Built With

- [Laravel](https://laravel.com/)
- PHP
- MySQL
- Laravel Breeze
- Postman (for testing)
- phpMyAdmin (for DB management)
- Mailtrap (for email testing)

##  Project Structure

The project follows Laravel's MVC architecture, and includes:

- Controllers for handling business logic
- Models representing each table
- Migrations for database schema
- Routes defined for API use only
- Testing via Postman for every built endpoint
- Mailtrap integration for email testing and validation (used during development for handling email delivery)

##  Database Tables

The following tables were used in this project:

1. **users** – main user table
2. **orders** – order header table
3. **order_items** – specific items inside orders
4. **role** – user roles (admin, user, driver)
5. **role_user** – pivot table for roles
6. **category** – item categorization
7. **notification** – user notifications
8. **offer** (discount) – deals and special offers
9. **employee** (staff) – support/admin staff table
10. **issues** – suggestions or issue reporting
11. **call & chat** – combined under `communications`
12. **payment** – payment tracking per order
13. **favourite** – user's favourite items
14. **address** – multiple saved addresses per user
15. **permission** – permission control system
16. **role_permissions** – role-to-permission linking
17. **delivery** – delivery driver & status tracking
18. **item** – food items offered
19. **reviews** – item/user reviews (used instead of `rated`)

## 🔄 Relationships

All necessary relationships are defined using Eloquent ORM:

- **User**:
  - `hasMany` orders (A user can have many orders)
  - `hasMany` reviews (A user can have many reviews)
  - `hasMany` addresses (A user can have multiple addresses)
  - `belongsToMany` roles (A user can have multiple roles)
  - `belongsToMany` offers (A user can have many offers)
  - `hasMany` communications (A user can have multiple communications with staff)
  
- **Order**:
  - `hasMany` order_items (An order can have many order items)
  - `belongsTo` user (An order belongs to one user)
  - `hasOne` payment (Each order has one payment)
  - `hasOne` delivery (Each order has one delivery)
  - `belongsToMany` offers (An order can have many offers)
  
- **OrderItem**:
  - `belongsTo` order (Each order item belongs to one order)
  - `belongsTo` item (Each order item is linked to one item)

- **Item**:
  - `belongsTo` category (Each item belongs to one category)
  - `hasMany` reviews (An item can have many reviews)
  - `belongsToMany` favourites (An item can be favourited by many users)

- **Category**:
  - `hasMany` items (A category can have many items)

- **Role**:
  - `belongsToMany` users (A role can be assigned to many users)
  - `belongsToMany` permissions (A role can have many permissions)

- **RoleUser** (Pivot Table):
  - `belongsTo` role (Each role_user entry belongs to one role)
  - `belongsTo` user (Each role_user entry belongs to one user)

- **RolePermissions** (Pivot Table):
  - `belongsTo` role (Each role_permissions entry belongs to one role)
  - `belongsTo` permission (Each role_permissions entry belongs to one permission)

- **Permission**:
  - `belongsToMany` roles (A permission can be assigned to many roles)

- **Notification**:
  - `belongsTo` user (Each notification belongs to one user)

- **Offer**:
  - `belongsToMany` orders (An offer can be linked to many orders)
  - `belongsToMany` users (An offer can be given to many users)

- **Employee (Staff)**:
  - `hasMany` issues (A staff member can be assigned to many issues)
  - `hasMany` communications (A staff member can have many communications with users)

- **Issue**:
  - `belongsTo` user (An issue belongs to one user)
  - `belongsTo` staff (An issue is handled by a staff member)

- **Call & Chat (Communication)**:
  - `belongsTo` user (Each communication entry belongs to one user)
  - `belongsTo` staff (Each communication entry belongs to a staff member)

- **Payment**:
  - `belongsTo` order (Each payment is linked to an order)

- **Favourite**:
  - `belongsTo` user (Each favourite belongs to one user)
  - `belongsTo` item (Each favourite is linked to an item)

- **Address**:
  - `belongsTo` user (Each address is linked to one user)

- **Delivery**:
  - `belongsTo` order (Each delivery is linked to one order)

- **Reviews**:
  - `belongsTo` user (A review belongs to one user)
  - `belongsTo` item (A review is related to one item)


##  Auth & Roles

- Laravel Breeze used for authentication scaffold
- Auth controllers stored in: `app/Http/Controllers/Auth`
- Authenticated routes are protected using middleware
- Role and permissions handled via custom tables

##  API Testing

Postman was used to test all endpoints.
- Auth routes (login, register, logout)
- CRUD for items, categories, offers, reviews
- Order placement and tracking
- Delivery status updates
- Communication endpoints for chat/call simulation
- Favourites management
- Token validation (ensuring user tokens expire after logout or session timeout)
- Notification sending/receiving (ensuring notifications work for actions like order placement, delivery status)
- code validation (for discounts and offers)


##  API Modules

This project is modular and structured around:

- Authentication
- User & Roles
- Items, Categories
- Orders & Payments
- Reviews, Offers
- Addresses, Favourites
- Delivery System
- Notifications
- Customer Support
- Issues/Suggestions

## Notes

- The project is for one restaurant only.
- This backend was created step-by-step with an emphasis on clarity and functionality.
- Delivery drivers are tracked through the "Delivery" table. There is no separate drivers table.
- Email functionality was tested using Mailtrap.


##  Contact

Developed with by **Shahed & Ahmed**

