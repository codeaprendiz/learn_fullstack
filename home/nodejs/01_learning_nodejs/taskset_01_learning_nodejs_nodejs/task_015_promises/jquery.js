var socket = io()


// JQuery

$(
    () => {
        console.log("jquery.js : this function should be called after the document is loaded.")

        console.log("Let's get the hold of the button with id send")

        $("#send").on("click",
            () => { // // Use async keyword to use await inside the function
                console.log("Inside the button click event")
                console.log("Calling function addMessages()")
                var chatPayload = {
                    name: $('#nameId').val(),
                    message: $('#textMessageAreaId').val()
                }
                console.log("After click the chatPayload has been captured: ", chatPayload)
                // Wait until post request is completed
                postMessages(chatPayload);
            }
        )   // End of $("#send").on("click", () => { ... })

        // To display the message, When you refresh the tab
        getMessages();
    }
)

// socket.on('message', addMessages)
// fix printing message twice
socket.on('message', (message) => {
    console.log("Inside socket.on('message') method: The following is the message : \n", message);
    addMessages(message);
})



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
            console.log("Inside getMessages method: The following is the data : \n", data);
            $("#messages").empty(); // Clears the #messages element
            data.forEach(element => {
                addMessages(element);
            });
        }
    )
}

// Function to call /messages endpoint
function postMessages(payload) {
    $.post(
        'http://localhost:3000/messages', payload
    )
}