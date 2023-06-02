const express = require('express');

const router = express.Router();
const speakersRoute = require('./speakers');
const feedbackRoute = require('./feedback');

module.exports = (params) => {
  const { speakersService } = params;

  router.get('/', async (request, response) => {
    if (!request.session.visitcount) {
      request.session.visitcount = 0;
    }
    request.session.visitcount += 1;
    /* eslint-disable no-console */
    console.log(`Number of visits: ${request.session.visitcount}`);
    const topSpeakers = await speakersService.getList();
    console.log(topSpeakers);
    response.render('layout', { pageTitle: 'Welcome', template: 'index', topSpeakers });
  });

  router.use('/speakers', speakersRoute(params));
  router.use('/feedback', feedbackRoute(params));

  return router;
};
