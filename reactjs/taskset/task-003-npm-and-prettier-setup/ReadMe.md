# NPM and Prettier Setup

- [https://react-v8.holt.courses/lessons/js-tools/npm](https://react-v8.holt.courses/lessons/js-tools/npm)
- [https://react-v8.holt.courses/lessons/js-tools/prettier](https://react-v8.holt.courses/lessons/js-tools/prettier)

- ENV
  
```bash
$ showenv
node: v19.8.0
npm env: 9.5.1
```

```bash
$ cd adopt-me

$ ls
src

$ npm init -y

# Code auto-formatting
$ npm install --save-dev prettier@2.8.7

# Formatting
$ npm run format

> adopt-me@1.0.0 format
> prettier --write "src/**/*.{js,jsx}"

src/App.js 35ms
```
