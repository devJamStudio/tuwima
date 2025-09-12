# Green House Tuwima - WordPress Theme

## Overview
This is a responsive WordPress theme for the Green House Tuwima real estate development website. The theme is built with ACF (Advanced Custom Fields) for complete content management and Tailwind CSS for responsive design.

## Features
- ✅ **Fully Responsive Design** - Built with Tailwind CSS
- ✅ **ACF Integration** - Every text, image, and icon is editable
- ✅ **Modern UI/UX** - Clean, professional design
- ✅ **SEO Optimized** - Proper semantic HTML structure
- ✅ **Performance Optimized** - Lightweight and fast loading
- ✅ **Mobile First** - Optimized for all device sizes

## Files Created

### 1. WordPress Page Template
- **File**: `page-green-house-tuwima.php`
- **Purpose**: Main WordPress page template with ACF integration
- **Usage**: Create a new page in WordPress admin and select "Green House Tuwima" as the template

### 2. Standalone HTML Version
- **File**: `standalone-green-house.html`
- **Purpose**: Standalone HTML version that works without WordPress
- **Usage**: Can be opened directly in a browser for testing

### 3. ACF Field Groups
- **File**: `inc/acf-field-groups.php`
- **Purpose**: Defines all editable fields for the website
- **Sections**: Hero, About, Benefits, Location, Apartments, Gallery, Financing, Developer, Contact

## Setup Instructions

### For WordPress (Recommended)

1. **Install WordPress** (if not already installed)
2. **Install ACF Plugin**:
   - Go to WordPress Admin → Plugins → Add New
   - Search for "Advanced Custom Fields"
   - Install and activate the plugin

3. **Create a New Page**:
   - Go to WordPress Admin → Pages → Add New
   - Title: "Green House Tuwima"
   - Select "Green House Tuwima" template from Page Attributes
   - Publish the page

4. **Customize Content**:
   - Edit the page you just created
   - You'll see ACF fields for all sections
   - Upload images, edit text, and customize all content

### For Standalone Testing

1. **Open the HTML file**:
   - Navigate to `/wp-content/themes/future/standalone-green-house.html`
   - Open in any web browser
   - All images and styling will work locally

## ACF Field Groups

The theme includes the following editable sections:

### 1. Hero Section
- Hero title and subtitle
- Call-to-action button
- Statistics (completion date, buildings, apartments, etc.)
- Background image

### 2. About Investment
- Section title and subtitle
- Main content (WYSIWYG editor)
- Call-to-action button
- About image

### 3. Benefits Section
- Benefits title
- List of benefits with icons
- Benefits description
- Benefits image

### 4. Location Section
- Location title and description
- Nearby amenities with icons and distances
- Location map image

### 5. Apartments Section
- Apartments title and description
- Interactive apartment selector image
- Apartments table with availability status

### 6. Gallery Section
- Gallery images
- "View all" call-to-action

### 7. Financing Section
- Financing title and content
- Partner logo
- Financing image

### 8. About Developer
- Developer title and content
- Developer image

### 9. Contact Section
- Contact information
- Company details
- Contact agents with photos

### 10. Navigation Settings (Options Page)
- Logo images
- Contact information
- Navigation menu items

## Customization

### Colors
The theme uses a custom color palette defined in `tailwind.config.js`:
- Primary Green: `#00a906`
- Secondary colors for various UI elements

### Fonts
- **Montserrat**: Used for headings and important text
- **Lato**: Used for body text

### Responsive Breakpoints
- Mobile: Default (320px+)
- Tablet: `md:` (768px+)
- Desktop: `lg:` (1024px+)
- Large Desktop: `xl:` (1280px+)

## Image Assets

All original images are located in:
- `/wp-content/themes/future/html/images/`

The theme references these images and allows them to be replaced through ACF fields.

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

- Optimized images
- Minimal CSS/JS
- Fast loading times
- Mobile-optimized

## Support

For technical support or customization requests, please refer to the theme documentation or contact the development team.

## License

This theme is created for the Green House Tuwima project. All rights reserved.
