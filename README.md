# GameStore WordPress Theme & Blocks

> 📖 **Documentation Language**: [Русский](./docs/ru/README.md) | **English** (current)

A modern WordPress block theme for gaming stores, built with full-site editing support and custom React-based blocks.

## 🎮 Project Overview

- **Block Theme**: Modern FSE (Full Site Editing) theme optimized for gaming stores
- **Custom Blocks**: React-based Gutenberg blocks for enhanced functionality
- **Core Plugin**: Essential functionality and customizations
- **MU Plugin**: Must-use plugin for site-wide features
- **Automated Deployment**: GitHub Actions CI/CD pipeline

## 🏗️ Project Structure

```
game-store/
├── .github/workflows/
│   └── CICD.yml                 # Automated deployment pipeline
├── docs/
│   └── ru/                      # Russian documentation
├── mu-plugins/
│   └── gamestore-general.php    # Must-use plugin
├── plugins/
│   ├── blocks-gamestore/        # Custom React blocks
│   └── core-gamestore/          # Core functionality plugin
├── themes/
│   └── game-store/              # Main block theme
├── docker-compose.yml           # Local development environment
├── wp-version-control.cfg       # WordPress version management
└── README.md                    # This file
```

## 🔧 Project Architecture and Components

### 🎨 Main Theme: `themes/game-store/`
**Purpose**: WordPress block theme with Full Site Editing (FSE) support

**Key files and directories:**
- `themes/game-store/style.css` - main theme styles and meta information
- `themes/game-store/theme.json` - theme configuration, color palette, typography
- `themes/game-store/templates/` - HTML templates for different page types
- `themes/game-store/patterns/` - ready-made block patterns for quick insertion
- `themes/game-store/parts/` - theme parts (header, footer)

**Why needed**: Provides the visual foundation of the site, defines the design system, colors, fonts, and overall appearance. FSE allows editing layouts through WordPress interface without code.

### 🧩 Custom Blocks: `plugins/blocks-gamestore/`
**Purpose**: React components for creating specialized Gutenberg blocks

**Structure:**
- `plugins/blocks-gamestore/src/` - source code of React-based blocks
- `plugins/blocks-gamestore/build/` - compiled blocks for production
- `plugins/blocks-gamestore/package.json` - dependencies and build scripts

**Why needed**: Extends standard WordPress blocks with gaming store-specific elements (game cards, galleries, ratings, etc.). React provides interactivity and modern UX.

### ⚙️ Core Plugin: `plugins/core-gamestore/`
**Purpose**: Centralized logic and site functionality

**Contains:**
- Custom post types (for games, reviews)
- API integrations (payment systems, game catalogs)
- Administrative settings
- WordPress hooks and filters

**Why needed**: Separates business logic from presentation, ensures function portability between themes, manages gaming store-specific data.

### 🔧 Must-Use Plugin: `mu-plugins/gamestore-general.php`
**Purpose**: Critical functionality that must always be active

**Location**: `mu-plugins/` (Must Use plugins) - automatically activated

**What it does:**
- Basic security settings
- Essential redirects and rewrites
- System hooks that cannot be disabled
- Project constants initialization

**Why separate folder**: MU-plugins cannot be deactivated through WordPress admin, which is critical for site stability. They load before regular plugins and are always active.

## 🚀 Development Setup

### Prerequisites
- Node.js 18+
- Docker & Docker Compose
- Git

### Local Development

1. **Clone the repository**
   ```bash
   git clone https://github.com/GKVSO/GameStore.git>
   cd game-store
   ```

2. **Start development environment**
   ```bash
   docker-compose up -d
   ```

3. **Build custom blocks**
   ```bash
   cd plugins/blocks-gamestore
   npm install
   npm run start
   ```

### Block Development Commands

```bash
# Development mode with hot reload
npm run start

# Production build
npm run build

# Code formatting
npm run format

# Linting
npm run lint:js
npm run lint:css

# Create plugin zip
npm run plugin-zip
```

## 🔐 CI/CD Configuration

### Required GitHub Secrets

The automated deployment requires the following secrets to be configured in your GitHub repository:

| Secret Name | Description | Example |
|-------------|-------------|---------|
| `SERVER_HOST` | Server IP address or domain | `192.168.1.100` or `example.com` |
| `SERVER_USER` | SSH username | `ubuntu` |
| `SERVER_SSH_PASSWORD` | SSH password | `your-secure-password` |
| `SERVER_PORT` | SSH port (usually 22) | `22` |
| `SERVER_DEV_TARGET_PATH` | Development deployment path | `/var/www/dev.example.com` |
| `SERVER_PROD_TARGET_PATH` | Production deployment path | `/var/www/example.com` |

### Setting Up Secrets

1. Go to your GitHub repository
2. Navigate to **Settings** → **Secrets and variables** → **Actions**
3. Click **New repository secret**
4. Add each secret with its corresponding value

### WordPress Version Control

The `wp-version-control.cfg` file contains the WordPress download URL:
```
https://wordpress.org/latest.zip
```

This ensures consistent WordPress versions across deployments.

## 🚀 Deployment Process

### Trigger Events

- **Development Deployment**: Push to `dev` branch
- **Production Deployment**: Create a release

### Deployment Stages

1. **Preparation**
   - Download WordPress from `wp-version-control.cfg`
   - Package plugins, themes, and mu-plugins

2. **File Transfer**
   - Upload WordPress and content packages to server
   - Enable maintenance mode

3. **WordPress Core Update**
   - Backup existing configuration
   - Replace WordPress core files (preserving `wp-config.php`)
   - Update admin and includes directories

4. **Content Update**
   - Update plugins, themes, and mu-plugins
   - Preserve existing uploads and configurations

5. **Cleanup**
   - Disable maintenance mode
   - Remove temporary files
   - Verify deployment

### Deployment Features

- **Zero-downtime deployment**: Maintenance mode prevents broken states
- **Complete WordPress Core update**: Unlike standard deployments that only update themes and plugins, this approach downloads and replaces the entire WordPress Core. This is critical for large-scale projects where strict version control is essential
- **WordPress version control**: The `wp-version-control.cfg` file allows locking to a specific WordPress version across all environments, eliminating compatibility issues and ensuring stability
- **Selective updates**: Preserves `wp-config.php` and uploads directory with media files
- **Automatic cleanup**: Removes temporary files post-deployment
- **Environment-specific paths**: Different paths for dev/prod

## 🛠️ Development Workflow

### Working with Blocks

1. **Create new block**
   ```bash
   cd plugins/blocks-gamestore
   npx @wordpress/create-block new-block-name
   ```

2. **Development workflow**
   ```bash
   npm run start  # Start development server
   # Edit files in src/
   # Browser auto-refreshes
   ```

3. **Production build**
   ```bash
   npm run build
   ```

### Theme Development

- Edit template files in `themes/game-store/templates/`
- Modify patterns in `themes/game-store/patterns/`
- Update styles in `themes/game-store/style.css`
- Configure theme in `themes/game-store/theme.json`

## 📝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make changes following WordPress coding standards
4. Test locally with Docker
5. Submit a pull request

## 📄 License

This project is licensed under the GPL v2 or later - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**GKVSO**
- Telegram: [@GKVSO](https://t.me/GKVSO)

---

📖 **Documentation**: [Русская версия](./docs/ru/README.md) | **English** (current)