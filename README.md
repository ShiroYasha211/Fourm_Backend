<div align="center">
  <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&size=32&duration=3000&pause=1000&color=8B5CF6&center=true&vCenter=true&width=940&lines=🚀+Forum+App+Backend+API;💻+Laravel+RESTful+API+Service;🔐+Secure+%26+Scalable+Architecture" alt="Typing SVG" />
</div>

<div align="center">
  <img src="https://user-images.githubusercontent.com/74038190/212257467-871d32b7-e401-42e8-a166-fcfd7baa4c6b.gif" width="600" alt="Backend Development Animation"/>
</div>

# 🛠️ Forum App Backend API

<div align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP"/>
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"/>
  <img src="https://img.shields.io/badge/Sanctum-3F3F3F?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel Sanctum"/>
  <img src="https://img.shields.io/badge/REST_API-02569B?style=for-the-badge&logo=fastapi&logoColor=white" alt="REST API"/>
</div>

<div align="center">
  <h3>🔗 Robust RESTful API powering the Forum App mobile application</h3>
  <p><strong>Built with Laravel framework, providing secure authentication, real-time social features, and scalable architecture</strong></p>
</div>

---

## 📱 Connected Frontend Application

<div align="center">
  <a href="https://github.com/ShiroYasha211/Fourm_Frontend">
    <img src="https://img.shields.io/badge/Flutter_Frontend-02569B?style=for-the-badge&logo=flutter&logoColor=white" alt="Flutter Frontend"/>
  </a>
  <p><strong>🔗 <a href="https://github.com/ShiroYasha211/Fourm_Frontend">View Flutter Mobile App Repository</a></strong></p>
</div>

---

## ✨ API Features

### 🔐 **Authentication & Authorization**
- 📧 **User Registration** with email validation
- 🔑 **Secure Login System** with password hashing
- 🌟 **Laravel Sanctum Integration** for API token authentication
- 🔄 **Password Reset Functionality**
- 👤 **User Profile Management**
- 🛡️ **Role-Based Access Control**

### 📝 **Forum Management**
- 📋 **Post Creation & Management** (CRUD operations)
- 🗂️ **Category-Based Organization**
- 🔍 **Advanced Search & Filtering**
- 📊 **Post Analytics & Statistics**
- 🕒 **Timestamp Tracking**

### 💬 **Social Interaction**
- 💭 **Commenting System** with nested replies
- ❤️ **Like/Unlike Functionality** for posts and comments
- 🔗 **Share Posts** with social media integration
- 👥 **User Mentions** (@username functionality)
- 📈 **Engagement Metrics** (likes, comments, shares count)

### 👤 **User Management**
- 📱 **Profile Picture Upload** with image processing
- 📊 **User Statistics** (posts, followers, following counts)
- 🔧 **Account Settings Management**
- 🗑️ **Account Deletion** with data cleanup
- 📧 **Email Verification System**

---

## 🛠️ Technology Stack

### 🏗️ **Framework & Core**
```php
Laravel Framework (Installer 5.16.0)
PHP 8.x
Composer Dependency Manager
```

### 🗄️ **Database & Storage**
```sql
MySQL Database
Laravel Eloquent ORM
Database Migrations & Seeders
```

### 🔐 **Authentication & Security**
```php
Laravel Sanctum (API Authentication)
Password Hashing (Bcrypt)
CSRF Protection
Rate Limiting
Input Validation & Sanitization
```

### 🚀 **Additional Features**
```php
File Upload Handling
Image Processing
Email Services
API Rate Limiting
Logging & Monitoring
```

---

## 📋 API Endpoints

### 🔐 **Authentication Routes**
```http
POST   /api/register           # User registration
POST   /api/login              # User login
POST   /api/logout             # User logout
POST   /api/forgot-password    # Password reset request
POST   /api/reset-password     # Password reset confirmation
GET    /api/user               # Get authenticated user
```

### 📝 **Posts Management**
```http
GET    /api/posts              # Get all posts (paginated)
POST   /api/posts              # Create new post
GET    /api/posts/{id}         # Get specific post
PUT    /api/posts/{id}         # Update post (owner only)
DELETE /api/posts/{id}         # Delete post (owner only)
POST   /api/posts/{id}/like    # Like/unlike post
```

