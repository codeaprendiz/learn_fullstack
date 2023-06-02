# Template Variables - More Detail

## Theory

The variables `siteName` and `pageTitle` are used as placeholders in your EJS template, and they get their values from the Express.js server code.

1. `siteName`: This variable is defined using `app.locals.siteName = 'ROUX Meetups';`. `app.locals` is an object in Express.js where you can store variables that are accessible to all views. Here, you're setting the property `siteName` to the string 'ROUX Meetups'. When your EJS file is rendered, `siteName` will be replaced by 'ROUX Meetups'.

2. `pageTitle`: This variable is set in a middleware function with the following block of code:

```javascript
app.use((request, response, next) => {
  response.locals.pageTitle = 'pageTitle';
  next();
});
```
`response.locals` is an object similar to `app.locals`, but it's specific to a particular request/response cycle. It's available throughout the lifetime of a request. Here, you're setting the `pageTitle` to the string 'pageTitle'. But if you want the page title to vary based on the route being visited or some other condition, you would want to set this variable differently, not just to a static string 'pageTitle'.

For example, you could have some logic in your routes that sets `pageTitle` to different strings depending on the route:

```javascript
app.get('/about', (req, res) => {
  res.locals.pageTitle = 'About Us';
  res.render('about');
});
```

In this example, when you visit the '/about' route, the `pageTitle` will be set to 'About Us'.

In your current implementation, since you have set `pageTitle` to 'pageTitle', it will just display 'pageTitle' on your web page.

![img](.images/image-2023-05-31-22-54-20.png)

## Run and reload the page

- Run

```bash
$ npm run dev
.
.
[
  { name: 'Lorenzo Garcia', shortname: 'Lorenzo_Garcia' },
  { name: 'Hilary Goldywynn Post', shortname: 'Hillary_Goldwynn' },
  { name: 'Riley Rudolph Rewington', shortname: 'Riley_Rewington' }
]
Number of visits: 24
```
