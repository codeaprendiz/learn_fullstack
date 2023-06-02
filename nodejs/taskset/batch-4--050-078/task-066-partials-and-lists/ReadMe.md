- Running

```bash
$ npm run dev

> task-050-create-express-server@1.0.0 dev
> nodemon --ignore feedback.json server.js

[nodemon] 2.0.15
[nodemon] to restart at any time, enter `rs`
[nodemon] watching path(s): *.*
[nodemon] watching extensions: js,mjs,json
[nodemon] starting `node server.js`
Express server listening on port 3000!
[Object: null prototype] {
  speakerNames: [
    { name: 'Lorenzo Garcia', shortname: 'Lorenzo_Garcia' },
    { name: 'Hilary Goldywynn Post', shortname: 'Hillary_Goldwynn' },
    { name: 'Riley Rudolph Rewington', shortname: 'Riley_Rewington' }
  ]
}
Visit Count :  26
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
[Object: null prototype] {
  speakerNames: [
    { name: 'Lorenzo Garcia', shortname: 'Lorenzo_Garcia' },
    { name: 'Hilary Goldywynn Post', shortname: 'Hillary_Goldwynn' },
    { name: 'Riley Rudolph Rewington', shortname: 'Riley_Rewington' }
  ]
}
[Object: null prototype] {
  speakerNames: [
    { name: 'Lorenzo Garcia', shortname: 'Lorenzo_Garcia' },
    { name: 'Hilary Goldywynn Post', shortname: 'Hillary_Goldwynn' },
    { name: 'Riley Rudolph Rewington', shortname: 'Riley_Rewington' }
  ]
}
[
  'Hillary_Goldwynn_01_tn.jpg',
  'Hillary_Goldwynn_02_tn.jpg',
  'Hillary_Goldwynn_03_tn.jpg',
  'Hillary_Goldwynn_04_tn.jpg',
  'Hillary_Goldwynn_05_tn.jpg',
  'Hillary_Goldwynn_06_tn.jpg',
  'Hillary_Goldwynn_07_tn.jpg'
]
{
  title: 'Deep Sea Wonders',
  name: 'Hilary Goldywynn Post',
  shortname: 'Hillary_Goldwynn',
  description: "<p>Hillary is a sophomore art sculpture student at New York University, and has already won all the major international prizes for new painters, including the Divinity Circle, the International Painter's Medal, and the Academy of Paris Award. Hillary's CAC exhibit features paintings that contain only water images including waves, deep sea, and river.</p><p>An avid water sports participant, Hillary understands the water in many ways in which others do not, or may not ever have the opportunity. Her goal in creating the CAC exhibit was to share with others the beauty, power, and flow of natural bodies of water throughout the world. In addition to the display, Hilary also hosts a session on Tuesday called Deep Sea Wonders, which combines her love of deep sea diving and snorkeling, with instruction for capturing the beauty of underwater explorations on canvas.</p>"
}

```

- All speakers page

![](.images/all-speakers-page.png)

- Speaker Details Page

![](.images/speakers-details-page.png)