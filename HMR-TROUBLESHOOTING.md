# HMR Troubleshooting Guide

## Current Status ✅
- Vite dev server is running on port 5174
- Hot file is correctly configured: `http://localhost:5174`
- All configuration files updated to use port 5174
- HMR test files created

## How to Test HMR

### 1. Check Browser Console
Open your WordPress site and check the browser console for:
```
🔥 HMR Test: Green House template loaded - VERSION 1.0
HMR is working! Green House template ready - VERSION 1.0
🏠 Green House HMR Status: {status: 'active', port: 5174, ...}
```

### 2. Look for HMR Indicator
You should see a green indicator in the top-right corner of your page saying "HMR Active - V1.0"

### 3. Test JavaScript HMR
Edit `/src/hmr-test.js` and change the version number:
```javascript
// Change this line:
console.log('🔥 HMR Test: Green House template loaded - VERSION 1.0');
// To:
console.log('🔥 HMR Test: Green House template loaded - VERSION 2.0');
```

You should see the console message update without page refresh.

### 4. Test CSS HMR
Edit `/src/css/components/header.css` and change the border color:
```css
/* Change this line: */
border: 3px solid #ff0000 !important;
/* To: */
border: 3px solid #00ff00 !important;
```

You should see the border color change instantly.

## Common Issues & Solutions

### Issue 1: No HMR Indicator Visible
**Solution:** Check if you're in development mode:
- Ensure `WP_DEBUG` is set to `true` in wp-config.php
- Check that the `hot` file exists in the theme root

### Issue 2: Console Shows Old Messages
**Solution:** Hard refresh the page (Ctrl+F5 or Cmd+Shift+R) to clear cache

### Issue 3: CSS Changes Not Updating
**Solution:** 
- Check browser dev tools Network tab for 304 responses
- Try adding `?v=timestamp` to your CSS files
- Clear browser cache

### Issue 4: JavaScript Changes Not Updating
**Solution:**
- Check if there are any JavaScript errors in console
- Ensure the file is being imported correctly in main.js
- Check that the file is being watched by Vite

## Debug Commands

### Check Vite Status
```bash
# Check if Vite is running
lsof -i :5174

# Check Vite logs
# Look at the terminal where you ran `npm run dev`
```

### Check Hot File
```bash
cat hot
# Should output: http://localhost:5174
```

### Check Network Requests
1. Open browser dev tools
2. Go to Network tab
3. Look for requests to `localhost:5174`
4. Check for WebSocket connections

## Expected Behavior

### Working HMR:
- ✅ Console shows HMR messages
- ✅ Green indicator appears on page
- ✅ CSS changes apply instantly
- ✅ JavaScript changes apply without page refresh
- ✅ WebSocket connection in Network tab

### Not Working:
- ❌ No console messages
- ❌ No green indicator
- ❌ Changes require manual refresh
- ❌ 404 errors for Vite assets

## Next Steps

If HMR is still not working:

1. **Restart Vite dev server:**
   ```bash
   # Stop current server (Ctrl+C)
   npm run dev
   ```

2. **Check WordPress configuration:**
   - Ensure you're accessing the site through the correct URL
   - Check that WP_DEBUG is enabled
   - Verify the theme is active

3. **Check browser compatibility:**
   - Try a different browser
   - Disable browser extensions
   - Check if JavaScript is enabled

4. **Check firewall/proxy:**
   - Ensure port 5174 is not blocked
   - Check if any proxy is interfering

## Contact
If issues persist, check the Vite dev server terminal output for error messages.
