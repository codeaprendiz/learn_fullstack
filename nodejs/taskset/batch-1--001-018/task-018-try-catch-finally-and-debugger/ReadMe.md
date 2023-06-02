# Try Catch Finally And Debugger

## Code

```javascript
app.post('/messages', async (req, res) => {
    try {
        var messageModelObject = new messageModel(req.body);

        var savedMessage = await messageModelObject.save()
        console.log("Message has been saved successfully in the database");

        var censored = await messageModel.findOne({ message: 'badword' });

        if (censored) {
            console.log("Censored word found in the message: ", censored);
            removeCensoredMessage = await messageModel.findByIdAndDelete(censored._id);
            console.log("Censored message has been removed from the database");
        }
        else {
            io.emit('message', req.body);
        }

        res.sendStatus(200);
    }
    catch (error) {
        res.sendStatus(500);
        return console.log("Error while saving the message in the database : ", error);
    }
    finally {
        console.log("Message always called");
    }

});
```

## Server Logs

```bash
.Database is connected.
server is listening on port 3000
A user is connected
A user is connected
Successfully found all the documents as per mongo query
Messages :  []
Message has been saved successfully in the database
Message always called
.
```


## Debugger

- Open the file you want to debug

- Add a breakpoint by clicking on the line number

![img](.images/image-2023-05-21-15-02-02.png)

- `CMD + SHIFT + D` to open the debug panel and click on Run and Debug

![img](.images/image-2023-05-21-15-03-10.png)

- Select `Node.js`

- You should see following screen

![img](.images/image-2023-05-21-15-03-46.png)

- Give message in browser and click on send

![img](.images/image-2023-05-21-15-04-38.png)

- The debugger screen

![img](.images/image-2023-05-21-15-05-36.png)

- Type `req.body` at the bottom and press enter. The same info is also available in the variables section

![img](.images/image-2023-05-21-15-06-19.png)

- Click on `step.over` which takes us to the next statement

![img](.images/image-2023-05-21-15-07-20.png)

- `Step.into` takes us inside the function. Let's get into `messageModel.findOne()`

![img](.images/image-2023-05-21-15-08-54.png)

- `Step.out` takes us out of the function

![img](.images/image-2023-05-21-15-09-33.png)

- Click `continue` to resume

![img](.images/image-2023-05-21-15-10-53.png)

![img](.images/image-2023-05-21-15-12-00.png)

- Click on red `stop` to stop the debugger

![img](.images/image-2023-05-21-15-12-29.png)

- Click on green `restart` to restart the debugger
