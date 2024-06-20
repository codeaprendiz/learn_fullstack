# Rendering index page with ejs

- Make changes in server.js to render index.ejs page

```javascript
app.get('/', (request, response) => {
  response.render('pages/index', { pageTitle: 'Welcome' });
});
```

- Create a folder inside `views` folder with name `pages`

```bash
$ mkdir views/pages
.
```

- Move the `static/index.html` file to `views/pages` folder and rename it to `index.ejs`

```bash
$ mv static/index.html views/pages/index.ejs
.
```

- Install the VS code extension [EJS language support](https://marketplace.visualstudio.com/items?itemName=DigitalBrainstem.javascript-ejs-support)
  
- Update the `views/pages/index.ejs` file to use ejs syntax

```html
    <title>Roux Meetups <%= pageTitle%>
```

- Run the server and open the browser to see the changes

```bash
$ npm run dev

> website@1.0.0 dev
> nodemon --ignore feedback.json server.js

[nodemon] 2.0.22
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `node server.js`
Server is listening on port 3000 Ready to accept requests!
```

- Changes in browser

![img](.images/image-2023-05-30-12-43-14.png)




