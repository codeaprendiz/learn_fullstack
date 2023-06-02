# Vite Setup

- [https://react-v8.holt.courses/lessons/js-tools/vite](https://react-v8.holt.courses/lessons/js-tools/vite)

- ENV
  
```bash
$ showenv
node: v19.8.0
npm env: 9.5.1
```

- Run

```bash
$ cd adopt-me
.
$ npm i -D vite@4.3.0
.
$ npm i -D @vitejs/plugin-react@3.1.0        
.
```

- Make `App.jsx` changes and then run

```bash
$ touch vite.config.js
.
```

- Install react and react-dom

```bash
$ npm install react@18.2.0 react-dom@18.2.0
.
```

- Now all the React errors in the App.jsx files should be fixed. Similarly the following command will give zero errors.

```bash
$ npm run lint

> adopt-me@1.0.0 lint
> eslint "src/**/*.{js,jsx}" --quiet
```

- After adding scripts to package.json

```bash
$ npm run dev 

> adopt-me@1.0.0 dev
> vite


  VITE v4.3.0  ready in 886 ms

  ➜  Local:   http://localhost:5173/
  ➜  Network: use --host to expose
  ➜  press h to show help
```

![img](.images/image-2023-04-20-15-22-38.png)
