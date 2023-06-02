# Configure ESLint and React

- [https://react-v8.holt.courses/lessons/core-react-concepts/jsx](https://react-v8.holt.courses/lessons/core-react-concepts/jsx)

- ENV
  
```bash
$ showenv
node: v19.8.0
npm env: 9.5.1
```

- Run

```bash
$ npm install -D eslint-plugin-import@2.27.5
.
$ npm install -D eslint-plugin-jsx-a11y@6.7.1
.
$ npm install -D eslint-plugin-react@7.32.2
.
```

- `npm run lint` should work now

```bash
$ npm run lint                             

> adopt-me@1.0.0 lint
> eslint "src/**/*.{js,jsx}" --quiet
```
