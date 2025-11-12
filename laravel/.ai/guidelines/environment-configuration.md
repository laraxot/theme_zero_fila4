# Environment-Based Configuration System

## Environment Configuration Pattern

**CRITICAL**: This project uses a unique environment-based configuration system where configurations depend on the `APP_URL` variable from `.env`. Each different environment has its own configuration directory structure.

## Configuration Structure

### 1. APP_URL Dependency Pattern

The configuration directory structure depends directly on the `APP_URL` environment variable:

```bash
# Example: APP_URL=http://quaeris.local
# Configuration directory: laravel/config/local/quaeris/
```

### 2. Configuration Directory Structure

```
laravel/config/local/
├── quaeris/           # APP_URL=http://quaeris.local
├── quaeris2/          # APP_URL=http://quaeris2.local  
├── quaeris3/          # APP_URL=http://quaeris3.local
├── quaerisf/          # APP_URL=http://quaerisf.local
├── quaerisf3/         # APP_URL=http://quaerisf3.local
└── quaerisf3mono/     # APP_URL=http://quaerisf3mono.local
```

### 3. Current Environment Configuration

Based on `APP_URL=http://quaeris.local`, the active configuration directory is:

```
laravel/config/local/quaeris/
├── app.php
├── auth.php
├── chart.php
├── database.php
├── exchanges.php
├── filesystems.php
├── google.php
├── lang/
│   └── it/
│       ├── policy.md
│       └── terms.md
├── limesurvey.php
├── metatag.php
├── modules_statuses.json
├── morph_map.php
├── passport.php
├── permission.php
├── policy.md
├── quaeris.php
├── services.php
├── social.php
├── terms.md
├── totem.php
└── xra.php                # ✅ Contains theme configuration
```

## Theme Configuration System

### 1. Theme Configuration Location

The active theme is defined in the XRA configuration file:

```php
// File: laravel/config/local/quaeris/xra.php
<?php

declare(strict_types=1);

return [
    'adm_theme' => 'AdminLTE',        // Admin theme
    'pub_theme' => 'One',             // ✅ Frontend theme
    'primary_lang' => 'it',           // Primary language
    'main_module' => 'Quaeris',       // Main application module
    // ... other configuration
];
```

### 2. Theme Directory Structure

The theme specified by `pub_theme => 'One'` is located at:

```
laravel/Themes/One/
├── assets/                    # Theme assets
├── resources/                 # Theme source files
│   ├── css/
│   │   └── app.css           # Main CSS file
│   └── js/
│       └── app.js            # Main JavaScript file
├── public/                   # Compiled assets
├── docs/                     # Theme documentation
├── lang/                     # Theme translations
├── package.json              # Build dependencies
├── tailwind.config.js        # Tailwind configuration
├── postcss.config.js         # PostCSS configuration
└── vite.config.js            # Vite build configuration
```

## Frontend CSS Modification Workflow

### 1. CSS Modification Location

**CRITICAL**: All frontend CSS modifications must be made in:

```
laravel/Themes/One/resources/css/app.css
```

**❌ DON'T modify these locations:**
- `laravel/public/css/` (auto-generated)
- `laravel/resources/css/` (not used for themes)
- Any other CSS files outside the theme directory

### 2. Build Process

After making CSS changes, you **MUST** run these commands in the theme directory:

```bash
# Navigate to theme directory
cd laravel/Themes/One/

# Build the assets
npm run build

# Copy assets to public directory
npm run copy
```

### 3. Build Script Configuration

The `package.json` contains the essential build scripts:

```json
{
  "scripts": {
    "dev": "vite",
    "build": "vite build",
    "watch": "vite build --watch", 
    "copy": "cp -r ./resources/dist/* ../../../public_html/themes/One"
  }
}
```

**The `copy` script is critical** because it:
- Copies compiled assets from theme's build directory
- Moves them to the public web directory
- Makes them accessible to the frontend application

## Development Workflow

### 1. Environment Setup

```bash
# 1. Check current APP_URL in .env
grep APP_URL laravel/.env
# Result: APP_URL=http://quaeris.local

# 2. Verify active configuration directory
ls laravel/config/local/quaeris/

# 3. Check active theme configuration
cat laravel/config/local/quaeris/xra.php | grep pub_theme
# Result: 'pub_theme' => 'One',
```

### 2. Theme Development

```bash
# Navigate to active theme
cd laravel/Themes/One/

# Install dependencies (first time only)
npm install

# Start development server (optional)
npm run dev

# Make CSS changes in:
# resources/css/app.css

# Build for production
npm run build

# Copy to public directory
npm run copy
```

### 3. Verification

```bash
# Check if assets were copied successfully
ls -la ../../../public_html/themes/One/assets/

# Clear Laravel caches
php artisan cache:clear
php artisan view:clear
```

## Configuration Management Rules

### 1. Environment-Specific Configuration

```php
// ✅ Correct - Environment-based configuration
// laravel/config/local/quaeris/xra.php
return [
    'pub_theme' => 'One',
    'adm_theme' => 'AdminLTE',
    'primary_lang' => 'it',
];
```

