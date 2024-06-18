const express = require('express');

const router = express.Router();

module.exports = (params) => {
  const { speakersService } = params;

  // you have to use async await here because the function is asynchronous
  // which means that the function will not be executed immediately
  router.get('/', async (request, response) => {
    const speakers = await speakersService.getList();
    response.render('layout', { pageTitle: 'Speakers', template: 'speakers', speakers });
  });

  router.get('/:shortname', async (request, response) => {
    const speaker = await speakersService.getSpeaker(request.params.shortname);
    console.log('Following are the details: \n', speaker);
    response.render('layout', { pageTitle: 'Speakers', template: 'speakers-detail', speaker });
  });
  return router;
};
