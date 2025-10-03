# MutaFest Production Deployment Guide

## 🚀 Quick Deploy (Fresh VPS)

```bash
# Clone repository
git clone https://github.com/karaOdin/muta-fest.git
cd muta-fest

# Install dependencies
composer install --no-dev --optimize-autoloader
npm install && npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure .env with your database credentials
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=mutafest
# DB_USERNAME=your_user
# DB_PASSWORD=your_password

# Run migrations and seed
php artisan migrate
php artisan db:seed --class=FestivalSeeder

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🔧 Fixing Migration Issues

If you encounter "Table 'festival_sessions' already exists" or similar errors:

### Option 1: Fresh Database
```bash
php artisan migrate:fresh --seed
```

### Option 2: Fix Existing Database
```bash
# Check current state
php artisan tinker
>>> Schema::getTableListing();
>>> exit

# If you have conflicts, drop problematic tables
php artisan tinker
>>> Schema::dropIfExists('festival_sessions');
>>> Schema::dropIfExists('guest_session');
>>> exit

# Re-run migrations
php artisan migrate
php artisan db:seed --class=FestivalSeeder
```

## 📋 Important Notes

1. **Table Names**:
   - Laravel sessions: `sessions` (for authentication)
   - Festival events: `festival_sessions` (for event management)
   
2. **Admin Access**:
   - URL: `https://yourdomain.com/admin`
   - Email: `admin@mutafest.com`
   - Password: `password` (change in production!)

3. **PHP Version**: Requires PHP 8.2+ (8.3+ recommended)

4. **Nginx Configuration**:
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}
```

## 🔄 Updates from GitHub

```bash
git pull origin master
composer install --no-dev --optimize-autoloader
npm install && npm run build
php artisan migrate
php artisan optimize
```

## 🐛 Troubleshooting

### Sessions Table Conflict
The festival uses `festival_sessions` table to avoid conflict with Laravel's `sessions` table.

### PHP Version Errors
```bash
# If you get PHP version errors
composer install --ignore-platform-reqs

# Better solution: Upgrade PHP to 8.3+
sudo apt update
sudo apt install php8.3 php8.3-fpm php8.3-mysql php8.3-xml php8.3-curl
```

### Permission Issues
```bash
# Fix storage permissions
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```