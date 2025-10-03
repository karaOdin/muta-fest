#!/bin/bash

echo "🔧 Fixing MutaFest migrations for production..."

# Check if we're in production or fresh install
if [ "$1" == "fresh" ]; then
    echo "📦 Fresh installation detected..."
    php artisan migrate
    php artisan db:seed --class=FestivalSeeder
else
    echo "🔍 Checking existing database state..."
    
    # Check if festival_sessions already exists
    if php artisan tinker --execute="return Schema::hasTable('festival_sessions');" | grep -q "true"; then
        echo "✅ festival_sessions table already exists"
    else
        # Check if sessions table exists and is Laravel's
        if php artisan tinker --execute="return Schema::hasColumn('sessions', 'payload');" | grep -q "true"; then
            echo "✅ Laravel sessions table exists correctly"
        else
            echo "⚠️  Non-Laravel sessions table found, needs migration"
        fi
    fi
    
    # Run any pending migrations
    php artisan migrate
fi

echo "✅ Migration fix completed!"