#!/usr/bin/env node

/**
 * Setup script to configure Vite proxy for WordPress
 */

import { readFileSync, writeFileSync } from 'fs';
import { join } from 'path';

// Common WordPress URLs to try
const commonUrls = [
  'http://localhost/tuwima',
  'http://localhost:8080/tuwima',
  'http://localhost:3001/tuwima',
  'http://localhost:8888/tuwima',
  'http://tuwima.local',
  'http://localhost/wordpress/tuwima',
  'http://localhost:8080/wordpress/tuwima'
];

async function checkUrl(url) {
  try {
    const response = await fetch(url, {
      method: 'HEAD',
      timeout: 2000
    });
    return response.ok;
  } catch {
    return false;
  }
}

async function findWordPressUrl() {
  console.log('🔍 Searching for your WordPress site...\n');

  for (const url of commonUrls) {
    process.stdout.write(`Checking ${url}... `);
    const isAvailable = await checkUrl(url);
    if (isAvailable) {
      console.log('✅ Found!');
      return url;
    }
    console.log('❌');
  }

  return null;
}

async function updateViteConfig(wordpressUrl) {
  const viteConfigPath = join(process.cwd(), 'vite.config.js');
  let content = readFileSync(viteConfigPath, 'utf8');

  // Update the target URL in the proxy configuration
  content = content.replace(
    /target: ['"]http:\/\/localhost\/tuwima['"],/,
    `target: '${wordpressUrl}',`
  );

  writeFileSync(viteConfigPath, content);
  console.log(`✅ Updated vite.config.js with target: ${wordpressUrl}`);
}

async function main() {
  console.log('🚀 WordPress + Vite Proxy Setup\n');

  const wordpressUrl = await findWordPressUrl();

  if (wordpressUrl) {
    await updateViteConfig(wordpressUrl);
    console.log('\n✅ Setup complete!');
    console.log('\n🎯 Next steps:');
    console.log('1. Run: npm run dev');
    console.log('2. Visit: http://localhost:3000');
    console.log('3. Your WordPress site will be proxied through Vite!');
  } else {
    console.log('\n❌ Could not find your WordPress site.');
    console.log('\n🛠️  Manual setup:');
    console.log('1. Find your WordPress URL (e.g., http://localhost:8080/tuwima)');
    console.log('2. Edit vite.config.js and update the "target" URL');
    console.log('3. Run: npm run dev');
  }
}

main().catch(console.error);

