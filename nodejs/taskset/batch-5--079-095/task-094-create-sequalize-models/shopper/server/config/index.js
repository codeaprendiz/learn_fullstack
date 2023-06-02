const pkg = require('../../package.json');

module.exports = {
  applicationName: pkg.name,
  mongodb: {
    url: 'mongodb://localhost:27017/shopper',
  },
  redis: {
    port: 6379,
    client: null,
  },
  mysql: {
    options: {
      host: 'localhost',
      port: '3306',
      database: 'shopper',
      dialect: 'mysql',
      username: 'root',
      password: 'mypassword',
    },
    client: null,
  }
};
