const express = require('express');

const router = express.Router();

module.exports = (params) => {
  const { speakersService } = params;

  // you have to use async await here because the function is asynchronous
  // which means that the function will not be executed immediately
  router.get('/', async (request, response) => {
    // await makes sure that the function is executed before the next line is executed
    const speakers = await speakersService.getList();
    response.json(speakers);
  });

  router.get('/:shortname', (request, response) => {
    response.send(`Detail page of ${request.params.shortname}`);
  });
  return router;
};
