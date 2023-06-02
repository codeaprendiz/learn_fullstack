// The purpose of this file is covered in CH 05, Video 06
module.exports = {
  apps: [
    {
      name: 'meetup',
      script: 'bin/www',
      env_production: {
        NODE_ENV: 'production',
      },
    },
  ],
  deploy: {
    production: {
      user: 'nodejs',
      host: '<CHANGE_TO_YOUR_HOST>',
      ref: 'origin/master',
      repo: '<CHANGE_TO_YOUR_GITHUB_REPO>',

      // Make sure this directory exists on your server or change this entry to match your directory structure
      path: '/home/nodejs/deploy',

      'post-deploy': 'cp ../.env ./ && npm install && pm2 startOrRestart ecosystem.config.js --env production',
    },
  },
};