### 💬 **Comments System**
```http
GET    /api/posts/{id}/comments     # Get post comments
POST   /api/posts/{id}/comments     # Add comment to post
PUT    /api/comments/{id}           # Update comment (owner only)
DELETE /api/comments/{id}           # Delete comment (owner only)
POST   /api/comments/{id}/like      # Like/unlike comment
POST   /api/comments/{id}/reply     # Reply to comment
```

### 👤 **User Profiles**
```http
GET    /api/profile                 # Get user profile
PUT    /api/profile                 # Update user profile
POST   /api/profile/avatar          # Upload profile picture
GET    /api/users/{id}              # Get public user profile
GET    /api/users/{id}/posts        # Get user's posts
```

---

## 🚀 Getting Started

### 📋 **Prerequisites**

- ✅ **PHP** (8.0 or higher)
- ✅ **Composer** (Dependency Manager)
- ✅ **MySQL** (5.7 or higher)
- ✅ **Laravel CLI** (Optional but recommended)

### 🔧 **Installation**

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ShiroYasha211/Fourm_Backend.git
   cd Fourm_Backend
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**
   ```env
   # Update .env file with your database credentials
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=forum_app
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Database Setup**
   ```bash
   # Create database
   mysql -u root -p -e "CREATE DATABASE forum_app;"
   
   # Run migrations
   php artisan migrate
   
   # Seed database (optional)
   php artisan db:seed
   ```

6. **Sanctum Installation**
   ```bash
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   php artisan migrate
   ```

7. **Storage Link**
   ```bash
   php artisan storage:link
   ```

8. **Start Development Server**
   ```bash
   php artisan serve
   ```

   API will be available at: `http://localhost:8000`

---

## ⚙️ Configuration

### 📧 **Email Configuration**
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourapp.com
MAIL_FROM_NAME="Forum App"
```

### 🔐 **Sanctum Configuration**
```php
// config/sanctum.php
'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
    '%s%s',
    'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
    env('APP_URL') ? ','.parse_url(env('APP_URL'), PHP_URL_HOST) : ''
))),
```

### 📁 **File Upload Configuration**
```php
// config/filesystems.php
'public' => [
    'driver' => 'local',
    'root' => storage_path('app/public'),
    'url' => env('APP_URL').'/storage',
    'visibility' => 'public',
],
```

---

## 🗄️ Database Schema

### 👥 **Users Table**
```sql
- id (Primary Key)
- name (String)
- username (String, Unique)
- email (String, Unique)
- email_verified_at (Timestamp)
- password (Hashed String)
- avatar (String, Nullable)
- bio (Text, Nullable)
- created_at, updated_at (Timestamps)
```

### 📝 **Posts Table**
```sql
- id (Primary Key)
- user_id (Foreign Key)
- content (Text)
- image (String, Nullable)
- likes_count (Integer, Default: 0)
- comments_count (Integer, Default: 0)
- created_at, updated_at (Timestamps)
```

### 💬 **Comments Table**
```sql
- id (Primary Key)
- user_id (Foreign Key)
- post_id (Foreign Key)
- parent_id (Foreign Key, Nullable - for replies)
- content (Text)
- likes_count (Integer, Default: 0)
- created_at, updated_at (Timestamps)
```

### ❤️ **Likes Table**
```sql
- id (Primary Key)
- user_id (Foreign Key)
- likeable_id (Integer)
- likeable_type (String) - posts or comments
- created_at, updated_at (Timestamps)
```

---

## 🔒 Security Features

### 🛡️ **Authentication Security**
- Password hashing using Laravel's bcrypt
- API rate limiting (60 requests per minute per user)
- CSRF protection for web routes
- XSS protection through input sanitization
- SQL injection prevention via Eloquent ORM

### 🔐 **API Security**
- Sanctum token-based authentication
- Input validation and sanitization
- File upload security checks
- Image processing and validation
- Request throttling and rate limiting

### 📊 **Data Protection**
- User data encryption where applicable
- Secure file storage
- Database connection encryption
- Environment variable protection

---

## 📊 API Response Format

### ✅ **Success Response**
```json
{
    "success": true,
    "message": "Operation completed successfully",
    "data": {
        // Response data
    },
    "meta": {
        // Pagination or additional metadata
    }
}
```

### ❌ **Error Response**
```json
{
    "success": false,
    "message": "Error description",
    "errors": {
        // Validation errors or detailed error information
    }
}
```

### 📄 **Pagination Response**
```json
{
    "success": true,
    "data": [],
    "meta": {
        "current_page": 1,
        "per_page": 15,
        "total": 100,
        "last_page": 7,
        "next_page_url": "...",
        "prev_page_url": "..."
    }
}
```

---

## 🧪 Testing

### 🔧 **Running Tests**
```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/AuthTest.php

