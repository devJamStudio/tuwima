# Complete ACF Setup Guide for Green House Tuwima

## 🚀 Quick Setup Instructions

### Step 1: Import ACF Field Groups
1. Go to **WordPress Admin** → **Custom Fields** → **Field Groups**
2. Click **"Import Field Groups"**
3. Import each JSON file from `/acf-json/` folder:
   - `group_hero_section.json`
   - `group_about_investment.json`
   - `group_benefits_section.json`
   - `group_location_section.json`
   - `group_apartments_section.json`
   - `group_contact_section.json`
   - `group_financing_section.json`
   - `group_about_developer.json`
   - `group_navigation_settings.json`

### Step 2: Create the Page
1. Go to **Pages** → **Add New**
2. Set title: "Green House Tuwima"
3. In **Page Attributes** → **Template**, select **"Green House Tuwima"**
4. **Publish** the page

### Step 3: Edit the Page
1. Go to your published page
2. Click **"Edit Page"**
3. You'll now see all the ACF field groups in the editor
4. Fill in the content for each section

## 📋 Field Groups Overview

### 1. Hero Section
- **Hero Title**: Main headline
- **Hero Subtitle**: Subtitle text
- **Hero Button Text/URL**: Call-to-action button
- **Hero Statistics**: Repeater field for numbers/stats
- **Hero Background**: Background image

### 2. About Investment Section
- **Section Title/Subtitle**: Headings
- **About Content**: Rich text content
- **About Button**: Call-to-action
- **About Image**: Section image

### 3. Benefits Section
- **Benefits Title**: Section heading
- **Benefits List**: Repeater with icons and text
- **Benefits Description**: Additional text
- **Benefits Button**: Call-to-action
- **Benefits Image**: Section image

### 4. Location Section
- **Location Title**: Section heading
- **Location Description**: Rich text content
- **Location Amenities**: Repeater with icons, time, and names
- **Location Button**: Call-to-action
- **Location Map**: Map image

### 5. Apartments Section
- **Apartments Title**: Section heading
- **Apartments Description**: Rich text content
- **Apartments Selector**: Interactive selector image
- **Apartments Table**: Repeater with apartment details

### 6. Contact Section
- **Contact Title**: Section heading
- **Company Logo**: Company logo image
- **Address**: Company address
- **Email**: Contact email
- **Company Details**: KRS, NIP, REGON
- **Contact Agents**: Repeater with agent photos and details

### 7. Financing Section
- **Financing Title**: Section heading
- **Partner Logo**: Financing partner logo
- **Financing Content**: Rich text content
- **Financing Button**: Call-to-action
- **Financing Image**: Section image

### 8. About Developer Section
- **Developer Title**: Section heading
- **Developer Content**: Rich text content
- **Developer Image**: Section image

### 9. Navigation Settings (Options Page)
- **Logo**: Main website logo
- **Phone Number**: Main phone number
- **WhatsApp Number**: WhatsApp contact
- **Navigation Links**: Repeater for menu items

## 🎨 Default Content Included

All field groups come with default content matching the original HTML markup, so the page will look complete even before you customize it.

## 🔧 Troubleshooting

### If ACF Fields Don't Appear:
1. **Check ACF Plugin**: Ensure Advanced Custom Fields is installed and activated
2. **Check Template**: Make sure the page uses "Green House Tuwima" template
3. **Check Field Groups**: Verify all field groups are imported and active
4. **Clear Cache**: Clear any caching plugins

### If Images Don't Load:
1. Upload images to WordPress Media Library
2. Use the ACF image fields to select uploaded images
3. Ensure image URLs are correct

## 📱 Responsive Design

The template is fully responsive using Tailwind CSS:
- **Mobile**: Single column layout
- **Tablet**: Optimized spacing and sizing
- **Desktop**: Full multi-column layouts

## 🎯 Next Steps

1. **Import all JSON files** (Step 1 above)
2. **Create and configure the page** (Steps 2-3 above)
3. **Customize content** through ACF fields
4. **Upload and assign images** via ACF image fields
5. **Test responsiveness** on different devices

## 📞 Support

If you encounter any issues:
1. Check that all JSON files are imported correctly
2. Verify the page template is set to "Green House Tuwima"
3. Ensure ACF plugin is active
4. Check WordPress error logs for any PHP errors

The template includes fallback content, so it will display properly even if some fields are empty.
