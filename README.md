# Amazon Affiliates API Experiment

The purpose of this repo is to mess around a bit with the Amazon Affiliate API. We will try to create a "store" that supplies itself with products that may be interesting to the visitor.

You can run it on a web server and also maybe some scripts using php cli.

## Setup

### API keys and region selection
Copy .env.demo to .env and fill with your data.

### Install Tailwind
To get a nice store we use Tailwind. You can add it to your project.
```bash
npm install -D tailwindcss
npx tailwindcss init
```

## Error 429 Too Many Requests due to Amazon API Key Provisioning Delay

**Amazon May Not Have Provisioned Your API Keys Yet (48 hours From Creation)**

Please note that newly generated Amazon API keys may not be functional immediately. Amazon has a delay in the activation of newly generated keys, which means they will not be functional for querying the API or setting up API connectivity until this window has elapsed. Ensure your keys are at least 48 hours old before attempting to use them. 

If you try to use the keys within this period, you may encounter errors such as `429 Too Many Requests` or other connectivity issues. This error indicates that your request was denied due to request throttling, often because the keys are not yet fully provisioned. Please wait for the 48-hour period to pass and try again.
