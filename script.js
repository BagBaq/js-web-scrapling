const puppeteer = require('puppeteer');
const fs = require('fs');

async function run() {
  const browser = await puppeteer.launch();
  const page = await browser.newPage();
  const url = await page.goto('https://www.tech-worm.com/7-en-iyi-ucretsiz-depolama-alani-hizmeti-sunan-servisler/');

  await page.screenshot({ path: `screenshots/Image-${Math.floor(Math.random() * 9800000) + 1}.png` });

  const title = await page.$eval("#post-header > h1", el => el.textContent);
  const content = await page.$eval("#content-main", content => content.innerHTML);

  console.log(content);

  browser.close();
}

run();