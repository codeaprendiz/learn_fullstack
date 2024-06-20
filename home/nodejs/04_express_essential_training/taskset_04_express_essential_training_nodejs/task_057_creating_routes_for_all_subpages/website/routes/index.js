const express = require('express');

const router = express.Router();
const speakersRoute = require('./speakers');
const feedbackRoute = require('./feedback');

module.exports = () => {
  router.get('/', (request, response) => {
    response.render('pages/index', { pageTitle: 'Welcome' });
  });

  router.use('/speakers', speakersRoute());
  router.use('/feedback', feedbackRoute());

  return router;
};
