# Handling User Input Review

- [https://react-v8.holt.courses/lessons/core-react-concepts/handling-user-input](https://react-v8.holt.courses/lessons/core-react-concepts/handling-user-input)

- ENV
  
```bash
$ showenv
node: v19.8.0
npm env: 9.5.1
```

- Let's make it so whenever someone either hits enter or clicks the button it searches for animals. We can do this by listening for submit events on the form. Let's go do that now. In SearchParams.js:

```javascript
// replace <form>
<form
  onSubmit={e => {
    e.preventDefault();
    requestPets();
  }}
>
```

- We actually did this in the previous task already.