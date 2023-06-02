# Using Partials with EJS

- Create a folder `views/layout/partials` and add a file `navigation.ejs` in it.

```bash
$ mkdir -p views/layouts/partials
.
$ touch views/layout/partials/navigation.ejs
.

```

- Include `navigation.ejs` in `views/layout/index.ejs`

```html
      <%- include(`./partials/navigation`) %>
```

- Fix all the `links` in `views/layout/partials/navigation.ejs`

- Run

```bash
npm run dev

> task-050-create-express-server@1.0.0 dev
> nodemon --ignore feedback.json server.js

[nodemon] 2.0.15
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `node server.js`
Express server listening on port 3000!
```

- Home page should look like this [http://localhost:3000/](http://localhost:3000/)
  
![img](.images/image-2023-05-31-20-51-11.png)

- Clicking on `speakers`

![img](.images/image-2023-05-31-20-52-05.png)

- Clicking on `Roux Meetups` should take you back to homepage

![img](.images/image-2023-05-31-20-52-43.png)

- Create file `views/layout/partials/scripts.ejs`

```bash
$ touch views/layout/partials/scripts.ejs   
.
```

- Validate

![img](.images/image-2023-05-31-20-57-31.png)

![img](.images/image-2023-05-31-20-57-48.png)
