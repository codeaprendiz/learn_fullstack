# Looping through lists in templates

```html
                        <% speakerNames.forEach( (speaker)=> { %>
                            <a class="dropdown-item" href="/speakers/<%= speaker.shortname %>">
                                <%= speaker.name %>
                            </a>
                            <% }) %>
```

- Loading speakers dynamically 

![img](.images/image-2023-05-31-23-12-15.png)

- Running the server and hitting home page [http://localhost:3000/](http://localhost:3000)

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
[
  { name: 'Lorenzo Garcia', shortname: 'Lorenzo_Garcia' },
  { name: 'Hilary Goldywynn Post', shortname: 'Hillary_Goldwynn' },
  { name: 'Riley Rudolph Rewington', shortname: 'Riley_Rewington' }
]
Number of visits: 28
[
  {
    name: 'Lorenzo Garcia',
    shortname: 'Lorenzo_Garcia',
    title: 'Art in Full Bloom',
    summary: "Drawing and painting flowers may seem like a first-year art student's assignment, but Lorenzo Garcia brings depth, shadows, light, form and color to new heights with his unique and revolutionary technique of painting on canvas with ceramic glaze. This session is sure to be a hit with mixed media buffs."
  },
  {
    name: 'Hilary Goldywynn Post',
    shortname: 'Hillary_Goldwynn',
    title: 'Deep Sea Wonders',
    summary: "Hillary is a sophomore art sculpture student at New York University, and has won the major international prizes for painters, including the Divinity Circle and the International Painter's Medal. Hillary's exhibit features paintings that contain only water including waves, deep sea, and river."
  },
  {
    name: 'Riley Rudolph Rewington',
    shortname: 'Riley_Rewington',
    title: 'The Art of Abstract',
    summary: 'The leader of the MMA artistic movement in his hometown of Portland, Riley Rudolph Rewington draws a crowd wherever he goes. Mixing street performance, video, music, and traditional art, Riley has created some of the most unique and deeply poignant abstract works of his generation.'
  }
]
```

- Since we render nav dynamically, if you change the data

![img](.images/dynamic-nav-render.png)

- Create folder `views/pages/partials` and create file `topSpeakers.ejs`

```bash
$ mkdir -p views/pages/partials
.
$ touch views/pages/partials/topSpeakers.ejs
.
```
