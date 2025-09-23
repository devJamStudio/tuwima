#!/usr/bin/env node

/**
 * HMR Test Script for Green House Template
 * This script tests if HMR is properly configured
 */

const fs = require('fs');
const path = require('path');

console.log('🔥 Testing HMR Configuration for Green House Template...\n');

// Check if hot file exists and has correct port
const hotFile = './hot';
if (fs.existsSync(hotFile)) {
  const hotContent = fs.readFileSync(hotFile, 'utf8').trim();
  console.log(`✅ Hot file exists: ${hotContent}`);

  if (hotContent.includes('5174')) {
    console.log('✅ Port 5174 is correctly configured');
  } else {
    console.log('❌ Port 5174 is not configured correctly');
  }
} else {
  console.log('❌ Hot file does not exist');
}

// Check Vite config
const viteConfig = './vite.config.js';
if (fs.existsSync(viteConfig)) {
  const configContent = fs.readFileSync(viteConfig, 'utf8');
  if (configContent.includes('5174')) {
    console.log('✅ Vite config has port 5174');
  } else {
    console.log('❌ Vite config does not have port 5174');
  }
} else {
  console.log('❌ Vite config does not exist');
}

// Check functions.php
const functionsFile = './functions.php';
if (fs.existsSync(functionsFile)) {
  const functionsContent = fs.readFileSync(functionsFile, 'utf8');
  if (functionsContent.includes('5174')) {
    console.log('✅ Functions.php has port 5174');
  } else {
    console.log('❌ Functions.php does not have port 5174');
  }
} else {
  console.log('❌ Functions.php does not exist');
}

// Check if HMR test file exists
const hmrTestFile = './src/hmr-test.js';
if (fs.existsSync(hmrTestFile)) {
  console.log('✅ HMR test file exists');
} else {
  console.log('❌ HMR test file does not exist');
}

console.log('\n🏠 Green House HMR Configuration Test Complete!');
console.log('To test HMR:');
console.log('1. Run: npm run dev');
console.log('2. Open your WordPress site');
console.log('3. Check browser console for HMR messages');
console.log('4. Edit any CSS/JS file and see live updates');