# Run with coverage
php artisan test --coverage
```

### 📝 **Test Categories**
- **Unit Tests:** Model relationships, business logic
- **Feature Tests:** API endpoints, authentication flows
- **Integration Tests:** Database interactions, external services

---

## 🚀 Deployment

### 🌐 **Production Setup**
```bash
# Install production dependencies
composer install --optimize-autoloader --no-dev

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize

# Run migrations
php artisan migrate --force
```

### ⚙️ **Environment Variables**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

# Database
DB_CONNECTION=mysql
DB_HOST=your-production-host
DB_DATABASE=your-production-db

# Queue (recommended for production)
QUEUE_CONNECTION=database
```

---

## 📈 Performance Optimization

- **Database Indexing** on frequently queried fields
- **Eager Loading** to prevent N+1 query problems
- **Query Optimization** with proper relationships
- **Caching Strategy** for frequently accessed data
- **Image Optimization** for uploaded files
- **API Response Caching** for static content

---

## 🔮 Future Enhancements

### 🚀 **Planned Features**
- [ ] **Real-time Notifications** with WebSocket integration
- [ ] **Advanced Search** with Elasticsearch
- [ ] **Content Moderation** system
- [ ] **User Following System**
- [ ] **Post Categories/Tags** management
- [ ] **Admin Dashboard** API endpoints
- [ ] **Analytics & Reporting** features
- [ ] **File Attachments** for posts
- [ ] **Multi-language Support**
- [ ] **API Versioning** system

### 🔧 **Technical Improvements**
- [ ] **Redis Caching** implementation
- [ ] **Queue System** for background jobs
- [ ] **Comprehensive Logging** system
- [ ] **API Documentation** with Swagger/OpenAPI
- [ ] **Docker Containerization**
- [ ] **CI/CD Pipeline** setup

---

## 🤝 Contributing

We welcome contributions! Here's how you can help:

1. **🍴 Fork the repository**
2. **🌿 Create a feature branch** (`git checkout -b feature/amazing-feature`)
3. **💫 Commit your changes** (`git commit -m 'Add amazing feature'`)
4. **🚀 Push to the branch** (`git push origin feature/amazing-feature`)
5. **📝 Open a Pull Request**

### 📋 **Contribution Guidelines**
- Follow PSR-12 coding standards
- Write comprehensive tests for new features
- Update documentation for API changes
- Use meaningful commit messages
- Ensure backward compatibility

---

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

---

## 👨‍💻 Developer

<div align="center">
  <img src="https://github.com/ShiroYasha211.png" width="100" height="100" style="border-radius: 50%" alt="Mohammed Alhemyari"/>
  
  **Mohammed Alhemyari**  
  *Flutter Developer | Backend Developer*
  
  [![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/mohammed-alhemyari-bb0352248/)
  [![GitHub](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/ShiroYasha211)
  [![Email](https://img.shields.io/badge/Email-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:samehing211@gmail.com)
</div>

---

## 💬 Support

If you found this project helpful, please consider:

- ⭐ **Starring the repository**
- 🐛 **Reporting issues**
- 💡 **Suggesting new features**
- 🤝 **Contributing to the codebase**

---

<div align="center">
  <img src="https://user-images.githubusercontent.com/74038190/212284115-f47cd8ff-2ffb-4b04-b5bf-4d1c14c0247f.gif" width="1000" alt="Bottom Animation"/>
</div>

<div align="center">
  <h3>🚀 Made with ❤️ and Laravel</h3>
  <p><i>"Powering modern social interactions through robust API architecture"</i></p>
</div>

---

<div align="center">
  <img src="https://komarev.com/ghpvc/?username=ShiroYasha211-forum-backend&label=API%20Views&color=8b5cf6&style=flat" alt="API Views" />
</div>