### 2. Theme Detection

```php
// ✅ Application automatically detects theme from configuration
// Based on APP_URL -> config directory -> xra.php -> pub_theme
```

### 3. Multi-Environment Support

```bash
# Different environments use different configurations:

# Development
APP_URL=http://quaeris.local → config/local/quaeris/

# Staging  
APP_URL=http://quaeris2.local → config/local/quaeris2/

# Production
APP_URL=http://quaerisf3.local → config/local/quaerisf3/
```

## Build System Architecture

### 1. Theme Build Configuration

```javascript
// laravel/Themes/One/vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            buildDirectory: 'build/theme-one'
        }),
    ],
    build: {
        outDir: './public',      // ✅ Builds to theme's public directory
        emptyOutDir: false,
        manifest: 'manifest.json',
    },
});
```

### 2. Asset Pipeline

```
Source Files                Build Process              Final Location
├── resources/css/app.css  →  vite build  →  public/assets/app-[hash].css
├── resources/js/app.js    →  vite build  →  public/assets/app-[hash].js
└── package.json           →  npm run copy  →  ../../../public_html/themes/One/
```

### 3. Tailwind Integration

```javascript
// laravel/Themes/One/tailwind.config.js
import preset from '../../vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],           // ✅ Uses Filament preset
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        '../../resources/views/**/*.blade.php',  // Laravel views
        '../../Modules/**/*.blade.php',          // Module views
    ],
    theme: {
        extend: {
            // Custom theme colors
        }
    }
}
```

## Common Tasks

### 1. Change Theme Colors

```css
/* laravel/Themes/One/resources/css/app.css */
@tailwind base;
@tailwind components;
@tailwind utilities;

@layer base {
    :root {
        --primary-50: 240 249 255;
        --primary-500: 14 165 233;
        --primary-900: 12 74 110;
    }
}

@layer components {
    .btn-primary {
        @apply bg-primary-500 hover:bg-primary-600 text-white;
    }
}
```

### 2. Add Custom CSS

```css
/* laravel/Themes/One/resources/css/app.css */

/* Custom component styles */
@layer components {
    .medical-card {
        @apply bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow;
    }
    
    .appointment-button {
        @apply bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded;
    }
}

/* Custom utility classes */
@layer utilities {
    .text-medical-blue {
        color: #1e40af;
    }
}
```

### 3. Debug Asset Loading

```bash
# Check if assets exist
ls -la public_html/themes/One/assets/

# Check Laravel asset helpers
php artisan tinker
>>> asset('themes/One/assets/app-[hash].css');

# Check theme configuration
php artisan tinker  
>>> config('xra.pub_theme');
```

## Environment Switching

### 1. Switch to Different Environment

```bash
# Change APP_URL in .env
sed -i 's/APP_URL=.*/APP_URL=http:\/\/quaeris2.local/' .env

# Clear configuration cache
php artisan config:clear

# Application now uses config/local/quaeris2/ directory
```

### 2. Verify Environment Configuration

```php
// Check which configuration is active
php artisan tinker
>>> config_path('local/' . parse_url(config('app.url'), PHP_URL_HOST));
>>> config('xra.pub_theme');
>>> config('xra.adm_theme');
```

## Best Practices

### 1. Development Workflow

- Always work in the correct theme directory based on `pub_theme` config
- Run `npm run build && npm run copy` after CSS changes
- Clear Laravel caches after asset changes
- Test in both development and production build modes

### 2. Asset Management

- Keep source files in `resources/` directories
- Never edit files in `public/` directories directly
- Use version control for source files, not compiled assets
- Document custom CSS in theme documentation

### 3. Environment Management

- Use environment-specific configuration directories
- Keep theme settings consistent across environments
- Document configuration differences between environments
- Test theme changes in staging before production

## Troubleshooting

### 1. Theme Not Loading

```bash
# Check configuration
cat config/local/[environment]/xra.php | grep pub_theme

# Verify theme directory exists
ls -la Themes/[theme-name]/

# Check if assets were built and copied
ls -la public_html/themes/[theme-name]/assets/
```

### 2. CSS Changes Not Visible

```bash
# Rebuild and copy assets
cd Themes/[theme-name]/
npm run build
npm run copy

# Clear Laravel caches
php artisan cache:clear
php artisan view:clear

# Hard refresh browser (Ctrl+F5)
```

### 3. Build Errors

```bash
# Clean and reinstall dependencies
rm -rf node_modules package-lock.json
npm install

# Check Node.js version
node --version  # Should be 18+

# Run build with verbose output
npm run build --verbose
```

## Summary

- **Environment-based configuration** depends on `APP_URL` from `.env`
- **Theme configuration** is in `config/local/[environment]/xra.php`  
- **Theme files** are in `laravel/Themes/[theme-name]/`
- **CSS modifications** must be in theme's `resources/css/app.css`
- **Build process** requires `npm run build && npm run copy`
- **Asset pipeline** moves files from theme to public directory
- **Multiple environments** supported with separate config directories