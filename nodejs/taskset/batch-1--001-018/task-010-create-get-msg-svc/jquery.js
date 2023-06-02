// JQuery
$(
    () => {
        console.log("jquery-msgs.js : this function should be called after the document is loaded.")

        console.log("Let's get the hold of the button with id send")

        $("#send").on("click",
            () => {
                console.log("Inside the button click event")
                console.log("Calling function addMessages()")
                getMessages()
            }
        )
    }
)

// Function to add messages
function addMessages(message) {
    $("#messages").append(
        `
            <h4> ${message.name} </h4>
            <p> ${message.message} </p>
        `
    )

}

// Function to call /messages endpoint
function getMessages() {
    $.get(
        'http://localhost:3000/messages', (data) => {
            //console.log("Inside getMessages method: The following is the data : \n", data);
            //displayRequestData(data);
            data.forEach(element => {
                addMessages(element);
            });
        }
    )
}
