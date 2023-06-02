const express = require('express');

const router = express.Router();

module.exports = (params) => {
  const { } = params;

  router.get('/registration', (req, res) =>
    res.render('users/registration', { success: req.query.success }));

  router.get('/account', (req, res) =>
    res.render('users/account', { user: req.user }));

  return router;
};
