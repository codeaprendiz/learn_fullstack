# Effects

- [https://react-v8.holt.courses/lessons/core-react-concepts/effects](https://react-v8.holt.courses/lessons/core-react-concepts/effects)

- ENV
  
```bash
$ showenv
node: v19.8.0
npm env: 9.5.1
```

- Running the application after, in this case we request once.

![img](.images/image-2023-04-21-10-50-04.png)

- Everytime animal changes, I want to you to re-run request pets.

![img](.images/image-2023-04-21-11-03-22.png)

![img](.images/image-2023-04-21-11-03-45.png)

- Everytime location changes, re-request

![img](.images/image-2023-04-21-11-07-08.png)

- Desired behavior is keeping the array empty

```jsx
    useEffect(() => {
    requestPets();
  }, [])
```
