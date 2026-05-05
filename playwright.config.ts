import { defineConfig, devices } from '@playwright/test';

const baseURL = process.env.XPRESSUI_THEME_BASE_URL || 'http://localhost:8080';

export default defineConfig({
  testDir: './tests/visual',
  snapshotPathTemplate: '{testDir}/__screenshots__/{projectName}/{testFilePath}/{arg}{ext}',
  fullyParallel: false,
  retries: process.env.CI ? 1 : 0,
  reporter: process.env.CI ? [['github'], ['html', { open: 'never' }]] : 'list',
  use: {
    baseURL,
    trace: 'on-first-retry',
    viewport: { width: 1440, height: 2000 },
  },
  projects: [
    {
      name: 'desktop-wide',
      use: { ...devices['Desktop Chrome'], viewport: { width: 1440, height: 2200 } },
    },
    {
      name: 'desktop-narrow',
      use: { ...devices['Desktop Chrome'], viewport: { width: 1200, height: 2200 } },
    },
    {
      name: 'mobile',
      use: { ...devices['Pixel 7'] },
    },
  ],
});

