const express = require('express');
const path = require('path');
const cookieSession = require('cookie-session');

const FeedbackService = require('./services/FeedbackService');
const SpeakerService = require('./services/SpeakerService');

const feedbackService = new FeedbackService('./data/feedback.json');
const speakersService = new SpeakerService('./data/speakers.json');

const routes = require('./routes');

const app = express();

const port = 3000;

// trust first proxy is required for cookie session to work with proxy like nginx
app.set('trust proxy', 1);

app.use(
  cookieSession({
    name: 'session',
    keys: ['1234567890qwertyuiopasdfghjklzxcvbnm', '0987654321zxcvbnmlkjhgfdsapoiuytrewq'],
    maxAge: 24 * 60 * 60 * 1000, // 24 hours
  })
);

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, './views'));

app.locals.siteName = 'ROUX Meetups';

// Serve static files
app.use(express.static(path.join(__dirname, './static')));

// Set local variables
// accessible to all views
app.use(async (request, response, next) => {
  try {
    const names = await speakersService.getNames();
    response.locals.speakerNames = names;
    // eslint-disable-next-line no-console
    console.log(response.locals.speakerNames);
    return next();
  } catch (error) {
    return next(error);
  }
});

// Use the routes module for all requests
app.use(
  '/',
  routes({
    feedbackService,
    speakersService,
  })
);

app.listen(port, () => {
  /* eslint-disable no-console */
  console.log(`Server is listening on port ${port} Ready to accept requests!`);
});
