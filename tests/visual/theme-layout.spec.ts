import { expect, test, type Page } from '@playwright/test';

const pages = [
  { path: '/', slug: 'home' },
  { path: '/xpressui/', slug: 'xpressui' },
  { path: '/install/', slug: 'install' },
  { path: '/pricing/', slug: 'pricing' },
];

async function hideWpAdminBar(page: Page) {
  await page.addStyleTag({
    content: `
      #wpadminbar { display: none !important; }
      html { margin-top: 0 !important; }
      body { margin-top: 0 !important; }
    `,
  });
}

test.describe('Theme visual regression', () => {
  for (const target of pages) {
    test(`matches ${target.slug} layout`, async ({ page }) => {
      await page.goto(target.path, { waitUntil: 'networkidle' });
      await hideWpAdminBar(page);
      await expect(page).toHaveScreenshot(`${target.slug}.png`, {
        fullPage: true,
        animations: 'disabled',
        maxDiffPixelRatio: 0.01,
      });
    });
  }

  test('payment proof panel does not overflow horizontally', async ({ page }) => {
    await page.goto('/xpressui/', { waitUntil: 'networkidle' });
    await hideWpAdminBar(page);

    const overflow = await page.evaluate(() => {
      const root = document.documentElement;
      return root.scrollWidth - root.clientWidth;
    });

    expect(overflow).toBeLessThanOrEqual(1);
  });

  test('xpressui hero chips stay within container bounds', async ({ page }) => {
    await page.goto('/xpressui/', { waitUntil: 'networkidle' });
    await hideWpAdminBar(page);

    const overflow = await page.evaluate(() => {
      const wrap = document.querySelector('.xpressui-hero-points') as HTMLElement | null;
      if (!wrap) return { hasWrap: false, overflowPx: 0 };
      const wrapRect = wrap.getBoundingClientRect();
      let maxOverflow = 0;
      wrap.querySelectorAll('span').forEach((chip) => {
        const rect = (chip as HTMLElement).getBoundingClientRect();
        maxOverflow = Math.max(maxOverflow, rect.right - wrapRect.right);
      });
      return { hasWrap: true, overflowPx: maxOverflow };
    });

    expect(overflow.hasWrap).toBeTruthy();
    expect(overflow.overflowPx).toBeLessThanOrEqual(1);
  });

  test('xpressui page remains stable with wp admin bar visible', async ({ page }) => {
    await page.goto('/xpressui/', { waitUntil: 'networkidle' });
    await expect(page).toHaveScreenshot('xpressui-adminbar-on.png', {
      fullPage: true,
      animations: 'disabled',
      maxDiffPixelRatio: 0.01,
    });
  });
});
