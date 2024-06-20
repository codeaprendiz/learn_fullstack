const express = require('express');

const router = express.Router();

router.get('/', (request, response) => {
  response.render('pages/index', { pageTitle: 'Welcome' });
});

module.exports = router;
